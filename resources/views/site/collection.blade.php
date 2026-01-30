
@extends('layouts.app') 

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Listing</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white">

<!-- Main Wrapper -->
<div class="max-w-7xl mx-auto px-6 py-10">

  <!-- Top Bar -->
  <div class="flex items-center justify-between mb-8">
    <div class="flex items-center gap-8">
      <div class="flex items-center gap-2 text-sm font-medium">
        <span>Filters</span>
      </div>

      <div class="flex gap-6 text-sm font-medium ">
        <span class="text-orange-600 border-b-2 border-orange-600 pb-1">ALL</span>
        <span class="cursor-pointer">MEN</span>
        <span class="cursor-pointer">WOMEN</span>
        <span class="cursor-pointer">UNISEX</span>
      </div>
    </div>

    <div class="flex items-center gap-4 text-sm">
      <span class="text-gray-500">Showing - 8 out of 91 products</span>
      <select class="border px-3 py-1 rounded text-sm">
        <option>Best selling</option>
        <option>Price: Low to High</option>
        <option>Price: High to Low</option>
      </select>
    </div>
  </div>

  <!-- Content -->
  <div class="grid grid-cols-12 gap-10">

    <!-- Sidebar -->
    <aside class="col-span-3 space-y-8">

      <!-- Occasion -->
      <div>
        <h3 class="font-semibold mb-4 flex justify-between">
          Occasion <span>−</span>
        </h3>
        <div class="space-y-2 text-sm">
          <label class="flex items-center gap-2"><input type="checkbox"> 12 Hours</label>
          <label class="flex items-center gap-2"><input type="checkbox"> Daily Wear</label>
          <label class="flex items-center gap-2"><input type="checkbox"> Date Night</label>
          <label class="flex items-center gap-2"><input type="checkbox"> Home Fragrance</label>
          <label class="flex items-center gap-2"><input type="checkbox"> Luxury Gifting</label>
          <label class="flex items-center gap-2"><input type="checkbox"> Office</label>
          <label class="flex items-center gap-2"><input type="checkbox"> Summer</label>
          <label class="flex items-center gap-2"><input type="checkbox"> Wedding</label>
          <label class="flex items-center gap-2"><input type="checkbox"> Winter</label>
        </div>
      </div>

      <!-- Category -->
      <div>
        <h3 class="font-semibold mb-4 flex justify-between">
          Category/Type <span>−</span>
        </h3>
        <div class="space-y-2 text-sm">
          <label class="flex items-center gap-2"><input type="checkbox"> Attar</label>
          <label class="flex items-center gap-2"><input type="checkbox"> Attar - Gift Pack</label>
          <label class="flex items-center gap-2"><input type="checkbox"> Dakhon</label>
        </div>
      </div>

    </aside>

    <!-- Products -->
    <section class="col-span-9 grid grid-cols-3 gap-8">

      <!-- Product Card -->
      <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
        <a href="/single" class="block">
        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">NEW</span>
        <img src="{{ asset('assets/collection/1.jpg') }}" alt="Image">
        <p class="text-xs text-gray-500 mb-1">UNISEX</p>
        <h3 class="font-semibold text-sm mb-2">ROYAL Non-Alcoholic Attar...</h3>
        <p class="text-sm mb-1">
          <span class="font-semibold">₹1,999</span>
          <span class="line-through text-gray-400 ml-2">₹2,500</span>
          <span class="text-green-600 ml-2">20% Off</span>
        </p>
        <p class="text-xs text-gray-500 mb-4">or ₹666/Month</p>
        </a>
        <button class="w-full bg-black text-white py-2 text-sm">ADD TO CART</button>
      </div>

      <!-- Product Card -->
      <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
        <a href="/single" class="block">
        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">BESTSELLER</span>
        <img src="{{ asset('assets/collection/2.jpg') }}" alt="Image">
        <p class="text-xs text-gray-500 mb-1">WOODY</p>
        <h3 class="font-semibold text-sm mb-2">SILENT STORM Perfume 100ML</h3>
        <p class="text-sm mb-1">
          <span class="font-semibold">₹1,100</span>
          <span class="line-through text-gray-400 ml-2">₹2,200</span>
          <span class="text-green-600 ml-2">50% Off</span>
        </p>
        <p class="text-xs text-gray-500 mb-4">or ₹367/Month</p>
        </a>
        <button class="w-full bg-black text-white py-2 text-sm">ADD TO CART</button>
      </div>

      <!-- Product Card -->
      <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
        <a href="/single" class="block">
        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">BESTSELLER</span>
        <img src="{{ asset('assets/collection/3.jpg') }}" alt="Image">
        <p class="text-xs text-gray-500 mb-1">AQUATIC</p>
        <h3 class="font-semibold text-sm mb-2">BLU Perfume 90ML for Men</h3>
        <p class="text-sm mb-1">
          <span class="font-semibold">₹2,400</span>
          <span class="line-through text-gray-400 ml-2">₹3,000</span>
          <span class="text-green-600 ml-2">20% Off</span>
        </p>
        <p class="text-xs text-gray-500 mb-4">or ₹800/Month</p>
        </a>
        <button class="w-full bg-black text-white py-2 text-sm">ADD TO CART</button>
      </div>
      
            <!-- Product Card -->
      <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
        <a href="/single" class="block">
        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">BESTSELLER</span>
        <img src="{{ asset('assets/collection/4.jpg') }}" alt="Image">
        <p class="text-xs text-gray-500 mb-1">AQUATIC</p>
        <h3 class="font-semibold text-sm mb-2">BLU Perfume 90ML for Men</h3>
        <p class="text-sm mb-1">
          <span class="font-semibold">₹2,400</span>
          <span class="line-through text-gray-400 ml-2">₹3,000</span>
          <span class="text-green-600 ml-2">20% Off</span>
        </p>
        <p class="text-xs text-gray-500 mb-4">or ₹800/Month</p>
        </a>
        <button class="w-full bg-black text-white py-2 text-sm">ADD TO CART</button>
      </div>

            <!-- Product Card -->
      <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
        <a href="/single" class="block">
        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">BESTSELLER</span>
        <img src="{{ asset('assets/collection/5.jpg') }}" alt="Image">
        <p class="text-xs text-gray-500 mb-1">AQUATIC</p>
        <h3 class="font-semibold text-sm mb-2">BLU Perfume 90ML for Men</h3>
        <p class="text-sm mb-1">
          <span class="font-semibold">₹2,400</span>
          <span class="line-through text-gray-400 ml-2">₹3,000</span>
          <span class="text-green-600 ml-2">20% Off</span>
        </p>
        <p class="text-xs text-gray-500 mb-4">or ₹800/Month</p>
        </a>
        <button class="w-full bg-black text-white py-2 text-sm">ADD TO CART</button>
      </div>

            <!-- Product Card -->
      <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
        <a href="/single" class="block">
        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">BESTSELLER</span>
        <img src="{{ asset('assets/collection/6.jpg') }}" alt="Image">
        <p class="text-xs text-gray-500 mb-1">AQUATIC</p>
        <h3 class="font-semibold text-sm mb-2">BLU Perfume 90ML for Men</h3>
        <p class="text-sm mb-1">
          <span class="font-semibold">₹2,400</span>
          <span class="line-through text-gray-400 ml-2">₹3,000</span>
          <span class="text-green-600 ml-2">20% Off</span>
        </p>
        <p class="text-xs text-gray-500 mb-4">or ₹800/Month</p>
        </a>
        <button class="w-full bg-black text-white py-2 text-sm">ADD TO CART</button>
      </div>

            <!-- Product Card -->
      <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
        <a href="/single" class="block">
        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">BESTSELLER</span>
        <img src="{{ asset('assets/collection/7.jpg') }}" alt="Image">
        <p class="text-xs text-gray-500 mb-1">AQUATIC</p>
        <h3 class="font-semibold text-sm mb-2">BLU Perfume 90ML for Men</h3>
        <p class="text-sm mb-1">
          <span class="font-semibold">₹2,400</span>
          <span class="line-through text-gray-400 ml-2">₹3,000</span>
          <span class="text-green-600 ml-2">20% Off</span>
        </p>
        <p class="text-xs text-gray-500 mb-4">or ₹800/Month</p>
        </a>
        <button class="w-full bg-black text-white py-2 text-sm">ADD TO CART</button>
      </div>

     <!-- Product Card -->
      <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
        <a href="/single" class="block">
        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">BESTSELLER</span>
        <img src="{{ asset('assets/collection/8.jpg') }}" alt="Image">
        <p class="text-xs text-gray-500 mb-1">AQUATIC</p>
        <h3 class="font-semibold text-sm mb-2">BLU Perfume 90ML for Men</h3>
        <p class="text-sm mb-1">
          <span class="font-semibold">₹2,400</span>
          <span class="line-through text-gray-400 ml-2">₹3,000</span>
          <span class="text-green-600 ml-2">20% Off</span>
        </p>
        <p class="text-xs text-gray-500 mb-4">or ₹800/Month</p>
        </a>
        <button class="w-full bg-black text-white py-2 text-sm">ADD TO CART</button>
      </div>


      <!-- Product Card -->
      <div class="border p-4 relative bg-white hover:shadow-2xl hover:scale-105 transition-all duration-300 cursor-pointer">
        <a href="/single" class="block">
        <span class="absolute top-2 left-2 bg-orange-500 text-white text-xs px-2 py-1">BESTSELLER</span>
        <img src="{{ asset('assets/collection/9.jpg') }}" alt="Image">
        <p class="text-xs text-gray-500 mb-1">AQUATIC</p>
        <h3 class="font-semibold text-sm mb-2">BLU Perfume 90ML for Men</h3>
        <p class="text-sm mb-1">
          <span class="font-semibold">₹2,400</span>
          <span class="line-through text-gray-400 ml-2">₹3,000</span>
          <span class="text-green-600 ml-2">20% Off</span>
        </p>
        <p class="text-xs text-gray-500 mb-4">or ₹800/Month</p>
        </a>
        <button class="w-full bg-black text-white py-2 text-sm">ADD TO CART</button>
      </div>




      

    </section>

  </div>
</div>

</body>
</html>


@endsection