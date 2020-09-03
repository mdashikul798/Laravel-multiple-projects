<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use softDeletes;
    protected $fillable = ['category_name', 'slug'];

    /*Relation to the categories table*/
    public function subCategories(){
    	return $this->hasMany(SubCategory::class);
    }
}
