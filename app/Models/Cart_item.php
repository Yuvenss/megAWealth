<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    use HasFactory;

    protected $guarded = [
        'user_id',
        'property_id',
    ];

    protected $casts = [
        'id' => 'string'
    ];
}
