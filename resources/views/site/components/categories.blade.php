{{-- resources/views/site/components/categories.blade.php --}}

<style>
    .categories-title {
        font-family: 'Playfair Display', serif;
        letter-spacing: 0.15em;
    }
</style>

<section id="categories" class="categories-section py-8 bg-white w-full px-8 md:px-0">
    <div class="container mx-auto text-center mb-10">
       <h2 class="categories-title text-3xl font-semibold tracking-widest">Premium Selections</h2>
    </div>

    <div class="categories-grid container mx-auto flex flex-wrap justify-center gap-4 ">
        {{-- First Column --}}
        <div class="category-column flex flex-col gap-4">
         
            <div class="category-card overflow-hidden rounded-lg shadow-lg">
                <a href="/collection" >
                    <img src="{{ asset('assets/category/perfume.jpg') }}" alt="Perfume" class="w-full h-auto object-cover">
                </a>
            </div>
            <div class="category-card overflow-hidden rounded-lg shadow-lg">
                <a href="/collection" >
                    <img src="{{ asset('assets/category/gift set.jpg') }}" alt="Gift Set" class="w-full h-auto object-cover">
                </a>
            </div>
            </a>
        </div>

        {{-- Second Column --}}
        <div class="category-column flex flex-col gap-4">
            
            <div class="category-card overflow-hidden rounded-lg shadow-lg">
                <a href="/collection" >
                    <img src="{{ asset('assets/category/aatar.jpg') }}" alt="Aatar" class="w-full h-auto object-cover">
                </a>
            </div>
            <div class="category-card overflow-hidden rounded-lg shadow-lg">
                <a href="/collection" >
                    <img src="{{ asset('assets/category/dakhoon.jpg') }}" alt="Dakhoon" class="w-full h-auto object-cover">
                </a>
            </div>
           
        </div>
    </div>
</section>
