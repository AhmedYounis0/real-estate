<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $title = "Messages";
        $contacts = Contact::all();
        return view('admin.contact.index', compact('title', 'contacts'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->back();
    }

}
