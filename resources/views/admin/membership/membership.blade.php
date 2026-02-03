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
                    <h3 class="text-2xl font-bold text-gray-800">1,248</h3>
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
                    <h3 class="text-2xl font-bold text-gray-800">892</h3>
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
                    <h3 class="text-2xl font-bold text-gray-800">₹4.2L</h3>
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
                    <th class="p-4 font-semibold">Refills</th>
                    <th class="p-4 font-semibold">Benefits</th>
                    <th class="p-4 font-semibold">Status</th>
                    <th class="p-4 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Row 1 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gray-200 flex items-center justify-center text-gray-600">
                                <i class="fas fa-user"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">Silver Edition</p>
                                <span class="text-xs text-gray-500">ID: #MP-001</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 font-medium text-gray-700">₹999</td>
                    <td class="p-4 text-gray-600">3 Slots</td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            Free Shipping
                        </span>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            Active
                        </span>
                    </td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.membership.view-membership') }}" class="text-gray-400 hover:text-blue-600 transition mx-1"><i class="fas fa-edit"></i></a>
                        <button class="text-gray-400 hover:text-red-600 transition mx-1"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>

                <!-- Row 2 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center text-yellow-600">
                                <i class="fas fa-crown"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">Gold Elite</p>
                                <span class="text-xs text-gray-500">ID: #MP-002</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 font-medium text-gray-700">₹2,499</td>
                    <td class="p-4 text-gray-600">5 Slots</td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                            Priority Access
                        </span>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                            <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span>
                            Active
                        </span>
                    </td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.membership.view-membership') }}" class="text-gray-400 hover:text-blue-600 transition mx-1"><i class="fas fa-edit"></i></a>
                        <button class="text-gray-400 hover:text-red-600 transition mx-1"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>

                <!-- Row 3 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gray-900 flex items-center justify-center text-white">
                                <i class="fas fa-gem"></i>
                            </div>
                            <div>
                                <p class="font-bold text-gray-800">Noir Platinum</p>
                                <span class="text-xs text-gray-500">ID: #MP-003</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 font-medium text-gray-700">₹4,999</td>
                    <td class="p-4 text-gray-600">10 Slots</td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                            VIP Events
                        </span>
                    </td>
                    <td class="p-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span>
                            Draft
                        </span>
                    </td>
                    <td class="p-4 text-right">
                        <a href="{{ route('admin.membership.view-membership') }}" class="text-gray-400 hover:text-blue-600 transition mx-1"><i class="fas fa-edit"></i></a>
                        <button class="text-gray-400 hover:text-red-600 transition mx-1"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
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
