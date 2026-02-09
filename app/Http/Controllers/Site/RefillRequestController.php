<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\RefillRequest;

class RefillRequestController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $requests = RefillRequest::where('user_id', $user->id)
            ->with(['product.images'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('site.dashboard.refill-requests', compact('requests'));
    }

    public function create()
    {
        $user = Auth::user();
        
        // Fetch products the user has previously ordered
        // We look for OrderItems belonging to orders placed by the user
        $orderedProducts = OrderItem::whereHas('order', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->with('product')
          ->get()
          ->pluck('product')
          ->unique('id')
          ->values();

        // Fetch user's addresses
        $addresses = Address::where('user_id', $user->id)->get();
        
        return view('site.dashboard.new-refill-request', compact('orderedProducts', 'addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required',
            'pickup_date' => 'required|date',
            'address_id' => 'required|exists:addresses,id',
            'user_notes' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();

        // Check if user has refill balance
        if ($user->refill_requests_balance <= 0) {
            return back()->with('error', 'You do not have enough refill request balance.');
        }

        RefillRequest::create([
            'user_id' => $user->id,
            'product_id' => $request->product_id,
            'address_id' => $request->address_id,
            'size' => $request->size,
            'pickup_date' => $request->pickup_date,
            'status' => 'pending',
            'user_notes' => $request->user_notes,
        ]);

        // Deduct balance
        $user->decrement('refill_requests_balance');

        return redirect()->route('user.refill-requests')->with('success', 'Refill request submitted successfully.');
    }

    public function show($id)
    {
        $user = Auth::user();
        $request = RefillRequest::where('user_id', $user->id)
            ->with(['product.images', 'address'])
            ->findOrFail($id);
            
        return view('site.dashboard.view-refill-request', compact('request'));
    }

    public function updateNote(Request $request, $id)
    {
        $request->validate([
            'user_notes' => 'required|string|max:1000',
        ]);

        $user = Auth::user();
        $refillRequest = RefillRequest::where('user_id', $user->id)->findOrFail($id);

        if (in_array($refillRequest->status, ['completed', 'cancelled'])) {
            return back()->with('error', 'Cannot update notes for completed or cancelled requests.');
        }

        $newNote = $request->user_notes;
        $timestamp = now()->format('d M Y, h:i A');
        $formattedNote = "[{$timestamp}] {$newNote}";

        $existingNotes = $refillRequest->user_notes;
        $updatedNotes = $existingNotes ? $existingNotes . "\n\n" . $formattedNote : $formattedNote;

        $refillRequest->update([
            'user_notes' => $updatedNotes,
        ]);

        return back()->with('success', 'Note added successfully.');
    }
}
