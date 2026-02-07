@extends('layouts.app')

@section('title', 'My Membership')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">My Membership</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar -->
            @include('site.dashboard.sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 space-y-8">
                
                <!-- Current Plan Card -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl shadow-lg p-8 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-10">
                        <i class="fas fa-crown text-9xl"></i>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <span class="bg-yellow-500 text-black text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Active</span>
                                <h2 class="text-3xl font-bold mt-3">Gold Membership</h2>
                                <p class="text-gray-400 mt-1">Member since Oct 2022</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-400 uppercase tracking-wide">Valid Until</p>
                                <p class="text-xl font-bold">24 Oct 2024</p>
                            </div>
                        </div>

                        <!-- Refill Slots Progress -->
                        <div class="bg-white/10 rounded-xl p-6 backdrop-blur-sm border border-white/10">
                            <div class="flex justify-between items-end mb-2">
                                <div>
                                    <p class="text-sm text-gray-300 mb-1">Refill Slots Remaining</p>
                                    <p class="text-2xl font-bold">7 <span class="text-lg text-gray-400 font-normal">/ 10</span></p>
                                </div>
                                <a href="/user-new-refill-request" class="bg-white text-black px-4 py-2 rounded-lg text-sm font-bold hover:bg-gray-100 transition">
                                    Request Refill
                                </a>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 30%"></div>
                            </div>
                            <p class="text-xs text-gray-400 mt-3">You have used 3 out of 10 refill slots this year.</p>
                        </div>
                    </div>
                </div>

                <!-- Benefits -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <div class="w-10 h-10 rounded-full bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Free Shipping</h3>
                        <p class="text-sm text-gray-500">On all orders over ₹999</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <div class="w-10 h-10 rounded-full bg-pink-50 text-pink-600 flex items-center justify-center mb-4">
                            <i class="fas fa-spray-can"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Priority Refills</h3>
                        <p class="text-sm text-gray-500">24-hour processing time</p>
                    </div>
                    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                        <div class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center mb-4">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <h3 class="font-bold text-gray-900 mb-1">Exclusive Discounts</h3>
                        <p class="text-sm text-gray-500">Early access to sales</p>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold text-gray-900">Recent Activity</h3>
                        <a href="/user-refill-requests" class="text-sm text-indigo-600 hover:underline">View All</a>
                    </div>
                    <div class="divide-y divide-gray-100">
                        <div class="p-6 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">Refill Request Completed</h4>
                                <p class="text-sm text-gray-500">Oud Wood Intense (50ml)</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900">-1 Slot</p>
                                <p class="text-xs text-gray-500">26 Oct 2023</p>
                            </div>
                        </div>
                        <div class="p-6 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-sync"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">Membership Renewed</h4>
                                <p class="text-sm text-gray-500">Gold Plan (Yearly)</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900">₹2,999</p>
                                <p class="text-xs text-gray-500">24 Oct 2023</p>
                            </div>
                        </div>
                        <div class="p-6 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">Refill Request Pending</h4>
                                <p class="text-sm text-gray-500">Rose Prick (30ml)</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm font-medium text-gray-900">Pending</p>
                                <p class="text-xs text-gray-500">20 Oct 2023</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
