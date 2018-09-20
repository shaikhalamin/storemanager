<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class DashboardController extends Controller
{
	public function index(){

		$categoryCount = Category::count();

		$productCount = Product::count();

		return view('admin.dashboard',['categoryCount'=>$categoryCount,'productCount'=>$productCount]);
	}
}
