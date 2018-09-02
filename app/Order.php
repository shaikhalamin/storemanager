<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	public function orderdetail(){

        return $this->hasMany('App\Orderdetail');
    }

    public function customer(){
    	return $this->belongsTo('App\Customer');
    }
}
