<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function list_book(){
        $books = book::all();
         return view('admin.book.list',[
             'books' => $books,
              'title' => 'Danh sách đặt lịch nặn gốm'
         ]);
     }
     public function delete_book(Request $request){
        book::find($request -> book_id)->delete();
        return response() -> json([
            'success' => true
        ]);
    }
    public function edit_book(Request $request){
        $book = book::find($request-> id);
        return view('admin.book.edit',[
            'title' => 'Sửa lịch ',
            'book' => $book
        ]);
    }

    public function update_book(Request $request){
        $book = book::find($request -> id);
        $book -> name = $request -> input('name');
        $book -> phone = $request -> input('phone');
        $book -> email = $request -> input('email');
        $book -> quantity = $request -> input('quantity');
        $book -> date = $request -> input('date');
        $book -> hour = $request -> input('hour');
        $book -> save();
        return redirect('/admin/book/list');
    }
}
