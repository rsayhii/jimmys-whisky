<!-- Mobile Sidebar Toggle -->
<div class="w-full lg:hidden mb-8">
    <button type="button" onclick="toggleDashboardSidebar()" class="group w-full flex items-center justify-between bg-white p-4 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] hover:shadow-[0_8px_25px_-5px_rgba(192,134,61,0.15),0_10px_10px_-5px_rgba(0,0,0,0.04)] border border-gray-50 transition-all duration-300">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 rounded-xl bg-[#c0863d]/5 flex items-center justify-center text-[#c0863d] group-hover:bg-[#c0863d] group-hover:text-white transition-all duration-300">
                <i class="fas fa-stream text-lg"></i>
            </div>
            <div class="text-left">
                <span class="block text-[10px] font-bold tracking-[0.2em] text-gray-400 group-hover:text-[#c0863d] uppercase transition-colors duration-300">Menu</span>
                <span class="block text-lg font-serif text-gray-900">Dashboard</span>
            </div>
        </div>
        <div class="w-10 h-10 rounded-full border border-gray-100 flex items-center justify-center text-gray-300 group-hover:border-[#c0863d] group-hover:text-[#c0863d] transition-all duration-300">
            <i class="fas fa-chevron-right text-xs transform group-hover:translate-x-0.5 transition-transform"></i>
        </div>
    </button>
</div>

<!-- Backdrop -->
<div id="dashboard-sidebar-backdrop" onclick="toggleDashboardSidebar()" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[40] hidden opacity-0 transition-opacity duration-300 lg:hidden"></div>

<!-- Sidebar Drawer -->
<aside id="dashboard-sidebar" class="fixed inset-y-0 left-0 z-[50] w-[280px] bg-white lg:bg-transparent shadow-2xl lg:shadow-none transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out lg:static lg:w-1/4 h-full lg:h-auto overflow-y-auto lg:overflow-visible">
    
    <!-- Mobile Drawer Header -->
    <div class="flex items-center justify-between p-5 border-b border-gray-100 lg:hidden bg-white sticky top-0 z-10">
        <span class="font-serif text-lg font-bold text-gray-900">Menu</span>
        <button onclick="toggleDashboardSidebar()" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-50 text-gray-400 hover:bg-red-50 hover:text-red-500 transition-colors">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="bg-white lg:rounded-xl lg:shadow-sm p-6 lg:sticky lg:top-24 h-full lg:h-auto">
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

<script>
    function toggleDashboardSidebar() {
        const sidebar = document.getElementById('dashboard-sidebar');
        const backdrop = document.getElementById('dashboard-sidebar-backdrop');
        const body = document.body;
        
        if (sidebar.classList.contains('-translate-x-full')) {
            // Open
            sidebar.classList.remove('-translate-x-full');
            backdrop.classList.remove('hidden');
            setTimeout(() => backdrop.classList.remove('opacity-0'), 10);
            body.classList.add('overflow-hidden');
        } else {
            // Close
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('opacity-0');
            setTimeout(() => backdrop.classList.add('hidden'), 300);
            body.classList.remove('overflow-hidden');
        }
    }
</script>