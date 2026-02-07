<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactQueryController extends Controller
{
    public function index()
    {
        $queries = Contact::latest()->paginate(10);
        return view('admin.contact-query', compact('queries'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        
        return back()->with('success', 'Contact query deleted successfully.');
    }
}
