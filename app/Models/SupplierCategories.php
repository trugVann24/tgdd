<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PupplierCategories extends Model
{
    use HasFactory;
    protected $table = 'supplier_categories';

    protected $fillable =[
        'product_supplier_id',
        'Product_supplier_name',
        'Address',
        'phone_number',
        'description',
    ];
}
