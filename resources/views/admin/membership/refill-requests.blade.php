@extends('admin.layout')

@section('title', 'Refill Requests')

@section('content')
<div class="bg-white rounded-xl shadow-md p-6">
    <div class="flex justify-start items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Perfume Refill Requests</h2>
            <p class="text-gray-500 text-sm mt-1">Manage incoming refill requests from members.</p>
        </div>
        
    </div>

    <!-- Stats Overview -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-blue-50 p-5 rounded-xl border border-blue-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-500 text-white flex items-center justify-center text-xl">
                    <i class="fas fa-inbox"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium">New Requests</p>
                    <h3 class="text-2xl font-bold text-gray-800">12</h3>
                </div>
            </div>
        </div>
        <div class="bg-orange-50 p-5 rounded-xl border border-orange-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-orange-500 text-white flex items-center justify-center text-xl">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium">Pending Approval</p>
                    <h3 class="text-2xl font-bold text-gray-800">5</h3>
                </div>
            </div>
        </div>
        <div class="bg-green-50 p-5 rounded-xl border border-green-100">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center text-xl">
                    <i class="fas fa-check-double"></i>
                </div>
                <div>
                    <p class="text-gray-500 text-sm font-medium">Completed Today</p>
                    <h3 class="text-2xl font-bold text-gray-800">8</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Requests Table -->
    <div class="overflow-x-auto rounded-lg border border-gray-200">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-600 uppercase text-xs tracking-wider border-b border-gray-200">
                    <th class="p-4 font-semibold">Request ID</th>
                    <th class="p-4 font-semibold">Member</th>
                    <th class="p-4 font-semibold">Total Refill Pending</th>
                    <th class="p-4 font-semibold">Perfume Details</th>
                    <th class="p-4 font-semibold">Date</th>
                    <th class="p-4 font-semibold">Status</th>
                    <th class="p-4 font-semibold ">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
               

                <!-- Row 1 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 text-sm text-gray-500">#REF-041</td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xs">
                                SM
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">Sneha Mehta</p>
                                <span class="text-xs text-gray-500">Platinum Member</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-600 font-medium">2 Requests</td>
                    <td class="p-4">
                        <p class="text-gray-800 font-medium">Rose Prick</p>
                        <span class="text-xs text-gray-500">100ml Bottle</span>
                    </td>
                    <td class="p-4 text-gray-600 text-sm">Yesterday</td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Approved
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <a href="{{ route('admin.membership.view-refill-request') }}" class="text-gray-400 hover:text-blue-600 transition"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>

                <!-- Row 2 -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 text-sm text-gray-500">#REF-040</td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center font-bold text-xs">
                                AK
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">Amit Kumar</p>
                                <span class="text-xs text-gray-500">Silver Member</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-600 font-medium">0 Requests</td>
                    <td class="p-4">
                        <p class="text-gray-800 font-medium">Sauvage Elixir</p>
                        <span class="text-xs text-gray-500">30ml Bottle</span>
                    </td>
                    <td class="p-4 text-gray-600 text-sm">2 days ago</td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Rejected
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <a href="{{ route('admin.membership.view-refill-request') }}" class="text-gray-400 hover:text-blue-600 transition"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
