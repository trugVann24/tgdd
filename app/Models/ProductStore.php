<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    use HasFactory;
    protected $fillable = [
        'productStore_id',
        "productStore_name",
        "price",
        'quantity',
        'description',
        'status',     
    ];
} 
