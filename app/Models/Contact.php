<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['user_id', 'contact_id'];

    // The user who owns the contact list
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // The user who is added as a contact
    public function contact()
    {
        return $this->belongsTo(User::class, 'contact_id');
    }
}


