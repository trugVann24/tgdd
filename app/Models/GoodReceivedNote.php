<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodReceivedNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'product_id',
        'user_id',
        'received_date',
        'quantity',
        'price',
        'total_cost',
    ];
}
