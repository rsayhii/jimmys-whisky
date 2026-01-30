@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">Orders</h1>

<table class="w-full bg-white rounded shadow">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">Order ID</th>
            <th class="p-3">Customer</th>
            <th class="p-3">Amount</th>
            <th class="p-3">Status</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b">
            <td class="p-3">101</td>
            <td class="p-3">Rohit</td>
            <td class="p-3">₹5,000</td>
            <td class="p-3 text-green-600">Completed</td>
        </tr>
        <tr>
            <td class="p-3">102</td>
            <td class="p-3">Amit</td>
            <td class="p-3">₹3,200</td>
            <td class="p-3 text-yellow-600">Pending</td>
        </tr>
    </tbody>
</table>
@endsection
