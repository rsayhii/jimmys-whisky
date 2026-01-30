
@extends('layouts.app') 

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Product Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

<section style="background-color: white;">
  <section class="max-w-7xl mx-auto px-6 py-12">

    <div class="max-w-7xl grid grid-cols-1 lg:grid-cols-2 gap-12">

      <!-- LEFT IMAGE SECTION -->
      <div>
        <!-- Main Image -->
        <div class="border rounded-lg overflow-hidden">
          <img id="mainImage"
              src="https://cdn.shopify.com/s/files/1/0069/4471/8937/files/diva1.jpg?v=1769606443?width=720"
              class="w-full object-cover">
        </div>

        <!-- Thumbnails -->
        <div class="flex gap-3 mt-4">
          <img onclick="changeImage(this)"
              src="https://cdn.shopify.com/s/files/1/0069/4471/8937/files/diva1.jpg?v=1769606443?width=720"
              class="w-20 h-20 object-cover border cursor-pointer rounded-md">

          <img onclick="changeImage(this)"
              src="https://cdn.shopify.com/s/files/1/0069/4471/8937/files/diva1.jpg?v=1769606443?width=720"
              class="w-20 h-20 object-cover border cursor-pointer rounded-md">

          <img onclick="changeImage(this)"
              src="https://cdn.shopify.com/s/files/1/0069/4471/8937/files/diva1.jpg?v=1769606443?width=720"
              class="w-20 h-20 object-cover border cursor-pointer rounded-md">

          <img onclick="changeImage(this)"
              src="https://cdn.shopify.com/s/files/1/0069/4471/8937/files/diva1.jpg?v=1769606443?width=720"
              class="w-20 h-20 object-cover border cursor-pointer rounded-md">
        </div>
      </div>

      <!-- RIGHT CONTENT -->
      <div>
        <h1 class="text-3xl font-semibold">
          Lattafa Dalal Eau De Parfum For Women
        </h1>

        <div class="mt-3 text-lg">
          <span class="line-through text-gray-400">Rs. 5,000.00</span>
          <span class="ml-2 text-black font-semibold">Rs. 2,950.00</span>
          <span class="ml-2 text-red-500 text-sm">Save Rs. 2,050.00</span>
        </div>

        <p class="text-sm text-gray-500 mt-1">
          Tax included. Shipping calculated at checkout.
        </p>

        <!-- EMI -->
        <div class="mt-4 border rounded-md p-3 flex items-center gap-3 hidden">
          <span class="bg-green-600 text-white text-sm px-2 py-1 rounded">
            ₹983/month
          </span>
          <span class="text-sm">(3 months)</span>
          <button class="ml-auto border px-3 py-1 text-sm rounded">
            Buy on EMI
          </button>
        </div>

        <!-- SIZE -->
        <div class="mt-6">
          <p class="font-medium mb-2">SIZE</p>
          <button class="border px-4 py-2 rounded">100ml</button>
        </div>

        <!-- FEATURES -->
        <ul class="mt-6 space-y-2 text-sm text-gray-700">
          <li>✔ 100% Authentic & Genuine Products</li>
          <li>✔ Free Delivery in 3 to 5 Days</li>
          <li>✔ Easy Returns & Exchange</li>
          <li>✔ Free Gifts With Every Order</li>
          <li class="text-orange-500">● Low stock - 8 items left</li>
        </ul>

        <!-- BUTTONS -->
        <div class="mt-8 space-y-3">
          <button class="w-full border rounded-full py-3 font-medium">
            ADD TO CART
          </button>
          <button class="w-full bg-black text-white rounded-full py-3 font-medium">
            BUY IT NOW
          </button>
        </div>

        <!-- PICKUP -->
        <p class="mt-6 text-sm text-green-600">
          ✔ Pickup available at Fc Office <br>
          <span class="text-gray-500">Usually ready in 24 hours</span>
        </p>
      </div>

    </div>

  </section>
</section>

 @include('site.components.bestsellers')

<!-- JS FOR IMAGE SWITCH -->
<script>
  function changeImage(el) {
    document.getElementById("mainImage").src = el.src;
  }
</script>

</body>
</html>


@endsection