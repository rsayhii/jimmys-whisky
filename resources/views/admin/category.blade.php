@extends('admin.layout')

@section('content')
<div class="bg-gray-50 min-h-screen p-6">
    
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Category Management</h1>
            <p class="text-sm text-gray-500 mt-1">Create, update, and manage your product categories.</p>
        </div>
        <button onclick="openModal('createModal')" class="inline-flex items-center justify-center px-4 py-2 bg-black text-white rounded-lg text-sm font-medium hover:bg-gray-800 shadow-sm transition-all duration-200">
            <i class="fas fa-plus mr-2"></i> Add Category
        </button>
    </div>

    <!-- Categories Table -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                    <tr>
                        <th class="px-6 py-4 font-medium">ID</th>
                        <th class="px-6 py-4 font-medium">Name</th>
                        <th class="px-6 py-4 font-medium">Description</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    {{-- Mock Data Loop (Replace with actual backend data) --}}
                    @php
                        $categories = $categories ?? [
                            (object)['id' => 1, 'name' => 'Perfumes', 'description' => 'Luxury fragrances for men and women', 'status' => 'Active'],
                            (object)['id' => 2, 'name' => 'Attar', 'description' => 'Traditional non-alcoholic oils', 'status' => 'Active'],
                            (object)['id' => 3, 'name' => 'Gift Sets', 'description' => 'Perfect gifts for loved ones', 'status' => 'Inactive'],
                        ];
                    @endphp

                    @forelse($categories as $category)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 text-gray-900 font-semibold">#{{ $category->id }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900">{{ $category->name }}</td>
                        <td class="px-6 py-4 truncate max-w-xs">{{ $category->description }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $category->status === 'Active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                <span class="w-1.5 h-1.5 mr-1.5 rounded-full {{ $category->status === 'Active' ? 'bg-green-600' : 'bg-red-600' }}"></span>
                                {{ $category->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button onclick='openViewModal(@json($category))' class="p-2 text-gray-400 hover:text-blue-600 transition-colors" title="View">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick='openEditModal(@json($category))' class="p-2 text-gray-400 hover:text-indigo-600 transition-colors" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="confirmDelete({{ $category->id }})" class="p-2 text-gray-400 hover:text-red-600 transition-colors" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <i class="fas fa-folder-open text-4xl text-gray-300 mb-3"></i>
                                <p>No categories found. Create one to get started.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination (Mock) -->
        <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex items-center justify-between">
            <span class="text-sm text-gray-500">Showing 1 to 3 of 3 results</span>
            <div class="flex gap-2">
                <button class="px-3 py-1 text-sm border border-gray-300 rounded-md bg-white text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>Previous</button>
                <button class="px-3 py-1 text-sm border border-gray-300 rounded-md bg-white text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>Next</button>
            </div>
        </div>
    </div>

</div>

<!-- CREATE MODAL -->
<div id="createModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('createModal')"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal Panel -->
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-plus text-green-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900" id="modal-title">Create New Category</h3>
                            <div class="mt-4 space-y-4">
                                <form id="createForm" action="#" method="POST">
                                    @csrf
                                    <!-- Name Input -->
                                    <div>
                                        <label for="create_name" class="block text-sm font-medium text-gray-700">Category Name</label>
                                        <input type="text" name="name" id="create_name" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2.5" placeholder="e.g. Summer Collection" required>
                                    </div>
                                    
                                    <!-- Description Input -->
                                    <div>
                                        <label for="create_description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="create_description" rows="3" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2.5" placeholder="Brief description..."></textarea>
                                    </div>

                                    <!-- Status -->
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Status</label>
                                        <select name="status" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2.5">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="submit" form="createForm" class="inline-flex w-full justify-center rounded-lg bg-black px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-800 sm:ml-3 sm:w-auto transition-colors">Create Category</button>
                    <button type="button" onclick="closeModal('createModal')" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-colors">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div id="editModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('editModal')"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <i class="fas fa-edit text-blue-600"></i>
                        </div>
                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg font-semibold leading-6 text-gray-900">Edit Category</h3>
                            <div class="mt-4 space-y-4">
                                <form id="editForm" action="#" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" id="edit_id" name="id">
                                    
                                    <div>
                                        <label for="edit_name" class="block text-sm font-medium text-gray-700">Category Name</label>
                                        <input type="text" name="name" id="edit_name" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2.5" required>
                                    </div>
                                    
                                    <div>
                                        <label for="edit_description" class="block text-sm font-medium text-gray-700">Description</label>
                                        <textarea name="description" id="edit_description" rows="3" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2.5"></textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Status</label>
                                        <select name="status" id="edit_status" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2.5">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="submit" form="editForm" class="inline-flex w-full justify-center rounded-lg bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto transition-colors">Update Changes</button>
                    <button type="button" onclick="closeModal('editModal')" class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-colors">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- VIEW MODAL -->
<div id="viewModal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="closeModal('viewModal')"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                
                <!-- Modal Header -->
                <div class="relative h-32 bg-gradient-to-r from-gray-900 to-gray-800">
                    <div class="absolute inset-0 flex items-end p-6">
                        <h3 id="view_title" class="text-2xl font-bold text-white">Category Name</h3>
                    </div>
                    <button onclick="closeModal('viewModal')" class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center bg-white/10 hover:bg-white/20 text-white rounded-full transition-colors backdrop-blur-sm">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <div class="bg-white px-6 py-6 space-y-4">
                    <div class="flex items-center justify-between">
                        <span id="view_status" class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Active</span>
                        <span id="view_id" class="text-sm text-gray-400 font-mono">ID: #123</span>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 uppercase tracking-wider">Description</h4>
                        <p id="view_description" class="mt-2 text-gray-700 leading-relaxed">
                            No description provided.
                        </p>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex gap-4 text-sm text-gray-500">
                        <div class="flex items-center gap-2">
                            <i class="far fa-clock"></i> Created: <span class="text-gray-900 font-medium">Jan 12, 2024</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-layer-group"></i> Products: <span class="text-gray-900 font-medium">24</span>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <button type="button" onclick="closeModal('viewModal')" class="inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:w-auto transition-colors">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // General Modal Functions
    function openModal(modalId) {
        document.getElementById(modalId).classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    }

    function closeModal(modalId) {
        document.getElementById(modalId).classList.add('hidden');
        document.body.style.overflow = 'auto'; // Restore scrolling
    }

    // Edit Modal Logic
    function openEditModal(category) {
        // Populate form fields
        document.getElementById('edit_id').value = category.id;
        document.getElementById('edit_name').value = category.name;
        document.getElementById('edit_description').value = category.description;
        document.getElementById('edit_status').value = category.status;
        
        // Open Modal
        openModal('editModal');
    }

    // View Modal Logic
    function openViewModal(category) {
        // Populate View fields
        document.getElementById('view_title').innerText = category.name;
        document.getElementById('view_description').innerText = category.description || "No description provided.";
        document.getElementById('view_id').innerText = "ID: #" + category.id;
        
        // Status styling
        const statusSpan = document.getElementById('view_status');
        statusSpan.innerText = category.status;
        if(category.status === 'Active') {
            statusSpan.className = "px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800";
        } else {
            statusSpan.className = "px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800";
        }

        openModal('viewModal');
    }

    // Delete Confirmation (Simple Alert for now)
    function confirmDelete(id) {
        if(confirm("Are you sure you want to delete this category? This action cannot be undone.")) {
            // In a real app, submit a form or make an AJAX call
            alert("Delete action triggered for ID: " + id);
        }
    }

    // Close modals on Escape key
    document.addEventListener('keydown', function(event) {
        if (event.key === "Escape") {
            ['createModal', 'editModal', 'viewModal'].forEach(id => closeModal(id));
        }
    });
</script>

@endsection