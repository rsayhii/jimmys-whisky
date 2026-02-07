<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.orders.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('items.product', 'user')->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,processing,shipped,out_for_delivery,delivered,cancelled',
        ]);

        $order->status = $request->status;
        
        if ($request->status == 'delivered') {
            $order->payment_status = 'paid';
        }

        $order->save();

        return back()->with('success', 'Order status updated successfully.');
    }

    public function bulkUpdate(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:orders,id',
            'status' => 'required|in:pending,processing,shipped,out_for_delivery,delivered,cancelled',
        ]);

        Order::whereIn('id', $request->ids)->update(['status' => $request->status]);

        return back()->with('success', 'Selected orders updated successfully.');
    }

    public function export()
    {
        $orders = Order::with(['user', 'items.product'])->orderBy('created_at', 'desc')->get();

        $filename = "orders_" . date('Y-m-d_H-i-s') . ".csv";
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=\"$filename\"",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        ];

        $columns = ['Order ID', 'Customer Name', 'Email', 'Total Amount', 'Status', 'Payment Method', 'Payment Status', 'Date', 'Items'];

        $callback = function() use ($orders, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($orders as $order) {
                $items = $order->items->map(function($item) {
                    return $item->product->name . ' (x' . $item->quantity . ')';
                })->implode(', ');

                $row = [
                    $order->id,
                    $order->user ? $order->user->name : 'Guest',
                    $order->user ? $order->user->email : $order->email, // Fallback if guest checkout stores email on order
                    $order->total_amount,
                    ucfirst($order->status),
                    ucfirst($order->payment_method),
                    ucfirst($order->payment_status),
                    $order->created_at->format('Y-m-d H:i:s'),
                    $items
                ];

                fputcsv($file, $row);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
