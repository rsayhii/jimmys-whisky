<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        .active {
            background: linear-gradient(to right, #facc15, #f97316);
            color: #111827;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white p-6 shadow-xl">
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold tracking-wide">
                <span class="text-yellow-400">Admin</span> Panel
            </h2>
            <p class="text-sm text-gray-400 mt-1">E-Commerce Dashboard</p>
        </div>

        <ul class="space-y-2 text-sm">
            <li>
                <a href="/admin/dashboard"
                   class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fas fa-chart-line"></i>
                    Dashboard
                </a>
            </li>

            <li>
                <a href="/admin/products"
                   class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fas fa-box"></i>
                    Products
                </a>
            </li>

            <li>
                <a href="/admin/orders"
                   class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fas fa-shopping-cart"></i>
                    Orders
                </a>
            </li>

            <li>
                <a href="/admin/users"
                   class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fas fa-users"></i>
                    Users
                </a>
            </li>

            <li class="pt-6 border-t border-gray-700">
                <a href="/admin/login"
                   class="flex items-center gap-3 p-3 rounded-lg hover:bg-red-600 transition text-red-400 hover:text-white">
                    <i class="fas fa-sign-out-alt"></i>
                    Logout
                </a>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Top Navbar -->
        <header class="bg-white shadow-sm px-6 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-gray-800">
                @yield('title', 'Dashboard')
            </h1>

            <div class="flex items-center gap-4">
                <span class="text-gray-600 text-sm">Hello, Admin</span>
                <img src="https://i.pravatar.cc/40"
                     class="w-10 h-10 rounded-full border" alt="Admin">
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="text-center text-sm text-gray-500 py-3">
            © {{ date('Y') }} Admin Panel. All rights reserved.
        </footer>
    </div>

</div>

</body>
</html>
