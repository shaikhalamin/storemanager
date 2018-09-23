<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Helpers\Common;
use App\Productunit;
use App\Category;
use App\Product;
use App\Supplier;
use Image;
use File;
use Auth;

class ProductController extends Controller
{
    public function index(){

        $modelList = new Common();

    	$categories = Category::all();
        $categoryList = $modelList->getList($categories,'id','name');

        $units = Productunit::all();
        $unitList = $modelList->getList($units,'name','name');

        $suppliers = Supplier::all();

        $supplierList = $modelList->getList($suppliers,'id','propitername');

        //dd($suppliers);

    	return view('admin.product.create',[
                                            'categoryList'=>$categoryList,
                                            'unitList'=>$unitList,
                                            'supplierList'=>$supplierList
                                            ]);
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
        $product->productunit = $request->get('productunit'); 
        $product->description = $request->get('description'); 
        $product->purchaseprice = $request->get('purchaseprice'); 
        $product->bodyrate = $request->get('bodyrate'); 
        $product->salesprice = $request->get('salesprice'); 
        $product->discount = $request->get('discount'); 
        $product->totalstock = $request->get('totalstock'); 
        $product->availability = $request->get('availability'); 
        if($request->has('productimage')){
            $image = $request->file('productimage');
            $productcode = $request->input('productcode');
            $imageName = strtolower($productcode).".".$image->getClientOriginalExtension();
            $product->image = $imageName;
            $upload = new Common();
            $imageUpload = $upload->uploadImage($productcode,$image,'/images/product/');
        }else{
            $product->image = "default.jpg";
        }
        
        $product->user_id = Auth::id();
        $product->supplier_id = $request->get('supplier');
        $product->save();

        return redirect(route('admin.productlist'))->with('product','New product created!');
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
        //dd($id);

        $product = Product::find($id);

        if(is_null($product)){

            return redirect(route('admin.productlist'))->with('product','Product not found!');
        }

        $modelList = new Common();

        $categories = Category::all();
        $categoryList = $modelList->getList($categories,'id','name');

        $units = Productunit::all();
        $unitList = $modelList->getList($units,'name','name');

        $suppliers = Supplier::all();
        $supplierList = $modelList->getList($suppliers,'id','propitername');

        return view('admin.product.edit',[
                                            'product'=>$product,
                                            'categoryList'=>$categoryList,
                                            'unitList'=>$unitList,
                                            'supplierList'=>$supplierList
                                        ]);

    }
    public function updateproduct(Request $request){
        //dd($request->all());
        $this->validate($request,[
            'category'=>'required',
            'productname'=>'required',
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

        $product = Product::find($request->get('id'));

        if(is_null($product)){
            return redirect(route('admin.productlist'))->with('product','Product not found!');
        }

        $product->category_id = $request->get('category');
        $product->productname = $request->get('productname'); 
        $product->productunit = $request->get('productunit'); 
        $product->description = $request->get('description'); 
        $product->purchaseprice = $request->get('purchaseprice'); 
        $product->bodyrate = $request->get('bodyrate'); 
        $product->salesprice = $request->get('salesprice'); 
        $product->discount = $request->get('discount'); 
        $product->totalstock = $request->get('totalstock'); 
        $product->availability = $request->get('availability'); 

        if($request->has('productimage')){
            $image = $request->file('productimage');
            $productcode = $product->productcode;
            $imageName = strtolower($productcode).".".$image->getClientOriginalExtension();
            $product->image = $imageName;

            $upload = new Common();
            $imageUpload = $upload->updateImage($productcode,$image,'/images/product/');

        }else{
            $product->image = $product->image;
        }
        
        $product->user_id = Auth::id();
        $product->supplier_id = $request->get('supplier');
        $product->update();

        return redirect(route('admin.productlist'))->with('product','New product updated!');

    }
    public function deleteproduct($id){

        $product = Product::find($id);

        if(is_null($product)){
        return redirect(route('admin.productlist'))->with('product','Product not found!');
        }
        $deleteImage = new Common();
        $deleteImage->deleteImage($product->image,'/images/product/');
        $product->delete();

        return redirect(route('admin.productlist'))->with('product','Product deleted !');
    }
}
