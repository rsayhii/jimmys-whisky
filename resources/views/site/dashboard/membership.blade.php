@extends('layouts.app')

@section('title', 'My Membership')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">My Membership</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar -->
            @include('site.dashboard.sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 space-y-8">
                
                @if(Auth::user()->membership_type)
                <!-- Current Plan Card -->
                <div class="bg-gradient-to-r from-gray-900 to-gray-800 rounded-2xl shadow-lg p-8 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-8 opacity-10">
                        <i class="fas fa-crown text-9xl"></i>
                    </div>
                    
                    <div class="relative z-10">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <span class="bg-yellow-500 text-black text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Active</span>
                                <h2 class="text-3xl font-bold mt-3">{{ Auth::user()->membership_type }}</h2>
                                <p class="text-gray-400 mt-1">Member since {{ Auth::user()->membership_start_date ? Auth::user()->membership_start_date->format('M Y') : 'N/A' }}</p>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-400 uppercase tracking-wide">Valid Until</p>
                                <p class="text-xl font-bold">{{ Auth::user()->membership_end_date ? Auth::user()->membership_end_date->format('d M Y') : 'N/A' }}</p>
                            </div>
                        </div>

                        <!-- Refill Slots Progress -->
                        <div class="bg-white/10 rounded-xl p-6 backdrop-blur-sm border border-white/10">
                            <div class="flex justify-between items-end mb-2">
                                <div>
                                    <p class="text-sm text-gray-300 mb-1">Refill Slots Remaining</p>
                                    @php
                                        $totalSlots = 10;
                                        $remaining = Auth::user()->refill_requests_balance;
                                        $used = $totalSlots - $remaining;
                                        $percentage = ($used / $totalSlots) * 100;
                                    @endphp
                                    <p class="text-2xl font-bold">{{ $remaining }} <span class="text-lg text-gray-400 font-normal">/ {{ $totalSlots }}</span></p>
                                </div>
                                <a href="/user-new-refill-request" class="bg-white text-black px-4 py-2 rounded-lg text-sm font-bold hover:bg-gray-100 transition">
                                    Request Refill
                                </a>
                            </div>
                            <div class="w-full bg-gray-700 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                            <p class="text-xs text-gray-400 mt-3">You have used {{ $used }} out of {{ $totalSlots }} refill slots this year.</p>
                        </div>
                    </div>
                </div>
                @else
                <!-- No Membership Card -->
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center border border-gray-200">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                        <i class="fas fa-crown text-2xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold mb-2 text-gray-900">No Active Membership</h2>
                    <p class="text-gray-500 mb-6 max-w-md mx-auto">Purchase any product from our collection to automatically activate your 1-year Gold Membership with 10 complimentary refill requests!</p>
                    <a href="/collection" class="inline-block bg-black text-white px-8 py-3 rounded-lg font-bold hover:bg-gray-800 transition">
                        Shop Now
                    </a>
                </div>
                @endif

              

                <!-- Recent Activity -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold text-gray-900">Recent Activity</h3>
                        <a href="{{ route('user.refill-requests') }}" class="text-sm text-indigo-600 hover:underline">View All</a>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @forelse($recentRefills as $refill)
                        <div class="p-6 flex items-center gap-4">
                            @if(in_array($refill->status, ['completed', 'approved']))
                                <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-check"></i>
                                </div>
                            @elseif(in_array($refill->status, ['rejected', 'cancelled']))
                                <div class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-times"></i>
                                </div>
                            @else
                                <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-clock"></i>
                                </div>
                            @endif
                            
                            <div class="flex-1">
                                <h4 class="font-medium text-gray-900">Refill Request {{ ucfirst($refill->status) }}</h4>
                                <p class="text-sm text-gray-500">{{ $refill->product->name ?? 'Unknown Product' }} ({{ $refill->size }})</p>
                            </div>
                            <div class="text-right">
                                @if(in_array($refill->status, ['completed', 'approved']))
                                    <p class="text-sm font-medium text-gray-900">-1 Slot</p>
                                @else
                                    <p class="text-sm font-medium text-gray-900">{{ ucfirst($refill->status) }}</p>
                                @endif
                                <p class="text-xs text-gray-500">{{ $refill->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        @empty
                        <div class="p-6 text-center text-gray-500">
                            No recent activity found.
                        </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
