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
            <p class="text-gray-500 text-sm">Request ID: #REF-042</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Request Info -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Perfume Details Card -->
            <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-gray-800">Perfume Information</h3>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                        Pending Verification
                    </span>
                </div>
                <div class="p-6">
                    <div class="flex gap-6">
                        <div class="w-32 h-32 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                            <i class="fas fa-wine-bottle text-4xl"></i>
                        </div>
                        <div class="space-y-4 flex-1">
                            <div>
                                <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Perfume Name</label>
                                <p class="text-lg font-medium text-gray-900">Oud Wood Intense</p>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Brand</label>
                                    <p class="text-gray-900">Tom Ford</p>
                                </div>
                                <div>
                                    <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Bottle Size</label>
                                    <p class="text-gray-900">50ml</p>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide">Customer Notes</label>
                                <p class="text-gray-700 text-sm mt-1">"Please ensure the bottle is sealed properly. I had a leak last time."</p>
                            </div>
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
                            1204, Palm Heights,<br>
                            Linking Road, Bandra West,<br>
                            Mumbai, Maharashtra 400050
                        </p>
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Contact</label>
                        <p class="text-gray-900">+91 98765 43210</p>
                        <p class="text-gray-900">rahul.jain@example.com</p>
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
                                <p class="text-sm font-medium text-blue-900">Bottle Pickup Required</p>
                                <p class="text-xs text-blue-700">Customer will provide empty bottle/box</p>
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

            <!-- Admin Note Section -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Add Admin Note</h3>
                <div class="space-y-4">
                    <div>
                        <label for="admin_note" class="block text-sm font-medium text-gray-700 mb-1">Note / Instructions for User</label>
                        <textarea id="admin_note" rows="3" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-black focus:ring-black sm:text-sm p-3 border" placeholder="Enter notes about approval, rejection reason, or pickup instructions..."></textarea>
                        <p class="mt-1 text-xs text-gray-500">This note will be visible to the user in their request details.</p>
                    </div>
                    <div class="flex justify-end gap-3 pt-2 border-t border-gray-100">
                        <button class="px-4 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition">
                            <i class="fas fa-times mr-2"></i> Reject
                        </button>
                        <button type="button" class="px-4 py-2 bg-gray-100 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-200 transition">
                            Save Note Only
                        </button>
                        <button class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition shadow-sm">
                            <i class="fas fa-check mr-2"></i> Approve Request
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Member Info -->
        <div class="space-y-6">
            <!-- Member Profile -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xl">
                        RJ
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900">Rahul Jain</h3>
                        <p class="text-sm text-gray-500">Member since 2022</p>
                    </div>
                </div>
                
                <div class="space-y-4 pt-4 border-t border-gray-100">
                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-sm text-gray-600">Membership Tier</span>
                            <span class="text-xs font-bold text-amber-600 bg-amber-50 px-2 py-0.5 rounded-full">GOLD</span>
                        </div>
                        <div class="w-full bg-gray-100 rounded-full h-2 mt-2">
                            <div class="bg-amber-500 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Renews in 45 days</p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <span class="block text-lg font-bold text-gray-900">12</span>
                            <span class="text-xs text-gray-500">Total Refills</span>
                        </div>
                        <div class="text-center p-3 bg-gray-50 rounded-lg">
                            <span class="block text-lg font-bold text-gray-900">3</span>
                            <span class="text-xs text-gray-500">Remaining</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent History -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4">Request History</h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-green-500"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Sauvage Elixir</p>
                            <p class="text-xs text-gray-500">Approved • Oct 12, 2023</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-green-500"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Bleu de Chanel</p>
                            <p class="text-xs text-gray-500">Approved • Sep 05, 2023</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-2 h-2 rounded-full bg-red-500"></div>
                        <div class="flex-1">
                            <p class="text-sm font-medium text-gray-900">Custom Blend</p>
                            <p class="text-xs text-gray-500">Rejected • Aug 20, 2023</p>
                        </div>
                    </div>
                </div>
                <button class="w-full mt-4 text-center text-sm text-indigo-600 font-medium hover:text-indigo-700">View All History</button>
            </div>
        </div>
    </div>
</div>
@endsection
