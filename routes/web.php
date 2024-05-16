<?php

use App\Http\Controllers\admin\BookController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\WarehouseController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Models\product;
use App\Models\order;
use App\Models\book;
use App\Models\news;
use App\Models\category;
use App\Models\warehouse;

//Login
//Route::get('/login',[FrontendController::class,'show_login'])-> name('login');
//Route::post('/check_login',[ProductController::class,'check_login']);
//Admin
// Route::middleware('auth') -> group(function(){
//     Route::prefix('admin') -> group(function(){
//         Route::get('/',function() {return view('admin.home');});
//         Route::get('product/list',[ProductController::class,'list_product']);
//     });
// });



Route::get('/admin',function() {return view('admin.home');});

//Product
Route::post('/admin/product/add',[ProductController::class,'insert_product']);
Route::get('/admin/product/create',[ProductController::class,'add_product']);
Route::get('/admin/product/list',[ProductController::class,'list_product']); 
Route::get('/admin/product/delete',[ProductController::class,'delete_product']);
Route::get('/admin/product/edit/{id}',[ProductController::class,'edit_product']);
Route::post('/admin/product/edit/{id}',[ProductController::class,'update_product']);

//order 
Route::get('/admin/order/list',[OrderController::class,'list_order']);
Route::get('/admin/order/detail/{order_detail}',[OrderController::class,'detail_order']);
Route::get('/admin/order/delete',[OrderController::class,'delete_order']);
Route::get('/admin/order/detail/delete/{id}',[OrderController::class,'delete_order_detail']);

//book
Route::get('/admin/book/list',[BookController::class,'list_book']);
Route::get('/admin/book/delete',[BookController::class,'delete_book']);
Route::get('/admin/book/edit/{id}',[BookController::class,'edit_book']);
Route::post('/admin/book/edit/{id}',[BookController::class,'update_book']);

//news
Route::post('/admin/news/add',[NewsController::class,'insert_news']);
Route::get('/admin/news/create',[NewsController::class,'add_news']);
Route::get('/admin/news/list',[NewsController::class,'list_news']);
Route::get('/admin/news/delete',[NewsController::class,'delete_news']);
Route::get('/admin/news/edit/{id}',[NewsController::class,'edit_news']);
Route::post('/admin/news/edit/{id}',[NewsController::class,'update_news']);

//category
Route::post('/admin/category/add',[CategoryController::class,'insert_category']);
Route::get('/admin/category/create',[CategoryController::class,'add_category']);
Route::get('/admin/category/list',[CategoryController::class,'list_category']);
Route::get('/admin/category/delete',[CategoryController::class,'delete_category']);
Route::get('/admin/category/edit/{id}',[CategoryController::class,'edit_category']);
Route::post('/admin/category/edit/{id}',[CategoryController::class,'update_category']);


Route::get('/order/confirm/{token}', [OrderController::class, 'confirmOrder'])->name('order.confirm');

//warehouse
Route::post('/admin/warehouse/add',[WarehouseController::class,'insert_warehouse']);
Route::get('/admin/warehouse/create',[WarehouseController::class,'add_warehouse']);
Route::get('/admin/warehouse/list',[WarehouseController::class,'list_warehouse']);
Route::get('/admin/warehouse/delete',[WarehouseController::class,'delete_warehouse']);
Route::get('/admin/warehouse/edit/{id}',[WarehouseController::class,'edit_warehouse']);
Route::post('/admin/warehouse/edit/{id}',[WarehouseController::class,'update_warehouse']);



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
Route::post('/cart/send',[OrderController::class,'send_cart']);
//Book
Route::get('/book/add',[FrontendController::class,'show_book']);
Route::get('/book/success',[FrontendController::class,'success_book']);
Route::post('/book/send',[FrontendController::class,'send_book']);

//News
Route::get('/news',[FrontendController::class,'show_news']);

//Product
Route::get('/product',[FrontendController::class,'show_product_list']);
Route::get('/product_list/{id}', [FrontendController::class, 'show_product_category']);
Route::get('/product/search', [FrontendController::class, 'search'])->name('product.search');
