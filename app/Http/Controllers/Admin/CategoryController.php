<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
   	public function index(){
   		return view('admin.category.create');
   	}

   	public function categoryList(){
   		
   		return view('admin.category.list');
   	}

   	public function categoryDatatables(){
   		$categories = Category::select(['id', 'name','slug','created_at']);

   		return Datatables::of($categories)
              ->addColumn('action', function ($categories) {
                return '<small><a href="'.route('admin.getallproducts', ['id'=> $categories->id]).'" class="btn btn-sm btn-info"><i class="material-icons">search</i></a></small>'.'<small><a href="'.route('admin.categoryedit', ['id'=> $categories->id]).'" class="btn btn-sm btn-info"><i class="material-icons">create</i></a></small>'.'<small><a onclick="return confirm(\'Are you sure want to delete?\')" href="'.route('admin.categorydelete', ['id'=> $categories->id]).'" class="btn btn-sm btn-danger"><i class="material-icons">delete_sweep</i></a></small>';
              })
              ->editColumn('id', 'ID: {{$id}}')
              ->removeColumn('id')
              ->make(true);
   	}

   	public function create(Request $request){
   		$this->validate($request,[
             'name'=>'required|unique:categories'
          ]);
   		$category = new Category();
   		$category->name = $request->get('name');
   		$category->slug = strtolower($request->get('name'));

   		$category->save();

   		return redirect(route('admin.categorylist'))->with('category','New category created!');
   	}

    public function categoryedit($id){

      $category = Category::find($id);

      if(is_null($category)){

        return redirect(route('admin.categorylist'))->with('category','Category not found!');
      }

      //dd($category);

      return view('admin.category.edit',['category'=>$category]);
    }

    public function updatecategory(Request $request){
      $this->validate($request,[
             'name'=>'required|unique:categories'
          ]);
      
      $category = Category::find($request->get('id'));

      if(is_null($category)){
        return redirect(route('admin.categorylist'))->with('category','Category not found!');
      }
      $category->name = $request->get('name');
      $category->slug = strtolower($request->get('name'));
      $category->save();

      return redirect(route('admin.categorylist'))->with('category','Category updated !');
    }

    public function categorydelete($id){

      $category = Category::find($id);

      if(is_null($category)){
        return redirect(route('admin.categorylist'))->with('category','Category not found!');
      }

       $category->delete();

       return redirect(route('admin.categorylist'))->with('category','Category deleted !');
    }

}
