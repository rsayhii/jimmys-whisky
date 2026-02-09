@extends('layouts.app')

@section('title', 'My Refill Requests')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">Refill Requests</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar -->
            @include('site.dashboard.sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 space-y-6">
                
                <div class="flex justify-between items-center mb-2">
                    <h1 class="text-2xl font-bold text-gray-900">Refill Requests</h1>
                    <a href="/user-new-refill-request" class="bg-black text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition flex items-center gap-2">
                        <i class="fas fa-plus"></i> New Request
                    </a>
                </div>

                <!-- Filters -->
                <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100 flex gap-4">
                    <select class="px-4 py-2 rounded-lg border border-gray-200 bg-white text-sm focus:outline-none focus:border-black">
                        <option>All Status</option>
                        <option>Pending</option>
                        <option>Approved</option>
                        <option>Shipped</option>
                        <option>Completed</option>
                    </select>
                    <select class="px-4 py-2 rounded-lg border border-gray-200 bg-white text-sm focus:outline-none focus:border-black">
                        <option>Last 30 Days</option>
                        <option>Last 3 Months</option>
                        <option>2023</option>
                    </select>
                </div>

                <!-- Requests List -->
                <div class="space-y-4">
                    @forelse($requests as $request)
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                        <div class="p-6 flex flex-col sm:flex-row gap-6">
                            <div class="w-20 h-20 bg-gray-100 rounded-lg flex-shrink-0 overflow-hidden">
                                @if($request->product->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $request->product->images->first()->image_path) }}" alt="{{ $request->product->name }}" class="w-full h-full object-cover">
                                @elseif($request->product->image)
                                    <img src="{{ asset('storage/' . $request->product->image) }}" alt="{{ $request->product->name }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://via.placeholder.com/300" alt="No Image" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h3 class="font-bold text-gray-900">{{ $request->product->name }}</h3>
                                        <p class="text-sm text-gray-500">Refill ID: #REF-{{ $request->id }}</p>
                                    </div>
                                    @php
                                        $statusClasses = [
                                            'pending' => 'bg-yellow-100 text-yellow-800',
                                            'approved' => 'bg-blue-100 text-blue-800',
                                            'pickup_scheduled' => 'bg-indigo-100 text-indigo-800',
                                            'picked_up' => 'bg-purple-100 text-purple-800',
                                            'processing' => 'bg-orange-100 text-orange-800',
                                            'out_for_delivery' => 'bg-teal-100 text-teal-800',
                                            'completed' => 'bg-green-100 text-green-700',
                                            'cancelled' => 'bg-red-100 text-red-700',
                                        ];
                                        $statusClass = $statusClasses[$request->status] ?? 'bg-gray-100 text-gray-600';
                                        
                                        $dotClasses = [
                                            'pending' => 'bg-yellow-500',
                                            'approved' => 'bg-blue-500',
                                            'pickup_scheduled' => 'bg-indigo-500',
                                            'picked_up' => 'bg-purple-500',
                                            'processing' => 'bg-orange-500',
                                            'out_for_delivery' => 'bg-teal-500',
                                            'completed' => 'bg-green-500',
                                            'cancelled' => 'bg-red-500',
                                        ];
                                        $dotClass = $dotClasses[$request->status] ?? 'bg-gray-400';
                                    @endphp
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium {{ $statusClass }}">
                                        <span class="w-1.5 h-1.5 rounded-full {{ $dotClass }}"></span>
                                        {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                                    </span>
                                </div>
                                <div class="flex flex-wrap gap-x-8 gap-y-2 text-sm text-gray-600 mb-4">
                                    <p><span class="text-gray-400">Date:</span> {{ $request->created_at->format('d M Y') }}</p>
                                    <p><span class="text-gray-400">Quantity:</span> {{ $request->size }}ml</p>
                                    <p><span class="text-gray-400">Pickup Date:</span> {{ $request->pickup_date->format('d M Y') }}</p>
                                </div>
                                <div class="flex gap-4">
                                    <a href="{{ route('user.refill-request.show', $request->id) }}" class="text-sm text-indigo-600 font-medium hover:text-indigo-800">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-10">
                        <p class="text-gray-500">No refill requests found.</p>
                        <a href="{{ route('user.refill-request.create') }}" class="text-indigo-600 font-medium hover:underline mt-2 inline-block">Create your first request</a>
                    </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-8">
                    <nav class="flex gap-2">
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>Previous</button>
                        <button class="px-4 py-2 bg-black text-white rounded-lg">1</button>
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50">2</button>
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50">Next</button>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
