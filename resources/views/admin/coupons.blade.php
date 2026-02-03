@extends('admin.layout')

@section('content')
<div class="-m-6 bg-gray-50 min-h-screen" x-data="{ showModal: false, searchTerm: '', statusFilter: 'all' }">
    
    <!-- Header -->
    <div class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-gray-200 px-8 py-4 mb-8 transition-all duration-300 shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 font-serif">Coupons & Discounts</h1>
                <p class="text-sm text-gray-500">Manage promotional codes and special offers.</p>
            </div>
            <button @click="showModal = true" 
                class="px-5 py-2.5 bg-black text-white rounded-xl text-sm font-medium hover:bg-gray-800 shadow-lg shadow-gray-200 hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5 flex items-center gap-2">
                <i class="fas fa-plus"></i> Create Coupon
            </button>
        </div>
    </div>

    <div class="px-8 max-w-7xl mx-auto space-y-8 pb-20">
        
        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between group hover:shadow-md transition-all">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Active Coupons</p>
                    <h3 class="text-2xl font-bold text-gray-900">12</h3>
                </div>
                <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-500 group-hover:scale-110 transition-transform">
                    <i class="fas fa-ticket-alt text-xl"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between group hover:shadow-md transition-all">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Redeemed</p>
                    <h3 class="text-2xl font-bold text-gray-900">1,248</h3>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 group-hover:scale-110 transition-transform">
                    <i class="fas fa-chart-pie text-xl"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between group hover:shadow-md transition-all">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Expiring Soon</p>
                    <h3 class="text-2xl font-bold text-gray-900">3</h3>
                </div>
                <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-500 group-hover:scale-110 transition-transform">
                    <i class="fas fa-hourglass-half text-xl"></i>
                </div>
            </div>
        </div>

        <!-- Filters & Table -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Toolbar -->
            <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row gap-4 justify-between items-center">
                <div class="relative w-full md:w-96">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" x-model="searchTerm" placeholder="Search coupons..." class="w-full pl-11 pr-4 py-2.5 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white">
                </div>
                <div class="flex gap-3 w-full md:w-auto">
                    <select x-model="statusFilter" class="px-4 py-2.5 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-black/5 focus:border-black bg-white cursor-pointer text-sm font-medium text-gray-600">
                        <option value="all">All Status</option>
                        <option value="active">Active</option>
                        <option value="expired">Expired</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100 text-xs uppercase tracking-wider text-gray-500 font-semibold">
                            <th class="px-6 py-4">Coupon Info</th>
                            <th class="px-6 py-4">Discount</th>
                            <th class="px-6 py-4">Usage</th>
                            <th class="px-6 py-4">Validity</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <!-- Item 1 -->
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600 font-bold text-xs border border-indigo-100">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    <div>
                                        <span class="block font-bold text-gray-900 font-mono tracking-wide">SAVE20</span>
                                        <span class="text-xs text-gray-500">Min. spend ₹2000</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-gray-900">20% OFF</span>
                                <span class="block text-xs text-gray-500">Up to ₹500</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-full bg-gray-100 rounded-full h-1.5 w-24">
                                        <div class="bg-black h-1.5 rounded-full" style="width: 45%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500">45/100</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">20 Feb 2026</div>
                                <span class="text-xs text-orange-500">Expires in 15 days</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Active
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="p-2 text-gray-400 hover:text-black transition-colors rounded-lg hover:bg-gray-100">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Item 2 -->
                         <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-lg bg-purple-50 flex items-center justify-center text-purple-600 font-bold text-xs border border-purple-100">
                                        <i class="fas fa-gift"></i>
                                    </div>
                                    <div>
                                        <span class="block font-bold text-gray-900 font-mono tracking-wide">WELCOME10</span>
                                        <span class="text-xs text-gray-500">New users only</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-gray-900">₹500 FLAT</span>
                                <span class="block text-xs text-gray-500">Min. spend ₹3000</span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-full bg-gray-100 rounded-full h-1.5 w-24">
                                        <div class="bg-black h-1.5 rounded-full" style="width: 80%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500">800/1000</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">31 Dec 2026</div>
                                <span class="text-xs text-gray-500">Annual</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Published
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="p-2 text-gray-400 hover:text-black transition-colors rounded-lg hover:bg-gray-100">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
             <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
                <span class="text-sm text-gray-500">Showing 1-2 of 12 coupons</span>
                <div class="flex gap-2">
                    <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50 disabled:opacity-50">Previous</button>
                    <button class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-gray-600 hover:bg-gray-50">Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div x-show="showModal" 
        style="display: none;"
        class="fixed inset-0 z-50 flex items-center justify-center p-4"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" @click="showModal = false"></div>

        <!-- Modal Content -->
        <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg relative overflow-hidden"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 scale-95">
            
            <div class="p-8">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h3 class="text-xl font-bold text-gray-900">Create Coupon</h3>
                        <p class="text-sm text-gray-500 mt-1">Set up a new discount code.</p>
                    </div>
                    <button @click="showModal = false" class="text-gray-400 hover:text-gray-900 transition-colors p-2 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form class="space-y-5">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Coupon Code</label>
                        <div class="relative">
                            <input type="text" placeholder="e.g. SUMMER25" class="w-full border border-gray-200 rounded-xl p-3 pl-10 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all uppercase font-mono tracking-wide">
                            <i class="fas fa-ticket-alt absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Discount Type</label>
                            <select class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black bg-white">
                                <option>Percentage (%)</option>
                                <option>Fixed Amount (₹)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Value</label>
                            <input type="number" placeholder="0" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Expiry Date</label>
                            <input type="date" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black text-gray-500">
                        </div>
                         <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Usage Limit</label>
                            <input type="number" placeholder="e.g. 100" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <div class="flex gap-4 p-1 bg-gray-100 rounded-xl w-fit">
                            <label class="cursor-pointer">
                                <input type="radio" name="status" class="peer sr-only" checked>
                                <div class="px-4 py-2 rounded-lg text-sm font-medium text-gray-500 peer-checked:bg-white peer-checked:text-green-600 peer-checked:shadow-sm transition-all flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span> Active
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="status" class="peer sr-only">
                                <div class="px-4 py-2 rounded-lg text-sm font-medium text-gray-500 peer-checked:bg-white peer-checked:text-gray-900 peer-checked:shadow-sm transition-all">Inactive</div>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="p-6 border-t border-gray-100 bg-gray-50/50 flex gap-3 justify-end">
                <button @click="showModal = false" class="px-5 py-2.5 border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:bg-white hover:text-gray-900 transition-all">Cancel</button>
                <button class="px-5 py-2.5 bg-black text-white rounded-xl text-sm font-medium hover:bg-gray-800 shadow-lg shadow-gray-200 hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">Create Coupon</button>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
