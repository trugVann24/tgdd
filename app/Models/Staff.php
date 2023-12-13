<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',
        'address',
        'day_in_work',
        'phone_number',
        'status',
    ];
}
