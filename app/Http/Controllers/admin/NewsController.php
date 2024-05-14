<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\news;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function list_news(){
        $news = DB::table('news')->paginate(10);
        return view('admin.news.list',[
            'title' => 'Danh sách tin tức',
            'news' => $news
        ]);
    }
     public function add_news(){
         return view('admin.news.add',[
              'title' => 'Thêm mới tin tức'
         ]);
     }
     public function insert_news(Request $request){
        $news = new news();
        $news -> title = $request -> input('title');
        $news -> avatar = $request -> input('avatar');
        $news -> summary = $request -> input('summary');
        $news -> content = $request -> input('content');
        $news -> save();
        return redirect() -> back();
    }
    public function delete_news(Request $request){
        news::find($request -> news_id)->delete();
        return response() -> json([
            'success' => true
        ]);
    }

    public function edit_news(Request $request){
        $news = news::find($request-> id);
        return view('admin.news.edit',[
            'title' => 'Sửa tin tức',
            'news' => $news
        ]);
    }

    public function update_news(Request $request){
        $news = news::find($request -> id);
        $news -> title = $request -> input('title');
        $news -> avatar = $request -> input('avatar');
        $news -> summary = $request -> input('summary');
        $news -> content = $request -> input('content');
        $news -> save();
        return redirect('/admin/news/list');
    }
}
