<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Models\RefillRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Total Revenue (Completed orders)
        // Assuming 'delivered' or 'completed' is the status for recognized revenue, 
        // or just all non-cancelled orders if that's the business logic.
        // Let's assume 'delivered' or 'completed' for now, or just sum all for simplicity if status usage is loose.
        // Based on Order model, let's use all orders that are not 'cancelled'.
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total_amount');
        
        // Revenue change from last month
        $lastMonthRevenue = Order::where('status', '!=', 'cancelled')
            ->whereMonth('created_at', Carbon::now()->subMonth()->month)
            ->whereYear('created_at', Carbon::now()->subMonth()->year)
            ->sum('total_amount');
            
        $currentMonthRevenue = Order::where('status', '!=', 'cancelled')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total_amount');
            
        $revenueGrowth = 0;
        if ($lastMonthRevenue > 0) {
            $revenueGrowth = (($currentMonthRevenue - $lastMonthRevenue) / $lastMonthRevenue) * 100;
        } elseif ($currentMonthRevenue > 0) {
            $revenueGrowth = 100;
        }

        // 2. Total Orders
        $totalOrders = Order::count();
        $lastMonthOrders = Order::whereMonth('created_at', Carbon::now()->subMonth()->month)->count();
        $currentMonthOrders = Order::whereMonth('created_at', Carbon::now()->month)->count();
        
        $orderGrowth = 0;
        if ($lastMonthOrders > 0) {
            $orderGrowth = (($currentMonthOrders - $lastMonthOrders) / $lastMonthOrders) * 100;
        } elseif ($currentMonthOrders > 0) {
            $orderGrowth = 100;
        }

        // 3. Active Products
        $activeProducts = Product::where('status', 'publish')->count();
        $outOfStockProducts = Product::where('qty', '<=', 0)->count();

        // 4. Active Users
        $activeUsers = User::count(); // Assuming all users are active for now
        $newUsersThisWeek = User::where('created_at', '>=', Carbon::now()->startOfWeek())->count();
        $usersGrowth = 0; // Simple representation

        // 5. Recent Orders
        $recentOrders = Order::with('user')->latest()->take(5)->get();

        // 6. Top Selling Products
        // Group by product_id in order_items and sum quantity
        $topProducts = DB::table('order_items')
            ->select('product_id', DB::raw('SUM(quantity) as total_qty'), DB::raw('SUM(price * quantity) as total_revenue'))
            ->groupBy('product_id')
            ->orderByDesc('total_qty')
            ->limit(3)
            ->get();
            
        // Attach product details manually since we used DB query
        $topProductsData = [];
        foreach ($topProducts as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $topProductsData[] = [
                    'name' => $product->name,
                    'image' => $product->image, // Assuming image path is here
                    'sales' => $item->total_qty,
                    'revenue' => $item->total_revenue
                ];
            }
        }

        // 7. Pending Refill Requests
        $pendingRefillRequests = RefillRequest::where('status', 'pending')->count();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'revenueGrowth',
            'totalOrders',
            'orderGrowth',
            'activeProducts',
            'outOfStockProducts',
            'activeUsers',
            'newUsersThisWeek',
            'recentOrders',
            'topProductsData',
            'pendingRefillRequests'
        ));
    }
}
