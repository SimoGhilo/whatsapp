<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use \Datetime;

class messageController extends Controller
{
    public function index()
    {
        // TODO: Replace message with line below when authentication and auth are implemented
       //Contact::where('user_id', auth()->id())->get();
       return Message::whereIn('user_id', [1, 2])->with('contact')->get();

    }

    public function postMessage(Request $request){

        // dd($request->all());

        
        // Validate the input
        $validated = $request->validate([
            'textValue' => 'required|string|max:255',
        ]);

        $now = new DateTime();
        


        auth()->user()->messages($request->input('contact_id'))->create([
            'text' => $validated['textValue'],
            'user_id' => auth()->user()->id,
            'contact_id' =>  (int) $request->input('contact_id'),
            'created_at' => $now->getTimestamp()
        ]);

        /** TODO: form does not work, data is posted correctly to the backend but does not insert into DB, text field is not recognised */

        // Redirect back to the previous page to refresh the messages
        return redirect()->back()->with('success', 'Message sent!');
    }
}
