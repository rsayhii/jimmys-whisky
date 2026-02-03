@extends('admin.layout')

@section('content')
<div class="p-0 bg-[#f8f7fa] min-h-screen font-sans text-[#6f6b7d]">
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <select class="w-full border border-gray-200 rounded-lg p-3 bg-white outline-none focus:ring-1 focus:ring-[#7367f0] text-gray-400">
            <option selected disabled>Status</option>
            <option value="publish">Publish</option>
            <option value="scheduled">Scheduled</option>
            <option value="inactive">Inactive</option>
        </select>
        <select class="w-full border border-gray-200 rounded-lg p-3 bg-white outline-none focus:ring-1 focus:ring-[#7367f0] text-gray-400">
            <option selected disabled>Category</option>
            <option value="accessories">Accessories</option>
            <option value="home-decor">Home Decor</option>
            <option value="shoes">Shoes</option>
        </select>
        <select class="w-full border border-gray-200 rounded-lg p-3 bg-white outline-none focus:ring-1 focus:ring-[#7367f0] text-gray-400">
            <option selected disabled>Stock</option>
            <option value="in-stock">In Stock</option>
            <option value="out-stock">Out of Stock</option>
        </select>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden">
        
        <div class="p-4 flex flex-col md:flex-row justify-between items-center gap-4 border-b border-gray-100">
            <div class="relative w-full md:w-64">
                <input type="text" id="tableSearch" placeholder="Search Product" class="w-full border border-gray-200 rounded-md pl-4 pr-4 py-2 text-sm focus:outline-none focus:border-[#7367f0]">
            </div>
            
            <div class="flex items-center gap-3 w-full md:w-auto justify-end">
                <select class="border border-gray-200 rounded-md px-3 py-2 text-sm outline-none">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
                <button onclick="exportToCSV()" class="flex items-center gap-2 border border-gray-200 text-gray-500 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-50 transition active:scale-95">
                    <i class="fa-solid fa-upload text-xs"></i> Export
                </button>
                <a href="{{ route('admin.products.create') }}" class="bg-[#7367f0] text-white px-5 py-2 rounded-md text-sm font-medium hover:shadow-lg transition">
                    <span class="text-lg leading-none mr-1">+</span> Add Product
                </a>
            </div>
        </div>

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
                    @php
                        $products = [
                            ['name' => 'Zamit', 'brand' => 'Hoeger-Powlowski', 'cat' => 'Accessories', 'sku' => '55860', 'price' => 22500, 'qty' => 332, 'status' => 'publish', 'stock' => 'in-stock'],
                            ['name' => 'Span', 'brand' => 'Hane-Romaguera', 'cat' => 'Home Decor', 'sku' => '55666', 'price' => 45999, 'qty' => 898, 'status' => 'scheduled', 'stock' => 'in-stock'],
                            ['name' => 'Tampflex', 'brand' => 'Romaguera', 'cat' => 'Accessories', 'sku' => '29438', 'price' => 12450, 'qty' => 908, 'status' => 'inactive', 'stock' => 'out-stock'],
                        ];
                    @endphp

                    @foreach($products as $product)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4"><input type="checkbox" class="rounded border-gray-300"></td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-gray-100 rounded flex items-center justify-center text-lg">📦</div>
                                <div class="flex flex-col">
                                    <span class="text-sm font-bold text-gray-700">{{ $product['name'] }}</span>
                                    <span class="text-[11px] text-gray-400">{{ $product['brand'] }}</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <select class="bg-transparent border-none text-sm focus:ring-0 cursor-pointer text-gray-600 outline-none">
                                <option value="Accessories" {{ $product['cat'] == 'Accessories' ? 'selected' : '' }}>Accessories</option>
                                <option value="Home Decor" {{ $product['cat'] == 'Home Decor' ? 'selected' : '' }}>Home Decor</option>
                            </select>
                        </td>
                        <td class="px-6 py-4">
                            <select onchange="updateStockUI(this)" class="text-[12px] font-medium px-2 py-1 rounded border border-gray-100 outline-none cursor-pointer {{ $product['stock'] == 'out-stock' ? 'text-red-500 border-red-100' : 'text-gray-600' }}">
                                <option value="in-stock" {{ $product['stock'] == 'in-stock' ? 'selected' : '' }}>In Stock</option>
                                <option value="out-stock" {{ $product['stock'] == 'out-stock' ? 'selected' : '' }}>Out of Stock</option>
                            </select>
                        </td>
                        <td class="px-6 py-4 text-sm">{{ $product['sku'] }}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-gray-700">₹{{ number_format($product['price'], 2) }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $product['qty'] }}</td>
                        <td class="px-6 py-4">
                            @php
                                $statusClasses = ['publish' => 'bg-green-100 text-green-600', 'scheduled' => 'bg-orange-100 text-orange-600', 'inactive' => 'bg-red-100 text-red-500'];
                            @endphp
                            <select onchange="updateStatusUI(this)" class="text-[10px] font-bold uppercase px-2 py-1 rounded border-none outline-none cursor-pointer {{ $statusClasses[$product['status']] }}">
                                <option value="publish" {{ $product['status'] == 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="scheduled" {{ $product['status'] == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                                <option value="inactive" {{ $product['status'] == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </td>
                        <td class="px-6 py-4 text-center text-gray-400">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('admin.products.edit') }}" class="hover:text-[#7367f0] transition"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button class="hover:text-gray-600 transition"><i class="fa-solid fa-ellipsis-vertical"></i></button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="addProductModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-md p-6">
        <div class="flex justify-between items-center border-b pb-3 mb-4">
            <h3 class="text-lg font-bold">Add New Product</h3>
            <button onclick="toggleModal('addProductModal')" class="text-gray-400 hover:text-gray-600">&times;</button>
        </div>
        <form id="productForm">
            <div class="space-y-4">
                <input type="text" placeholder="Product Name" class="w-full border p-2 rounded outline-none focus:border-[#7367f0]">
                <input type="text" placeholder="Price (INR)" class="w-full border p-2 rounded outline-none focus:border-[#7367f0]">
                <select class="w-full border p-2 rounded outline-none focus:border-[#7367f0]">
                    <option>Select Category</option>
                    <option>Accessories</option>
                    <option>Home Decor</option>
                </select>
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

    // 2. Export to CSV Logic
    function exportToCSV() {
        let rows = document.querySelectorAll("#productTable tr");
        let csv = [];
        for (let i = 0; i < rows.length; i++) {
            let row = [], cols = rows[i].querySelectorAll("td, th");
            for (let j = 1; j < cols.length - 1; j++) {
                let val = cols[j].querySelector('select') ? cols[j].querySelector('select').value : cols[j].innerText;
                row.push('"' + val.trim() + '"');
            }
            csv.push(row.join(","));
        }
        let blob = new Blob([csv.join("\n")], { type: "text/csv" });
        let url = window.URL.createObjectURL(blob);
        let a = document.createElement("a");
        a.href = url;
        a.download = "products_list.csv";
        a.click();
    }

    // 3. Status UI Logic
    function updateStatusUI(select) {
        const val = select.value;
        select.classList.remove('bg-green-100', 'text-green-600', 'bg-orange-100', 'text-orange-600', 'bg-red-100', 'text-red-500');
        if(val === 'publish') select.classList.add('bg-green-100', 'text-green-600');
        else if(val === 'scheduled') select.classList.add('bg-orange-100', 'text-orange-600');
        else if(val === 'inactive') select.classList.add('bg-red-100', 'text-red-500');
    }

    // 4. Stock UI Logic
    function updateStockUI(select) {
        if(select.value === 'out-stock') {
            select.classList.add('text-red-500', 'border-red-100');
        } else {
            select.classList.remove('text-red-500', 'border-red-100');
            select.classList.add('text-gray-600');
        }
    }

    // 5. Client-side Search Logic
    document.getElementById('tableSearch').addEventListener('keyup', function() {
        let filter = this.value.toUpperCase();
        let tr = document.querySelectorAll("#productTable tbody tr");
        tr.forEach(row => {
            let text = row.innerText.toUpperCase();
            row.style.display = text.includes(filter) ? "" : "none";
        });
    });
</script>
@endsection
