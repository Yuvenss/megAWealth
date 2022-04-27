<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $primaryKey = 'office_id';

    protected $guarded = ['office_id'];

    protected $casts = [
        'office_id' => 'string'
    ];
}
