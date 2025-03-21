<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;

use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    
    public function addToCart(Request $request)
    {
       $product = Product::findOrFail($request->product_id);
    //  檢查產品數量
    if($product->qty == 0)
    {
        return response(['status'=> 'error' ,'message'=>'Product stock ouy']);
    }elseif($product->qty < $request->qty){
        return response(['status'=> 'error' ,'message'=>'Quanty not available in our stock']);
    }


       $variants =[];
       $variantTotalAmount =0;
       if($request->has('variants_items')){
        

        foreach($request->variants_items as $item_id){
            $variantItem = ProductVariantItem::find($item_id);
            $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
            $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
            $variantTotalAmount += $variantItem->price;
    
           }
       }

      

       $productPrice =0;
       if(checkDiscount($product)){
        $productPrice = $product->offer_price;
       }else{
        $productPrice = $product->price;
       }
       $cartData= [];
       $cartData['id']=$product->id;
       $cartData['name']=$product->name;
       $cartData['qty']=$request->qty;
       $cartData['price']=$productPrice;
       $cartData['weight']=10;
       $cartData['options'] ['variants']=$variants;
       $cartData['options'] ['variants_total']=$variantTotalAmount;
       $cartData['options'] ['image']=$product->thumb_image;
       $cartData['options']['slug']=$product->slug;

       Cart::add($cartData);

       return response(['status'=>'success','message'=>'新增成功']);
       
    }


    public function cartDetails()
    {   $cartItems = Cart::content();
        
        if(count($cartItems) == 0)
        {
            Session::forget('coupon');
            return redirect()->route('home');
        }
        return view('frontend.pages.cart-datail',compact('cartItems'));
    }



    public function updateProductQty(Request $request)
    {     
         
        $ProductId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail( $ProductId);


         //  檢查產品數量
        if($product->qty == 0)
      {
    return response(['status'=> 'error' ,'message'=>'Product stock ouy']);
     }elseif($product->qty < $request->qty){
    return response(['status'=> 'error' ,'message'=>'Quanty not available in our stock']);
      }





        Cart::update($request->rowId, $request->quantity);
        $productTotal= $this->getProductTotal($request->rowId);

        return response(['status'=>'success', 'message'=>'產品數量已更新' , 'product_total'=> $productTotal]);
    }





    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;
         return $total;
    }



    public function clearCart()
    {
        Cart::destroy();

        return response(['status'=>'success','message'=>'刪除成功']);
    }

    public function removeProduct($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }


    public function getCartCount()
    {
        return Cart::content()->count();
    }

    public function getCartProducts()
    {
        return Cart::content();
    }


    public function removeSidebarProduct(Request $request)
    {
        Cart::remove($request->rowId);
        return response(['status'=>'success', 'message'=>'刪除成功']);
    }

    public function CartTotal(){
        $total=0;
        foreach(Cart::content()as $product)
        {
            $total += $this->getProductTotal($product->rowId);
        }
        return  $total;
    }



    public function applyCoupon(Request $request)
      {
           if($request->coupon_code == null){
            return response(['status' => 'error' ,'message'=>'Coupon Failed']);
           }
        

         $coupon = Coupon::where(['code' => $request->coupon_code,  'status'=>1])->first();

         if($coupon == null){
            return response(['status' => 'error' ,'message'=>'Coupon not exist']);
           }elseif($coupon->start_date > date('Y-m-d'))

           {
            return response(['status' => 'error' ,'message'=>'Coupon not exist']);
           }elseif($coupon->end_date < date('Y-m-d'))

           {
            return response(['status' => 'error' ,'message'=>'Coupon is expired']);
           }elseif($coupon->total_used >= $coupon->quantity)
           {
            return response(['status' => 'error' ,'message'=>'Coupon already used up']);
           }
        


           if($coupon->discount_type == 'amount'){
            Session::put('coupon',[
                'coupon_name'=>$coupon->name,
                'coupon_code'=>$coupon->code,
                'discount_type'=>'amount',
                'discount' => $coupon->discount
            ]);
    
           }elseif($coupon->discount_type == 'percent')
           {
            Session::put('coupon',[
                'coupon_name'=>$coupon->name,
                'coupon_code'=>$coupon->code,
                'discount_type'=>'percent',
                'discount' => $coupon->discount
            ]);
           }


           return response(['status' => 'success' ,'message'=>'Coupon applied successfully']);
         
      }






      public function couponCalculation()
      {
       if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal= getCartTotal();
        if($coupon['discount_type'] == 'amount'){
            $total = $subTotal - $coupon['discount'];
            return response(['status'=>'success', 'cart_total'=>$total ,'discount'=>$coupon['discount']]);
        }elseif($coupon['discount_type'] == 'percent'){
            $discount = $subTotal - ($subTotal * $coupon['discount']/100);
            $total = $subTotal- $discount;
            return response(['status'=>'success', 'cart_total'=>$total ,'discount'=>$discount]);
        }
       }else{
        $total = getCartTotal();
        return response(['status'=>'success', 'cart_total'=>$total,'discount'=>0]);
       }

        
      }
}
