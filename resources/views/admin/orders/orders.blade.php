@extends('admin.layout')

@section('content')
<div class="bg-gray-50 min-h-screen p-6">
    
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Order Management</h1>
            <p class="text-sm text-gray-500 mt-1">Monitor and manage all your store orders.</p>
        </div>
        <div class="mt-4 md:mt-0 flex gap-3">
             <button class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm transition-all duration-200">
                <i class="fas fa-filter mr-2 text-gray-400"></i> Filter
            </button>
            <button class="inline-flex items-center justify-center px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 shadow-sm transition-all duration-200">
                <i class="fas fa-download mr-2"></i> Export Report
            </button>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Pending Payment</p>
                <h3 class="text-3xl font-bold text-gray-900">56</h3>
            </div>
            <div class="w-12 h-12 bg-orange-50 rounded-full flex items-center justify-center">
                <i class="fas fa-clock text-orange-500 text-lg"></i>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Completed</p>
                <h3 class="text-3xl font-bold text-gray-900">12,689</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center">
                <i class="fas fa-check-circle text-green-500 text-lg"></i>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Refunded</p>
                <h3 class="text-3xl font-bold text-gray-900">124</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center">
                <i class="fas fa-undo text-blue-500 text-lg"></i>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Failed</p>
                <h3 class="text-3xl font-bold text-gray-900">32</h3>
            </div>
            <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center">
                <i class="fas fa-times-circle text-red-500 text-lg"></i>
            </div>
        </div>
    </div>

    <!-- Orders Table Section -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        
        <!-- Table Toolbar -->
        <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-4">
            <div class="relative max-w-sm w-full">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" placeholder="Search orders by ID, customer..." class="pl-10 pr-4 py-2.5 w-full border border-gray-200 rounded-lg text-sm focus:ring-2 focus:ring-black focus:border-transparent outline-none transition-all">
            </div>
            
            <div class="flex items-center gap-3">
                <select class="border border-gray-200 rounded-lg text-sm py-2.5 px-3 focus:ring-2 focus:ring-black focus:border-transparent outline-none cursor-pointer bg-white">
                    <option>Last 30 Days</option>
                    <option>Last 3 Months</option>
                    <option>This Year</option>
                </select>
                <select class="border border-gray-200 rounded-lg text-sm py-2.5 px-3 focus:ring-2 focus:ring-black focus:border-transparent outline-none cursor-pointer bg-white">
                    <option value="10">Show 10</option>
                    <option value="25">Show 25</option>
                    <option value="50">Show 50</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100">
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider w-10">
                            <input type="checkbox" class="rounded border-gray-300 text-black focus:ring-black">
                        </th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Payment</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Method</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @php
                    $orders = [
                        ['#9042', 'Wed Feb 01 2023', 'Chere Schofield', 'Pending', 'Ready to Pickup', '****3949'],
                        ['#7189', 'Mon Jan 02 2023', 'Boycie Hartmann', 'Cancelled', 'Out for Delivery', '****@gmail.com'],
                        ['#8114', 'Sat Apr 08 2023', 'Ulysses Goodlife', 'Cancelled', 'Ready to Pickup', '****4509'],
                        ['#7064', 'Mon Mar 20 2023', 'Carmon Savidge', 'Cancelled', 'Delivered', '****@gmail.com'],
                        ['#5911', 'Sun Aug 14 2022', 'Hilliard Merck', 'Failed', 'Out for Delivery', '****@gmail.com'],
                        ['#6111', 'Sat Mar 11 2023', 'Chad Cock', 'Failed', 'Ready to Pickup', '****1014'],
                        ['#8767', 'Mon Aug 29 2022', 'Lyndsey Dorey', 'Cancelled', 'Ready to Pickup', '****3432'],
                        ['#7931', 'Mon Dec 26 2022', 'Octavius Whitchurch', 'Cancelled', 'Dispatched', '****8585'],
                        ['#7280', 'Tue Dec 06 2022', 'Sibley Braithwaite', 'Paid', 'Ready to Pickup', '****8535'],
                        ['#7094', 'Wed Jun 29 2022', 'Damara Figgins', 'Pending', 'Delivered', '****8321'],
                    ];
                    @endphp

                    @foreach($orders as $order)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <input type="checkbox" class="rounded border-gray-300 text-black focus:ring-black">
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-900">{{ $order[0] }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $order[1] }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-600">
                                    {{ substr($order[2], 0, 1) }}
                                </div>
                                <span class="text-sm font-medium text-gray-900">{{ $order[2] }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            @if($order[3] == 'Pending')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-50 text-orange-700 border border-orange-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-orange-500 mr-1.5"></span> {{ $order[3] }}
                                </span>
                            @elseif($order[3] == 'Failed')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-50 text-red-700 border border-red-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span> {{ $order[3] }}
                                </span>
                            @elseif($order[3] == 'Paid')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span> {{ $order[3] }}
                                </span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-700 border border-gray-200">
                                    {{ $order[3] }}
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusClass = '';
                                $statusTextClass = '';
                                if($order[4] == 'Ready to Pickup') {
                                    $statusClass = 'bg-blue-50 border-blue-100';
                                    $statusTextClass = 'text-blue-700';
                                } elseif($order[4] == 'Out for Delivery') {
                                    $statusClass = 'bg-purple-50 border-purple-100';
                                    $statusTextClass = 'text-purple-700';
                                } elseif($order[4] == 'Dispatched') {
                                    $statusClass = 'bg-yellow-50 border-yellow-100';
                                    $statusTextClass = 'text-yellow-700';
                                } elseif($order[4] == 'Delivered') {
                                    $statusClass = 'bg-emerald-50 border-emerald-100';
                                    $statusTextClass = 'text-emerald-700';
                                }
                            @endphp
                            <span class="inline-flex px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $statusClass }} {{ $statusTextClass }}">
                                {{ $order[4] }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">
                            {{ $order[5] }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.orders.show') }}" class="group inline-flex items-center justify-center w-8 h-8 rounded-full bg-white border border-gray-200 hover:bg-black hover:border-black transition-all duration-200">
                                <i class="fas fa-arrow-right text-gray-400 text-xs group-hover:text-white"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between">
            <p class="text-sm text-gray-500">
                Showing <span class="font-medium text-gray-900">1</span> to <span class="font-medium text-gray-900">10</span> of <span class="font-medium text-gray-900">100</span> entries
            </p>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 disabled:opacity-50" disabled>
                    <i class="fas fa-chevron-left text-xs"></i>
                </button>
                <button class="px-3 py-1 text-sm bg-black text-white border border-black rounded-lg">1</button>
                <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 text-gray-600">2</button>
                <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 text-gray-600">3</button>
                <span class="px-2 text-gray-400">...</span>
                <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg hover:bg-gray-50 text-gray-600">10</button>
                <button class="px-3 py-1 text-sm border border-gray-200 rounded-lg hover:bg-gray-50">
                    <i class="fas fa-chevron-right text-xs"></i>
                </button>
            </div>
        </div>
    </div>

</div>
@endsection