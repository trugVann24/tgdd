<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodDeliveryNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_store_id',
        'product_id',
        'user_id',
        'brand_id',
        'delivery_date',
        'quantity',
        'price',
        'total_cost',
    ];
}
