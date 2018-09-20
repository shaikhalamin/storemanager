<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Category;
use App\Product;
use Auth;

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

        $this->validate($request,[
            'category'=>'required',
            'productname'=>'required',
            'productcode'=>'required|unique:products',
            /*'productimage'=>'required',*/
            'description'=>'required',
            'purchaseprice'=>'required',
            'bodyrate'=>'required',
            'salesprice'=>'required',
            'discount'=>'required',
            'totalstock'=>'required',
            'productunit'=>'required',
            'availability'=>'required',
            /*'supplier'=>'required'*/
          ]);

        $product = new Product();
        $product->category_id = $request->get('category');
        $product->productname = $request->get('productname'); 
        $product->productcode = $request->get('productcode'); 
        $product->productunit = 'kg';//$request->get('productunit'); 
        $product->description = $request->get('description'); 
        $product->purchaseprice = $request->get('purchaseprice'); 
        $product->bodyrate = $request->get('bodyrate'); 
        $product->salesprice = $request->get('salesprice'); 
        $product->discount = $request->get('discount'); 
        $product->totalstock = $request->get('totalstock'); 
        $product->availability = 1;//$request->get('availability'); 
        $product->image = '';//$request->get(''); 
        $product->user_id = Auth::id();
        $product->supplier_id = Auth::id();//$request->get('supplier');
        $product->save();

        return redirect(route('admin.productlist'))->with('product','New product created!');

        //$productAll = Product::all();

        //dd($productAll);
    }

    public function productList(){
        
        return view('admin.product.list');
    }

    public function productDatatables(){

        $productColumns = [
                            'id',
                            'productname',
                            'productcode',
                            'image',
                            'productunit',
                            'description',
                            'purchaseprice',
                            'bodyrate',
                            'salesprice',
                            'discount',
                            'totalstock',
                            'availability',
                            'category_id',
                            'user_id',
                            'supplier_id'];

        $product = Product::select($productColumns);


        return Datatables::of($product)
              ->addColumn('action', function ($product) {
                return '<small><a href="'.route('admin.editproduct', ['id'=> $product->id]).'" class="btn btn-sm btn-info"><i class="material-icons">create</i></a></small>'.'<small><a onclick="return confirm(\'Are you sure want to delete?\')" href="'.route('admin.deleteproduct', ['id'=> $product->id]).'" class="btn btn-sm btn-danger"><i class="material-icons">delete_sweep</i></a></small>';
              })
              ->editColumn('id', 'ID: {{$id}}')
              ->removeColumn('id')
              ->make(true);
    }
    public function editproduct($id){
        dd($id);
    }
    public function updateproduct(Request $request){
        dd($request->all());

    }
    public function deleteproduct($id){
        dd($id);
    }
}
