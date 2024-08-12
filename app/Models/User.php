<?php

namespace App\Models;

use App\Notifications\AdminPasswordChangeNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ChangeAgentUserPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;


//    public function SendPasswordResetNotification($token)
//    {
//        $this->notify(new ChangeAgentUserPasswordNotification($token));
//    }
    public function sendPasswordResetNotification($token)
    {
        if ($this->role === 'agent' || $this->role === 'user') {
            $this->notify(new ChangeAgentUserPasswordNotification($token));
        } elseif ($this->role === 'admin') {
            $this->notify(new AdminPasswordChangeNotification($token));
        }
        // Additional roles can be handled similarly.
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

}
