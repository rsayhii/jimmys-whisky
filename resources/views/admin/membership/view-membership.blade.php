@extends('admin.layout')

@section('title', 'View Membership Plan')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header with Back Button -->
    <div class="flex items-center gap-4 mb-8">
        <a href="{{ route('admin.membership.membership') }}" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white shadow-sm hover:bg-gray-50 text-gray-600 transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Plan Details</h2>
            <p class="text-gray-500 text-sm">View membership plan information</p>
        </div>
        <!-- Actions removed as per read-only request -->
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Info Card -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-100">Basic Information</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Plan Name</label>
                        <div class="w-full px-4 py-2 rounded-lg bg-gray-50 border border-gray-200 text-gray-800">
                            {{ $plan['name'] }}
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <div class="w-full px-4 py-2 rounded-lg bg-gray-50 border border-gray-200 text-gray-800 min-h-[60px]">
                            {{ $plan['description'] }}
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                            <div class="w-full px-4 py-2 rounded-lg bg-gray-50 border border-gray-200 text-gray-800">
                                {{ $plan['price'] }}
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Slots</label>
                            <div class="w-full px-4 py-2 rounded-lg bg-gray-50 border border-gray-200 text-gray-800">
                                {{ $plan['refills'] }} Slots
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Benefits</label>
                        <div class="w-full px-4 py-2 rounded-lg bg-gray-50 border border-gray-200 text-gray-800">
                            <ul class="list-disc list-inside">
                                @foreach($plan['benefits'] as $benefit)
                                    <li>{{ $benefit }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-100">Recent Members</h3>
                <div class="space-y-4">
                    @forelse($recentMembers as $member)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs">
                                {{ substr($member->name, 0, 2) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $member->name }}</p>
                                <p class="text-xs text-gray-500">{{ $member->email }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-500">Joined</p>
                            <p class="text-sm font-medium text-gray-700">{{ $member->membership_start_date ? $member->membership_start_date->format('M d, Y') : 'N/A' }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-sm text-gray-500 text-center py-4">No members yet.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Sidebar Options -->
        <div class="space-y-6">
            <!-- Status Card -->
            <div class="bg-white rounded-xl shadow-sm p-6">
                <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wider mb-4">Publishing</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="w-full px-3 py-2 rounded-lg bg-gray-50 border border-gray-200 text-gray-700">
                            <span class="inline-flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full {{ $plan['status'] === 'Active' ? 'bg-green-500' : 'bg-gray-500' }}"></span>
                                {{ $plan['status'] }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Visibility</label>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <i class="fas fa-globe text-gray-500"></i>
                            <span class="text-sm text-gray-600">Public on website</span>
                        </div>
                    </div>
                    
                    <div>
                         <label class="block text-sm font-medium text-gray-700 mb-2">Active Users</label>
                         <div class="w-full px-3 py-2 rounded-lg bg-gray-50 border border-gray-200 text-gray-700 font-medium">
                             {{ $plan['users_count'] }} Members
                         </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Created</span>
                            <span class="text-gray-800 font-medium">{{ $plan['created_at'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
