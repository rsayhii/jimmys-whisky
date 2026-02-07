<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        $discount = 0;
        $coupon = Session::get('coupon');
        if ($coupon) {
             $dbCoupon = Coupon::where('code', $coupon['code'])->where('status', 'active')->first();
             if(!$dbCoupon || ($dbCoupon->expiry_date < now())) {
                 Session::forget('coupon');
                 $coupon = null;
             } elseif ($dbCoupon->min_spend > 0 && $subtotal < $dbCoupon->min_spend) {
                 Session::forget('coupon');
                 $coupon = null;
             } else {
                if ($coupon['discount_type'] == 'fixed') {
                    $discount = $coupon['value'];
                } else {
                    $discount = ($subtotal * $coupon['value']) / 100;
                    if(isset($coupon['max_discount_amount']) && $coupon['max_discount_amount'] > 0){
                        $discount = min($discount, $coupon['max_discount_amount']);
                    }
                }
             }
        }
        $discount = min($discount, $subtotal);
        $total = $subtotal - $discount;

        $user = Auth::user();
        $defaultAddress = null;

        if ($user) {
            $defaultAddress = Address::where('user_id', $user->id)->where('is_default', true)->first();
            if (!$defaultAddress) {
                $defaultAddress = Address::where('user_id', $user->id)->first();
            }
        }

        // Get product stock status for cart items
        $cartItemsStock = [];
        $hasOutOfStock = false;
        foreach ($cart as $id => $item) {
             $product = Product::find($id);
             if ($product) {
                 $cartItemsStock[$id] = $product->qty;
                 if ($product->qty < $item['quantity']) {
                     $hasOutOfStock = true;
                 }
             } else {
                 $cartItemsStock[$id] = 0; // Product deleted or not found
                 $hasOutOfStock = true;
             }
        }

        return view('site.checkout', compact('cart', 'subtotal', 'discount', 'total', 'user', 'defaultAddress', 'cartItemsStock', 'hasOutOfStock'));
    }

    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'pincode' => 'required',
            'phone' => 'required',
            'payment' => 'required',
        ]);

        $cart = Session::get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }

        // Validate Stock
        foreach ($cart as $id => $item) {
             $product = Product::find($id);
             if (!$product) {
                 return redirect()->route('cart.index')->with('error', 'Product ' . $item['name'] . ' is no longer available.');
             }
             if ($product->qty < $item['quantity']) {
                 return redirect()->route('cart.index')->with('error', 'Insufficient stock for ' . $item['name'] . '. Available: ' . $product->qty);
             }
        }

        // Calculate Discount
        $discount = 0;
        $coupon = Session::get('coupon');
        $couponCode = null;
        
        if ($coupon) {
             $dbCoupon = Coupon::where('code', $coupon['code'])->where('status', 'active')->first();
             // Validate one last time
             if($dbCoupon && $dbCoupon->expiry_date >= now() && ($dbCoupon->usage_limit == 0 || $dbCoupon->used_count < $dbCoupon->usage_limit) && ($dbCoupon->min_spend == 0 || $subtotal >= $dbCoupon->min_spend)) {
                 $couponCode = $dbCoupon->code;
                 if ($dbCoupon->discount_type == 'fixed') {
                    $discount = $dbCoupon->value;
                } else {
                    $discount = ($subtotal * $dbCoupon->value) / 100;
                    if($dbCoupon->max_discount_amount > 0){
                        $discount = min($discount, $dbCoupon->max_discount_amount);
                    }
                }
                $dbCoupon->increment('used_count');
             }
        }
        
        $discount = min($discount, $subtotal);
        $total = $subtotal - $discount;

        // Create Order
        $order = Order::create([
            'user_id' => Auth::id() ?? 1, // Fallback to user 1 if guest
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'status' => 'pending',
            'total_amount' => $total,
            'payment_method' => $request->payment,
            'payment_status' => 'pending',
            'shipping_first_name' => $request->first_name,
            'shipping_last_name' => $request->last_name,
            'shipping_email' => $request->email,
            'shipping_phone' => $request->phone,
            'shipping_address_line1' => $request->address,
            'shipping_address_line2' => $request->apartment ?? null,
            'shipping_city' => $request->city,
            'shipping_state' => $request->state,
            'shipping_postal_code' => $request->pincode,
            'coupon_code' => $couponCode,
            'discount_amount' => $discount,
        ]);

        // Create Order Items and Update Stock
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);

            // Decrement Stock
            $product = Product::find($id);
            if ($product) {
                $product->decrement('qty', $item['quantity']);
                
                if ($product->qty <= 0) {
                    $product->update(['stock_status' => 'out-stock']);
                }
            }
        }
        
        Session::forget('cart');
        Session::forget('coupon');
        
        return redirect()->route('site.dashboard.orders')->with('success', 'Order placed successfully!');
    }
}
