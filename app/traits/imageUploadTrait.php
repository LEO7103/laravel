<?php
namespace App\Traits;

use Illuminate\Http\Request;
use File;
trait ImageUploadTrait {

    public function uploadImage(Request $request, $inputName,$path )
    {

        if($request->hasFile($inputName))
        {
       
           $image= $request->{$inputName};
        //    $imageName = rand().'_'.$image->getClientOriginalName();
        // $imageName = rand().'_'.$image->getClientOriginalName();
        $ext=$image->getClientOriginalExtension();
           $imageName = 'photo_'.'_'.uniqid().'.'.$ext;
           $image->move(public_path($path), $imageName);
           
          return $path.'/'.$imageName;

        }

    }



    public function uploadMultImage(Request $request, $inputName,$path )
    {

        if($request->hasFile($inputName))
        {
           $imagePaths=[];
           $images= $request->{$inputName};

           foreach($images as $image)
           {
            $ext=$image->getClientOriginalExtension();
            $imageName = 'photo_'.'_'.uniqid().'.'.$ext;
            $image->move(public_path($path), $imageName);
            $imagePaths[] = $path.'/'.$imageName;

           }


           return $imagePaths;
        //    $imageName = rand().'_'.$image->getClientOriginalName();
        // $imageName = rand().'_'.$image->getClientOriginalName();
       
       

        }

    }




    public function updateImage(Request $request, $inputName,$path,$oldPath=null )
    {

        if($request->hasFile($inputName))
        {
            if( File::exists(public_path($oldPath))){
                File::delete(public_path($oldPath));
               }
       
           $image= $request->{$inputName};
    
        $ext=$image->getClientOriginalExtension();
           $imageName = 'photo_'.'_'.uniqid().'.'.$ext;
           $image->move(public_path($path), $imageName);
           
          return $path.'/'.$imageName;

        }

    }


    public function deleteImage(string $path)
    {
        if( File::exists(public_path($path))){
            File::delete(public_path($path));
           } 
    }
}