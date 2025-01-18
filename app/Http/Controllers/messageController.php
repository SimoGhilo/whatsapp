<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class messageController extends Controller
{
    public function index()
    {
        // TODO: Replace message with line below when authentication and auth are implemented
       //Contact::where('user_id', auth()->id())->get();
       return Message::whereIn('user_id', [1, 2])->with('contact')->get();

    }
}
