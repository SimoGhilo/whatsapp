<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class contactController extends Controller
{
    public function index()
    {
        // TODO: Replace contacts with line below when authentication and auth are implemented
       // Contact::where('user_id', auth()->id())->get();
       return  Contact::where('user_id', 1)->get();
        
    }
}
