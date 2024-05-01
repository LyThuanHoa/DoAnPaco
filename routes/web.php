<?php
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\admin\ProductController;
use Illuminate\Support\Facades\Route;
//Admin
Route::get('/admin', function () {
    return view('admin.home');
});

//Product
Route::post('/admin/product/add',[ProductController::class,'insert_product']);
Route::get('/admin/product_add',[ProductController::class,'add-product']);
Route::get('/admin/product_list', function () {
    return view('admin.product_list');
}); 

Route::get('/admin/order_list', function () {
    return view('admin.order_list');
});

Route::get('/admin/order_detail', function () {
    return view('admin.order_detail');
});

Route::post('/upload',[UploadController::class,'uploadImage']);
Route::post('/uploads',[UploadController::class,'uploadImages']);
Route::get('/', function () {
    return view('welcome');
});
