<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $query = Coupon::query();

        // Search
        if ($request->has('search') && $request->search) {
            $searchTerm = $request->search;
            $query->where('code', 'like', "%{$searchTerm}%");
        }

        // Filter by status
        if ($request->has('status') && $request->status && $request->status !== 'all') {
            if ($request->status === 'expired') {
                 $query->whereDate('expiry_date', '<', now());
            } else {
                 $query->where('status', $request->status);
            }
        }

        $coupons = $query->latest()->paginate(10);
        
        // Calculate stats
        $activeCoupons = Coupon::where('status', 'active')->whereDate('expiry_date', '>=', now())->count();
        $totalRedeemed = Coupon::sum('used_count');
        $expiringSoon = Coupon::where('status', 'active')
            ->whereDate('expiry_date', '>=', now())
            ->whereDate('expiry_date', '<=', now()->addDays(7))
            ->count();

        return view('admin.coupons', compact('coupons', 'activeCoupons', 'totalRedeemed', 'expiringSoon'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:coupons,code',
            'discount_type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric|min:0',
            'min_spend' => 'nullable|numeric|min:0',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'expiry_date' => 'required|date|after:today',
            'status' => 'required|in:active,inactive',
        ]);

        Coupon::create($validated);

        return redirect()->back()->with('success', 'Coupon created successfully.');
    }

    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $validated = $request->validate([
            'code' => 'required|string|unique:coupons,code,' . $coupon->id,
            'discount_type' => 'required|in:percentage,fixed',
            'value' => 'required|numeric|min:0',
            'min_spend' => 'nullable|numeric|min:0',
            'max_discount_amount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'expiry_date' => 'required|date',
            'status' => 'required|in:active,inactive',
        ]);

        $coupon->update($validated);

        return redirect()->back()->with('success', 'Coupon updated successfully.');
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return redirect()->back()->with('success', 'Coupon deleted successfully.');
    }
}
