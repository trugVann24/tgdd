<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'category_id',
        'supplier_id',
        'name',     
        'import_price',
        'sell_price', 
        'quantity_instock',
        'image',
        'description',
        'status',
    ];
}
