<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewContactController extends Controller
{
    public function indexNewController(Request $request)
    {
       // $user = auth()->user();

        // // Check if the user is authenticated
        // if (!auth()->check()) {
        //     return redirect()->route('login');
        // }

        /** TODO: new contact page, button form does not open neContact view */

        return view('newContact');
    }
}
