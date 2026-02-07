@extends('admin.layout')

@section('content')
<div class="bg-gray-50 min-h-screen p-6">
    
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Contact Queries</h1>
            <p class="text-sm text-gray-500 mt-1">View and manage customer inquiries and messages.</p>
        </div>
    </div>

    <!-- Session Messages -->
    @if (session('success'))
        <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-r">
            <p class="font-medium">{{ session('success') }}</p>
        </div>
    @endif

    <!-- Queries Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4 font-medium">ID</th>
                        <th class="px-6 py-4 font-medium">Customer</th>
                        <th class="px-6 py-4 font-medium">Subject</th>
                        <th class="px-6 py-4 font-medium">Date</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($queries as $query)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-gray-900 font-semibold">#{{ $query->id }}</td>
                        <td class="px-6 py-4">
                            <div class="font-medium text-gray-900">{{ $query->name }}</div>
                            <div class="text-xs text-gray-500">{{ $query->email }}</div>
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ ucfirst($query->subject) }}
                        </td>
                        <td class="px-6 py-4 text-gray-500">{{ $query->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button onclick='openViewModal(@json($query))' class="p-2 text-gray-400 hover:text-[#c0863d] transition-colors" title="View Details">
                                <i class="fas fa-eye"></i>
                            </button>
                            <form action="{{ route('admin.contact-query.destroy', $query->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this query?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-gray-400 hover:text-red-600 transition-colors" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-inbox text-4xl text-gray-300 mb-3"></i>
                                <p>No queries found.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        @if($queries->hasPages())
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
            {{ $queries->links() }}
        </div>
        @endif
    </div>

</div>

<!-- VIEW MODAL -->
<div id="viewModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('viewModal')"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all w-full max-w-2xl">
                
                <!-- Header -->
                <div class="bg-gradient-to-r from-gray-50 to-white px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <i class="fas fa-envelope-open-text text-[#c0863d]"></i>
                        Message Details
                    </h3>
                    <button onclick="closeModal('viewModal')" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Body -->
                <div class="px-6 py-6 space-y-6">
                    <!-- Sender Info -->
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-full bg-[#c0863d]/10 flex items-center justify-center text-[#c0863d] text-xl font-bold flex-shrink-0">
                            <span id="view-initials">AS</span>
                        </div>
                        <div class="flex-1">
                            <h4 class="text-base font-bold text-gray-900" id="view-name">Amit Sharma</h4>
                            <div class="text-sm text-gray-500 flex flex-col sm:flex-row sm:gap-4 mt-1">
                                <span class="flex items-center gap-1"><i class="fas fa-envelope text-xs"></i> <span id="view-email">amit@example.com</span></span>
                            </div>
                        </div>
                        <div class="text-xs text-gray-400 bg-gray-50 px-2 py-1 rounded" id="view-date">2023-10-25</div>
                    </div>

                    <!-- Subject & Message -->
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Subject</label>
                        <p class="text-gray-900 font-medium mb-4 border-b border-gray-200 pb-2" id="view-subject">Order Delay</p>
                        
                        <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Message</label>
                        <p class="text-gray-700 leading-relaxed text-sm whitespace-pre-wrap" id="view-message">Content goes here...</p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 px-6 py-4 flex flex-row-reverse gap-3">
                    <a href="#" id="reply-link" class="inline-flex w-full justify-center rounded-lg bg-[#c0863d] px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-[#a36b26] sm:w-auto transition-colors gap-2 items-center">
                        <i class="fas fa-reply"></i> Reply via Email
                    </a>
                    <button type="button" class="inline-flex w-full justify-center rounded-lg bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:w-auto transition-colors" onclick="closeModal('viewModal')">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openViewModal(data) {
        // Populate Data
        document.getElementById('view-name').textContent = data.name;
        document.getElementById('view-email').textContent = data.email;
        // Phone is removed from schema
        
        // Format date
        const date = new Date(data.created_at);
        document.getElementById('view-date').textContent = date.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
        
        document.getElementById('view-subject').textContent = data.subject.charAt(0).toUpperCase() + data.subject.slice(1);
        document.getElementById('view-message').textContent = data.message;
        
        // Initials
        const initials = data.name.split(' ').map(n => n[0]).join('').substring(0, 2).toUpperCase();
        document.getElementById('view-initials').textContent = initials;
        
        // Mailto Link
        document.getElementById('reply-link').href = `mailto:${data.email}?subject=Re: ${data.subject}`;

        // Show Modal
        const modal = document.getElementById('viewModal');
        modal.classList.remove('hidden');
        // Small delay to allow display:block to apply before opacity transition
        setTimeout(() => {
            modal.querySelector('.backdrop-blur-sm').classList.remove('opacity-0');
            modal.querySelector('.transform').classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
        }, 10);
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        
        // Add transition classes for closing
        modal.querySelector('.backdrop-blur-sm').classList.add('opacity-0');
        modal.querySelector('.transform').classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
        
        // Wait for transition to finish
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>
@endsection
