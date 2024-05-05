<?php
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
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


Route::get('/admin/order_list', function () {
    return view('admin.order_list');
});

Route::get('/admin/order_detail', function () {
    return view('admin.order_detail');
});
//upload
Route::post('/upload',[UploadController::class,'uploadImage']);
Route::post('/uploads',[UploadController::class,'uploadImages']);

//frontend
Route::get('/',[FrontendController::class,'index']);
Route::get('/product', function () {return view('product_detail');});
Route::get('/cart', function () {return view('cart');});
Route::get('/cart/confirm', function () {return view('order.confirm');});
Route::get('/cart/success', function () {return view('order.success');});