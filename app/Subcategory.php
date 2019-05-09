<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        
    ];

    public function a() 
    {
        return $this->hasOne(Category::class);
    }
    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function getCategoryName() {
        if($this->category) {
            return $this->category->getCategoryName(). " > " . $this->name;
        } else {
            return $this->name;
        }
    }

    public function products() 
    {
        return $this->hasManyThrough('App\Product','App\Category','subcategory_id','category_id','id');
    }
        
}
