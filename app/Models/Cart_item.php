<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_item extends Model
{
    use HasFactory;

    protected $guarded = ['added_date'];

    protected $casts = [
        'user_id' => 'string',
        'property_id' => 'string',
    ];
}
