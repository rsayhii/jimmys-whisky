@extends('admin.layout')

@section('content')
<div class="-m-6 bg-gray-50 min-h-screen pb-20" x-data="productForm()">
    
    <!-- Sticky Header -->
    <div class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-gray-200 px-8 py-4 mb-8 transition-all duration-300 shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 font-serif">Add New Product</h1>
                <p class="text-sm text-gray-500">Expand your fragrance collection with a new scent.</p>
            </div>
            <div class="flex gap-3">
                <button class="px-5 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300 shadow-sm transition-all duration-200">
                    Discard
                </button>
                <button class="px-5 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-medium text-indigo-600 hover:bg-indigo-50 hover:border-indigo-200 shadow-sm transition-all duration-200">
                    Save Draft
                </button>
                <button class="px-6 py-2.5 bg-black text-white rounded-xl text-sm font-medium hover:bg-gray-800 shadow-lg shadow-gray-200 hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                    Publish Product
                </button>
            </div>
        </div>
    </div>

    <div class="px-6 max-w-7xl mx-auto">
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
                            <input type="text" placeholder="e.g. Ocean Breeze Pour Homme" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white placeholder-gray-400">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Brand</label>
                                <input type="text" placeholder="e.g. Chanel, Dior" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white placeholder-gray-400">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">SKU</label>
                                <input type="text" placeholder="e.g. PRF-001" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white placeholder-gray-400">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                            <div class="border border-gray-200 rounded-xl overflow-hidden focus-within:ring-2 focus-within:ring-black/5 focus-within:border-black transition-all bg-white">
                                <div class="bg-gray-50/80 border-b border-gray-200 p-2.5 flex gap-2 text-gray-500 text-sm">
                                    <button class="p-1.5 hover:bg-white hover:text-black rounded transition-colors"><i class="fas fa-bold"></i></button>
                                    <button class="p-1.5 hover:bg-white hover:text-black rounded transition-colors"><i class="fas fa-italic"></i></button>
                                    <button class="p-1.5 hover:bg-white hover:text-black rounded transition-colors"><i class="fas fa-underline"></i></button>
                                    <div class="w-px h-5 bg-gray-300 mx-1 self-center"></div>
                                    <button class="p-1.5 hover:bg-white hover:text-black rounded transition-colors"><i class="fas fa-list-ul"></i></button>
                                    <button class="p-1.5 hover:bg-white hover:text-black rounded transition-colors"><i class="fas fa-list-ol"></i></button>
                                </div>
                                <textarea rows="5" class="w-full p-4 outline-none resize-none text-gray-600 bg-transparent" placeholder="Describe the scent profile, inspiration, and key characteristics..."></textarea>
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
                        <!-- Pyramid Visual -->
                        <div class="relative py-4 px-4 border border-dashed border-gray-200 rounded-2xl bg-gray-50/50">
                            <div class="absolute -top-3 left-4 bg-white px-2 text-xs font-bold text-gray-400 uppercase tracking-wider">Olfactory Pyramid</div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <div class="relative group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-yellow-400"></span> Top Notes
                                    </label>
                                    <input type="text" placeholder="e.g. Lemon, Bergamot" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-yellow-400/20 focus:border-yellow-400 transition-all bg-white">
                                    <p class="text-xs text-gray-400 mt-2 pl-1">First 15 mins</p>
                                </div>
                                <div class="relative group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-pink-400"></span> Heart Notes
                                    </label>
                                    <input type="text" placeholder="e.g. Jasmine, Rose" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-pink-400/20 focus:border-pink-400 transition-all bg-white">
                                    <p class="text-xs text-gray-400 mt-2 pl-1">Lasts 2-4 hours</p>
                                </div>
                                <div class="relative group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center gap-2">
                                        <span class="w-2 h-2 rounded-full bg-indigo-400"></span> Base Notes
                                    </label>
                                    <input type="text" placeholder="e.g. Vanilla, Musk" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-indigo-400/20 focus:border-indigo-400 transition-all bg-white">
                                    <p class="text-xs text-gray-400 mt-2 pl-1">Lasts 4+ hours</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                             <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Scent Family</label>
                                <div class="relative">
                                    <select class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black appearance-none bg-white cursor-pointer">
                                        <option>Floral</option>
                                        <option>Woody</option>
                                        <option>Oriental</option>
                                        <option>Fresh/Citrus</option>
                                        <option>Fruity</option>
                                        <option>Spicy</option>
                                        <option>Aquatic</option>
                                        <option>Gourmand</option>
                                    </select>
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Concentration</label>
                                <div class="relative">
                                    <select class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black appearance-none bg-white cursor-pointer">
                                        <option>Eau de Parfum (EDP)</option>
                                        <option>Eau de Toilette (EDT)</option>
                                        <option>Parfum / Extrait</option>
                                        <option>Eau de Cologne</option>
                                        <option>Body Mist</option>
                                    </select>
                                    <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">Gender</label>
                                <div class="flex gap-4 p-1.5 bg-gray-100 rounded-xl w-fit">
                                    <label class="cursor-pointer">
                                        <input type="radio" name="gender" class="peer sr-only">
                                        <div class="px-4 py-2 rounded-lg text-sm font-medium text-gray-500 peer-checked:bg-white peer-checked:text-black peer-checked:shadow-sm transition-all">Men</div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="gender" class="peer sr-only">
                                        <div class="px-4 py-2 rounded-lg text-sm font-medium text-gray-500 peer-checked:bg-white peer-checked:text-black peer-checked:shadow-sm transition-all">Women</div>
                                    </label>
                                    <label class="cursor-pointer">
                                        <input type="radio" name="gender" class="peer sr-only" checked>
                                        <div class="px-4 py-2 rounded-lg text-sm font-medium text-gray-500 peer-checked:bg-white peer-checked:text-black peer-checked:shadow-sm transition-all">Unisex</div>
                                    </label>
                                </div>
                            </div>
                             <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Best Season</label>
                                 <div class="relative">
                                    <select class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black appearance-none bg-white cursor-pointer">
                                        <option>All Seasons</option>
                                        <option>Summer</option>
                                        <option>Winter</option>
                                        <option>Spring</option>
                                        <option>Autumn</option>
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
                            Product Image
                        </h3>
                    </div>
                    
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                         <!-- Preview Area -->
                         <div class="w-full md:w-1/3 aspect-square bg-gray-50 rounded-2xl border border-gray-200 flex items-center justify-center overflow-hidden relative group">
                            <img x-ref="preview" src="" class="w-full h-full object-cover hidden" alt="Preview">
                            <div class="text-center p-6" x-show="!hasImage">
                                <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-camera text-gray-400 text-xl"></i>
                                </div>
                                <span class="text-xs text-gray-400">No image selected</span>
                            </div>
                            <button x-show="hasImage" @click="removeImage" class="absolute top-2 right-2 w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center text-red-500 hover:bg-red-50 transition-colors">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>

                        <!-- Upload Area -->
                        <div class="flex-1 w-full">
                            <div class="border-2 border-dashed border-gray-200 rounded-2xl p-8 hover:bg-gray-50 hover:border-black/20 transition-all cursor-pointer text-center group relative">
                                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" @change="handleImageUpload">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-white group-hover:shadow-md transition-all duration-300">
                                    <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl group-hover:text-black transition-colors"></i>
                                </div>
                                <p class="font-bold text-gray-900 mb-2">Click to upload or drag and drop</p>
                                <p class="text-sm text-gray-500">SVG, PNG, JPG or GIF (max. 800x800px)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Variants (Bottle Size) -->
                <div class="bg-white p-8 rounded-3xl shadow-[0_2px_20px_rgba(0,0,0,0.04)] border border-gray-100 hover:shadow-[0_8px_30px_rgba(0,0,0,0.04)] transition-shadow duration-300">
                    <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                        <h3 class="text-lg font-bold text-gray-900 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-teal-50 flex items-center justify-center">
                                <i class="fas fa-flask text-teal-500"></i>
                            </div>
                            Bottle Variants
                        </h3>
                        <button type="button" @click="addVariant" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 flex items-center gap-2">
                            <i class="fas fa-plus-circle"></i> Add Another Size
                        </button>
                    </div>
                    
                    <div class="space-y-4">
                        <template x-for="(variant, index) in variants" :key="index">
                            <div class="flex flex-col md:flex-row gap-4 items-end bg-gray-50/50 p-4 rounded-xl border border-gray-100 group hover:border-gray-200 transition-all">
                                <div class="w-full md:w-1/3">
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Volume</label>
                                    <div class="relative">
                                        <select class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black bg-white appearance-none cursor-pointer">
                                            <option>50ml</option>
                                            <option>100ml</option>
                                            <option>200ml</option>
                                            <option>Tester (10ml)</option>
                                            <option>Refill (200ml)</option>
                                        </select>
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3">
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Price Adjustment (₹)</label>
                                    <input type="number" placeholder="+ 0" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black bg-white">
                                </div>
                                <div class="w-full md:w-1/3">
                                    <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Stock</label>
                                    <input type="number" placeholder="Qty" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black bg-white">
                                </div>
                                <button type="button" @click="removeVariant(index)" class="p-3 text-gray-400 hover:text-red-500 hover:bg-red-50 rounded-lg transition-colors" x-show="variants.length > 1">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </template>
                    </div>
                </div>
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
                                <input type="number" placeholder="0.00" class="w-full border border-gray-200 rounded-xl p-3.5 pl-8 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Discounted Price (₹)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-500 font-serif">₹</span>
                                <input type="number" placeholder="0.00" class="w-full border border-gray-200 rounded-xl p-3.5 pl-8 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all">
                            </div>
                        </div>
                        <div class="flex items-center gap-3 py-2 px-3 bg-gray-50 rounded-xl">
                            <input type="checkbox" checked class="w-5 h-5 text-black rounded border-gray-300 focus:ring-black accent-black">
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
                                <select class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black appearance-none bg-white cursor-pointer">
                                    <option>Published</option>
                                    <option>Draft</option>
                                    <option>Scheduled</option>
                                    <option>Inactive</option>
                                </select>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                            <div class="relative">
                                <select class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black appearance-none bg-white cursor-pointer">
                                    <option>Select Category</option>
                                    <option>Luxury Perfumes</option>
                                    <option>Daily Wear</option>
                                    <option>Attar / Oils</option>
                                    <option>Gift Sets</option>
                                </select>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Collection</label>
                            <div class="relative">
                                <select class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black appearance-none bg-white cursor-pointer">
                                    <option>Select Collection</option>
                                    <option>Summer 2023</option>
                                    <option>Signature Series</option>
                                    <option>Limited Edition</option>
                                </select>
                                <div class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                    <i class="fas fa-chevron-down text-xs"></i>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tags</label>
                            <input type="text" placeholder="e.g. #floral, #summer, #gift" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all">
                            <p class="text-xs text-gray-400 mt-2">Separate tags with commas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Alpine.js for interactions -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    function productForm() {
        return {
            hasImage: false,
            variants: [1], // Start with 1 variant
            
            handleImageUpload(e) {
                const file = e.target.files[0];
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
            },

            addVariant() {
                this.variants.push(this.variants.length + 1);
            },

            removeVariant(index) {
                this.variants.splice(index, 1);
            }
        }
    }
</script>
@endsection
