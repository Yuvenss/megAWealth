<?php

namespace App\Models;

use App\Models\User;
use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $primaryKey = 'transaction_id';

    protected $guarded = ['transaction_id'];

    protected $casts = [
        'transaction_id' => 'string',
        'user_id' => 'string',
        'property_id' => 'string',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id', 'property_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public static function getTransaction ($user_id) {
        return DB::table('transactions')
            ->join('properties', 'transactions.property_id', '=', 'properties.property_id')
            ->where('transactions.user_id', $user_id)
            ->get();
    }
}
