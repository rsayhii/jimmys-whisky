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
                    <h3 class="text-2xl font-bold text-gray-800">{{ $newRequests }}</h3>
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
                    <h3 class="text-2xl font-bold text-gray-800">{{ $pendingApproval }}</h3>
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
                    <h3 class="text-2xl font-bold text-gray-800">{{ $completedToday }}</h3>
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
               @forelse($requests as $request)
                <tr class="hover:bg-gray-50 transition">
                    <td class="p-4 text-sm text-gray-500">#REF-{{ $request->id }}</td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center font-bold text-xs uppercase">
                                {{ substr($request->user->name, 0, 2) }}
                            </div>
                            <div>
                                <p class="font-medium text-gray-800">{{ $request->user->name }}</p>
                                <span class="text-xs text-gray-500">{{ $request->user->membership_type ?? 'Member' }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-sm text-gray-600 font-medium">{{ $request->user->refill_requests_balance }} Requests Left</td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            @if($request->product->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $request->product->images->first()->image_path) }}" alt="{{ $request->product->name }}" class="w-10 h-10 rounded-lg object-cover">
                            @elseif($request->product->image)
                                <img src="{{ asset('storage/' . $request->product->image) }}" alt="{{ $request->product->name }}" class="w-10 h-10 rounded-lg object-cover">
                            @else
                                <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400">
                                    <i class="fas fa-wine-bottle"></i>
                                </div>
                            @endif
                            <div>
                                <p class="text-gray-800 font-medium">{{ $request->product->name }}</p>
                                <span class="text-xs text-gray-500">{{ $request->size }}ml Bottle</span>
                            </div>
                        </div>
                    </td>
                    <td class="p-4 text-gray-600 text-sm">{{ $request->created_at->diffForHumans() }}</td>
                    <td class="p-4">
                        @php
                            $statusColors = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'approved' => 'bg-green-100 text-green-800',
                                'rejected' => 'bg-red-100 text-red-800',
                                'processing' => 'bg-blue-100 text-blue-800',
                                'completed' => 'bg-gray-100 text-gray-800',
                            ];
                            $colorClass = $statusColors[$request->status] ?? 'bg-gray-100 text-gray-600';
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $colorClass }}">
                            {{ ucfirst($request->status) }}
                        </span>
                    </td>
                    <td class="p-4 text-center">
                        <a href="{{ route('admin.membership.view-refill-request', $request->id) }}" class="text-gray-400 hover:text-blue-600 transition"><i class="fas fa-eye"></i></a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">No refill requests found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
