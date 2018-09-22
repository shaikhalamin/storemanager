<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Productunit;

class ProductUnitController extends Controller
{
    public function index(){
   		return view('admin.product.unit.createunit');
   	}

   	public function unitList(){
   		
   		return view('admin.product.unit.unitlist');
   	}

   	public function unitDatatables(){
   		$productunit = Productunit::select(['id', 'name','created_at']);

   		return Datatables::of($productunit)
              ->addColumn('action', function ($productunit) {
                return '<small><a href="'.route('admin.unitedit', ['id'=> $productunit->id]).'" class="btn btn-sm btn-info"><i class="material-icons">create</i></a></small>'.'<small><a onclick="return confirm(\'Are you sure want to delete?\')" href="'.route('admin.unitdelete', ['id'=> $productunit->id]).'" class="btn btn-sm btn-danger"><i class="material-icons">delete_sweep</i></a></small>';
              })
              ->editColumn('id', 'ID: {{$id}}')
              ->removeColumn('id')
              ->make(true);
   	}

   	public function create(Request $request){
   		$this->validate($request,[
             'name'=>'required|max:10|unique:productunits'
          ]);
   		$productunit = new Productunit();
   		$productunit->name = $request->get('name');
   		$productunit->save();

   		return redirect(route('admin.unitlist'))->with('productunit','New Productunit created!');
   	}

    public function unitedit($id){

      $productunit = Productunit::find($id);

      if(is_null($productunit)){

        return redirect(route('admin.unitlist'))->with('productunit','Productunit not found!');
      }

      //dd($category);

      return view('admin.product.unit.editunit',['productunit'=>$productunit]);
    }

    public function updateunit(Request $request){
    	
    	$this->validate($request,[
             'name'=>'required|max:10|unique:productunits'
          ]);
      
      $productunit = Productunit::find($request->get('id'));

      if(is_null($productunit)){
        return redirect(route('admin.unitlist'))->with('productunit','Productunit not found!');
      }
      $productunit->name = $request->get('name');
      $productunit->save();

      return redirect(route('admin.unitlist'))->with('productunit','Productunit updated !');
    }

    public function unitdelete($id){

      $productunit = Productunit::find($id);

      if(is_null($productunit)){
        return redirect(route('admin.unitlist'))->with('productunit','Productunit not found!');
      }

       $productunit->delete();

       return redirect(route('admin.unitlist'))->with('productunit','Productunit deleted !');
    }
}
