<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $primaryKey = 'staff_code';
    public $incrementing = false;
    protected $fillable = [
        'staff_code',
        'name',
        'address',
        'day_in_work',
        'phone_number',
        'status',
    ];
}
