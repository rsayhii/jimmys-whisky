<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Filter by Status
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        // Filter by Category
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        // Filter by Stock Status
        if ($request->has('stock_status') && $request->stock_status != '') {
            $status = $request->stock_status;
            if ($status == 'in-stock') {
                $query->where('qty', '>', 0);
            } elseif ($status == 'out-stock') {
                $query->where('qty', '<=', 0);
            }
        }

        $products = $query->latest()->paginate(10);
        
        // Get Categories for filter
        $categories = Category::where('status', 'active')->pluck('name');
        
        return view('admin.products.products', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Category::where('status', 'active')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'sku' => 'nullable|string|max:255|unique:products,sku',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'top_notes' => 'nullable|string|max:255',
            'heart_notes' => 'nullable|string|max:255',
            'base_notes' => 'nullable|string|max:255',
            'scent_family' => 'nullable|string|max:255',
            'concentration' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Men,Women,Unisex',
            'season' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048', // Main image
            'images.*' => 'nullable|image|max:2048', // Gallery images
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'taxable' => 'boolean',
            'status' => 'required|in:Published,Draft,Scheduled,Inactive',
            'category' => 'nullable|string|max:255',
            'collection' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'qty' => 'nullable|integer|min:0',
        ]);

        // Handle Main Image Upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        // Map Status
        $statusMap = [
            'Published' => 'publish',
            'Draft' => 'inactive',
            'Scheduled' => 'scheduled',
            'Inactive' => 'inactive',
        ];
        
        if (isset($validated['status']) && isset($statusMap[$validated['status']])) {
            $validated['status'] = $statusMap[$validated['status']];
        } else {
             $validated['status'] = 'publish';
        }
        
        // Handle stock_status
        $validated['stock_status'] = ($request->input('qty', 0) > 0) ? 'in-stock' : 'out-stock';

        $product = Product::create($validated);

        // Handle Gallery Images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products/gallery', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.products.products')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('status', 'active')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'nullable|string|max:255',
            'sku' => 'nullable|string|max:255|unique:products,sku,' . $product->id,
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'top_notes' => 'nullable|string|max:255',
            'heart_notes' => 'nullable|string|max:255',
            'base_notes' => 'nullable|string|max:255',
            'scent_family' => 'nullable|string|max:255',
            'concentration' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Men,Women,Unisex',
            'season' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'images.*' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'taxable' => 'boolean',
            'status' => 'required|in:Published,Draft,Scheduled,Inactive',
            'category' => 'nullable|string|max:255',
            'collection' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'qty' => 'nullable|integer|min:0',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'integer|exists:product_images,id',
        ]);

        // Handle Main Image
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        // Map Status
        $statusMap = [
            'Published' => 'publish',
            'Draft' => 'inactive', 
            'Scheduled' => 'scheduled',
            'Inactive' => 'inactive',
        ];
        
        if (isset($validated['status']) && isset($statusMap[$validated['status']])) {
            $validated['status'] = $statusMap[$validated['status']];
        }

        $validated['stock_status'] = ($request->input('qty', 0) > 0) ? 'in-stock' : 'out-stock';

        $product->update($validated);

        // Handle New Gallery Images
        if ($request->hasFile('images')) {
            $currentMaxSort = $product->images()->max('sort_order') ?? 0;
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('products/gallery', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'sort_order' => $currentMaxSort + $index + 1,
                ]);
            }
        }

        // Handle Gallery Image Deletion
        if ($request->has('delete_images')) {
            $imagesToDelete = ProductImage::whereIn('id', $request->delete_images)
                                          ->where('product_id', $product->id)
                                          ->get();
            foreach ($imagesToDelete as $img) {
                Storage::disk('public')->delete($img->image_path);
                $img->delete();
            }
        }

        return redirect()->route('admin.products.products')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        
        // Delete gallery images
        foreach ($product->images as $img) {
            Storage::disk('public')->delete($img->image_path);
            $img->delete();
        }

        $product->delete();
        return redirect()->route('admin.products.products')->with('success', 'Product deleted successfully.');
    }
}
