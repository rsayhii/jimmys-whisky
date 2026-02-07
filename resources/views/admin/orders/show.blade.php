@extends('admin.layout')

@section('content')
<div class="p-6 bg-[#F8F7FA] min-h-screen">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-semibold text-[#5D596C]">Order #{{ $order->order_number }}</h2>
            <p class="text-sm text-gray-400">{{ $order->created_at->format('M d, Y, h:i A') }}</p>
        </div>
        <div class="flex gap-3">
             <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="inline-block">
                @csrf
                @method('PATCH')
                <select name="status" onchange="this.form.submit()" class="bg-white border border-gray-200 text-[#5D596C] px-4 py-2 rounded text-sm font-medium focus:outline-none focus:border-indigo-500 cursor-pointer">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                    <option value="out_for_delivery" {{ $order->status == 'out_for_delivery' ? 'selected' : '' }}>Out for Delivery</option>
                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
             </form>
            <button class="bg-red-50 text-red-500 px-4 py-2 rounded text-sm font-medium border border-red-100 hover:bg-red-100">Delete Order</button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100">
                <div class="p-4 border-b border-gray-50 flex justify-between items-center">
                    <h5 class="font-medium text-[#5D596C]">Order Details</h5>
                </div>
                <table class="w-full text-left text-sm text-[#5D596C]">
                    <thead class="bg-[#F8F7FA] text-[11px] uppercase text-[#A5A3AE]">
                        <tr><th class="px-4 py-3">Product</th><th class="px-4 py-3 text-center">Price</th><th class="px-4 py-3 text-center">Qty</th><th class="px-4 py-3 text-right">Total</th></tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach($order->items as $item)
                        <tr>
                            <td class="px-4 py-4 flex items-center gap-3">
                                @if($item->product && $item->product->image)
                                    <img src="{{ asset('storage/' . $item->product->image) }}" class="rounded w-16 h-16 object-cover">
                                @else
                                    <div class="w-16 h-16 bg-gray-100 rounded flex items-center justify-center text-xs text-gray-400">No Img</div>
                                @endif
                                <div>
                                    <p class="font-medium">{{ $item->product_name }}</p>
                                    @if($item->product)
                                        <p class="text-[11px] text-gray-400">{{ $item->product->category->name ?? '' }}</p>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-4 text-center">₹{{ number_format($item->price, 2) }}</td>
                            <td class="px-4 py-4 text-center">{{ $item->quantity }}</td>
                            <td class="px-4 py-4 text-right">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-6 bg-white border-t border-gray-50 text-right">
                    <div class="space-y-2 text-sm text-gray-500">
                        <p>Subtotal: <span class="text-[#5D596C] font-semibold">₹{{ number_format($order->total_amount, 2) }}</span></p>
                        <p>Shipping: <span class="text-[#5D596C] font-semibold">Free</span></p>
                        <p class="text-lg">Total: <span class="text-[#7367F0] font-bold text-xl">₹{{ number_format($order->total_amount, 2) }}</span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h5 class="font-medium text-[#5D596C] mb-4">Customer Details</h5>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-[#EAE8FD] text-[#7367F0] flex items-center justify-center font-bold">
                        {{ substr($order->shipping_first_name, 0, 1) }}{{ substr($order->shipping_last_name, 0, 1) }}
                    </div>
                    <div>
                        <p class="font-medium text-[#5D596C]">{{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</p>
                        <p class="text-xs text-gray-400">User ID: #{{ $order->user_id }}</p>
                    </div>
                </div>
                <div class="text-sm border-t border-gray-50 pt-4">
                    <p class="text-gray-400">Email: {{ $order->shipping_email }}</p>
                    <p class="text-gray-400">Phone: {{ $order->shipping_phone }}</p>
                </div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h5 class="font-medium text-[#5D596C] mb-4 flex justify-between">Shipping Address</h5>
                <p class="text-sm text-gray-500 leading-relaxed">
                    {{ $order->shipping_address_line1 }}<br>
                    @if($order->shipping_address_line2) {{ $order->shipping_address_line2 }}<br> @endif
                    {{ $order->shipping_city }}, {{ $order->shipping_state }}<br>
                    {{ $order->shipping_postal_code }}
                </p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h5 class="font-medium text-[#5D596C] mb-4 flex justify-between">Payment Info</h5>
                <p class="text-sm text-gray-500 leading-relaxed">
                    Method: {{ ucfirst($order->payment_method) }}<br>
                    Status: <span class="font-semibold {{ $order->payment_status == 'paid' ? 'text-green-600' : 'text-orange-600' }}">{{ ucfirst($order->payment_status) }}</span>
                </p>
            </div>
        </div>
    </div>
</div>
<script>lucide.createIcons();</script>
@endsection
