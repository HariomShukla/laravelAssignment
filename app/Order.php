<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'sku',
        'item_quantity',
        'order_date',
        'item_profit',
        'item_price',
        'order_id',
        'product_id',  
        'category_id',
        'subcategory_id',     
    ];
}
