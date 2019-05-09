<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    public function subcategories()
    {
        return $this->hasOne('App\Subcategory', 'category_id');
    }   
    public function products() 
    {
        return $this->hasMany('App\Product', 'subcategory_id');
    }

    
}
