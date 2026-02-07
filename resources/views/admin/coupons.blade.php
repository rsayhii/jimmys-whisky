@extends('admin.layout')

@section('content')
<div class="-m-6 bg-gray-50 min-h-screen" 
    x-data="{ 
        showModal: false, 
        searchTerm: '{{ request('search') }}', 
        statusFilter: '{{ request('status', 'all') }}',
        isEditing: false,
        form: {
            id: null,
            code: '',
            discount_type: 'percentage',
            value: '',
            min_spend: '',
            max_discount_amount: '',
            usage_limit: '',
            expiry_date: '',
            status: 'active'
        },
        openCreateModal() {
            this.isEditing = false;
            this.form = {
                id: null,
                code: '',
                discount_type: 'percentage',
                value: '',
                min_spend: '',
                max_discount_amount: '',
                usage_limit: '',
                expiry_date: '',
                status: 'active'
            };
            this.showModal = true;
        },
        openEditModal(coupon) {
            this.isEditing = true;
            this.form = {
                id: coupon.id,
                code: coupon.code,
                discount_type: coupon.discount_type,
                value: coupon.value,
                min_spend: coupon.min_spend,
                max_discount_amount: coupon.max_discount_amount,
                usage_limit: coupon.usage_limit,
                expiry_date: coupon.expiry_date.split('T')[0],
                status: coupon.status
            };
            this.showModal = true;
        },
        applyFilters() {
            let url = new URL(window.location.href);
            if (this.searchTerm) {
                url.searchParams.set('search', this.searchTerm);
            } else {
                url.searchParams.delete('search');
            }
            if (this.statusFilter !== 'all') {
                url.searchParams.set('status', this.statusFilter);
            } else {
                url.searchParams.delete('status');
            }
            window.location.href = url.toString();
        }
    }">
    
    <!-- Header -->
    <div class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-gray-200 px-8 py-4 mb-8 transition-all duration-300 shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 font-serif">Coupons & Discounts</h1>
                <p class="text-sm text-gray-500">Manage promotional codes and special offers.</p>
            </div>
            <button @click="openCreateModal()" 
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
                    <h3 class="text-2xl font-bold text-gray-900">{{ $activeCoupons }}</h3>
                </div>
                <div class="w-12 h-12 bg-green-50 rounded-xl flex items-center justify-center text-green-500 group-hover:scale-110 transition-transform">
                    <i class="fas fa-ticket-alt text-xl"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between group hover:shadow-md transition-all">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Redeemed</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $totalRedeemed }}</h3>
                </div>
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center text-blue-500 group-hover:scale-110 transition-transform">
                    <i class="fas fa-chart-pie text-xl"></i>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between group hover:shadow-md transition-all">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Expiring Soon</p>
                    <h3 class="text-2xl font-bold text-gray-900">{{ $expiringSoon }}</h3>
                </div>
                <div class="w-12 h-12 bg-orange-50 rounded-xl flex items-center justify-center text-orange-500 group-hover:scale-110 transition-transform">
                    <i class="fas fa-hourglass-half text-xl"></i>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <span class="font-medium">Success!</span> {{ session('success') }}
            </div>
        @endif
        
        @if($errors->any())
            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <span class="font-medium">Error!</span>
                <ul class="mt-1 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Filters & Table -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Toolbar -->
            <div class="p-6 border-b border-gray-100 flex flex-col md:flex-row gap-4 justify-between items-center">
                <div class="relative w-full md:w-96">
                    <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                    <input type="text" x-model="searchTerm" @keydown.enter="applyFilters()" placeholder="Search coupons..." class="w-full pl-11 pr-4 py-2.5 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white">
                </div>
                <div class="flex gap-3 w-full md:w-auto">
                    <select x-model="statusFilter" @change="applyFilters()" class="px-4 py-2.5 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-black/5 focus:border-black bg-white cursor-pointer text-sm font-medium text-gray-600">
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
                        @foreach($coupons as $coupon)
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-lg {{ $coupon->discount_type == 'percentage' ? 'bg-indigo-50 text-indigo-600 border-indigo-100' : 'bg-purple-50 text-purple-600 border-purple-100' }} flex items-center justify-center font-bold text-xs border">
                                        <i class="fas {{ $coupon->discount_type == 'percentage' ? 'fa-tag' : 'fa-gift' }}"></i>
                                    </div>
                                    <div>
                                        <span class="block font-bold text-gray-900 font-mono tracking-wide">{{ $coupon->code }}</span>
                                        <span class="text-xs text-gray-500">
                                            @if($coupon->min_spend)
                                                Min. spend ₹{{ number_format($coupon->min_spend, 2) }}
                                            @else
                                                No min. spend
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-bold text-gray-900">
                                    @if($coupon->discount_type == 'percentage')
                                        {{ $coupon->value }}% OFF
                                    @else
                                        ₹{{ number_format($coupon->value, 2) }} FLAT
                                    @endif
                                </span>
                                @if($coupon->max_discount_amount)
                                    <span class="block text-xs text-gray-500">Up to ₹{{ number_format($coupon->max_discount_amount, 2) }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-full bg-gray-100 rounded-full h-1.5 w-24">
                                        @php
                                            $percentage = $coupon->usage_limit > 0 ? ($coupon->used_count / $coupon->usage_limit) * 100 : 0;
                                        @endphp
                                        <div class="bg-black h-1.5 rounded-full" style="width: {{ $percentage }}%"></div>
                                    </div>
                                    <span class="text-xs text-gray-500">{{ $coupon->used_count }}/{{ $coupon->usage_limit ?? '∞' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $coupon->expiry_date->format('d M Y') }}</div>
                                @if($coupon->expiry_date->isPast())
                                    <span class="text-xs text-red-500">Expired</span>
                                @elseif($coupon->expiry_date->diffInDays(now()) <= 7)
                                    <span class="text-xs text-orange-500">Expires in {{ $coupon->expiry_date->diffInDays(now()) }} days</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium {{ $coupon->status == 'active' ? 'bg-green-50 text-green-700 border border-green-100' : 'bg-gray-50 text-gray-700 border border-gray-100' }}">
                                    <span class="w-1.5 h-1.5 rounded-full {{ $coupon->status == 'active' ? 'bg-green-500' : 'bg-gray-500' }}"></span> {{ ucfirst($coupon->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <button @click="openEditModal({{ $coupon }})" class="p-2 text-gray-400 hover:text-blue-600 transition-colors rounded-lg hover:bg-blue-50" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this coupon?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 text-gray-400 hover:text-red-600 transition-colors rounded-lg hover:bg-red-50" title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
             <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $coupons->appends(request()->query())->links() }}
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
                        <h3 class="text-xl font-bold text-gray-900" x-text="isEditing ? 'Edit Coupon' : 'Create Coupon'"></h3>
                        <p class="text-sm text-gray-500 mt-1" x-text="isEditing ? 'Update coupon details.' : 'Set up a new discount code.'"></p>
                    </div>
                    <button @click="showModal = false" class="text-gray-400 hover:text-gray-900 transition-colors p-2 hover:bg-gray-100 rounded-full">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <form :action="isEditing ? '/admin/coupons/' + form.id : '{{ route('admin.coupons.store') }}'" method="POST" class="space-y-5">
                    @csrf
                    <template x-if="isEditing">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Coupon Code</label>
                        <div class="relative">
                            <input type="text" name="code" x-model="form.code" placeholder="e.g. SUMMER25" class="w-full border border-gray-200 rounded-xl p-3 pl-10 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all uppercase font-mono tracking-wide" required>
                            <i class="fas fa-ticket-alt absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Discount Type</label>
                            <select name="discount_type" x-model="form.discount_type" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black bg-white">
                                <option value="percentage">Percentage (%)</option>
                                <option value="fixed">Fixed Amount (₹)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Value</label>
                            <input type="number" step="0.01" name="value" x-model="form.value" placeholder="0" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Min. Spend</label>
                            <input type="number" step="0.01" name="min_spend" x-model="form.min_spend" placeholder="0" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Max Discount</label>
                            <input type="number" step="0.01" name="max_discount_amount" x-model="form.max_discount_amount" placeholder="0" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black">
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Expiry Date</label>
                            <input type="date" name="expiry_date" x-model="form.expiry_date" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black text-gray-500" required>
                        </div>
                         <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Usage Limit</label>
                            <input type="number" name="usage_limit" x-model="form.usage_limit" placeholder="e.g. 100" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                        <div class="flex gap-4 p-1 bg-gray-100 rounded-xl w-fit">
                            <label class="cursor-pointer">
                                <input type="radio" name="status" value="active" x-model="form.status" class="peer sr-only">
                                <div class="px-4 py-2 rounded-lg text-sm font-medium text-gray-500 peer-checked:bg-white peer-checked:text-green-600 peer-checked:shadow-sm transition-all flex items-center gap-2">
                                    <span class="w-1.5 h-1.5 rounded-full bg-current"></span> Active
                                </div>
                            </label>
                            <label class="cursor-pointer">
                                <input type="radio" name="status" value="inactive" x-model="form.status" class="peer sr-only">
                                <div class="px-4 py-2 rounded-lg text-sm font-medium text-gray-500 peer-checked:bg-white peer-checked:text-gray-900 peer-checked:shadow-sm transition-all">Inactive</div>
                            </label>
                        </div>
                    </div>
                    
                    <div class="p-6 border-t border-gray-100 bg-gray-50/50 flex gap-3 justify-end -mx-8 -mb-8">
                        <button type="button" @click="showModal = false" class="px-5 py-2.5 border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:bg-white hover:text-gray-900 transition-all">Cancel</button>
                        <button type="submit" class="px-5 py-2.5 bg-black text-white rounded-xl text-sm font-medium hover:bg-gray-800 shadow-lg shadow-gray-200 hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5" x-text="isEditing ? 'Update Coupon' : 'Create Coupon'"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
