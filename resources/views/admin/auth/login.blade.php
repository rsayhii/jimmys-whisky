<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Perfume Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap');
        
        .font-serif { font-family: 'Playfair Display', serif; }
        .font-sans { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="font-sans bg-gray-900 text-gray-800 antialiased selection:bg-[#c0863d] selection:text-white overflow-hidden relative">

    <!-- Background Elements -->
    <div class="absolute inset-0 z-0">
        <!-- Abstract luxury background -->
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1615634260167-c8cdede054de?q=80&w=2070&auto=format&fit=crop')] bg-cover bg-center opacity-20"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/90 to-gray-900/80"></div>
    </div>

    <!-- Main Container -->
    <div class="min-h-screen flex items-center justify-center relative z-10 px-4 sm:px-6 lg:px-8">
        
        <!-- Login Card -->
        <div class="w-full max-w-md bg-white/10 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl overflow-hidden transform transition-all hover:scale-[1.01] duration-500">
            
            <!-- Header -->
            <div class="px-8 pt-10 pb-6 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-[#c0863d]/20 mb-6 border border-[#c0863d]/30 text-[#c0863d] shadow-[0_0_15px_rgba(192,134,61,0.3)]">
                    <i class="fas fa-user-shield text-2xl"></i>
                </div>
                <h2 class="text-3xl font-serif font-bold text-white tracking-wide">Welcome Back</h2>
                <p class="mt-2 text-sm text-gray-400">Sign in to manage your perfume empire</p>
            </div>

            <!-- Form -->
            <div class="px-8 pb-10">
                <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <!-- Email/Username -->
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-500 group-focus-within:text-[#c0863d] transition-colors duration-300"></i>
                        </div>
                        <input type="text" name="email" value="{{ old('email') }}" required 
                            class="block w-full pl-10 pr-3 py-3 border border-gray-600 rounded-lg leading-5 bg-gray-800/50 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#c0863d] focus:border-[#c0863d] focus:bg-gray-800 transition duration-300 ease-in-out sm:text-sm" 
                            placeholder="Email or Username">
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Password -->
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-500 group-focus-within:text-[#c0863d] transition-colors duration-300"></i>
                        </div>
                        <input type="password" name="password" id="password" required 
                            class="block w-full pl-10 pr-10 py-3 border border-gray-600 rounded-lg leading-5 bg-gray-800/50 text-gray-100 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#c0863d] focus:border-[#c0863d] focus:bg-gray-800 transition duration-300 ease-in-out sm:text-sm" 
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-[#c0863d] focus:outline-none transition-colors duration-300" title="Toggle password visibility">
                            <i class="fas fa-eye" id="password-icon"></i>
                        </button>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember" type="checkbox" class="h-4 w-4 text-[#c0863d] focus:ring-[#c0863d] border-gray-600 rounded bg-gray-700 cursor-pointer">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-400 cursor-pointer hover:text-gray-300 transition-colors">Remember me</label>
                        </div>

                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-[#c0863d] to-[#a36b26] hover:from-[#d49a55] hover:to-[#c0863d] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c0863d] focus:ring-offset-gray-900 transition-all duration-300 shadow-lg shadow-[#c0863d]/20 transform hover:-translate-y-0.5">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <i class="fas fa-sign-in-alt text-[#7c4d15] group-hover:text-white transition-colors"></i>
                            </span>
                            Sign in to Dashboard
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Footer -->
            <div class="px-8 py-4 bg-black/20 text-center border-t border-white/5">
                <p class="text-xs text-gray-500">
                    &copy; {{ date('Y') }} Perfume Admin. Secure Access Only.
                </p>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('password-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
