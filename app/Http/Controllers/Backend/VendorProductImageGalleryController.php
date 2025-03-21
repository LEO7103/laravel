<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\VendorProductDataTable;
use App\DataTables\VendorProductImageGalleryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImageGallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorProductImageGalleryController extends Controller
{ use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, VendorProductImageGalleryDataTable $dataTable)
    {   
        $product= Product::findOrFail($request->product);
        if($product->vendor_id != Auth::user()->vendor->id){
            abort(404);
        }
        return $dataTable->render('vendor.product.image-gallery.index',compact('product'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' =>['required','required','max:2048']
        ]);

        $imagePaths =$this->uploadMultImage($request,'image','uploads');

        foreach( $imagePaths as $path)
        {
            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image =$path;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();

        }
         toastr('上傳成功');
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productImage= ProductImageGallery::findOrFail($id);
        if($productImage->product->vendor_id != Auth::user()->vendor->id)
        {
            abort(404);
        }
        $this->deleteImage($productImage->image);
        $productImage->delete();
        return response(['status'=>'success','message'=>'刪除成功']);
    }
}
