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
          ]);

   		$customer = new Customer();

   		$customer->customername = $request->get('customername'); 
		$customer->mobile = $request->get('mobile'); 
		$customer->telephone = $request->get('telephone'); 
		$customer->email = $request->get('email');

		$customer->due = $request->get('due');
		$customer->deposit = $request->get('deposit');

		if($request->get('deposit')){
      		$customer->due = $customer->due - $request->get('deposit');
      	}

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

		return redirect(route('admin.customerlist'))->with('customer','New customer created!');
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
							'due',
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

		$customer = Customer::find($id);
        if(is_null($customer)){

            return redirect(route('admin.customerlist'));
        }
    	return view('admin.customer.view',['customer'=>$customer]);  	
    }

	public function editcustomer($id){
		//dd($id);
		$customer = Customer::find($id);

        if(is_null($customer)){

            return redirect(route('admin.customerlist'));
        }

    	return view('admin.customer.edit',['customer'=>$customer]);
	}
	public function updatecustomer(Request $request){
		//dd($request->all());
		$this->validate($request,[
			'customername'=> 'required',
			'mobile'=> 'required',
          ]);

   		$customer = Customer::find($request->get('id'));

		if(is_null($customer)){
		  return redirect(route('admin.supplierlist'))->with('customer','Customer not found!');
		}

   		$customer->customername = $request->get('customername'); 
		$customer->mobile = $request->get('mobile'); 
		$customer->telephone = $request->get('telephone'); 
		$customer->email = $request->get('email');

      	$customer->due = $request->get('due');
		$customer->deposit = $request->get('deposit');

		if($request->get('deposit')){
      		$customer->due = $customer->due - $request->get('deposit');
      	}

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
            $imageUpload = $upload->updateImage($customermobile,$image,'/images/customer/');
		}
		$customer->update();

		return redirect(route('admin.customerlist'))->with('customer',' Customer info updated!');
	}
	public function deletecustomer($id){

		$customer = Customer::find($id);

        if(is_null($customer)){
        	return redirect(route('admin.customerlist'))->with('customer','Customer not found!');
        }
        $deleteImage = new Common();
        $deleteImage->deleteImage($customer->image,'/images/customer/');
        $customer->delete();

        return redirect(route('admin.customerlist'))->with('customer','Customer deleted !');
	}
}
