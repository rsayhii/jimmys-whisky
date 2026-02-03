@extends('admin.layout')

@section('content')
<div class="bg-gray-50 min-h-screen p-6">
    
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-sm text-gray-500 mt-1">Welcome back, Admin! Here's what's happening today.</p>
        </div>
        <div class="mt-4 md:mt-0 flex gap-3">
             <div class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 shadow-sm">
                <i class="fas fa-calendar mr-2 text-gray-400"></i> {{ date('d M Y') }}
            </div>
            <a href="/admin/create">
                <button class="inline-flex items-center justify-center px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 shadow-sm transition-all duration-200">
                    <i class="fas fa-plus mr-2"></i> Add Product
                </button>
            </a>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Revenue Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow duration-200 h-full">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Revenue</p>
                    <h3 class="text-2xl font-bold text-gray-900 mt-1">₹45,231.89</h3>
                </div>
                <div class="w-10 h-10 bg-green-50 rounded-full flex items-center justify-center">
                    <i class="fas fa-dollar-sign text-green-600"></i>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-600 font-medium flex items-center">
                    <i class="fas fa-arrow-up mr-1"></i> +20.1%
                </span>
                <span class="text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow duration-200 h-full">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Total Orders</p>
                    <h3 class="text-2xl font-bold text-gray-900 mt-1">+56</h3>
                </div>
                <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center">
                    <i class="fas fa-shopping-bag text-blue-600"></i>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-600 font-medium flex items-center">
                    <i class="fas fa-arrow-up mr-1"></i> +12.5%
                </span>
                <span class="text-gray-400 ml-2">from last month</span>
            </div>
        </div>

        <!-- Products Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow duration-200 h-full">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Active Products</p>
                    <h3 class="text-2xl font-bold text-gray-900 mt-1">120</h3>
                </div>
                <div class="w-10 h-10 bg-purple-50 rounded-full flex items-center justify-center">
                    <i class="fas fa-box text-purple-600"></i>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-gray-500 font-medium">
                    14 Out of Stock
                </span>
            </div>
        </div>

        <!-- Users Card -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between hover:shadow-md transition-shadow duration-200 h-full">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Active Users</p>
                    <h3 class="text-2xl font-bold text-gray-900 mt-1">340</h3>
                </div>
                <div class="w-10 h-10 bg-orange-50 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-orange-600"></i>
                </div>
            </div>
            <div class="flex items-center text-sm">
                <span class="text-green-600 font-medium flex items-center">
                    <i class="fas fa-arrow-up mr-1"></i> +8.2%
                </span>
                <span class="text-gray-400 ml-2">new this week</span>
            </div>
        </div>
    </div>

    <!-- Charts & Tables Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column: Recent Orders (Takes 2/3 width) -->
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-lg font-bold text-gray-900">Recent Orders</h2>
                <a href="#" class="text-sm font-medium text-black hover:underline">View All</a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Order ID</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-semibold text-gray-900">#1024</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Rahul Jain</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span> Completed
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-medium text-gray-900">₹2,500</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-semibold text-gray-900">#1023</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Amit Kumar</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-50 text-yellow-700 border border-yellow-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mr-1.5"></span> Processing
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-medium text-gray-900">₹1,800</td>
                        </tr>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-semibold text-gray-900">#1022</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Sneha Mehta</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500 mr-1.5"></span> Shipped
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-medium text-gray-900">₹3,200</td>
                        </tr>
                         <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-semibold text-gray-900">#1021</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Priya Singh</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-50 text-orange-700 border border-orange-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-orange-500 mr-1.5"></span> Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-medium text-gray-900">₹950</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right Column: Top Products / Activity -->
        <div class="space-y-6">
            <!-- Top Selling -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Top Selling</h3>
                <div class="space-y-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-xl">🧴</div>
                        <div class="flex-1">
                            <h4 class="text-sm font-semibold text-gray-900">Ocean Breeze</h4>
                            <p class="text-xs text-gray-500">240 sales</p>
                        </div>
                        <span class="text-sm font-medium text-gray-900">₹12k</span>
                    </div>
                     <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-xl">🌹</div>
                        <div class="flex-1">
                            <h4 class="text-sm font-semibold text-gray-900">Rose Petal</h4>
                            <p class="text-xs text-gray-500">189 sales</p>
                        </div>
                        <span class="text-sm font-medium text-gray-900">₹9k</span>
                    </div>
                     <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-xl">🍋</div>
                        <div class="flex-1">
                            <h4 class="text-sm font-semibold text-gray-900">Citrus Zest</h4>
                            <p class="text-xs text-gray-500">145 sales</p>
                        </div>
                        <span class="text-sm font-medium text-gray-900">₹7k</span>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
             <div class="bg-black text-white rounded-2xl shadow-sm p-6 relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-lg font-bold mb-2">Refill Requests</h3>
                    <p class="text-gray-300 text-sm mb-4">You have 5 pending refill requests to review.</p>
                    <a href="/admin/refill-requests" class="inline-block px-4 py-2 bg-white text-black text-sm font-medium rounded-lg hover:bg-gray-100 transition">
                        Review Requests
                    </a>
                </div>
                <!-- Decorative Circle -->
                <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-gray-800 rounded-full opacity-50"></div>
            </div>
        </div>

    </div>

</div>
@endsection