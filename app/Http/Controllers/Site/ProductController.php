<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function collection(Request $request)
    {
        $query = Product::where('status', 'publish');

        // Gender Filter
        if ($request->has('gender') && $request->gender !== 'ALL') {
            $query->where('gender', $request->gender);
        }

        // Category Filter
        if ($request->has('category')) {
            $query->whereIn('category', (array)$request->category);
        }

        // Occasion Filter (searches in tags and season)
        if ($request->has('occasion')) {
            $occasions = (array)$request->occasion;
            $query->where(function($q) use ($occasions) {
                foreach ($occasions as $occasion) {
                    $q->orWhere('tags', 'like', "%{$occasion}%")
                      ->orWhere('season', 'like', "%{$occasion}%");
                }
            });
        }

        // Price Filter
        if ($request->has('price')) {
            switch ($request->price) {
                case 'under_1000':
                    $query->where('price', '<', 1000);
                    break;
                case '1000_5000':
                    $query->whereBetween('price', [1000, 5000]);
                    break;
                case 'over_5000':
                    $query->where('price', '>', 5000);
                    break;
            }
        }

        // Search Query (if reusing this controller for search page eventually, but collection usually doesn't have text search bar in this UI)
        // However, if we want to support ?q=...
        if ($request->has('q')) {
            $searchTerm = $request->q;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }

        // Sorting
        switch ($request->sort) {
            case 'price_low_high':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'best_selling':
            default:
                $query->orderBy('qty', 'desc'); // Following existing 'bestseller' logic
                break;
        }

        $products = $query->paginate(9)->withQueryString();

        // Dynamic Filters Data
        // Get distinct categories from DB to ensure we only show what exists, 
        // OR fallback to the provided list if DB is empty/messy.
        // For now, let's merge the hardcoded list with DB results to be safe?
        // Actually, let's just use the DB distinct categories.
        $categories = Product::where('status', 'publish')->distinct()->pluck('category')->filter()->values()->toArray();
        if(empty($categories)) {
            $categories = ['Attar', 'Attar - Gift Pack', 'Dakhon', 'Perfume', 'Oil-based'];
        }

        $occasions = ['12 Hours', 'Daily Wear', 'Date Night', 'Home Fragrance', 'Luxury Gifting', 'Office', 'Summer', 'Wedding', 'Winter'];

        return view('site.collection', compact('products', 'categories', 'occasions'));
    }

    public function show($id)
    {
        $product = Product::with('reviews.user')->findOrFail($id);
        
        // Fetch related products (e.g., same category)
        $relatedProducts = Product::where('category', $product->category)
            ->where('id', '!=', $id)
            ->where('status', 'publish')
            ->take(4)
            ->get();
            
        // Fetch bestsellers for the bottom section
        $bestsellers = Product::where('status', 'publish')->orderByDesc('qty')->take(8)->get();

        return view('site.single', compact('product', 'relatedProducts', 'bestsellers'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        
        $products = Product::where('status', 'publish')
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->get();

        return view('site.search-results', compact('products', 'query'));
    }

    public function suggest(Request $request)
    {
        $query = trim($request->input('q', ''));
        if ($query === '') {
            return response()->json(['results' => []]);
        }
        
        $products = Product::where('status', 'publish')
            ->where(function($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%");
            })
            ->select(['id', 'name', 'price', 'image', 'category'])
            ->orderBy('name')
            ->limit(8)
            ->get();

        $results = $products->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->name,
                'price' => $p->price,
                'category' => $p->category,
                'image_url' => $p->image ? asset('storage/'.$p->image) : asset('assets/placeholder.jpg'),
            ];
        });

        return response()->json(['results' => $results]);
    }

    public function getByIds(Request $request)
    {
        $ids = $request->input('ids', []);
        
        if (empty($ids)) {
            return response()->json([]);
        }

        $products = Product::whereIn('id', $ids)
            ->where('status', 'publish')
            ->get();

        return response()->json($products);
    }
}
