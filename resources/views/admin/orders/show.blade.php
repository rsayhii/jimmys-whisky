@extends('admin.layout')

@section('content')
<div class="p-6 bg-[#F8F7FA] min-h-screen">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-xl font-semibold text-[#5D596C]">Order #3492</h2>
            <p class="text-sm text-gray-400">Aug 17, 2024, 5:48 (IST)</p>
        </div>
        <div class="flex gap-3">
            <select class="bg-white border border-gray-200 text-[#5D596C] px-4 py-2 rounded text-sm font-medium focus:outline-none focus:border-indigo-500 cursor-pointer">
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="shipped">Shipped</option>
                <option value="out_for_delivery">Out for Delivery</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
            </select>
            <button class="bg-red-50 text-red-500 px-4 py-2 rounded text-sm font-medium border border-red-100 hover:bg-red-100">Delete Order</button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100">
                <div class="p-4 border-b border-gray-50 flex justify-between items-center">
                    <h5 class="font-medium text-[#5D596C]">Order Details</h5>
                   
                </div>
                <table class="w-full text-left text-sm text-[#5D596C]">
                    <thead class="bg-[#F8F7FA] text-[11px] uppercase text-[#A5A3AE]">
                        <tr><th class="px-4 py-3">Product</th><th class="px-4 py-3 text-center">Price</th><th class="px-4 py-3 text-center">Qty</th><th class="px-4 py-3 text-right">Total</th></tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <tr>
                            <td class="px-4 py-4 flex items-center gap-3">
                                <img src="https://images.unsplash.com/photo-1541643600914-78b084683601?q=100&w=60&auto=format&fit=crop" class="rounded">
                                <div><p class="font-medium">Rose Prick</p><p class="text-[11px] text-gray-400">Eau de Parfum</p></div>
                            </td>
                            <td class="px-4 py-4 text-center">₹32,999</td><td class="px-4 py-4 text-center">1</td><td class="px-4 py-4 text-right">₹32,999</td>
                        </tr>
                        
                    </tbody>
                </table>
                <div class="p-6 bg-white border-t border-gray-50 text-right">
                    <div class="space-y-2 text-sm text-gray-500">
                        <p>Subtotal: <span class="text-[#5D596C] font-semibold">₹33,498</span></p>
                        <p>Shipping: <span class="text-[#5D596C] font-semibold">₹50</span></p>
                        <p class="text-lg">Total: <span class="text-[#7367F0] font-bold text-xl">₹33,548</span></p>
                    </div>
                </div>
            </div>

           
        </div>

        <div class="space-y-6">
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h5 class="font-medium text-[#5D596C] mb-4">Customer Details</h5>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-[#EAE8FD] text-[#7367F0] flex items-center justify-center font-bold">RJ</div>
                    <div><p class="font-medium text-[#5D596C]">Rahul Jain</p><p class="text-xs text-gray-400">Customer ID: #9042</p></div>
                </div>
                <div class="text-sm border-t border-gray-50 pt-4"><p class="text-gray-400">Email: rahul.jain@example.com</p></div>
            </div>
            
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                <h5 class="font-medium text-[#5D596C] mb-4 flex justify-between">Shipping Address</h5>
                <p class="text-sm text-gray-500 leading-relaxed">123, Green Park<br>New Delhi - 110016<br>India</p>
            </div>
        </div>
    </div>
</div>
<script>lucide.createIcons();</script>
@endsection