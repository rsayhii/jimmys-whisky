<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        $discount = 0;
        $coupon = Session::get('coupon');
        
        if ($coupon) {
            // Re-validate min spend and existence
             $dbCoupon = Coupon::where('code', $coupon['code'])->where('status', 'active')->first();
             
             if(!$dbCoupon || ($dbCoupon->expiry_date < now())) {
                 Session::forget('coupon');
                 $coupon = null;
                 session()->flash('error', 'Coupon removed: Expired or invalid.');
             } elseif ($dbCoupon->min_spend > 0 && $subtotal < $dbCoupon->min_spend) {
                 Session::forget('coupon');
                 $coupon = null;
                 session()->flash('error', 'Coupon removed: Minimum spend requirement not met.');
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

        return view('site.cart', compact('cart', 'subtotal', 'discount', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->qty <= 0) {
            return redirect()->back()->with('error', 'This product is out of stock.');
        }

        $cart = Session::get('cart', []);
        $quantity = $request->input('quantity', 1);
        
        // Determine cart item key
        $cartKey = $id;

        $currentCartQuantity = isset($cart[$cartKey]) ? $cart[$cartKey]['quantity'] : 0;

        if (($currentCartQuantity + $quantity) > $product->qty) {
             return redirect()->back()->with('error', 'Sorry, we do not have enough stock for this item.');
        }

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity'] += $quantity;
        } else {
            // Determine price
            $finalPrice = $product->discount_price ?: $product->price;

            $cart[$cartKey] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $finalPrice,
                "image" => $product->image,
                "concentration" => $product->concentration,
            ];
        }

        Session::put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = Session::get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            Session::put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
        return redirect()->back();
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = Session::get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                Session::put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
        return redirect()->back();
    }
    
    public function clear()
    {
        Session::forget('cart');
        Session::forget('coupon');
        return redirect()->route('cart.index')->with('success', 'Cart cleared successfully');
    }

    public function applyCoupon(Request $request)
    {
        $request->validate([
            'code' => 'required|string'
        ]);

        $code = $request->input('code');
        $coupon = Coupon::where('code', $code)->where('status', 'active')->first();

        if (!$coupon) {
            return redirect()->back()->with('error', 'Invalid coupon code.');
        }

        if ($coupon->expiry_date < now()) {
            return redirect()->back()->with('error', 'Coupon has expired.');
        }

        if ($coupon->usage_limit > 0 && $coupon->used_count >= $coupon->usage_limit) {
            return redirect()->back()->with('error', 'Coupon usage limit reached.');
        }

        $cart = Session::get('cart', []);
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        if ($subtotal == 0) {
             return redirect()->back()->with('error', 'Cart is empty.');
        }

        if ($coupon->min_spend > 0 && $subtotal < $coupon->min_spend) {
            return redirect()->back()->with('error', 'Minimum spend of ₹' . number_format($coupon->min_spend, 2) . ' required.');
        }

        Session::put('coupon', [
            'code' => $coupon->code,
            'discount_type' => $coupon->discount_type,
            'value' => $coupon->value,
            'max_discount_amount' => $coupon->max_discount_amount
        ]);

        return redirect()->back()->with('success', 'Coupon applied successfully!');
    }

    public function removeCoupon()
    {
        Session::forget('coupon');
        return redirect()->back()->with('success', 'Coupon removed successfully.');
    }
}
