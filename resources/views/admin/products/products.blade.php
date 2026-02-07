@extends('admin.layout')

@section('content')
<div class="p-0 bg-[#f8f7fa] min-h-screen font-sans text-[#6f6b7d]" x-data="{ showFilters: {{ request('status') || request('category') || request('stock_status') ? 'true' : 'false' }} }">
    
    <!-- Header & Actions -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden mb-6">
        <div class="p-4 flex flex-col md:flex-row justify-between items-center gap-4">
            <!-- Search -->
            <form action="{{ route('admin.products.products') }}" method="GET" class="w-full md:w-1/2">
                <div class="relative w-full">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Product..." class="w-full border border-gray-200 rounded-md pl-10 pr-4 py-2 text-sm focus:outline-none focus:border-[#7367f0]">
                    <i class="fa-solid fa-search absolute left-3 top-3 text-gray-400"></i>
                    <!-- Preserve other filters -->
                    @if(request('status')) <input type="hidden" name="status" value="{{ request('status') }}"> @endif
                    @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
                    @if(request('stock_status')) <input type="hidden" name="stock_status" value="{{ request('stock_status') }}"> @endif
                </div>
            </form>
            
            <div class="flex items-center gap-3 w-full md:w-auto justify-end">
                <button @click="showFilters = !showFilters" :class="{'bg-gray-100 text-[#7367f0]': showFilters}" class="flex hidden items-center gap-2 border border-gray-200 text-gray-500 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-50 transition">
                    <i class="fa-solid fa-filter"></i> Filters
                </button>
                <a href="{{ route('admin.products.create') }}" class="bg-[#7367f0] text-white px-5 py-2 rounded-md text-sm font-medium hover:shadow-lg transition">
                    <span class="text-lg leading-none mr-1">+</span> Add Product
                </a>
            </div>
        </div>

        <!-- Filters Section -->
        <div x-show="showFilters" x-transition class="border-t border-gray-100 bg-gray-50 p-4">
            <form action="{{ route('admin.products.products') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @if(request('search')) <input type="hidden" name="search" value="{{ request('search') }}"> @endif
                
                <select name="status" onchange="this.form.submit()" class="w-full border border-gray-200 rounded-lg p-2.5 bg-white outline-none focus:ring-1 focus:ring-[#7367f0] text-sm text-gray-600">
                    <option value="">All Status</option>
                    <option value="publish" {{ request('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                    <option value="scheduled" {{ request('status') == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>

                <select name="category" onchange="this.form.submit()" class="w-full border border-gray-200 rounded-lg p-2.5 bg-white outline-none focus:ring-1 focus:ring-[#7367f0] text-sm text-gray-600">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>

                <select name="stock_status" onchange="this.form.submit()" class="w-full border border-gray-200 rounded-lg p-2.5 bg-white outline-none focus:ring-1 focus:ring-[#7367f0] text-sm text-gray-600">
                    <option value="">All Stock Status</option>
                    <option value="in-stock" {{ request('stock_status') == 'in-stock' ? 'selected' : '' }}>In Stock</option>
                    <option value="out-stock" {{ request('stock_status') == 'out-stock' ? 'selected' : '' }}>Out of Stock</option>
                </select>

                <a href="{{ route('admin.products.products') }}" class="flex items-center justify-center gap-2 border border-red-200 text-red-500 bg-white hover:bg-red-50 px-4 py-2 rounded-lg text-sm font-medium transition">
                    <i class="fa-solid fa-times"></i> Clear Filters
                </a>
            </form>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table id="productTable" class="w-full text-left whitespace-nowrap">
                <thead class="bg-[#fcfcfd] text-[11px] uppercase tracking-wider text-gray-500 font-bold border-b">
                    <tr>
                        <th class="px-6 py-4 w-4"><input type="checkbox" class="rounded border-gray-300"></th>
                        <th class="px-6 py-4">Product</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Stock Status</th>
                        <th class="px-6 py-4">SKU</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Qty</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4"><input type="checkbox" class="rounded border-gray-300"></td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-10 h-10 rounded object-cover">
                                @else
                                    <div class="w-10 h-10 bg-gray-100 rounded flex items-center justify-center text-lg">📦</div>
                                @endif
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-gray-700">{{ $product->name }}</span>
                                    <span class="text-[11px] text-gray-400">{{ $product->brand }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-sm text-gray-600">{{ $product->category }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="text-[12px] font-medium px-2 py-1 rounded border border-gray-100 {{ ($product->qty == 0 || $product->stock_status == 'out-stock') ? 'text-red-500 border-red-100' : 'text-gray-600' }}">
                                {{ ($product->qty == 0 || $product->stock_status == 'out-stock') ? 'Out of Stock' : 'In Stock' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm">{{ $product->sku }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-700">
                            @if($product->discount_price && $product->discount_price < $product->price)
                                <div class="flex flex-col">
                                    <span class="text-xs text-gray-400 line-through">₹{{ number_format($product->price, 2) }}</span>
                                    <span class="text-[#7367f0]">₹{{ number_format($product->discount_price, 2) }}</span>
                                </div>
                            @else
                                ₹{{ number_format($product->price, 2) }}
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $product->qty }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusClasses = ['publish' => 'bg-green-100 text-green-600', 'scheduled' => 'bg-orange-100 text-orange-600', 'inactive' => 'bg-red-100 text-red-500'];
                            @endphp
                            <span class="text-[10px] font-bold uppercase px-2 py-1 rounded {{ $statusClasses[$product->status] ?? '' }}">
                                {{ ucfirst($product->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-center text-gray-400">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="hover:text-[#7367f0] transition"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:text-red-500 transition"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="px-6 py-4 text-center text-gray-500">No products found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 px-4 pb-4">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
</div>

<div id="addProductModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-md p-6">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h3 class="text-lg font-bold">Add New Product</h3>
            <button onclick="toggleModal('addProductModal')" class="text-gray-400 hover:text-gray-600">&times;</button>
        </div>
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <input type="text" name="name" placeholder="Product Name" class="w-full border p-2 rounded outline-none focus:border-[#7367f0]" required>
                <input type="number" name="price" placeholder="Price (INR)" class="w-full border p-2 rounded outline-none focus:border-[#7367f0]" step="0.01" required>
                <select name="category" class="w-full border p-2 rounded outline-none focus:border-[#7367f0]">
                    <option value="">Select Category</option>
                    <option value="Accessories">Accessories</option>
                    <option value="Home Decor">Home Decor</option>
                </select>
                <!-- Hidden defaults or additional fields could go here -->
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="toggleModal('addProductModal')" class="px-4 py-2 text-gray-500 border rounded">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-[#7367f0] text-white rounded">Save Product</button>
            </div>
        </form>
    </div>
</div>

<script>
    // 1. Toggle Modal
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex');
    }
</script>
@endsection
