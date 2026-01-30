<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Perfume App')</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header / Navbar -->
     {{-- Header Section --}}
    @include('site.components.header')

     

    <!-- Main Content -->
    <main class=" mx-auto ">
        @yield('content')
    </main>

    
    {{-- footer section --}}
    @include('site.components.footer')


    
</body>
</html>
