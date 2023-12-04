<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImportSlip extends Model
{
    use HasFactory;

    protected $table = 'product_import_slips';
    protected $fillable = [

        'product_import_slip_id',
        'product_id',
        'product_supplier_id',
        'employee_id',
        'import_quantity',
        'total_money_product',
        'status',
    ];
}
