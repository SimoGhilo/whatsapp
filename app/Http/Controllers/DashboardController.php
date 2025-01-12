<?php

namespace App\Http\Controllers;

use App\Http\Controllers\contactController;
use App\Http\Controllers\messageController;

class DashboardController extends Controller
{
    public function index()
    {
        // Call the index method of contactController
        $contacts = app(contactController::class)->index();

        // Call the index method of messageController
        $messages = app(messageController::class)->index();

        // Combine both datasets and pass them to the view
        return view('home', compact('contacts', 'messages'));
    }
}
