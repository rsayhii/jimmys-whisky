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
            <aside class="w-full lg:w-1/4">
                <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xl font-bold text-gray-600">
                            RJ
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Rahul Jain</h3>
                            <p class="text-sm text-gray-500">rahul.jain@example.com</p>
                        </div>
                    </div>

                    <nav class="space-y-1">
                        <a href="/user-account" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
                            <i class="fas fa-user w-5"></i>
                            My Account
                        </a>
                        <a href="/user-order" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-black text-white font-medium transition">
                            <i class="fas fa-box w-5"></i>
                            My Orders
                        </a>
                        <a href="/user-membership" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
                            <i class="fas fa-crown w-5"></i>
                            My Membership
                        </a>
                        <a href="/user-refill-requests" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
                            <i class="fas fa-sync w-5"></i>
                            Refill Requests
                        </a>
                        <a href="/wishlist" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
                            <i class="fas fa-heart w-5"></i>
                            Wishlist
                        </a>
                        <a href="/user-address" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
                            <i class="fas fa-map-marker-alt w-5"></i>
                            Addresses
                        </a>
                         <form method="POST" action="#" class="mt-4 pt-4 border-t border-gray-100">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 transition">
                                <i class="fas fa-sign-out-alt w-5"></i>
                                Log Out
                            </button>
                        </form>
                    </nav>
                </div>
            </aside>

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
                    
                    <!-- Order Item 1 -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex flex-wrap gap-4 justify-between items-center text-sm">
                            <div class="flex gap-8">
                                <div>
                                    <p class="text-gray-500 mb-1">Order Placed</p>
                                    <p class="font-medium text-gray-900">24 Oct 2023</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 mb-1">Total Amount</p>
                                    <p class="font-medium text-gray-900">₹4,999</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 mb-1">Order ID</p>
                                    <p class="font-medium text-gray-900">#ORD-29384</p>
                                </div>
                            </div>
                            <button class="text-indigo-600 font-medium hover:underline">View Invoice</button>
                        </div>
                        
                        <div class="p-6">
                            <div class="flex flex-col sm:flex-row gap-6">
                                <div class="w-24 h-24 bg-gray-100 rounded-lg flex-shrink-0 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?q=80&w=300&auto=format&fit=crop" alt="Perfume" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-bold text-gray-900 text-lg">Oud Wood Intense</h3>
                                            <p class="text-gray-500 text-sm">50ml • Eau de Parfum</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-gray-900">₹4,999</p>
                                            <p class="text-xs text-gray-400">Qty: 1</p>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 flex flex-wrap items-center gap-4">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                            Delivered on 26 Oct
                                        </span>
                                        <a href="/single" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Write a Review</a>
                                        <button class="text-sm text-gray-600 hover:text-black font-medium border-l border-gray-200 pl-4">Buy Again</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Order Item 2 -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex flex-wrap gap-4 justify-between items-center text-sm">
                            <div class="flex gap-8">
                                <div>
                                    <p class="text-gray-500 mb-1">Order Placed</p>
                                    <p class="font-medium text-gray-900">20 Oct 2023</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 mb-1">Total Amount</p>
                                    <p class="font-medium text-gray-900">₹2,499</p>
                                </div>
                                <div>
                                    <p class="text-gray-500 mb-1">Order ID</p>
                                    <p class="font-medium text-gray-900">#ORD-29301</p>
                                </div>
                            </div>
                            <button class="text-indigo-600 font-medium hover:underline">View Invoice</button>
                        </div>
                        
                        <div class="p-6">
                            <div class="flex flex-col sm:flex-row gap-6">
                                <div class="w-24 h-24 bg-gray-100 rounded-lg flex-shrink-0 overflow-hidden">
                                    <img src="https://images.unsplash.com/photo-1594035910387-fea47794261f?q=80&w=300&auto=format&fit=crop" alt="Perfume" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1">
                                    <div class="flex justify-between items-start">
                                        <div>
                                            <h3 class="font-bold text-gray-900 text-lg">Rose Prick</h3>
                                            <p class="text-gray-500 text-sm">30ml • Eau de Parfum</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-gray-900">₹2,499</p>
                                            <p class="text-xs text-gray-400">Qty: 1</p>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 flex flex-wrap items-center gap-4">
                                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span>
                                            Out for Delivery
                                        </span>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

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
