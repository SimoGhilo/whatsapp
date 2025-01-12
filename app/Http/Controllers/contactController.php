<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class contactController extends Controller
{
    public function index()
    {
        // TODO: Replace contacts with line below when authentication and auth are implemented
       // $contacts = Contact::where('user_id', auth()->id())->get();
       $contacts = Contact::where('user_id', 2)->get();
        // Pass the contacts to the view
        return view('home', compact('contacts'));
    }
}
