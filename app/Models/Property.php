<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $primaryKey = 'property_id';

    protected $guarded = ['property_id'];

    protected $casts = [
        'property_id' => 'string'
    ];

    public function cart_item () {
        return $this->hasOne(Cart_item::class, 'property_id', 'property_id');
    }
}
