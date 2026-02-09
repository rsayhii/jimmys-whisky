@extends('layouts.app')

@section('title', 'Shipping Policy')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
        <div class="bg-white rounded-xl shadow-sm p-8 md:p-12">
            <h1 class="text-3xl md:text-4xl font-serif text-[#c0863d] mb-8 border-b border-gray-100 pb-4">Shipping Policy</h1>
            
            <div class="prose prose-stone max-w-none text-gray-600">
                <p class="mb-4">At Jimmy's Whiskey, we strive to deliver your premium fragrances with the utmost care and efficiency.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">1. Shipping Areas</h3>
                <p>We currently ship to all major cities and towns across India. Please enter your pincode at checkout to verify delivery availability in your area.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">2. Delivery Timelines</h3>
                <ul class="list-disc pl-5 space-y-2">
                    <li><strong>Metro Cities:</strong> 2-4 business days</li>
                    <li><strong>Tier 2 Cities:</strong> 4-6 business days</li>
                    <li><strong>Rest of India:</strong> 5-8 business days</li>
                </ul>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">3. Shipping Charges</h3>
                <p>We offer free shipping on all orders above ₹999. For orders below this amount, a nominal shipping fee of ₹99 will be applied.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">4. Order Tracking</h3>
                <p>Once your order is dispatched, you will receive a tracking number via email and SMS. You can track your package on our website or the courier partner's portal.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">5. Damaged Packages</h3>
                <p>If you receive a package that appears to be tampered with or damaged, please do not accept it. Contact our customer support immediately at support@jimmyswhiskey.com.</p>
            </div>
        </div>
    </div>
</div>
@endsection
