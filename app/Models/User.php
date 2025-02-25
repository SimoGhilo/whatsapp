<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'profile_picture',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
    public function messages($contactId)
    {
        return $this->hasMany(Message::class)
            ->where(function ($query) use ($contactId) {
                $query->where('user_id', $this->id)
                      ->where('contact_id', $contactId);
            })
            ->orWhere(function ($query) use ($contactId) {
                $query->where('user_id', $contactId)
                      ->where('contact_id', $this->id);
            });
    }

    public function chosenContact($contactId)
    {
        $contact = $this->contacts()->where('contact_id', $contactId)->first();
    
        // Return the user associated with the contact_id
        return $contact ? $contact->contact : null;
    }
    
}
