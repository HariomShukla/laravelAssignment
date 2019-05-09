<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'sku',
        'title',
        'quantity',
        'selling_price',
        'buying_price',
        'category_id',
        'subcategory_id'       
    ];
    
}
