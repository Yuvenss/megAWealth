<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['user_id', 'is_admin'];

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
        'user_id' => 'string',
    ];

    // default nya dia id jadi diganti dulu biar gak error pas login
    protected $primaryKey = 'user_id';

    // fix undefined array key "password" pas Auth::attempt
    public function getAuthPassword() {
        return $this->user_password;
    }

    public function cart_items () {
        return $this->hasMany(Cart_item::class, 'user_id', 'user_id');
    }

    public function transactions () {
        return $this->hasMany(Transaction::class, 'user_id', 'user_id');
    }
}
