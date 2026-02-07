@extends('layouts.app')

@section('title', 'Sign Up | Perfume Store')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-xl border border-gray-100 relative overflow-hidden">
       
        
        <div class="text-center">
            <h2 class="mt-2 text-4xl font-serif font-bold text-gray-900 tracking-tight">Create Account</h2>
            <p class="mt-2 text-sm text-gray-600">
                Already have an account? <a href="{{ url('/login') }}" class="font-medium text-[#c0863d] hover:text-[#a36b26] transition-colors">Sign in here</a>
            </p>
        </div>
        
        <form class="mt-8 space-y-6" action="{{ route('signup.post') }}" method="POST">
            @csrf
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="rounded-md bg-red-50 p-4 mb-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-400"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">There were problems with your input</h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <input id="name" name="name" type="text" autocomplete="name" required value="{{ old('name') }}" class="block w-full pl-10 pr-3 py-3 border @error('name') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-[#c0863d] focus:border-[#c0863d] @enderror rounded-lg sm:text-sm transition-all" placeholder="John Doe">
                    </div>
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <input id="email" name="email" type="email" autocomplete="email" required value="{{ old('email') }}" class="block w-full pl-10 pr-3 py-3 border @error('email') border-red-300 text-red-900 placeholder-red-300 focus:ring-red-500 focus:border-red-500 @else border-gray-300 focus:ring-[#c0863d] focus:border-[#c0863d] @enderror rounded-lg sm:text-sm transition-all" placeholder="you@example.com">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password" name="password" type="password" autocomplete="new-password" required class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-[#c0863d] focus:border-[#c0863d] sm:text-sm transition-all" placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password')" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-[#c0863d] focus:outline-none transition-colors">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="block w-full pl-10 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-[#c0863d] focus:border-[#c0863d] sm:text-sm transition-all" placeholder="••••••••">
                    </div>
                </div>
            </div>

            <div class="flex items-center">
                <input id="terms" name="terms" type="checkbox" required class="h-4 w-4 text-[#c0863d] focus:ring-[#c0863d] border-gray-300 rounded cursor-pointer">
                <label for="terms" class="ml-2 block text-sm text-gray-900 cursor-pointer">
                    I agree to the <a href="#" class="text-[#c0863d] hover:underline">Terms of Service</a> and <a href="#" class="text-[#c0863d] hover:underline">Privacy Policy</a>
                </label>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-[#c0863d] hover:bg-[#a36b26] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c0863d] shadow-lg shadow-[#c0863d]/30 transition-all duration-300 transform hover:-translate-y-0.5">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-user-plus text-[#e6c08d] group-hover:text-white transition-colors"></i>
                    </span>
                    Create Account
                </button>
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