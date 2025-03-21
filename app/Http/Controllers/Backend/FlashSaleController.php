<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\FlashSaleItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\Product;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class FlashSaleController extends Controller
{
    public function index(FlashSaleItemDataTable $dataTable)
    {   $flashSaleDate= FlashSale::first();
        $products = Product::where('is_approved',1)->where('status',1)->orderBy('id','DESC')->get();
        // is_approved是通過審查 status是已經有上架
      return $dataTable->render('admin.flash-sale.index',compact('flashSaleDate','products'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'end_date' => ['required']
        ]);

        FlashSale::updateOrCreate(
            ['id'=>1],
            ['end_date'=>$request->end_date],
        );

        toastr('更新成功','success','Success');
        return redirect()->back();
    }



    
    public function addProduct(Request $request)
    {
   
        $request->validate([
            'product'=>['required', 'unique:flash_sale_items,product_id'],
            'show_at_home'=>['required'],
            'status'=>['required'],

        ],[
            'product.unique' => '產品已在架上'
        ]);



        $flashSaleDate= FlashSale::first();

        $flashSaleItem = new FlashSaleItem();
        $flashSaleItem->product_id = $request->product;
        $flashSaleItem->flash_sale_id =  $flashSaleDate->id;
        $flashSaleItem->show_at_home =$request->show_at_home;
        $flashSaleItem->status =$request->status;
        $flashSaleItem->save();

        toastr('產品新增成功','success','Success');
        return redirect()->back();
        
    }




    public function changeShowAtHomeStatus(Request $request)
    {
        $flashSaleItem =FlashSaleItem::findOrFail($request->id);
        $flashSaleItem ->show_at_home =$request->status == 'true' ? 1:0;
        $flashSaleItem->save();
        return response(['message' => 'Status has been update']);
    }



    public function changeStatus(Request $request){

        $flashSaleItem =FlashSaleItem::findOrFail($request->id);
        $flashSaleItem ->status =$request->status == 'true' ? 1:0;
        $flashSaleItem->save();
        return response(['message' => 'Status has been update']);
    }
   

    public function destroy(string $id)
    {
        $flashSaleItem= FlashSaleItem::findOrFail($id);
        $flashSaleItem->delete();
        return response(['status' => 'success', 'message' => '刪除成功']);
    }
}
