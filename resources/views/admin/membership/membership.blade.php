@extends('admin.layout')

@section('title', 'Membership Management')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6">
    <div class="flex justify-start items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Membership Plans</h2>
            <p class="text-gray-500 text-sm mt-1">Manage your exclusive perfume membership tiers.</p>
        </div>
        <!-- <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-lg flex items-center gap-2 transition shadow-sm">
            <i class="fas fa-plus"></i>
            <span>Add New Plan</span>
        </button> -->
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-amber-50 to-amber-100 p-5 rounded-xl border border-amber-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-amber-500 text-white flex items-center justify-center text-xl">
                    <i class="fas fa-crown"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Members</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $totalMembers }}</h3>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-5 rounded-xl border border-emerald-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xl">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium">Active Subscriptions</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $activeSubscriptions }}</h3>
                </div>
            </div>
        </div>
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-5 rounded-xl border border-blue-200">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-500 text-white flex items-center justify-center text-xl">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium">Monthly Revenue</p>
                    <h3 class="text-2xl font-bold text-gray-800">₹{{ number_format($monthlyRevenue, 2) }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Membership Table -->
    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider border-b border-gray-200">
                    <th class="p-4 font-semibold">Plan Name</th>
                    <th class="p-4 font-semibold">Membership Price</th>
                    <th class="p-4 font-semibold">Slots</th>
                    <th class="p-4 font-semibold">Benefits</th>
                    <th class="p-4 font-semibold">Status</th>
                    <th class="p-4 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($plans as $plan)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gray-200 flex items-center justify-center text-gray-600">
                                <i class="fas fa-crown text-yellow-500"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">{{ $plan['name'] }}</p>
                                <span class="text-xs text-gray-500">{{ $plan['users_count'] }} Active Members</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 font-medium text-gray-700">{{ $plan['price'] }}</td>
                    <td class="p-4 text-gray-600">{{ $plan['refills'] }}</td>
                    <td class="p-4">
                        @foreach($plan['benefits'] as $benefit)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $loop->first ? 'bg-blue-100 text-blue-800' : 'bg-pink-100 text-pink-800 ml-1' }}">
                            {{ $benefit }}
                        </span>
                        @endforeach
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            {{ $plan['status'] }}
                        </span>
                    </td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.membership.view-membership', ['id' => $plan['id']]) }}" class="text-gray-400 hover:text-blue-600 transition mx-1"><i class="fas fa-edit"></i></a>
                        <!-- <button class="text-gray-400 hover:text-red-600 transition mx-1"><i class="fas fa-trash"></i></button> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="flex items-center justify-between mt-6">
        <p class="text-sm text-gray-500">Showing <span class="font-medium text-gray-800">1</span> to <span class="font-medium text-gray-800">3</span> of <span class="font-medium text-gray-800">3</span> results</p>
        <div class="flex gap-2">
            <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>Previous</button>
            <button class="px-3 py-1 border border-gray-300 rounded-md text-sm text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>Next</button>
        </div>
    </div>
</div>
@endsection
