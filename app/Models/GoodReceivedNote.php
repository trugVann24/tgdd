<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoodReceivedNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'name',
        'user_id',
        'received_date',
        'quantity',
        'price',
        'total_cost',
    ];
//     public function product()
// {
//     return $this->belongsTo(Product::class);
// }
}
