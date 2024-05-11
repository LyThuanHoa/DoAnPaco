<?php

use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Models\product;
use App\Models\order;
//Admin
Route::get('/admin', function () {
    return view('admin.home');
});

//Product
Route::post('/admin/product/add',[ProductController::class,'insert_product']);
Route::get('/admin/product/create',[ProductController::class,'add_product']);
Route::get('/admin/product/list',[ProductController::class,'list_product']); 
Route::get('/admin/product/delete',[ProductController::class,'delete_product']);
Route::get('/admin/product/edit/{id}',[ProductController::class,'edit_product']);
Route::post('/admin/product/edit/{id}',[ProductController::class,'update_product']);

//order 
Route::get('/admin/order/list',[OrderController::class,'list_order']);

Route::get('/admin/order_detail', function () {
    return view('admin.order_detail');
});
//upload
Route::post('/upload',[UploadController::class,'uploadImage']);
Route::post('/uploads',[UploadController::class,'uploadImages']);

//frontend
Route::get('/',[FrontendController::class,'index']);
Route::get('/product/{id}',[FrontendController::class,'show_product']);
Route::get('/order/confirm', function () {return view('order.confirm');});
Route::get('/order/success', function () {return view('order.success');});
//cart
Route::post('/cart/add',[FrontendController::class,'add_cart']);
Route::get('/cart',[FrontendController::class,'show_cart']);
Route::get('/cart/delete/{id}',[FrontendController::class,'delete_cart']);
Route::post('/cart/update',[FrontendController::class,'update_cart']);
Route::post('/cart/send',[FrontendController::class,'send_cart']);