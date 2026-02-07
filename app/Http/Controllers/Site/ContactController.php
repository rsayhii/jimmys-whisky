<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactInquiry;
use App\Models\Contact;           // ← make sure this is imported

class ContactController extends Controller
{
    /**
     * Display the contact form page
     */
    public function index()
    {
        return view('site.contact');   // ← must match your blade file name: contact.blade.php
    }

    /**
     * Handle contact form submission (POST)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|min:2|max:100',
            'email'   => 'required|email:rfc,dns|max:100',
            'subject' => 'required|string|in:order,product,return,other',
            'message' => 'required|string|min:10|max:5000',
        ]);

        // Store in database
        Contact::create([
            'name'       => $validated['name'],
            'email'      => $validated['email'],
            'subject'    => $validated['subject'],
            'message'    => $validated['message'],
            'ip_address' => $request->ip(),
        ]);

        

        return back()
            ->with('success', 'Thank you! Your message has been sent successfully. We will get back to you soon.');
    }
}