<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $primaryKey = 'bill_code';
    public $incrementing = false;
    protected $fillable = [
        'bill_code',
        'staff_code',
        "sale_date",
        "customer_id",
        "total_money",
    ];
}
