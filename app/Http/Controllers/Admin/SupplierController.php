<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Helpers\Common;
use App\Supplier;
use Image;
use File;
use Auth;

class SupplierController extends Controller
{
    public function create(){
   		return view('admin.supplier.create');
   	}

   	public function store(Request $request){

   		//dd($request->all());

   		$this->validate($request,[
			"companyname" => 'required',
			"propitername" => 'required',
			"mobile" => 'required',
			"address" => 'required',
			"city" => 'required',
			"country" => 'required'
          ]);

   		$supplier = new Supplier();
   		$supplier->companyname = $request->get('companyname'); 
		$supplier->propitername = $request->get('propitername'); 
		$supplier->suppliercode = ""; 
		$supplier->mobile = $request->get('mobile'); 
		$supplier->telephone = $request->get('telephone'); 
		$supplier->email = $request->get('email'); 
		$supplier->city = $request->get('city'); 
		$supplier->zipcode = $request->get('zipcode'); 
		$supplier->address = $request->get('address'); 
		$supplier->country = $request->get('country');
		if($request->has('image')){
			$image = $request->file('image');
            $propitername = $request->input('propitername');
            $imageName = strtolower($propitername).".".$image->getClientOriginalExtension();
            $supplier->image = $imageName;
            $upload = new Common();
            $imageUpload = $upload->uploadImage($propitername,$image,'/images/supplier/');
		}
		$supplier->save();

		return redirect(route('admin.supplierlist'))->with('supplier','New supplier created!');

   	}

   	public function supplierList(){
   		return view('admin.supplier.list');
   	}

   	public function supplierDatatables(){

        $supplierColumns = [
					        'id',
					        'companyname',
							'propitername',
							'suppliercode',
							'mobile',
							'telephone',
							'email',
							'city',
							'zipcode',
							'address',
							'country',
							'image',
							'created_at'
							];

        $supplier = Supplier::select($supplierColumns);


        return Datatables::of($supplier)
              ->addColumn('action', function ($supplier) {
                return '<small><a href="'.route('admin.editsupplier', ['id'=> $supplier->id]).'" class="btn btn-sm btn-info"><i class="material-icons">create</i></a></small>'.'<small><a onclick="return confirm(\'Are you sure want to delete?\')" href="'.route('admin.deletesupplier', ['id'=> $supplier->id]).'" class="btn btn-sm btn-danger"><i class="material-icons">delete_sweep</i></a></small>';
              })
              ->editColumn('id', 'ID: {{$id}}')
              ->removeColumn('id')
              ->make(true);
    }
    public function editsupplier($id){
    	dd($id);
    }
    public function deletesupplier($id){
    	dd($id);
    }
}
