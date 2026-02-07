<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Order;
use App\Models\OrderItem;

class ReviewController extends Controller
{
    public function store(Request $request, $productId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
            'order_id' => 'required|exists:orders,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($productId);
        $user = Auth::user();

        // 1. Verify the order belongs to the user
        $order = Order::where('id', $request->order_id)
            ->where('user_id', $user->id)
            ->first();

        if (!$order) {
            return back()->with('error', 'Invalid order.');
        }

        // 2. Verify the user actually purchased this product in this order
        $hasPurchased = OrderItem::where('order_id', $order->id)
            ->where('product_id', $productId)
            ->exists();

        if (!$hasPurchased) {
            return back()->with('error', 'You can only review products you have purchased in this order.');
        }

        // 3. Check if user already reviewed this product FOR THIS ORDER
        $existingReview = Review::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->where('order_id', $request->order_id)
            ->first();

        if ($existingReview) {
            return back()->with('error', 'You have already reviewed this product for this order.');
        }

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('reviews', 'public');
                $imagePaths[] = $path;
            }
        }

        Review::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'order_id' => $request->order_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'images' => !empty($imagePaths) ? $imagePaths : null,
            'is_approved' => true,
        ]);

        return back()->with('success', 'Thank you for your review!');
    }
}
