<?php

use Illuminate\Support\Facades\Session;

function setActive(array $route)
{
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active'; 
            }
        }
    }
} 

// 確認是否有折扣

function checkDiscount($product)
{
    $currentDate = date('Y-m-d');
    if($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date)
    {
        return true;
    }

    return false;
}

// 確認折扣百分比

function calculateDiscountPerCent($originalPrice,$discountPrice)
{

    $discountAmount = $originalPrice - $discountPrice;
    $discountPercent = ($discountAmount / $originalPrice) * 100;
    return  $discountPercent;
}


// 檢查產品狀態

function productType(string $type)
{
    switch ($type) {
        case 'new_arrival':
            return 'New';
            break;

        case 'featured_product':
            return 'Featured';
            break;

        case 'top_product':
            return 'Top';
            break;

        case 'best_product':
            return 'Best';
            break;

        default:
            return '';
            break;
    }
}


function getCartTotal()
{
    $total=0;
    foreach(\Cart::content() as $product)
    {
        $total +=  ($product->price + $product->options->variants_total) * $product->qty;
    }
    return $total;
}



function getMainCartToal()
{

    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal= getCartTotal();
        if($coupon['discount_type'] == 'amount'){
            $total = $subTotal - $coupon['discount'];
            return $total;
        }elseif($coupon['discount_type'] == 'percent'){
            $discount = $subTotal - ($subTotal * $coupon['discount']/100);
            $total = $subTotal- $discount;
            return $total;
        }
        
        }else{
            return getCartTotal(); 
       }

}




function getCartDiscount()
{

    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subtotal= getCartTotal();
        if($coupon['discount_type'] == 'amount'){
           
            return  $coupon['discount'];
        }elseif($coupon['discount_type'] == 'percent'){
            $discount = $subtotal - ($subtotal * $coupon['discount']/100);
          
            return $discount;
        }else{
           return getCartTotal(); 
        }
       }

}





function getShippingFee(){
    if(Session::has('shipping_method')){
        return Session::get('shipping_method')['cost'];
    } else{
        return 0;
    }
}


function getFinalPayableAmount(){
 return getMainCartToal() +  getShippingFee();
}

