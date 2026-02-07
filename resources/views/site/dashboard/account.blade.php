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
            @include('site.dashboard.sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 space-y-8">
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <!-- Personal Information -->
                <div class="bg-white rounded-xl shadow-sm p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Personal Information</h2>
                        <button onclick="openModal('editProfileModal')" class="text-sm text-indigo-600 font-medium hover:underline">Edit</button>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Name</label>
                            <p class="text-gray-900 font-medium">{{ $user->name }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Joined Date</label>
                            <p class="text-gray-900 font-medium">{{ $user->created_at->format('d M, Y') }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Email Address</label>
                            <p class="text-gray-900 font-medium">{{ $user->email }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1">Phone Number</label>
                            <p class="text-gray-900 font-medium">{{ $user->phone ?? 'Not set' }}</p>
                        </div>
                    </div>
                </div>

               
                 <!-- Address Book Summary -->
                <div class="bg-white rounded-xl shadow-sm p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-xl font-bold text-gray-900">Default Address</h2>
                         <a href="{{ route('user.address') }}" class="text-sm text-indigo-600 font-medium hover:underline">Manage Addresses</a>
                    </div>
                    
                    @if($defaultAddress)
                        <div class="border border-gray-200 rounded-lg p-4 relative">
                            <span class="absolute top-4 right-4 bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded font-medium">Default</span>
                            <p class="font-bold text-gray-900 mb-1">{{ $defaultAddress->name }}</p>
                            <p class="text-gray-600 text-sm leading-relaxed mb-2">
                                {{ $defaultAddress->address_line1 }}<br>
                                @if($defaultAddress->address_line2) {{ $defaultAddress->address_line2 }}<br> @endif
                                {{ $defaultAddress->city }}, {{ $defaultAddress->state }} {{ $defaultAddress->postal_code }}<br>
                                {{ $defaultAddress->country }}
                            </p>
                            <p class="text-gray-600 text-sm">Phone: {{ $defaultAddress->phone }}</p>
                        </div>
                    @else
                        <div class="text-gray-500 text-sm">
                            No default address set. <a href="{{ route('user.address') }}" class="text-indigo-600 hover:underline">Add one now</a>.
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div id="editProfileModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-lg mx-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-900">Edit Personal Information</h2>
            <button onclick="closeModal('editProfileModal')" class="text-gray-500 hover:text-black">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form action="{{ route('user.account.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                    <input type="text" name="phone" value="{{ $user->phone }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeModal('editProfileModal')" class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">Cancel</button>
                <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">Save Changes</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('fixed')) {
            event.target.classList.add('hidden');
        }
    }
</script>
@endsection
