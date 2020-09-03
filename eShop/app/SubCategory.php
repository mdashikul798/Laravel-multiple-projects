<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
	protected $fillable = ['cat_id', 'name', 'slug'];
	
	/*Relation to the sub_categories table*/
	public function category(){
		return $this->belongsTo(Category::class, 'cat_id');
	}
}
