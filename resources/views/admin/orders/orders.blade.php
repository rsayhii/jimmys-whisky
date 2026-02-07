@extends('admin.layout')

@section('content')
<div class="bg-gray-50 min-h-screen p-6">
    
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Order Management</h1>
            <p class="text-sm text-gray-500 mt-1">Monitor and manage all your store orders.</p>
        </div>
        <div class="mt-4 md:mt-0 flex gap-3">
            <a href="{{ route('admin.orders.export') }}" class="inline-flex items-center justify-center px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 shadow-sm transition-all duration-200">
                <i class="fas fa-download mr-2"></i> Export Report
            </a>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Total Orders</p>
                <h3 class="text-3xl font-bold text-gray-900">{{ \App\Models\Order::count() }}</h3>
            </div>
            <div class="w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center">
                <i class="fas fa-shopping-bag text-blue-500 text-lg"></i>
            </div>
        </div>
         <!-- Card 2 -->
         <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Pending</p>
                <h3 class="text-3xl font-bold text-gray-900">{{ \App\Models\Order::where('status', 'pending')->count() }}</h3>
            </div>
            <div class="w-12 h-12 bg-orange-50 rounded-full flex items-center justify-center">
                <i class="fas fa-clock text-orange-500 text-lg"></i>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Completed</p>
                <h3 class="text-3xl font-bold text-gray-900">{{ \App\Models\Order::where('status', 'delivered')->count() }}</h3>
            </div>
            <div class="w-12 h-12 bg-green-50 rounded-full flex items-center justify-center">
                <i class="fas fa-check-circle text-green-500 text-lg"></i>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow duration-200">
            <div>
                <p class="text-sm font-medium text-gray-500 mb-1">Cancelled</p>
                <h3 class="text-3xl font-bold text-gray-900">{{ \App\Models\Order::where('status', 'cancelled')->count() }}</h3>
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
                <div class="flex items-center gap-2 mr-4">
                    <select id="bulk-status-select" class="border border-gray-200 rounded-lg text-sm py-2.5 px-3 focus:ring-2 focus:ring-black focus:border-transparent outline-none cursor-pointer bg-white">
                        <option value="">Bulk Actions</option>
                        <option value="pending">Mark Pending</option>
                        <option value="processing">Mark Processing</option>
                        <option value="shipped">Mark Shipped</option>
                        <option value="out_for_delivery">Mark Out for Delivery</option>
                        <option value="delivered">Mark Delivered</option>
                        <option value="cancelled">Mark Cancelled</option>
                    </select>
                    <button onclick="submitBulkUpdate()" class="px-4 py-2.5 bg-gray-900 text-white rounded-lg text-sm font-medium hover:bg-gray-800 transition-colors">
                        Apply
                    </button>
                </div>
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
                            <input type="checkbox" id="select-all" class="rounded border-gray-300 text-black focus:ring-black">
                        </th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Order ID</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Payment Status</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($orders as $order)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <input type="checkbox" name="ids[]" value="{{ $order->id }}" class="order-checkbox rounded border-gray-300 text-black focus:ring-black">
                        </td>
                        <td class="px-6 py-4">
                            <span class="font-semibold text-gray-900">{{ $order->order_number }}</span>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $order->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-xs font-bold text-gray-600">
                                    {{ substr($order->shipping_first_name, 0, 1) }}
                                </div>
                                <span class="text-sm font-medium text-gray-900">{{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                             @php
                                $paymentClass = match($order->payment_status) {
                                    'paid' => 'bg-green-50 text-green-700 border-green-100',
                                    'pending' => 'bg-orange-50 text-orange-700 border-orange-100',
                                    'failed' => 'bg-red-50 text-red-700 border-red-100',
                                    default => 'bg-gray-50 text-gray-700 border-gray-100'
                                };
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $paymentClass }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <form action="{{ route('admin.orders.update', $order->id) }}" method="POST" class="min-w-[140px]">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" 
                                    class="w-full text-xs font-medium px-2.5 py-1.5 rounded-full border bg-white focus:outline-none focus:ring-2 focus:ring-offset-1
                                    {{ match($order->status) {
                                        'delivered' => 'border-emerald-200 text-emerald-700 bg-emerald-50 focus:ring-emerald-500',
                                        'shipped', 'out_for_delivery' => 'border-blue-200 text-blue-700 bg-blue-50 focus:ring-blue-500',
                                        'processing' => 'border-yellow-200 text-yellow-700 bg-yellow-50 focus:ring-yellow-500',
                                        'cancelled' => 'border-red-200 text-red-700 bg-red-50 focus:ring-red-500',
                                        default => 'border-gray-200 text-gray-700 bg-gray-50 focus:ring-gray-500'
                                    } }}">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="out_for_delivery" {{ $order->status == 'out_for_delivery' ? 'selected' : '' }}>Out for Delivery</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-900 font-medium">
                            ₹{{ number_format($order->total_amount, 2) }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="group inline-flex items-center justify-center w-8 h-8 rounded-full bg-white border border-gray-200 hover:bg-black hover:border-black transition-all duration-200">
                                <i class="fas fa-arrow-right text-gray-400 text-xs group-hover:text-white"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            No orders found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $orders->links() }}
        </div>
    </div>
</div>

<!-- Hidden Bulk Update Form -->
<form id="bulk-update-form" action="{{ route('admin.orders.bulk_update') }}" method="POST" class="hidden">
    @csrf
    @method('PATCH')
    <input type="hidden" name="status" id="bulk-status-input">
    <div id="bulk-ids-container"></div>
</form>

<script>
    // Select All Checkbox
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.order-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    // Bulk Update Submission
    function submitBulkUpdate() {
        const status = document.getElementById('bulk-status-select').value;
        if (!status) {
            alert('Please select a status to apply.');
            return;
        }

        const selectedIds = Array.from(document.querySelectorAll('.order-checkbox:checked')).map(cb => cb.value);
        if (selectedIds.length === 0) {
            alert('Please select at least one order.');
            return;
        }

        if (!confirm(`Are you sure you want to update ${selectedIds.length} orders to ${status}?`)) {
            return;
        }

        const form = document.getElementById('bulk-update-form');
        const container = document.getElementById('bulk-ids-container');
        
        // Clear previous inputs
        container.innerHTML = '';
        
        // Add status
        document.getElementById('bulk-status-input').value = status;
        
        // Add IDs
        selectedIds.forEach(id => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'ids[]';
            input.value = id;
            container.appendChild(input);
        });

        form.submit();
    }
</script>
@endsection
