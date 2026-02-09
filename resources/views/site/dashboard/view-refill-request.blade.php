@extends('layouts.app')

@section('title', 'Refill Request Details')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('user.refill-requests') }}" class="hover:text-black transition">Refill Requests</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">#REF-{{ $request->id }}</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar -->
            @include('site.dashboard.sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 space-y-6">
                
                <div class="flex justify-between items-center mb-2">
                    <h1 class="text-2xl font-bold text-gray-900">Request Details</h1>
                </div>

                @php
                    $statusConfig = [
                        'pending' => [
                            'icon' => 'fas fa-clock',
                            'bg_color' => 'bg-yellow-100',
                            'text_color' => 'text-yellow-600',
                            'label_bg' => 'bg-yellow-100',
                            'label_text' => 'text-yellow-800',
                            'title' => 'Request Pending',
                        ],
                        'approved' => [
                            'icon' => 'fas fa-check',
                            'bg_color' => 'bg-green-100',
                            'text_color' => 'text-green-600',
                            'label_bg' => 'bg-green-100',
                            'label_text' => 'text-green-700',
                            'title' => 'Request Approved',
                        ],
                        'pickup_scheduled' => [
                            'icon' => 'fas fa-calendar-check',
                            'bg_color' => 'bg-indigo-100',
                            'text_color' => 'text-indigo-600',
                            'label_bg' => 'bg-indigo-100',
                            'label_text' => 'text-indigo-800',
                            'title' => 'Pickup Scheduled',
                        ],
                        'picked_up' => [
                            'icon' => 'fas fa-truck-loading',
                            'bg_color' => 'bg-purple-100',
                            'text_color' => 'text-purple-600',
                            'label_bg' => 'bg-purple-100',
                            'label_text' => 'text-purple-800',
                            'title' => 'Picked Up',
                        ],
                        'processing' => [
                            'icon' => 'fas fa-flask',
                            'bg_color' => 'bg-orange-100',
                            'text_color' => 'text-orange-600',
                            'label_bg' => 'bg-orange-100',
                            'label_text' => 'text-orange-800',
                            'title' => 'Processing',
                        ],
                        'out_for_delivery' => [
                            'icon' => 'fas fa-shipping-fast',
                            'bg_color' => 'bg-teal-100',
                            'text_color' => 'text-teal-600',
                            'label_bg' => 'bg-teal-100',
                            'label_text' => 'text-teal-800',
                            'title' => 'Out for Delivery',
                        ],
                        'completed' => [
                            'icon' => 'fas fa-check-circle',
                            'bg_color' => 'bg-green-100',
                            'text_color' => 'text-green-600',
                            'label_bg' => 'bg-green-100',
                            'label_text' => 'text-green-700',
                            'title' => 'Completed',
                        ],
                        'cancelled' => [
                            'icon' => 'fas fa-times',
                            'bg_color' => 'bg-red-100',
                            'text_color' => 'text-red-600',
                            'label_bg' => 'bg-red-100',
                            'label_text' => 'text-red-700',
                            'title' => 'Cancelled',
                        ],
                    ];

                    $currentStatus = $statusConfig[$request->status] ?? $statusConfig['pending'];
                @endphp

                <!-- Request Status Card -->
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-start gap-4">
                            <!-- Status Icon -->
                            <div class="w-12 h-12 rounded-full {{ $currentStatus['bg_color'] }} flex items-center justify-center flex-shrink-0">
                                <i class="{{ $currentStatus['icon'] }} {{ $currentStatus['text_color'] }} text-xl"></i>
                            </div>
                            
                            <div class="flex-1">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <h3 class="text-lg font-bold text-gray-900">{{ $currentStatus['title'] }}</h3>
                                        <p class="text-sm text-gray-500 mt-1">Updated on {{ $request->updated_at->format('d M Y, h:i A') }}</p>
                                    </div>
                                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ $currentStatus['label_bg'] }} {{ $currentStatus['label_text'] }}">
                                        {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                                    </span>
                                </div>
                                
                                @if($request->user_notes)
                                <!-- User Note Section -->
                                <div class="mt-4 bg-gray-50 rounded-lg p-4 border border-gray-200">
                                    <h4 class="text-sm font-bold text-gray-900 mb-2 flex items-center gap-2">
                                        <i class="fas fa-comment text-gray-400"></i> Your Notes
                                    </h4>
                                    <div class="text-sm text-gray-700 whitespace-pre-line">{{ $request->user_notes }}</div>
                                </div>
                                @endif

                                @if($request->admin_notes)
                                <!-- Admin Note Section -->
                                <div class="mt-4 bg-gray-50 rounded-lg p-4 border border-gray-200">
                                    <h4 class="text-sm font-bold text-gray-900 mb-2 flex items-center gap-2">
                                        <i class="fas fa-sticky-note text-gray-400"></i> Admin Note
                                    </h4>
                                    <div class="text-sm text-gray-700 whitespace-pre-line">{{ $request->admin_notes }}</div>
                                </div>
                                @endif
                                
                                @if(!in_array($request->status, ['completed', 'cancelled']))
                                <!-- Add New User Note -->
                                <div class="mt-4">
                                    <form action="{{ route('user.refill-request.update-note', $request->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label for="user_notes" class="block text-sm font-medium text-gray-700 mb-2">Add a Note</label>
                                        <div class="relative">
                                            <textarea name="user_notes" id="user_notes" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-black focus:ring-1 focus:ring-black transition" placeholder="Add a new note for the admin..."></textarea>
                                            <button type="submit" class="absolute bottom-3 right-3 px-4 py-1.5 bg-black text-white text-xs font-medium rounded-md hover:bg-gray-800 transition">
                                                Add Note
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Perfume Details -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Perfume Details</h3>
                        <div class="flex gap-4">
                            <div class="w-20 h-24 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                @if($request->product->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $request->product->images->first()->image_path) }}" alt="{{ $request->product->name }}" class="w-full h-full object-cover">
                                @elseif($request->product->image)
                                    <img src="{{ asset('storage/' . $request->product->image) }}" alt="{{ $request->product->name }}" class="w-full h-full object-cover">
                                @else
                                    <img src="https://via.placeholder.com/300" alt="No Image" class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900">{{ $request->product->name }}</h4>
                                <p class="text-sm text-gray-600">{{ $request->product->brand }}</p>
                                <div class="mt-2 text-sm text-gray-500 space-y-1">
                                    <p>Bottle Size: <span class="font-medium text-gray-900">{{ $request->size }}ml</span></p>
                                    <p>Service: <span class="font-medium text-gray-900">Refill Service</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pickup Address -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Pickup & Delivery Address</h3>
                        <div class="flex gap-3">
                            <div class="mt-1 text-gray-400">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">{{ $request->address->type ?? 'Home' }}</p>
                                <p class="text-sm text-gray-600 mt-1">
                                    {{ $request->address->address_line1 }}, {{ $request->address->city }}, {{ $request->address->state }} - {{ $request->address->pincode }}
                                </p>
                                <p class="text-sm text-gray-600 mt-1">{{ $request->address->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Summary -->
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h3 class="font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">Payment Summary</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Refill Cost</span>
                            <span class="font-medium text-green-600">FREE (Membership Benefit) <span class="line-through text-gray-400 text-xs ml-1">₹1699</span></span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Pickup & Delivery Charges</span>
                            <span class="font-medium text-gray-900">₹150</span>
                        </div>
                        <div class="border-t border-gray-100 pt-3 flex justify-between font-bold text-base">
                            <span>Total Amount</span>
                            <span>₹150</span>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 mt-4 text-xs text-gray-500">
                            <i class="fas fa-info-circle mr-1"></i> Payment to be collected at the time of delivery.
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex gap-4">
                    <a href="{{ route('user.refill-requests') }}" class="px-6 py-3 rounded-lg border border-gray-300 text-gray-700 font-medium hover:bg-gray-50 transition">
                        Back to Requests
                    </a>
                    @if($request->status == 'pending')
                    <button class="px-6 py-3 rounded-lg bg-red-50 text-red-600 font-medium hover:bg-red-100 transition ml-auto">
                        Cancel Request
                    </button>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection