@extends('layouts.app')

@section('title', 'My Addresses')

@section('content')
<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-4 max-w-7xl">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-sm text-gray-500">
            <a href="/" class="hover:text-black transition">Home</a>
            <span class="mx-2">/</span>
            <span class="text-black font-medium">My Addresses</span>
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
                        <a href="/user-account" class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-black transition">
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
                        <a href="/user-address" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-black text-white font-medium transition">
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
            <div class="w-full lg:w-3/4 space-y-6">
                
                <div class="flex justify-between items-center mb-2">
                    <h1 class="text-2xl font-bold text-gray-900">My Addresses</h1>
                    <button class="bg-black text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition flex items-center gap-2">
                        <i class="fas fa-plus"></i> Add New Address
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Default Address -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border-2 border-black relative">
                        <div class="absolute top-4 right-4 bg-gray-100 text-gray-600 text-xs font-bold px-2 py-1 rounded">
                            DEFAULT
                        </div>
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-600">
                                <i class="fas fa-home"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Home</h3>
                                <p class="text-sm text-gray-500">Rahul Jain</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            123, Park Avenue, Block C<br>
                            Sector 45, Gurgaon<br>
                            Haryana, 122003<br>
                            India
                        </p>
                        <p class="text-sm text-gray-600 mb-6">
                            <span class="font-medium text-gray-900">Phone:</span> +91 98765 43210
                        </p>
                        <div class="flex gap-4 pt-4 border-t border-gray-100">
                            <button class="text-sm text-indigo-600 font-medium hover:text-indigo-800">Edit</button>
                            <button class="text-sm text-red-600 font-medium hover:text-red-800">Remove</button>
                        </div>
                    </div>

                    <!-- Other Address -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 relative group hover:border-gray-200 transition">
                        <div class="flex items-start gap-4 mb-4">
                            <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-600">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900">Office</h3>
                                <p class="text-sm text-gray-500">Rahul Jain</p>
                            </div>
                        </div>
                        <p class="text-gray-600 text-sm leading-relaxed mb-4">
                            Tech Park, Building 4A<br>
                            Electronic City, Phase 1<br>
                            Bangalore, 560100<br>
                            Karnataka, India
                        </p>
                        <p class="text-sm text-gray-600 mb-6">
                            <span class="font-medium text-gray-900">Phone:</span> +91 98765 43210
                        </p>
                        <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                            <div class="flex gap-4">
                                <button class="text-sm text-indigo-600 font-medium hover:text-indigo-800">Edit</button>
                                <button class="text-sm text-red-600 font-medium hover:text-red-800">Remove</button>
                            </div>
                            <button class="text-sm text-gray-500 hover:text-black">Set as Default</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
