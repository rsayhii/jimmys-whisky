@extends('admin.layout')

@section('content')
<div class="-m-6 bg-gray-50 min-h-screen pb-20" x-data="productForm()">
    <div class="sticky top-0 z-20 bg-white/80 backdrop-blur-md border-b border-gray-200 px-8 py-4 mb-8 transition-all duration-300 shadow-sm">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 font-serif">Edit Product</h1>
                <p class="text-sm text-gray-500">Update details for your fragrance.</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.products.products') }}" class="px-5 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300 shadow-sm transition-all duration-200">
                    Back to List
                </a>
                <button class="px-6 py-2.5 bg-black text-white rounded-xl text-sm font-medium hover:bg-gray-800 shadow-lg shadow-gray-200 hover:shadow-xl transition-all duration-200 transform hover:-translate-y-0.5">
                    Save Changes
                </button>
            </div>
        </div>
    </div>

    <div class="px-6 max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white p-8 rounded-3xl shadow-[0_2px_20px_rgba(0,0,0,0.04)] border border-gray-100 transition-shadow duration-300">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 flex items-center gap-3 border-b border-gray-100 pb-4">
                        <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center">
                            <i class="fas fa-info-circle text-gray-400"></i>
                        </div>
                        Basic Information
                    </h3>
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Perfume Name</label>
                            <input type="text" value="Ocean Breeze Pour Homme" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Brand</label>
                                <input type="text" value="Dior" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">SKU</label>
                                <input type="text" value="PRF-001" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all bg-gray-50/50 focus:bg-white">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                            <div class="border border-gray-200 rounded-xl overflow-hidden bg-white">
                                <textarea rows="5" class="w-full p-4 outline-none resize-none text-gray-600 bg-transparent">A fresh aquatic scent with citrus top notes and a warm musky base.</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-[0_2px_20px_rgba(0,0,0,0.04)] border border-gray-100 transition-shadow duration-300">
                    <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                        <h3 class="text-lg font-bold text-gray-900 flex items-center gap-3">
                            <div class="w-8 h-8 rounded-lg bg-pink-50 flex items-center justify-center">
                                <i class="fas fa-image text-pink-500"></i>
                            </div>
                            Product Image
                        </h3>
                    </div>
                    <div class="flex flex-col md:flex-row gap-8 items-start">
                        <div class="w-full md:w-1/3 aspect-square bg-gray-50 rounded-2xl border border-gray-200 flex items-center justify-center overflow-hidden relative group">
                            <img x-ref="preview" src="{{ asset('assets/collection/1.jpg') }}" class="w-full h-full object-cover" alt="Preview">
                            <button @click="removeImage" class="absolute top-2 right-2 w-8 h-8 bg-white rounded-full shadow-md flex items-center justify-center text-red-500 hover:bg-red-50 transition-colors">
                                <i class="fas fa-trash-alt text-xs"></i>
                            </button>
                        </div>
                        <div class="flex-1 w-full">
                            <div class="border-2 border-dashed border-gray-200 rounded-2xl p-8 hover:bg-gray-50 hover:border-black/20 transition-all cursor-pointer text-center group relative">
                                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" @change="handleImageUpload">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:bg-white group-hover:shadow-md transition-all duration-300">
                                    <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl group-hover:text-black transition-colors"></i>
                                </div>
                                <p class="font-bold text-gray-900 mb-2">Click to replace or drag and drop</p>
                                <p class="text-sm text-gray-500">SVG, PNG, JPG or GIF (max. 800x800px)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl shadow-[0_2px_20px_rgba(0,0,0,0.04)] border border-gray-100 transition-shadow duration-300">
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
                        <div class="flex flex-col md:flex-row gap-4 items-end bg-gray-50/50 p-4 rounded-xl border border-gray-100">
                            <div class="w-full md:w-1/3">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Volume</label>
                                <div class="relative">
                                    <select class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black bg-white">
                                        <option selected>100ml</option>
                                        <option>50ml</option>
                                        <option>200ml</option>
                                    </select>
                                    <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none">
                                        <i class="fas fa-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3">
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">Price Adjustment (₹)</label>
                                <input type="number" value="0" class="w-full border border-gray-200 rounded-xl p-3 outline-none focus:ring-2 focus:ring-black/5 focus:border-black bg-white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-8">
                <div class="bg-white p-6 rounded-3xl shadow-[0_2px_20px_rgba(0,0,0,0.04)] border border-gray-100 transition-shadow duration-300">
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
                                    <option selected>Published</option>
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
                                    <option selected>Luxury Perfumes</option>
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
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Tags</label>
                            <input type="text" value="#fresh, #aquatic, #summer" class="w-full border border-gray-200 rounded-xl p-3.5 outline-none focus:ring-2 focus:ring-black/5 focus:border-black transition-all">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script>
    function productForm() {
        return {
            hasImage: true,
            variants: [1],
            handleImageUpload(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (ev) => {
                        this.$refs.preview.src = ev.target.result;
                        this.hasImage = true;
                    };
                    reader.readAsDataURL(file);
                }
            },
            removeImage() {
                this.$refs.preview.src = '';
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
