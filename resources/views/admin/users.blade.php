@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold mb-6">Users</h1>

<table class="w-full bg-white rounded shadow">
    <thead class="bg-gray-200">
        <tr>
            <th class="p-3">ID</th>
            <th class="p-3">Name</th>
            <th class="p-3">Email</th>
        </tr>
    </thead>
    <tbody>
        <tr class="border-b">
            <td class="p-3">1</td>
            <td class="p-3">Rohit Kumar</td>
            <td class="p-3">rohit@gmail.com</td>
        </tr>
        <tr>
            <td class="p-3">2</td>
            <td class="p-3">Rahul</td>
            <td class="p-3">rahul@gmail.com</td>
        </tr>
    </tbody>
</table>
@endsection
