<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    protected $fillable = ['user_id', 'contact_id', 'text'];

    // The user who sent the messgae
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // The user who received a message
    public function contact()
    {
        return $this->belongsTo(User::class, 'contact_id');
    }
}
