<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Helpers\Common;
use App\Customer;
use Image;
use File;
use Auth;

class CustomerController extends Controller
{
    public function create(){
   		return view('admin.customer.create');
   	}
   	public function store(Request $request){
   		//dd($request->all());
   		$this->validate($request,[
			'customername'=> 'required',
			'mobile'=> 'required|unique:customers',
			'city'=> 'required',
			'address'=> 'required',
			'country'=> 'required',
          ]);

   		$customer = new Customer();

   		$customer->customername = $request->get('customername'); 
		$customer->mobile = $request->get('mobile'); 
		$customer->telephone = $request->get('telephone'); 
		$customer->email = $request->get('email'); 
		$customer->city = $request->get('city'); 
		$customer->zipcode = $request->get('zipcode'); 
		$customer->address = $request->get('address'); 
		$customer->country = $request->get('country'); 
		
		if($request->has('image')){
			$image = $request->file('image');
            $customermobile = $request->input('mobile');
            $imageName = strtolower($customermobile).".".$image->getClientOriginalExtension();
            $customer->image = $imageName;
            $upload = new Common();
            $imageUpload = $upload->uploadImage($customermobile,$image,'/images/customer/');
		}
		$customer->save();

		return redirect(route('admin.supplierlist'))->with('customer','New customer created!');
   	}

   	public function customerList(){
   		return view('admin.customer.list');
   	}

   	public function customerDatatables(){

        $customerColumns = [
					        'id',
					        'customername',
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

        $customer = Customer::select($customerColumns);


        return Datatables::of($customer)
              ->addColumn('action', function ($customer) {
                return '<small><a href="'.route('admin.viewcustomer', ['id'=> $customer->id]).'" class="btn btn-sm btn-info"><i class="material-icons">search</i></a></small>'.'<small><a href="'.route('admin.editcustomer', ['id'=> $customer->id]).'" class="btn btn-sm btn-info"><i class="material-icons">create</i></a></small>'.'<small><a onclick="return confirm(\'Are you sure want to delete?\')" href="'.route('admin.deletecustomer', ['id'=> $customer->id]).'" class="btn btn-sm btn-danger"><i class="material-icons">delete_sweep</i></a></small>';
              })
              ->editColumn('id', 'ID: {{$id}}')
              ->removeColumn('id')
              ->make(true);
    }

    public function viewcustomer($id){
		dd($id);    	
    }
	public function editcustomer($id){
		dd($id);
	}
	public function updatecustomer(Request $request){
		dd($request->all());
	}
	public function deletecustomer($id){
		dd($id);
	}
}
