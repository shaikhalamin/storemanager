<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;
use Image;
use File;

class Common extends Model
{
    public function uploadImage($request){

    	//dd($request->all());

    	$productcode = $request->input('productcode');
        $image = $request->file('productimage');

        //dd($image);

        $imageName = strtolower($productcode).".".$image->getClientOriginalExtension();

        $saveImage = null;

        $existsFile = public_path('/images/product/' . $imageName );

        if(file_exists($existsFile)){
            $deleteFile = File::delete($existsFile);
            if($deleteFile){
                $saveImage = Image::make($image)->save( public_path('/images/product/' . $imageName ) );
            }else{
                dd('Unable to delete file');
            }
        }else{
            $saveImage = Image::make($image)->save( public_path('/images/product/' . $imageName ) );
        }


        if($saveImage){
            return true;
        }else{
            return false;
        }
    }

    public function updateImage($image,$product){
        $productcode = $product->productcode;
        $imageName = strtolower($productcode).".".$image->getClientOriginalExtension();
        $existsFile = public_path('/images/product/' . $imageName );

        if(file_exists($existsFile)){
            File::delete($existsFile);
        }
        $saveImage = Image::make($image)->save( public_path('/images/product/' . $imageName ) );

        return $saveImage;
    }

    public function deleteImage($imageName){

        $existsFile = public_path('/images/product/' . $imageName );

        $deleteFile = false;

        if(file_exists($existsFile)){
            $deleteFile = File::delete($existsFile);
            if($deleteFile){
                return true;
            }
        }
        return $deleteFile;
    }
}
