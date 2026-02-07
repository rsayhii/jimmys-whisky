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
            @include('site.dashboard.sidebar')

            <!-- Main Content -->
            <div class="w-full lg:w-3/4 space-y-6">
                
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

                <div class="flex justify-between items-center mb-2">
                    <h1 class="text-2xl font-bold text-gray-900">My Addresses</h1>
                    <button onclick="openModal('addAddressModal')" class="bg-black text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition flex items-center gap-2">
                        <i class="fas fa-plus"></i> Add New Address
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @forelse($addresses as $address)
                        <div class="bg-white rounded-xl shadow-sm p-6 {{ $address->is_default ? 'border-2 border-black' : 'border border-gray-100 hover:border-gray-200' }} relative group transition">
                            @if($address->is_default)
                                <div class="absolute top-4 right-4 bg-gray-100 text-gray-600 text-xs font-bold px-2 py-1 rounded">
                                    DEFAULT
                                </div>
                            @endif
                            
                            <div class="flex items-start gap-4 mb-4">
                                <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-600">
                                    <i class="fas fa-{{ strtolower($address->type) == 'home' ? 'home' : (strtolower($address->type) == 'work' ? 'briefcase' : 'map-marker-alt') }}"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900">{{ $address->type }}</h3>
                                    <p class="text-sm text-gray-500">{{ $address->name }}</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm leading-relaxed mb-4">
                                {{ $address->address_line1 }}<br>
                                @if($address->address_line2) {{ $address->address_line2 }}<br> @endif
                                {{ $address->city }}, {{ $address->state }}<br>
                                {{ $address->postal_code }}<br>
                                {{ $address->country }}
                            </p>
                            <p class="text-sm text-gray-600 mb-6">
                                <span class="font-medium text-gray-900">Phone:</span> {{ $address->phone }}
                            </p>
                            <div class="flex justify-between items-center pt-4 border-t border-gray-100">
                                <div class="flex gap-4">
                                    <button onclick="editAddress({{ $address }})" class="text-sm text-indigo-600 font-medium hover:text-indigo-800">Edit</button>
                                    <form action="{{ route('user.address.destroy', $address->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this address?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-600 font-medium hover:text-red-800">Remove</button>
                                    </form>
                                </div>
                                @if(!$address->is_default)
                                    <form action="{{ route('user.address.default', $address->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-sm text-gray-500 hover:text-black">Set as Default</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 text-center py-10 text-gray-500">
                            No addresses found. Click "Add New Address" to add one.
                        </div>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Add Address Modal -->
<div id="addAddressModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-lg mx-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-900">Add New Address</h2>
            <button onclick="closeModal('addAddressModal')" class="text-gray-500 hover:text-black">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form action="{{ route('user.address.store') }}" method="POST">
            @csrf
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                        <select name="type" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                            <option value="Home">Home</option>
                            <option value="Work">Work</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 1</label>
                    <input type="text" name="address_line1" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 2</label>
                    <input type="text" name="address_line2" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <input type="text" name="city" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                        <input type="text" name="state" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                        <input type="text" name="postal_code" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                        <input type="text" name="country" value="India" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_default" value="1" id="is_default" class="h-4 w-4 text-black border border-gray-300 rounded focus:ring-black">
                    <label for="is_default" class="ml-2 block text-sm text-gray-900">Set as default address</label>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeModal('addAddressModal')" class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">Cancel</button>
                <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">Save Address</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Address Modal -->
<div id="editAddressModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg p-6 w-full max-w-lg mx-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-900">Edit Address</h2>
            <button onclick="closeModal('editAddressModal')" class="text-gray-500 hover:text-black">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="editAddressForm" method="POST">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                        <select name="type" id="edit_type" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                            <option value="Home">Home</option>
                            <option value="Work">Work</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                        <input type="text" name="name" id="edit_name" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                    <input type="text" name="phone" id="edit_phone" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 1</label>
                    <input type="text" name="address_line1" id="edit_address_line1" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 2</label>
                    <input type="text" name="address_line2" id="edit_address_line2" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                        <input type="text" name="city" id="edit_city" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">State</label>
                        <input type="text" name="state" id="edit_state" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                        <input type="text" name="postal_code" id="edit_postal_code" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Country</label>
                        <input type="text" name="country" id="edit_country" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-black focus:ring-1 focus:ring-black">
                    </div>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" name="is_default" value="1" id="edit_is_default" class="h-4 w-4 text-black border border-gray-300 rounded focus:ring-black">
                    <label for="edit_is_default" class="ml-2 block text-sm text-gray-900">Set as default address</label>
                </div>
            </div>
            <div class="mt-6 flex justify-end gap-3">
                <button type="button" onclick="closeModal('editAddressModal')" class="px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-lg transition">Cancel</button>
                <button type="submit" class="px-6 py-2 bg-black text-white rounded-lg hover:bg-gray-800 transition">Update Address</button>
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

    function editAddress(address) {
        document.getElementById('editAddressForm').action = '/user-address/' + address.id;
        document.getElementById('edit_type').value = address.type;
        document.getElementById('edit_name').value = address.name;
        document.getElementById('edit_phone').value = address.phone;
        document.getElementById('edit_address_line1').value = address.address_line1;
        document.getElementById('edit_address_line2').value = address.address_line2;
        document.getElementById('edit_city').value = address.city;
        document.getElementById('edit_state').value = address.state;
        document.getElementById('edit_postal_code').value = address.postal_code;
        document.getElementById('edit_country').value = address.country;
        document.getElementById('edit_is_default').checked = address.is_default;
        
        openModal('editAddressModal');
    }

    // Close modal when clicking outside
    window.onclick = function(event) {
        if (event.target.classList.contains('fixed')) {
            event.target.classList.add('hidden');
        }
    }
</script>
@endsection
