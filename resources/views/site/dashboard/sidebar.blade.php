<aside class="w-full lg:w-1/4">
    <div class="bg-white rounded-xl shadow-sm p-6 sticky top-24">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xl font-bold text-gray-600">
                {{ auth()->user() ? substr(auth()->user()->name, 0, 2) : 'RJ' }}
            </div>
            <div>
                <h3 class="font-bold text-gray-900">{{ auth()->user()->name ?? 'Rahul Jain' }}</h3>
                <p class="text-sm text-gray-500">{{ auth()->user()->email ?? 'rahul.jain@example.com' }}</p>
            </div>
        </div>

        <nav class="space-y-1">
            <a href="/user-account" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('user-account') ? 'bg-black text-white font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-black' }} transition">
                <i class="fas fa-user w-5"></i>
                My Account
            </a>
            <a href="/user-order" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('user-order') ? 'bg-black text-white font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-black' }} transition">
                <i class="fas fa-box w-5"></i>
                My Orders
            </a>
            <a href="/user-membership" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('user-membership') ? 'bg-black text-white font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-black' }} transition">
                <i class="fas fa-crown w-5"></i>
                My Membership
            </a>
            <a href="/user-refill-requests" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('user-refill-requests*') || request()->is('user-new-refill-request') || request()->is('user-view-refill-request') ? 'bg-black text-white font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-black' }} transition">
                <i class="fas fa-sync w-5"></i>
                Refill Requests
            </a>
            <a href="/wishlist" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('wishlist') ? 'bg-black text-white font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-black' }} transition">
                <i class="fas fa-heart w-5"></i>
                Wishlist
            </a>
            <a href="/user-address" class="flex items-center gap-3 px-4 py-3 rounded-lg {{ request()->is('user-address') ? 'bg-black text-white font-medium' : 'text-gray-600 hover:bg-gray-50 hover:text-black' }} transition">
                <i class="fas fa-map-marker-alt w-5"></i>
                Addresses
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mt-4 pt-4 border-t border-gray-100">
                @csrf
                <button type="submit" class="flex w-full items-center gap-3 px-4 py-3 rounded-lg text-red-600 hover:bg-red-50 transition">
                    <i class="fas fa-sign-out-alt w-5"></i>
                    Log Out
                </button>
            </form>
        </nav>
    </div>
</aside>