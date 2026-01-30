@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">Products</h1>

<table class="w-full bg-white rounded shadow">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">ID</th>
            <th class="p-3">Product</th>
            <th class="p-3">Price</th>
            <th class="p-3">Status</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b">
            <td class="p-3">1</td>
            <td class="p-3">Laptop</td>
            <td class="p-3">₹50,000</td>
            <td class="p-3 text-green-600">Active</td>
        </tr>
        <tr>
            <td class="p-3">2</td>
            <td class="p-3">Mobile</td>
            <td class="p-3">₹20,000</td>
            <td class="p-3 text-red-600">Inactive</td>
        </tr>
    </tbody>
</table>
@endsection
