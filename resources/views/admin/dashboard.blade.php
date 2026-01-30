@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-1 md:grid-cols-4 gap-6">
    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold">Total Products</h3>
        <p class="text-2xl font-bold">120</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold">Orders</h3>
        <p class="text-2xl font-bold">56</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold">Users</h3>
        <p class="text-2xl font-bold">340</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <h3 class="text-lg font-semibold">Revenue</h3>
        <p class="text-2xl font-bold">₹45,000</p>
    </div>
</div>
@endsection
