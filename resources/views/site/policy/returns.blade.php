@extends('layouts.app')

@section('title', 'Returns & Exchanges')

@section('content')
<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 lg:px-8 max-w-4xl">
        <div class="bg-white rounded-xl shadow-sm p-8 md:p-12">
            <h1 class="text-3xl md:text-4xl font-serif text-[#c0863d] mb-8 border-b border-gray-100 pb-4">Returns & Exchanges</h1>
            
            <div class="prose prose-stone max-w-none text-gray-600">
                <p class="mb-4">We want you to be completely satisfied with your purchase from Jimmy's Whiskey.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">1. Return Policy</h3>
                <p>Due to the nature of our products (fragrances and personal care), we accept returns only if:</p>
                <ul class="list-disc pl-5 space-y-2">
                    <li>The product received is damaged or defective.</li>
                    <li>The wrong product was delivered.</li>
                    <li>The product is unopened and in its original packaging (seal intact).</li>
                </ul>
                <p class="mt-2">Returns must be initiated within 48 hours of delivery.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">2. Exchange Process</h3>
                <p>To initiate an exchange, please contact our support team at support@jimmyswhiskey.com with your order details and photos of the product (if damaged/incorrect). We will arrange a reverse pickup.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">3. Refunds</h3>
                <p>Once we receive and inspect the returned item, we will notify you of the approval or rejection of your refund. If approved, the refund will be processed to your original method of payment within 5-7 business days.</p>

                <h3 class="text-xl font-bold text-gray-900 mt-8 mb-4">4. Non-Returnable Items</h3>
                <p>Used products, samples, and items purchased during clearance sales are not eligible for return or exchange.</p>
            </div>
        </div>
    </div>
</div>
@endsection
