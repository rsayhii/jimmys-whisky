<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        $orders = Order::where('user_id', $user->id)
            ->with(['items.product', 'reviews'])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('site.dashboard.order', compact('orders'));
    }

    public function invoice($id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }
        
        $order = Order::where('user_id', $user->id)
            ->where('id', $id)
            ->with(['items.product'])
            ->firstOrFail();
            
        return view('site.dashboard.invoice', compact('order'));
    }
}
