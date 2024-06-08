<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function list_category(){
        $categories = category::all();
        return view('admin.category.list',[
            'title' => 'Danh sách danh mục',
            'categories' => $categories
        ]);
    }
    public function add_category(){
        return view('admin.category.add',[
             'title' => 'Thêm mới danh mục sản phẩm'
        ]);
    }
    public function insert_category(Request $request){
        $category = new category();
        $category -> name = $request -> input('name');
        $category -> description = $request -> input('description');
        $category -> save();
        return redirect() -> back();
    }
    public function delete_category(Request $request){
        category::find($request -> category_id)->delete();
        return response() -> json([
            'success' => true
        ]);
    }

    public function edit_category(Request $request){
        $category = category::find($request-> id);
        return view('admin.category.edit',[
            'title' => 'Sửa danh mục',
            'category' => $category
        ]);
    }

    public function update_category(Request $request){
        $category = category::find($request -> id);
        $category -> name = $request -> input('name');
        $category -> description = $request -> input('description');
        $category -> save();
        return redirect('/admin/category/list');
    }
}
