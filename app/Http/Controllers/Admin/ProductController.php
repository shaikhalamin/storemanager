<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class ProductController extends Controller
{
    public function index(){

    	$categoryList = [];

    	$categories = Category::all();

    	if(!is_null($categories)){

    		foreach ($categories as $key => $category) {

    			if(isset($category)){
    				$categoryList[$category->id] = $category->name;
    			}
    		}
    	}


    	return view('admin.product.create',['categoryList'=>$categoryList]);
    }

    public function create(Request $request){
        dd($request->all());
    }
}
