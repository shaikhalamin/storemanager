<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = 
    [
		'productname',
		'productcode',
		'productunit',
		'description',
		'purchaseprice',
		'bodyrate',
		'salesprice',
		'oldprice',
		'oldlabel',
		'cartoonprice',
		'gift',
		'discount',
		'totalstock',
		'availability',
		'category_id',
		'user_id',
		'supplier_id',
		'suppliername',
		'image'
    ];

	public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function supplier(){
    	return $this->belongsTo('App\Supplier');
    }
    public function user(){
    	return $this->belongsTo('App\User');
    }
}
