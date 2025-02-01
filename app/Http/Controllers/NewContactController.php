<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class NewContactController extends Controller
{
    public function indexNewController(Request $request)
    {
        return view('newContact');
    }

    public function createContact(Request $request)
    {
        // Validate request
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|string|max:12',
        ]);
        
        // Find the authenticated user
        $authUser = Auth::user();
    
        // // Check if the user exists in the users table by email or mobile
        $matchedUser = User::where('email', $validatedData['email'])
            ->orWhere('mobile', $validatedData['mobile'])
            ->first();
    
        if (!$matchedUser) {
            // Flash error to session and keep old inputs
            session()->flash('error', 'No user found with the provided email or mobile.');
            return back()->withInput(); // Return the form with input data preserved
        }

        if ($matchedUser->id == $authUser->id) {
            // Flash error to session and keep old inputs
            session()->flash('error', 'You cannot add yourself as a contact.');
            return back()->withInput(); // Return the form with input data preserved
        }
    
        // // Check if the contact already exists for the current user
        $existingContact = Contact::where('user_id', $authUser->id)
            ->where('contact_id', $matchedUser->id)
            ->first();
    
        if ($existingContact) {
                // Flash error to session and keep old inputs
            session()->flash('error', 'Contact is already part of your list.');
            return back()->withInput(); // Return the form with input data preserved
        }
    

            Contact::create([
                'user_id' => $authUser->id,
                'contact_id' => $matchedUser->id,
            ]);
            
            sleep(1);

            return redirect()->route('dashboard');
    }
}
