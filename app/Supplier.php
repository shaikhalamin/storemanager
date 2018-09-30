<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	protected $fillable = ['companyname',
							'propitername',
							'suppliercode',
							'mobile',
							'telephone',
							'email',
							'city',
							'zipcode',
							'address',
							'productssale',
							'country',
							'image'
						];
}
