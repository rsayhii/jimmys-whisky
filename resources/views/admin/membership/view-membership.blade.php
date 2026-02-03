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
            <p class="text-gray-500 text-sm">View and edit membership plan information</p>
        </div>
        <div class="ml-auto flex gap-3">
            <button class="px-4 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition">
                Delete Plan
            </button>
            <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm font-medium hover:bg-indigo-700 transition shadow-sm">
                Save Changes
            </button>
        </div>
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
                        <input type="text" value="Silver Edition" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition text-gray-800">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Price (Monthly)</label>
                            <div class="relative">
                                <span class="absolute left-3 top-2 text-gray-500">₹</span>
                                <input type="number" value="999" class="w-full pl-8 pr-4 py-2 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition text-gray-800">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Refill Slots</label>
                            <input type="number" value="3" max="10" class="w-full px-4 py-2 rounded-lg border border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 outline-none transition text-gray-800">
                            <p class="text-xs text-gray-500 mt-1">Max 10 slots per plan.</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 pt-2">
                        <input type="checkbox" id="allow_refill" checked class="w-4 h-4 text-indigo-600 rounded border-gray-300 focus:ring-indigo-500">
                        <label for="allow_refill" class="text-sm text-gray-700 font-medium">Allow Perfume Refill Requests</label>
                    </div>      
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
                        <select class="w-full px-3 py-2 rounded-lg border border-gray-200 focus:border-indigo-500 outline-none text-gray-700 bg-white">
                            <option value="active">Active</option>
                            <option value="draft">Draft</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Visibility</label>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <i class="fas fa-globe text-gray-500"></i>
                            <span class="text-sm text-gray-600">Public on website</span>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Created</span>
                            <span class="text-gray-800 font-medium">Oct 24, 2023</span>
                        </div>
                        <div class="flex justify-between text-sm mt-2">
                            <span class="text-gray-500">Last Updated</span>
                            <span class="text-gray-800 font-medium">2 days ago</span>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endsection
