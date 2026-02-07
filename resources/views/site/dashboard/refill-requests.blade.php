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
                    
                    <!-- Request Item 1 -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                        <div class="p-6 flex flex-col sm:flex-row gap-6">
                            <div class="w-20 h-20 bg-gray-100 rounded-lg flex-shrink-0 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?q=80&w=300&auto=format&fit=crop" alt="Perfume" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h3 class="font-bold text-gray-900">Oud Wood Intense</h3>
                                        <p class="text-sm text-gray-500">Refill ID: #REF-8293</p>
                                    </div>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                                        Completed
                                    </span>
                                </div>
                                <div class="flex flex-wrap gap-x-8 gap-y-2 text-sm text-gray-600 mb-4">
                                    <p><span class="text-gray-400">Date:</span> 26 Oct 2023</p>
                                    <p><span class="text-gray-400">Quantity:</span> 50ml</p>
                                    <p><span class="text-gray-400">Cost:</span> ₹1,200</p>
                                </div>
                                <div class="flex gap-4">
                                    <a href="/user-view-refill-request" class="text-sm text-indigo-600 font-medium hover:text-indigo-800">View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Request Item 2 -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                        <div class="p-6 flex flex-col sm:flex-row gap-6">
                            <div class="w-20 h-20 bg-gray-100 rounded-lg flex-shrink-0 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1594035910387-fea47794261f?q=80&w=300&auto=format&fit=crop" alt="Perfume" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h3 class="font-bold text-gray-900">Rose Prick</h3>
                                        <p class="text-sm text-gray-500">Refill ID: #REF-8301</p>
                                    </div>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span>
                                        Processing
                                    </span>
                                </div>
                                <div class="flex flex-wrap gap-x-8 gap-y-2 text-sm text-gray-600 mb-4">
                                    <p><span class="text-gray-400">Date:</span> 20 Oct 2023</p>
                                    <p><span class="text-gray-400">Quantity:</span> 30ml</p>
                                    <p><span class="text-gray-400">Cost:</span> ₹800</p>
                                </div>
                                <div class="flex gap-4">
                                    <a href="/user-view-refill-request" class="text-sm text-indigo-600 font-medium hover:text-indigo-800">View Details</a>
                                    <button class="text-sm text-red-600 font-medium hover:text-red-800">Cancel Request</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Request Item 3 -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                        <div class="p-6 flex flex-col sm:flex-row gap-6">
                            <div class="w-20 h-20 bg-gray-100 rounded-lg flex-shrink-0 overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1523293182086-7651a899d37f?q=80&w=300&auto=format&fit=crop" alt="Perfume" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <div>
                                        <h3 class="font-bold text-gray-900">Black Orchid</h3>
                                        <p class="text-sm text-gray-500">Refill ID: #REF-7902</p>
                                    </div>
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                                        Cancelled
                                    </span>
                                </div>
                                <div class="flex flex-wrap gap-x-8 gap-y-2 text-sm text-gray-600 mb-4">
                                    <p><span class="text-gray-400">Date:</span> 15 Sep 2023</p>
                                    <p><span class="text-gray-400">Quantity:</span> 100ml</p>
                                    <p><span class="text-gray-400">Cost:</span> ₹2,400</p>
                                </div>
                                <div class="flex gap-4">
                                    <a href="/user-view-refill-request" class="text-sm text-indigo-600 font-medium hover:text-indigo-800">View Details</a>
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
                        <button class="px-4 py-2 border border-gray-200 rounded-lg text-gray-700 hover:bg-gray-50">Next</button>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
