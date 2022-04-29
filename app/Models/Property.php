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

    public function scopeFilter ($query, array $filters) {
        $query->when($filters['sales_type'] ?? false, function ($query, $sales_type) {
            return $query->where('property_sales_type', $sales_type);
        })->when($filters['type'] ?? false, function ($query, $type) {
            return $query->where('property_type', $type);
        })->when($filters['address'] ?? false, function ($query, $address) {
            return $query->where('property_address', 'like', '%'.$address.'%');
        });
    }

    public function cart_item () {
        return $this->hasOne(Cart_item::class, 'property_id', 'property_id');
    }
}
