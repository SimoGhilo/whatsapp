<?php

namespace App\Http\Controllers;

use App\Http\Controllers\contactController;
use App\Http\Controllers\messageController;
use Illuminate\Http\Request;


class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();
        $chosenContactId = $request->input('chosen_contact_id');

        // Call the index method of contactController
        $contacts = app(contactController::class)->index();
    
        // Fetch messages with the chosen contact
        $messages = $chosenContactId
            ? $user->messages($chosenContactId)->get()
            : collect(); // Empty collection if no contact is selected
    
        return view('home', compact('messages', 'chosenContactId', 'contacts'));
    }
}

