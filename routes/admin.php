<?php

use App\DataTables\ProductVariantItemDataTable;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PaymentSettingController;
use App\Http\Controllers\Backend\PaypalSettingController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SellerProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StripeSettingController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TransactionController;
use App\Models\ChildCategory;
use App\Models\ProductImageGallery;
use App\Models\ShippingRule;
use App\Models\StripeSetting;
use Illuminate\Support\Facades\Route;

Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');




Route::get('profile',[ProfileController::class, 'index'])->name('profile');
Route::post('profile/update',[ProfileController::class, 'updateProfile'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class, 'updatePassword'])->name('password.update');

// Slider Route
Route::resource('slider' , SliderController::class);

Route::put('change-status',[CategoryController::class, 'changeStatus'])->name('category.change-status');
Route::resource('category' , CategoryController::class);


Route::put('subcategory/change-status',[SubCategoryController::class, 'changeStatus'])->name('sub-category.change-status');
Route::resource('sub-category' , SubCategoryController::class);




Route::put('child-category/change-status',[ChildCategoryController::class, 'changeStatus'])->name('child-category.change-status');
Route::get('get-subcategory',[ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
Route::resource('child-category' , ChildCategoryController::class);


// product route
Route::put('brand/change-status',[BrandController::class, 'changeStatus'])->name('brand.change-status');
Route::resource('brand' , BrandController::class);


// vendor profile route
Route::resource('vendor-profile' , AdminVendorProfileController::class);


// pround route
Route::get('product/get-subcategories',[ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-child-categories',[ProductController::class, 'getChildCategories'])->name('product.get-child-categories');
Route::put('products/change-status',[ProductController::class, 'changeStatus'])->name('products.change-status');
Route::resource('products' , ProductController::class);

// pround image gallery route
Route::resource('products-image-gallery' , ProductImageGalleryController::class);



// pround variant route
Route::put('products-variant/change-status',[ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
Route::resource('products-variant' , ProductVariantController::class);

// pround variant item route
Route::get('products-variant-item/{productId}/{variantId}',[ProductVariantItemController::class, 'index'])->name('products-variant-item.index');
Route::get('products-variant-item/create/{productId}/{variantId}',[ProductVariantItemController::class, 'create'])->name('products-variant-item.create');
Route::post('products-variant-item',[ProductVariantItemController::class, 'store'])->name('products-variant-item.store');


Route::get('products-variant-item-edit/{variantItemId}',[ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');
Route::put('products-variant-item-update/{variantItemId}',[ProductVariantItemController::class, 'update'])->name('products-variant-item.update');
Route::delete('products-variant-item/{variantItemId}',[ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');

Route::put('products-variant-item-status',[ProductVariantItemController::class, 'changeStatus'])->name('products-variant-item.change-status');

// Seller producr route
Route::get('seller-products',[SellerProductController::class,'index'])->name('seller-products.index');
Route::get('seller-pending-products',[SellerProductController::class,'pendingProducts'])->name('seller-pending-products.index');
Route::put('change-approve-status',[SellerProductController::class,'changeApproveStatus'])->name('change-approve-status');

// Flash Sale Route

Route::get('flash-sale',[FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale',[FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product',[FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home/status-change',[FlashSaleController::class, 'changeShowAtHomeStatus'])->name('flash-sale.show-at-home.change-status');
Route::put('flash-sale-status',[FlashSaleController::class, 'changeStatus'])->name('flash-sale-status');
Route::delete('flash-sale/{id}',[FlashSaleController::class, 'destroy'])->name('flash-sale.destroy');

// Coupon Route
Route::put('coupons/change-status',[CouponController::class, 'changeStatus'])->name('coupons.change-status');
Route::resource('coupons',CouponController::class);

// Shipping Rule Route
Route::put('shipping-rule/change-status',[ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule',ShippingRuleController::class);



// Order Rule Route
Route::get('payment-status',[OrderController::class, 'changePaymentStatus'])->name('payment.status');
Route::get('orderstatus',[OrderController::class, 'changeOrderStatus'])->name('order.status');

Route::get('pending-orders',[OrderController::class, 'pendingOrders'])->name('pending-orders');
Route::get('processed-orders',[OrderController::class, 'processedOrders'])->name('processed-orders');
Route::get('dropped-off-orders',[OrderController::class, 'droppedOfOrders'])->name('dropped-off-orders');
Route::get('shipped-orders',[OrderController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('out-for-delivery-orders',[OrderController::class, 'outForDeliveryOrders'])->name('out-for-delivery-orders');
Route::get('delivered-orders',[OrderController::class, 'deliveredOrders'])->name('delivered-orders');
Route::get('canceled-orders',[OrderController::class, 'canceledOrders'])->name('canceled-orders');

// Order transaction Route
Route::get('transaction',[TransactionController::class, 'index'])->name('transaction');




Route::resource('order',OrderController::class);

Route::get('settings',[SettingController::class,'index'])->name('setting.index');

Route::put('general-setting-upadte',[SettingController::class,'generalSettingUpdate'])->name('general-setting-upadte');

Route::get('payment-settings', [PaymentSettingController::class, 'index'])->name('payment-settings.index');
Route::resource('paypal-setting', PaypalSettingController::class);
Route::put('stripe-setting/{id}', [StripeSettingController::class , 'update'])->name('stripe-setting.update');
