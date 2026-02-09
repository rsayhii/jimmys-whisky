@extends('layouts.app')

@section('title', 'Terms & Conditions')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
        <div class="bg-white rounded-xl shadow-sm p-8 md:p-12">
            <h1 class="text-3xl md:text-4xl font-serif text-[#c0863d] mb-8 border-b border-gray-100 pb-4">Terms & Conditions</h1>
            
            <div class="prose prose-stone max-w-none text-gray-600">
                <p class="mb-4">Welcome to Jimmy's Whiskey. By accessing our website and using our services, you agree to comply with and be bound by the following terms and conditions.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">1. Acceptance of Terms</h3>
                <p>By accessing this website, you agree to be bound by these website Terms and Conditions of Use, all applicable laws and regulations, and agree that you are responsible for compliance with any applicable local laws.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">2. Use License</h3>
                <p>Permission is granted to temporarily download one copy of the materials (information or software) on Jimmy's Whiskey's website for personal, non-commercial transitory viewing only.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">3. Disclaimer</h3>
                <p>The materials on Jimmy's Whiskey's website are provided "as is". Jimmy's Whiskey makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">4. Limitations</h3>
                <p>In no event shall Jimmy's Whiskey or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on Jimmy's Whiskey's website.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">5. Revisions and Errata</h3>
                <p>The materials appearing on Jimmy's Whiskey's website could include technical, typographical, or photographic errors. Jimmy's Whiskey does not warrant that any of the materials on its website are accurate, complete, or current.</p>
                
                <p class="mt-8 text-sm text-gray-500">Last updated: {{ date('F Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
