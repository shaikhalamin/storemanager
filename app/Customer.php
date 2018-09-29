<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

	protected $fillable = [
	'customername',
	'mobile',
	'telephone',
	'email',
	'city',
	'zipcode',
	'address',
	'country',
	'image'
	];
	
    public function order(){

        return $this->hasMany('App\Order');
    }
}
