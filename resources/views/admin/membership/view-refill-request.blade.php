@extends('admin.layout')

@section('title', 'View Refill Request')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header with Back Button -->
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.membership.refill-requests') }}" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white shadow-sm hover:bg-gray-50 text-gray-600 transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Request Details</h2>
            <p class="text-gray-500 text-sm">Request ID: #REF-{{ $request->id }}</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Request Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Perfume Details Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">Perfume Information</h3>
                    @php
                        $statusColors = [
                            'pending' => 'bg-yellow-100 text-yellow-800',
                            'approved' => 'bg-green-100 text-green-800',
                            'pickup_scheduled' => 'bg-indigo-100 text-indigo-800',
                            'picked_up' => 'bg-purple-100 text-purple-800',
                            'processing' => 'bg-orange-100 text-orange-800',
                            'out_for_delivery' => 'bg-teal-100 text-teal-800',
                            'completed' => 'bg-green-100 text-green-700',
                            'cancelled' => 'bg-red-100 text-red-700',
                        ];
                        $statusColor = $statusColors[$request->status] ?? 'bg-gray-100 text-gray-800';
                    @endphp
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColor }}">
                        {{ ucfirst(str_replace('_', ' ', $request->status)) }}
                    </span>
                </div>
                <div class="p-6">
                    <div class="flex gap-6">
                        <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 overflow-hidden">
                            @if($request->product->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $request->product->images->first()->image_path) }}" alt="{{ $request->product->name }}" class="w-full h-full object-cover">
                            @elseif($request->product->image)
                                <img src="{{ asset('storage/' . $request->product->image) }}" alt="{{ $request->product->name }}" class="w-full h-full object-cover">
                            @else
                                <i class="fas fa-wine-bottle text-4xl"></i>
                            @endif
                        </div>
                        <div class="space-y-4 flex-1">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Perfume Name</label>
                                <p class="text-lg font-medium text-gray-900">{{ $request->product->name }}</p>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Brand</label>
                                    <p class="text-gray-900">{{ $request->product->brand }}</p>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Bottle Size</label>
                                    <p class="text-gray-900">{{ $request->size }}ml</p>
                                </div>
                            </div>
                            @if($request->user_notes)
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shipping Information -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Shipping Details</h3>
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Shipping Address</label>
                        <p class="text-gray-900">
                            {{ $request->address->address_line1 }}<br>
                            {{ $request->address->city }}, {{ $request->address->state }} {{ $request->address->pincode }}
                        </p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Contact</label>
                        <p class="text-gray-900">{{ $request->address->phone }}</p>
                        <p class="text-gray-900">{{ $request->user->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Service & Charges -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Service & Payment Details</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-2">Service Type</label>
                        <div class="flex items-center gap-3 p-3 bg-blue-50 rounded-lg border border-blue-100">
                            <i class="fas fa-box-open text-blue-600"></i>
                            <div>
                                <p class="text-sm font-medium text-blue-900">Refill Service</p>
                                <p class="text-xs text-blue-700">Pickup Date: {{ $request->pickup_date->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-2">Payment Summary</label>
                        <div class="space-y-2 text-sm">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Refill Cost</span>
                                <span class="font-medium text-green-600">FREE</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Pickup & Delivery</span>
                                <span class="font-medium">₹150</span>
                            </div>
                            <div class="border-t border-gray-100 pt-2 mt-1 flex justify-between font-bold text-gray-900">
                                <span>Total to Collect</span>
                                <span>₹150</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Update Status & Admin Notes -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Update Request</h3>
                <form action="{{ route('admin.membership.update-refill-request', $request->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select id="status" name="status" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm p-2 border">
                            <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="approved" {{ $request->status == 'approved' ? 'selected' : '' }}>Approved</option>
                            <option value="pickup_scheduled" {{ $request->status == 'pickup_scheduled' ? 'selected' : '' }}>Pickup Scheduled</option>
                            <option value="picked_up" {{ $request->status == 'picked_up' ? 'selected' : '' }}>Picked Up</option>
                            <option value="processing" {{ $request->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="out_for_delivery" {{ $request->status == 'out_for_delivery' ? 'selected' : '' }}>Out for Delivery</option>
                            <option value="completed" {{ $request->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $request->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>

                    @if($request->admin_notes)
                    <div class="mb-4 bg-gray-50 rounded-lg p-4 border border-gray-200">
                        <h4 class="text-sm font-bold text-gray-900 mb-2 flex items-center gap-2">
                            <i class="fas fa-history text-gray-400"></i> Admin Note History
                        </h4>
                        <div class="text-sm text-gray-700 whitespace-pre-line">{{ $request->admin_notes }}</div>
                    </div>
                    @endif

                    @if($request->user_notes)
                    <div class="mb-4 bg-blue-50 rounded-lg p-4 border border-blue-200">
                        <h4 class="text-sm font-bold text-blue-900 mb-2 flex items-center gap-2">
                            <i class="fas fa-comment text-blue-400"></i> Customer Notes
                        </h4>
                        <div class="text-sm text-blue-800 whitespace-pre-line">{{ $request->user_notes }}</div>
                    </div>
                    @endif

                    <div class="mb-4">
                        <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-1">Add Note / Instructions for User</label>
                        <textarea id="admin_notes" name="admin_notes" rows="3" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm p-3 border" placeholder="Add a new note..."></textarea>
                        <p class="mt-1 text-xs text-gray-500">This note will be visible to the user in their request details.</p>
                    </div>

                    <div class="flex justify-end pt-2 border-t border-gray-100">
                        <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition shadow-sm">
                            Update Request
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar Member Info -->
        <div class="space-y-6">
            <!-- Member Profile -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xl">
                        {{ substr($request->user->name, 0, 2) }}
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">{{ $request->user->name }}</h3>
                        <p class="text-sm text-gray-500">Member since {{ $request->user->created_at->format('Y') }}</p>
                    </div>
                </div>
                
                <div class="space-y-4 pt-4 border-t border-gray-100">
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-sm text-gray-600">Membership Tier</span>
                            <span class="text-xs font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full">{{ $request->user->membership_type ?? 'N/A' }}</span>
                        </div>
                        @if($request->user->membership_end_date)
                        <p class="text-xs text-gray-500 mt-1">Expires on {{ \Carbon\Carbon::parse($request->user->membership_end_date)->format('d M Y') }}</p>
                        @endif
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <span class="block text-lg font-bold text-gray-900">{{ $request->user->refill_requests_balance }}</span>
                            <span class="text-xs text-gray-500">Remaining</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection