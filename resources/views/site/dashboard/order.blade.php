@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">My Orders</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar -->
            @include('site.dashboard.sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 space-y-6">
                
                <!-- Header & Filters -->
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <h1 class="text-2xl font-bold text-gray-900">Order History</h1>
                    <div class="flex gap-2">
                        <select class="px-4 py-2 rounded-lg border border-gray-200 bg-white text-sm focus:outline-none focus:border-black">
                            <option>All Orders</option>
                            <option>Last 30 Days</option>
                            <option>2023</option>
                            <option>2022</option>
                        </select>
                        <select class="px-4 py-2 rounded-lg border border-gray-200 bg-white text-sm focus:outline-none focus:border-black">
                            <option>All Status</option>
                            <option>Delivered</option>
                            <option>Processing</option>
                            <option>Cancelled</option>
                        </select>
                    </div>
                </div>

                <!-- Orders List -->
                <div class="space-y-4">
                    
                    @forelse($orders as $order)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex flex-wrap gap-4 justify-between items-center text-sm">
                            <div class="flex gap-8">
                                <div>
                                    <p class="text-gray-500 mb-1">Order Placed</p>
                                    <p class="font-medium text-gray-900">{{ $order->created_at->format('d M Y') }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 mb-1">Total Amount</p>
                                    <p class="font-medium text-gray-900">₹{{ number_format($order->total_amount, 2) }}</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 mb-1">Order ID</p>
                                    <p class="font-medium text-gray-900">#{{ $order->order_number }}</p>
                                </div>
                            </div>
                            <a href="{{ route('site.dashboard.invoice', $order->id) }}" target="_blank" class="text-indigo-600 font-medium hover:underline">View Invoice</a>
                        </div>
                        
                        <div class="p-6">
                            @foreach($order->items as $item)
                            <div class="flex flex-col sm:flex-row gap-6 {{ !$loop->last ? 'mb-6 border-b border-gray-100 pb-6' : '' }}">
                                <div class="w-24 h-24 bg-gray-100 rounded-lg flex-shrink-0 overflow-hidden">
                                    @if($item->product && $item->product->image)
                                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                                    @else
                                        <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?q=80&w=300&auto=format&fit=crop" alt="{{ $item->product_name }}" class="w-full h-full object-cover">
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-bold text-gray-900 text-lg">{{ $item->product_name }}</h3>
                                            @if($item->product)
                                            <p class="text-gray-500 text-sm">{{ $item->product->concentration ?? '' }}</p>
                                            @endif
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-gray-900">₹{{ number_format($item->price, 2) }}</p>
                                            <p class="text-xs text-gray-400">Qty: {{ $item->quantity }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 flex flex-wrap items-center gap-4">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium 
                                            {{ $order->status == 'delivered' ? 'bg-green-100 text-green-700' : 
                                               ($order->status == 'cancelled' ? 'bg-red-100 text-red-700' : 'bg-yellow-100 text-yellow-800') }}">
                                            <span class="w-1.5 h-1.5 rounded-full 
                                                {{ $order->status == 'delivered' ? 'bg-green-500' : 
                                                   ($order->status == 'cancelled' ? 'bg-red-500' : 'bg-yellow-500 animate-pulse') }}"></span>
                                            {{ ucfirst($order->status) }}
                                        </span>
                                        @if($item->product)
                                            @php
                                                $hasReview = $order->reviews->where('product_id', $item->product->id)->first();
                                            @endphp
                                            
                                            @if($hasReview)
                                            <div class="flex text-[#c0863d] text-xs">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="{{ $i <= $hasReview->rating ? 'fas' : 'far' }} fa-star"></i>
                                                @endfor
                                                <span class="ml-2 text-gray-400">Reviewed</span>
                                            </div>
                                            @else
                                            <a href="{{ route('product.show', ['id' => $item->product->id, 'order_id' => $order->id]) }}#reviews" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Write a Review</a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @empty
                    <div class="bg-white rounded-xl shadow-sm p-8 text-center border border-gray-100">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shopping-bag text-gray-400 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">No orders yet</h3>
                        <p class="text-gray-500 mb-6">You haven't placed any orders yet. Start shopping to fill your collection.</p>
                        <a href="/" class="inline-block bg-[#c0863d] text-white px-6 py-2 rounded-lg font-medium hover:bg-[#a87533] transition">Start Shopping</a>
                    </div>
                    @endforelse

                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-8">
                    <nav class="flex gap-2">
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>Previous</button>
                        <button class="px-4 py-2 bg-black text-white rounded-lg">1</button>
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50">2</button>
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50">3</button>
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50">Next</button>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
