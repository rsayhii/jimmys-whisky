@extends('admin.layout')

@section('content')
<div class="-m-6 bg-gray-50 min-h-screen pb-20" x-data="productForm()">
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <!-- Sticky Header -->
        <div class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-gray-200 px-8 py-4 mb-8 transition-all duration-300 shadow-sm">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 font-serif">Edit Product</h1>
                    <p class="text-sm text-gray-500">Update product details and inventory.</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.products.products') }}" class="px-5 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300 shadow-sm transition-all duration-200">
                        Discard
                    </a>
                    <button type="submit" name="status" value="Draft" class="px-5 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-medium text-indigo-600 hover:bg-indigo-50 hover:border-indigo-200 shadow-sm transition-all duration-200">
                        Update Draft
                    </button>
                    <button type="submit" name="status" value="Published" class="px-6 py-2.5 bg-black text-white rounded-xl text-sm font-medium hover:bg-gray-800 shadow-lg shadow-gray-200 hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                        Update Product
                    </button>
                </div>
            </div>
        </div>

        <div class="px-6 max-w-7xl mx-auto">
            
            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="mb-8 bg-red-50 border border-red-200 rounded-xl p-4 text-sm text-red-600">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Left Column: Product Details -->
                <div class="lg:col-span-2 space-y-8">
                    
                    <!-- Basic Information -->
                    <div class="bg-white p-8 rounded-3xl shadow-[0_2px_20px_rgba(0,0,0,0.04)] border border-gray-100 hover:shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition-shadow duration-300">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-3 border-b border-gray-100 pb-4">
                            <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center">
                                <i class="fas fa-info-circle text-gray-400"></i>
                            </div>
                            Basic Information
                        </h3>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Perfume Name</label>
                                <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="e.g. Ocean Breeze Pour Homme" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white placeholder-gray-400" required>
                                @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Brand</label>
                                    <input type="text" name="brand" value="{{ old('brand', $product->brand) }}" placeholder="e.g. Chanel, Dior" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white placeholder-gray-400">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">SKU</label>
                                    <input type="text" name="sku" value="{{ old('sku', $product->sku) }}" placeholder="e.g. PRF-001" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white placeholder-gray-400">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Short Description</label>
                                <textarea name="short_description" rows="3" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-white placeholder-gray-400" placeholder="Brief summary of the product...">{{ old('short_description', $product->short_description) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                                <div class="border border-gray-200 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-black/5 focus-within:border-black transition-all bg-white">
                                    <textarea id="editor" name="description" rows="5" class="w-full p-4 outline-none resize-none text-gray-600 bg-transparent" placeholder="Describe the scent profile, inspiration, and key characteristics...">{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Fragrance Profile -->
                    <div class="bg-white p-8 rounded-3xl shadow-[0_2px_20px_rgba(0,0,0,0.04)] border border-gray-100 hover:shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition-shadow duration-300">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-3 border-b border-gray-100 pb-4">
                            <div class="w-8 h-8 rounded-lg bg-indigo-50 flex items-center justify-center">
                                <i class="fas fa-wind text-indigo-500"></i>
                            </div>
                            Fragrance Profile
                        </h3>
                        <div class="space-y-8">
                            <!-- Pyramid Visual Removed -->
                            <!-- Scent Family and Concentration removed -->

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-3">Gender</label>
                                    <div class="flex gap-4 p-1.5 bg-gray-100 rounded-xl w-fit">
                                        @foreach(['Men', 'Women', 'Unisex'] as $g)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="gender" value="{{ $g }}" class="peer sr-only" {{ old('gender', $product->gender ?? 'Unisex') == $g ? 'checked' : '' }}>
                                            <div class="px-4 py-2 rounded-lg text-sm font-medium text-gray-500 peer-checked:bg-white peer-checked:text-black peer-checked:shadow-sm transition-all">{{ $g }}</div>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                 <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Best Season</label>
                                     <div class="relative">
                                        <select name="season" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black appearance-none bg-white cursor-pointer">
                                            <option value="">Select Season</option>
                                            @foreach(['All Seasons', 'Summer', 'Winter', 'Spring', 'Autumn'] as $season)
                                                <option value="{{ $season }}" {{ old('season', $product->season) == $season ? 'selected' : '' }}>{{ $season }}</option>
                                            @endforeach
                                        </select>
                                        <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Image -->
                     <div class="bg-white p-8 rounded-3xl shadow-[0_2px_20px_rgba(0,0,0,0.04)] border border-gray-100 hover:shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition-shadow duration-300">
                        <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-pink-50 flex items-center justify-center">
                                    <i class="fas fa-image text-pink-500"></i>
                                </div>
                                Product Images
                            </h3>
                        </div>
                        
                        <!-- Main Image -->
                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-gray-700 mb-4">Main Image</label>
                            <div class="flex flex-col md:flex-row gap-8 items-start">
                                 <!-- Preview Area -->
                                 <div class="w-full md:w-1/3 aspect-square bg-gray-50 rounded-2xl border border-gray-200 flex items-center justify-center overflow-hidden relative group">
                                    <img x-ref="preview" src="{{ $product->image ? asset('storage/' . $product->image) : '' }}" class="w-full h-full object-cover {{ $product->image ? '' : 'hidden' }}" alt="Preview">
                                    <div class="text-center p-6" x-show="!hasImage">
                                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                            <i class="fas fa-camera text-gray-400 text-xl"></i>
                                        </div>
                                        <span class="text-xs text-gray-400">No image selected</span>
                                    </div>
                                    <button type="button" x-show="hasImage" @click="removeImage" class="absolute top-2 right-2 w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center text-red-500 hover:bg-red-50 transition-colors">
                                        <i class="fas fa-trash-alt text-xs"></i>
                                    </button>
                                </div>

                                <!-- Upload Area -->
                                <div class="flex-1 w-full">
                                    <div class="border-2 border-dashed border-gray-200 rounded-2xl p-8 hover:bg-gray-50 hover:border-black/20 transition-all cursor-pointer text-center group relative">
                                        <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" @change="handleImageUpload">
                                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-white group-hover:shadow-md transition-all duration-300">
                                            <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl group-hover:text-black transition-colors"></i>
                                        </div>
                                        <p class="font-bold text-gray-900 mb-2">Click to upload or drag and drop</p>
                                        <p class="text-sm text-gray-500">SVG, PNG, JPG or GIF (max. 2MB)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gallery Images -->
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-4">Gallery Images</label>
                            
                            <!-- Existing Gallery Images -->
                            @if($product->images->count() > 0)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                                @foreach($product->images as $img)
                                <div class="relative group aspect-square rounded-xl overflow-hidden border border-gray-200" id="gallery-img-{{ $img->id }}">
                                    <img src="{{ asset('storage/' . $img->image_path) }}" class="w-full h-full object-cover">
                                    <button type="button" @click="removeGalleryImage({{ $img->id }})" class="absolute top-2 right-2 w-8 h-8 bg-white/90 backdrop-blur-sm rounded-full shadow-sm flex items-center justify-center text-red-500 hover:bg-red-50 transition-all opacity-0 group-hover:opacity-100">
                                        <i class="fas fa-trash-alt text-xs"></i>
                                    </button>
                                </div>
                                @endforeach
                            </div>
                            @endif

                            <!-- Hidden inputs for deleted images -->
                            <template x-for="id in deletedImageIds" :key="id">
                                <input type="hidden" name="delete_images[]" :value="id">
                            </template>

                            <!-- Gallery Upload -->
                            <div class="border-2 border-dashed border-gray-200 rounded-2xl p-6 hover:bg-gray-50 hover:border-black/20 transition-all cursor-pointer text-center group relative">
                                <input type="file" name="images[]" multiple class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" @change="handleGalleryUpload">
                                <div class="flex items-center justify-center gap-3">
                                    <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center group-hover:bg-white group-hover:shadow-sm transition-all">
                                        <i class="fas fa-images text-gray-400 group-hover:text-black transition-colors"></i>
                                    </div>
                                    <div class="text-left">
                                        <p class="font-bold text-gray-900 text-sm">Add more images</p>
                                        <p class="text-xs text-gray-500">Select multiple files</p>
                                    </div>
                                </div>
                            </div>

                            <!-- New Images Preview -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-6" x-show="newImages.length > 0">
                                <template x-for="(img, index) in newImages" :key="index">
                                    <div class="relative aspect-square rounded-xl overflow-hidden border border-gray-200 group">
                                        <img :src="img.url" class="w-full h-full object-cover">
                                        <button type="button" @click="removeNewImage(index)" class="absolute top-2 right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center shadow-sm opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-600">
                                            <i class="fas fa-times text-xs"></i>
                                        </button>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Variants (Bottle Size) - Removed -->

                </div>

                <!-- Right Column: Pricing & Organization -->
                <div class="space-y-8">
                    
                    <!-- Pricing -->
                    <div class="bg-white p-6 rounded-3xl shadow-[0_2px_20px_rgba(0,0,0,0.04)] border border-gray-100 hover:shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition-shadow duration-300">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-3 border-b border-gray-100 pb-4">
                            <div class="w-8 h-8 rounded-lg bg-green-50 flex items-center justify-center">
                                <i class="fas fa-tag text-green-500"></i>
                            </div>
                            Pricing
                        </h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Base Price (₹)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-serif">₹</span>
                                    <input type="number" name="price" value="{{ old('price', $product->price) }}" placeholder="0.00" class="w-full border border-gray-200 rounded-xl p-3.5 pl-8 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all" required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Discounted Price (₹)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-serif">₹</span>
                                    <input type="number" name="discount_price" value="{{ old('discount_price', $product->discount_price) }}" placeholder="0.00" class="w-full border border-gray-200 rounded-xl p-3.5 pl-8 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all">
                                </div>
                            </div>
                            <div class="flex items-center gap-3 py-2 px-3 bg-gray-50 rounded-xl">
                                <input type="hidden" name="taxable" value="0">
                                <input type="checkbox" name="taxable" value="1" {{ old('taxable', $product->taxable) ? 'checked' : '' }} class="w-5 h-5 text-black rounded border-gray-300 focus:ring-black accent-black">
                                <span class="text-sm text-gray-600 font-medium">Charge Tax on this product</span>
                            </div>
                        </div>
                    </div>

                    <!-- Organization -->
                    <div class="bg-white p-6 rounded-3xl shadow-[0_2px_20px_rgba(0,0,0,0.04)] border border-gray-100 hover:shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition-shadow duration-300">
                        <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-3 border-b border-gray-100 pb-4">
                            <div class="w-8 h-8 rounded-lg bg-purple-50 flex items-center justify-center">
                                <i class="fas fa-layer-group text-purple-500"></i>
                            </div>
                            Organization
                        </h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                                <div class="relative">
                                    <select name="status" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black appearance-none bg-white cursor-pointer">
                                        @foreach(['Published' => 'publish', 'Draft' => 'inactive', 'Scheduled' => 'scheduled', 'Inactive' => 'inactive'] as $label => $val)
                                            <option value="{{ $label }}" {{ old('status', $product->status) == $val || old('status', ucfirst($product->status)) == $label ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                                <div class="relative">
                                    <select name="category" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black appearance-none bg-white cursor-pointer">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->name }}" {{ old('category', $product->category) == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Collection</label>
                                <div class="relative">
                                    <select name="collection" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black appearance-none bg-white cursor-pointer">
                                        <option value="">Select Collection</option>
                                        @foreach([
                                            'Aura Edition', 'Bliss Collection', 'Celeste Edition', 'Divine Essence', 'Eclipse Noir',
                                            'Flair Signature', 'Golden Mist', 'Heavenly Oud', 'Iconic Essence', 'Jade Bloom',
                                            'Karma Elixir', 'Luxe Legend', 'Mystic Amber', 'Noble Scent', 'Opulence Reserve',
                                            'Pure Intense', 'Queen’s Veil', 'Royal Oud', 'Silk Seduction', 'Timeless Essence',
                                            'Urban Pulse', 'Velvet Noir', 'Whisper Bloom', 'Xquisite Elixir', 'Youth Desire',
                                            'Zenith Aura'
                                        ] as $col)
                                            <option value="{{ $col }}" {{ old('collection', $product->collection) == $col ? 'selected' : '' }}>{{ $col }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Tags</label>
                                <input type="text" name="tags" value="{{ old('tags', $product->tags) }}" placeholder="e.g. #floral, #summer, #gift" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all">
                                <p class="text-xs text-gray-400 mt-2">Separate tags with commas</p>
                            </div>
                             <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Total Stock (Override Variants)</label>
                                <input type="number" name="qty" value="{{ old('qty', $product->qty) }}" placeholder="Qty" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Alpine.js for interactions -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<style>
    .ck-editor__editable {
        min-height: 300px;
    }
    /* Restore default styling for CKEditor content */
    .ck-editor__editable h1 { font-size: 2em; font-weight: bold; margin-top: 0.67em; margin-bottom: 0.67em; }
    .ck-editor__editable h2 { font-size: 1.5em; font-weight: bold; margin-top: 0.83em; margin-bottom: 0.83em; }
    .ck-editor__editable h3 { font-size: 1.17em; font-weight: bold; margin-top: 1em; margin-bottom: 1em; }
    .ck-editor__editable ul { list-style-type: disc; padding-left: 2em; margin-top: 1em; margin-bottom: 1em; }
    .ck-editor__editable ol { list-style-type: decimal; padding-left: 2em; margin-top: 1em; margin-bottom: 1em; }
    .ck-editor__editable blockquote { border-left: 4px solid #ccc; padding-left: 1em; font-style: italic; margin-left: 0; }
</style>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'underline', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' }
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });

    function productForm() {
        return {
            hasImage: {{ $product->image ? 'true' : 'false' }},
            deletedImageIds: [],
            newImages: [],
            galleryFiles: [],

            handleImageUpload(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.$refs.preview.src = e.target.result;
                        this.$refs.preview.classList.remove('hidden');
                        this.hasImage = true;
                    };
                    reader.readAsDataURL(file);
                }
            },
            
            removeImage() {
                this.$refs.preview.src = '';
                this.$refs.preview.classList.add('hidden');
                this.hasImage = false;
                // Also clear the file input
                const input = document.querySelector('input[name="image"]');
                if (input) input.value = '';
            },

            handleGalleryUpload(event) {
                const input = event.target;
                const files = Array.from(input.files);
                
                if (files.length === 0) return;

                // Append new files to the existing array
                this.galleryFiles = this.galleryFiles.concat(files);
                
                // Update the file input with the complete list
                const dataTransfer = new DataTransfer();
                this.galleryFiles.forEach(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;

                // Append previews
                files.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        this.newImages.push({ url: e.target.result });
                    };
                    reader.readAsDataURL(file);
                });
            },

            removeGalleryImage(id) {
                if(confirm('Are you sure you want to remove this image?')) {
                    this.deletedImageIds.push(id);
                    document.getElementById('gallery-img-' + id).style.display = 'none';
                }
            },

            removeNewImage(index) {
                // Remove from preview array
                this.newImages.splice(index, 1);
                // Remove from files array
                this.galleryFiles.splice(index, 1);
                
                // Update the input
                const input = document.querySelector('input[name="images[]"]');
                const dataTransfer = new DataTransfer();
                this.galleryFiles.forEach(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;
            }
        }
    }
</script>
@endsection
