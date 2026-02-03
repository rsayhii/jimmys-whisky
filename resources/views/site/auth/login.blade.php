@extends('layouts.app')

@section('title', 'Login | Perfume Store')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100 relative overflow-hidden">
        
        
        <div class="text-center">
            <h2 class="mt-2 text-4xl font-serif font-bold text-gray-900 tracking-tight">Welcome Back</h2>
            <p class="mt-2 text-sm text-gray-600">
                Or <a href="{{ url('/signup') }}" class="font-medium text-[#c0863d] hover:text-[#a36b26] transition-colors">create a new account</a>
            </p>
        </div>
        
        <form class="mt-8 space-y-6" action="#" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:ring-[#c0863d] focus:border-[#c0863d] sm:text-sm transition-all" placeholder="you@example.com">
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-[#c0863d] focus:border-[#c0863d] sm:text-sm transition-all" placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-[#c0863d] focus:outline-none transition-colors">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-[#c0863d] focus:ring-[#c0863d] border-gray-300 rounded cursor-pointer">
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900 cursor-pointer">Remember me</label>
                </div>

                <div class="text-sm">
                    <a href="#" class="font-medium text-[#c0863d] hover:text-[#a36b26] transition-colors">Forgot your password?</a>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-[#c0863d] hover:bg-[#a36b26] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c0863d] shadow-lg shadow-[#c0863d]/30 transition-all duration-300 transform hover:-translate-y-0.5">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-sign-in-alt text-[#e6c08d] group-hover:text-white transition-colors"></i>
                    </span>
                    Sign in
                </button>
            </div>
            
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>

                <div class="mt-6">
                    <a href="#" class="w-full inline-flex justify-center items-center py-2.5 px-4 border border-gray-300 rounded-lg shadow-sm bg-white hover:bg-gray-50 text-sm font-medium text-gray-700 transition-all duration-300 transform hover:-translate-y-0.5 hover:shadow-md group">
                        <i class="fab fa-google text-red-500 mr-2 text-lg group-hover:scale-110 transition-transform"></i> 
                        <span>Google</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(id) {
        const input = document.getElementById(id);
        const icon = event.currentTarget.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection