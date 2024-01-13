<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_bill',
        'productStore_name',
        'customer_id',
        'price',
        'quantity',
        'discount',
        'total_money',
    ];
}
