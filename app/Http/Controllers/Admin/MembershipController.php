<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MembershipPlan;
use App\Models\RefillRequest;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        // Calculate stats
        $totalMembers = User::whereNotNull('membership_type')->count();
        $activeSubscriptions = User::whereNotNull('membership_type')
            ->where('membership_end_date', '>=', now())
            ->count();
        
        // Revenue logic placeholder
        $monthlyRevenue = 0; 

        // Get Plans from DB
        $plans = MembershipPlan::all()->map(function($plan) {
            return [
                'id' => $plan->id,
                'name' => $plan->name,
                'price' => $plan->price,
                'description' => $plan->description,
                'refills' => $plan->refill_slots . ' Slots',
                'benefits' => $plan->benefits ?? [],
                'status' => ucfirst($plan->status),
                'users_count' => User::where('membership_type', $plan->name)->count(),
                'created_at' => $plan->created_at->format('Y-m-d'),
            ];
        });

        return view('admin.membership.membership', compact('totalMembers', 'activeSubscriptions', 'monthlyRevenue', 'plans'));
    }

    public function viewPlan($id)
    {
        $planModel = MembershipPlan::findOrFail($id);
        
        $plan = [
            'id' => $planModel->id,
            'name' => $planModel->name,
            'price' => $planModel->price,
            'description' => $planModel->description,
            'refills' => $planModel->refill_slots,
            'benefits' => $planModel->benefits ?? [],
            'status' => ucfirst($planModel->status),
            'users_count' => User::where('membership_type', $planModel->name)->count(),
            'created_at' => $planModel->created_at->format('M d, Y'),
        ];

        $recentMembers = User::where('membership_type', $planModel->name)
            ->orderBy('membership_start_date', 'desc')
            ->take(5)
            ->get();
        
        return view('admin.membership.view-membership', compact('plan', 'recentMembers'));
    }

    public function refillRequests()
    {
        $requests = RefillRequest::with(['user', 'product.images', 'address'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Stats
        $newRequests = RefillRequest::where('status', 'pending')->count();
        $pendingApproval = RefillRequest::whereIn('status', ['pending', 'processing'])->count();
        $completedToday = RefillRequest::where('status', 'completed')
            ->whereDate('updated_at', today())
            ->count();

        return view('admin.membership.refill-requests', compact('requests', 'newRequests', 'pendingApproval', 'completedToday'));
    }

    public function viewRefillRequest($id)
    {
        $request = RefillRequest::with(['user', 'product.images', 'address'])->findOrFail($id);
        return view('admin.membership.view-refill-request', compact('request'));
    }

    public function updateRefillRequest(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,pickup_scheduled,picked_up,processing,out_for_delivery,completed,cancelled',
            'admin_notes' => 'nullable|string',
        ]);

        $refillRequest = RefillRequest::findOrFail($id);
        
        $dataToUpdate = [
            'status' => $request->status,
        ];

        if ($request->admin_notes) {
            $newNote = $request->admin_notes;
            $timestamp = now()->format('d M Y, h:i A');
            $formattedNote = "[{$timestamp}] {$newNote}";

            $existingNotes = $refillRequest->admin_notes;
            $updatedNotes = $existingNotes ? $existingNotes . "\n\n" . $formattedNote : $formattedNote;
            
            $dataToUpdate['admin_notes'] = $updatedNotes;
        }

        $refillRequest->update($dataToUpdate);

        return redirect()->route('admin.membership.view-refill-request', $id)->with('success', 'Refill request updated successfully.');
    }
}
