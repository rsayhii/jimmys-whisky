<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->order_number }} - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        
        .font-serif {
            font-family: 'Playfair Display', serif;
        }

        @media print {
            body {
                background-color: white;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            .no-print {
                display: none !important;
            }
            .invoice-container {
                box-shadow: none;
                max-width: 100%;
                margin: 0;
                border: none;
            }
        }
    </style>
</head>
<body class="py-10 px-4">
    
    <div class="invoice-container max-w-4xl mx-auto bg-white shadow-xl rounded-none overflow-hidden border border-gray-200 min-h-[1000px] relative">
        
        <!-- Top Bar -->
        <div class="h-2 bg-[#c0863d] w-full"></div>

        <!-- Header Section -->
        <div class="px-10 py-12 flex justify-between items-start">
            <div>
                <h1 class="text-4xl font-serif font-bold text-gray-900 tracking-tight">Jimmy's whiskey</h1>
                <p class="text-gray-500 mt-2 text-sm tracking-wide uppercase">Premium Fragrances</p>
                <div class="mt-6 text-sm text-gray-600 leading-relaxed">
                    <p>123 Fragrance Avenue</p>
                    <p>Mumbai, Maharashtra 400001</p>
                    <p>India</p>
                    <p class="mt-2"><span class="font-medium text-gray-900">Email:</span> support@perfumeapp.com</p>
                    <p><span class="font-medium text-gray-900">Phone:</span> +91 98765 43210</p>
                </div>
            </div>
            
            <div class="text-right">
                <h2 class="text-5xl font-light text-gray-200 tracking-widest uppercase">Invoice</h2>
                <div class="mt-6 space-y-1">
                    <p class="text-sm text-gray-500">Invoice Number</p>
                    <p class="text-lg font-bold text-gray-900">#{{ $order->order_number }}</p>
                </div>
                <div class="mt-4 space-y-1">
                    <p class="text-sm text-gray-500">Date Issued</p>
                    <p class="text-lg font-bold text-gray-900">{{ $order->created_at->format('M d, Y') }}</p>
                </div>
                <div class="mt-4">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider
                        {{ $order->payment_status == 'paid' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-orange-100 text-orange-800 border border-orange-200' }}">
                        {{ $order->payment_status }}
                    </span>
                </div>
            </div>
        </div>

        <hr class="border-gray-100 mx-10">

        <!-- Billing & Shipping Info -->
        <div class="px-10 py-10 grid grid-cols-2 gap-12">
            <div>
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Bill To</h3>
                <div class="text-gray-900 font-bold text-lg mb-1">{{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</div>
                <div class="text-gray-600 text-sm leading-relaxed">
                    {{ $order->shipping_address_line1 }}<br>
                    @if($order->shipping_address_line2) {{ $order->shipping_address_line2 }}<br> @endif
                    {{ $order->shipping_city }}, {{ $order->shipping_state }}<br>
                    {{ $order->shipping_postal_code }}<br>
                    <div class="mt-2 flex items-center gap-2">
                        <i class="fas fa-phone text-xs text-gray-400"></i> {{ $order->shipping_phone }}
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-envelope text-xs text-gray-400"></i> {{ $order->shipping_email }}
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Payment Method</h3>
                <div class="bg-gray-50 rounded-lg p-4 border border-gray-100 inline-block min-w-[200px]">
                    <p class="font-bold text-gray-900 mb-1 flex items-center gap-2">
                        @if($order->payment_method == 'card')
                            <i class="far fa-credit-card text-[#c0863d]"></i>
                        @elseif($order->payment_method == 'upi')
                            <i class="fas fa-mobile-alt text-[#c0863d]"></i>
                        @else
                            <i class="fas fa-money-bill-wave text-[#c0863d]"></i>
                        @endif
                        {{ ucfirst($order->payment_method) }}
                    </p>
                    <p class="text-xs text-gray-500">Transaction Date: {{ $order->created_at->format('d/m/Y H:i') }}</p>
                </div>
            </div>
        </div>

        <!-- Items Table -->
        <div class="px-10 py-4">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b-2 border-gray-900">
                        <th class="py-4 text-xs font-bold text-gray-900 uppercase tracking-wider w-1/2">Item Description</th>
                        <th class="py-4 text-xs font-bold text-gray-900 uppercase tracking-wider text-center">Qty</th>
                        <th class="py-4 text-xs font-bold text-gray-900 uppercase tracking-wider text-right">Unit Price</th>
                        <th class="py-4 text-xs font-bold text-gray-900 uppercase tracking-wider text-right">Amount</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    @foreach($order->items as $index => $item)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="py-5 pr-4">
                            <p class="font-bold text-gray-900 text-base">{{ $item->product_name }}</p>
                            @if($item->product && $item->product->concentration)
                            <p class="text-gray-500 text-xs mt-1 uppercase tracking-wide">{{ $item->product->concentration }}</p>
                            @endif
                        </td>
                        <td class="py-5 text-center font-medium text-gray-600">{{ $item->quantity }}</td>
                        <td class="py-5 text-right font-medium text-gray-600">₹{{ number_format($item->price, 2) }}</td>
                        <td class="py-5 text-right font-bold text-gray-900">₹{{ number_format($item->price * $item->quantity, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Summary Section -->
        <div class="px-10 py-8 mb-20">
            <div class="flex justify-end">
                <div class="w-1/2 md:w-5/12">
                    <div class="space-y-3 pb-4 border-b border-gray-200">
                        <div class="flex justify-between text-sm text-gray-600">
                            <span class="font-medium">Subtotal</span>
                            <span class="font-medium text-gray-900">₹{{ number_format($order->items->sum(function($item) { return $item->price * $item->quantity; }), 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <span class="font-medium">Shipping</span>
                            <span class="font-medium text-gray-900">Free</span>
                        </div>
                        @if($order->discount_amount > 0)
                        <div class="flex justify-between text-sm text-green-600 bg-green-50 px-2 py-1 -mx-2 rounded">
                            <span class="font-medium">Discount @if($order->coupon_code) <span class="text-xs bg-green-200 px-1 rounded text-green-800 ml-1">{{ $order->coupon_code }}</span> @endif</span>
                            <span class="font-bold">-₹{{ number_format($order->discount_amount, 2) }}</span>
                        </div>
                        @endif
                        <div class="flex justify-between text-sm text-gray-600">
                            <span class="font-medium">Tax (Included)</span>
                            <span class="font-medium text-gray-900">₹0.00</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center pt-4">
                        <span class="text-lg font-bold text-gray-900">Total</span>
                        <span class="text-2xl font-bold text-[#c0863d]">₹{{ number_format($order->total_amount, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="absolute bottom-0 w-full bg-gray-50 border-t border-gray-200 px-10 py-6">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-500">
                <div>
                    <p class="font-bold text-gray-900 mb-1">Terms & Conditions</p>
                    <p>Returns accepted within 7 days of delivery. Keep original packaging.</p>
                </div>
                <div class="text-right">
                    <p class="font-bold text-gray-900 mb-1">Thank you for your business!</p>
                    <p>Perfume App Inc. • Mumbai, India</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Button -->
    <div class="fixed bottom-8 right-8 no-print z-50">
        <button onclick="window.print()" class="bg-[#c0863d] hover:bg-[#a87533] text-white px-6 py-3 rounded-full shadow-lg font-bold transition transform hover:scale-105 flex items-center gap-2 border-2 border-white ring-2 ring-[#c0863d]/20">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
            </svg>
            Print / Download PDF
        </button>
    </div>

</body>
</html>