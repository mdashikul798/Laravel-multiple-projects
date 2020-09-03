<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'product_price', 'product_image', 'description', 'category'];

    public function category(){
    	return $this->belongsTo(Category::class, 'id');
    }
    
}
