<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'supplier_id',
        'name',
        'quantity_instock',
        'image',
        'description',
        'status',
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function supliler(){
        return $this->belongsTo(Suppliler::class,'supplier_id');
        
    }
}
