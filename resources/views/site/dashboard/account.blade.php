@extends('layouts.app')

@section('title', 'My Account')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">My Account</span>
        </nav>

        <div class="flex flex-col lg:flex-row gap-8">
            
            <!-- Sidebar -->
            <aside class="w-full lg:w-1/4">
                <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xl font-bold text-gray-600">
                            RJ
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Rahul Jain</h3>
                            <p class="text-sm text-gray-500">rahul.jain@example.com</p>
                        </div>
                    </div>

                    <nav class="space-y-1">
                        <a href="/user-account" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-black text-white font-medium transition">
                            <i class="fas fa-user w-5"></i>
                            My Account
                        </a>
                        <a href="/user-order" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
                            <i class="fas fa-box w-5"></i>
                            My Orders
                        </a>
                        <a href="/user-membership" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
                            <i class="fas fa-crown w-5"></i>
                            My Membership
                        </a>
                        <a href="/user-refill-requests" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
                            <i class="fas fa-sync w-5"></i>
                            Refill Requests
                        </a>
                        <a href="/wishlist" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
                            <i class="fas fa-heart w-5"></i>
                            Wishlist
                        </a>
                        <a href="/user-address" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
                            <i class="fas fa-map-marker-alt w-5"></i>
                            Addresses
                        </a>
                         <form method="POST" action="#" class="mt-4 pt-4 border-t border-gray-100">
                            @csrf
                            <button type="submit" class="flex w-full items-center gap-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 transition">
                                <i class="fas fa-sign-out-alt w-5"></i>
                                Log Out
                            </button>
                        </form>
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 space-y-8">
                
                <!-- Personal Information -->
                <div class="bg-white rounded-xl shadow-sm p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Personal Information</h2>
                        <button class="text-sm text-indigo-600 font-medium hover:underline">Edit</button>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">First Name</label>
                            <p class="text-gray-900 font-medium">Rahul</p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Last Name</label>
                            <p class="text-gray-900 font-medium">Jain</p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Email Address</label>
                            <p class="text-gray-900 font-medium">rahul.jain@example.com</p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Phone Number</label>
                            <p class="text-gray-900 font-medium">+91 98765 43210</p>
                        </div>
                    </div>
                </div>

                <!-- Password Change -->
                <div class="bg-white rounded-xl shadow-sm p-8">
                     <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Security</h2>
                        <button class="text-sm text-indigo-600 font-medium hover:underline">Update Password</button>
                    </div>
                    <div class="flex items-center gap-4">
                         <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div>
                             <p class="text-gray-900 font-medium">Password</p>
                             <p class="text-sm text-gray-500">Last changed 3 months ago</p>
                        </div>
                    </div>
                </div>

                 <!-- Address Book Summary -->
                <div class="bg-white rounded-xl shadow-sm p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Default Address</h2>
                         <a href="#" class="text-sm text-indigo-600 font-medium hover:underline">Manage Addresses</a>
                    </div>
                    
                    <div class="border border-gray-200 rounded-lg p-4 relative">
                        <span class="absolute top-4 right-4 bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded font-medium">Default</span>
                        <p class="font-bold text-gray-900 mb-1">Rahul Jain</p>
                        <p class="text-gray-600 text-sm leading-relaxed mb-2">
                            1204, Palm Heights, Linking Road<br>
                            Bandra West, Mumbai, Maharashtra 400050<br>
                            India
                        </p>
                        <p class="text-gray-600 text-sm">Phone: +91 98765 43210</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
