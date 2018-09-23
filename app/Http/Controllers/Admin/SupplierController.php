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

   		$this->validate($request,[
			"companyname" => 'required',
			"propitername" => 'required',
			"mobile" => 'required|unique:suppliers',
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
            $propitermobile = $request->input('mobile');
            $imageName = strtolower($propitermobile).".".$image->getClientOriginalExtension();
            $supplier->image = $imageName;
            $upload = new Common();
            $imageUpload = $upload->uploadImage($propitermobile,$image,'/images/supplier/');
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
                return '<small><a href="'.route('admin.viewsupplier', ['id'=> $supplier->id]).'" class="btn btn-sm btn-info"><i class="material-icons">search</i></a></small>'.'<small><a href="'.route('admin.editsupplier', ['id'=> $supplier->id]).'" class="btn btn-sm btn-info"><i class="material-icons">create</i></a></small>'.'<small><a onclick="return confirm(\'Are you sure want to delete?\')" href="'.route('admin.deletesupplier', ['id'=> $supplier->id]).'" class="btn btn-sm btn-danger"><i class="material-icons">delete_sweep</i></a></small>';
              })
              ->editColumn('id', 'ID: {{$id}}')
              ->removeColumn('id')
              ->make(true);
    }

    public function viewsupplier($id){

    	$supplier = Supplier::find($id);

        if(is_null($supplier)){

            return redirect(route('admin.supplierlist'))->with('supplier','Supplier info not found!');
        }

    	return view('admin.supplier.view',['supplier'=>$supplier]);
    }

    public function editsupplier($id){

    	$supplier = Supplier::find($id);

        if(is_null($supplier)){

            return redirect(route('admin.supplierlist'));
        }

    	return view('admin.supplier.edit',['supplier'=>$supplier]);
    }

    public function updatesupplier(Request $request){

    	$this->validate($request,[
			"companyname" => 'required',
			"propitername" => 'required',
			"mobile" => 'required',
			"address" => 'required',
			"city" => 'required',
			"country" => 'required'
          ]);

    	$supplier = Supplier::find($request->get('id'));

        if(is_null($supplier)){
            return redirect(route('admin.supplierlist'))->with('supplier','Supplier not found!');
        }
    	//dd($request->all());
    	$supplier->companyname = $request->get('companyname');
		$supplier->propitername = $request->get('propitername');
		$supplier->suppliercode = "";
		/*SUpplier code need to be something else*/
		$supplier->mobile = $request->get('mobile');
		$supplier->telephone = $request->get('telephone');
		$supplier->email = $request->get('email');
		$supplier->city = $request->get('city');
		$supplier->zipcode = $request->get('zipcode');
		$supplier->address = $request->get('address');
		$supplier->country = $request->get('country');

		if($request->has('image')){

			$image = $request->file('image');
            $propitermobile = $request->input('mobile');
            $imageName = strtolower($propitermobile).".".$image->getClientOriginalExtension();
            $supplier->image = $imageName;
            $upload = new Common();
            $imageUpload = $upload->updateImage($propitermobile,$image,'/images/supplier/');
		}
		$supplier->update();

		return redirect(route('admin.supplierlist'))->with('supplier','Supplier updated!');
    }

    public function deletesupplier($id){
    	dd($id);
    }
}
