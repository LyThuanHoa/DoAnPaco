<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\product;
use App\Models\order;
use App\Models\book;
use App\Models\category;
use App\Models\news;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

use function Laravel\Prompts\alert;

class FrontendController extends Controller
{
    public function index(){
        $products = product::all();
        return view('home',[
            'products' => $products
        ]);
    }
    public function show_product(Request $request){
        $product = product::find($request -> id);
        return view('product_detail',[
            'product' => $product
        ]);
    }
    //cart 
    public function add_cart(Request $request){
        $product_id = $request -> product_id;
        $product_qty = $request -> product_qty;
        if(is_null(Session::get('cart')))
        {
            Session::put('cart',[
                $product_id => $product_qty
            ]);
            return redirect('/cart');
        }
        else{
            $cart = Session::get('cart');
            if(Arr::exists($cart,$product_id)){
                $cart[$product_id] = $cart[$product_id] + $product_qty;
                Session::put('cart',$cart);
                return redirect('/cart');
            }else{
                $cart[$product_id] = $product_qty;
                Session::put('cart',$cart);
                return redirect('/cart');
            }
        }
    }
    public function show_cart(){
        $cart = Session::get('cart');
        $product_id = array_keys($cart);
        $products = product::whereIn('id',$product_id) -> get();
        //dd($products);
        return view('cart',[
            'products' => $products
        ]);
    }
    public function delete_cart(Request $request){
        $cart = Session::get('cart');
        $product_id = $request -> id;
        unset($cart[$product_id]);
        Session::put('cart',$cart);
        return redirect('/cart');
    }
    public function update_cart(Request $request){
        $cart = $request -> product_id;
        Session::put('cart',$cart);
        return redirect('/cart');
    }
    // public function send_cart(Request $request){
        
    //     $token = Str::random(12);
    //     $order = new order;
    //     $order -> name = $request -> input('name');
    //     $order -> phone = $request -> input('phone');
    //     $order -> email = $request -> input('email');
    //     $order -> city = $request -> input('city');
    //     $order -> district = $request -> input('district');
    //     $order -> ward = $request -> input('ward');
    //     $order -> address = $request -> input('address');
    //     $order -> note = $request -> input('note');
    //     $order_detail = json_encode($request -> input('product_id'));
    //     $order -> order_detail = $order_detail;
    //     $order -> token = $token;
    //     $order -> save();
    //     $mailIfor = $order -> email;
    //     $nameIfor = $order -> name;
    //     $Mail = Mail::to($mailIfor) -> send(new TestMail($nameIfor));
    //     return redirect('/order/confirm');
    // }
    public function show_login(){
        return view('login');
    }
    // public function check_login(Request $request){
    //     if(Auth::attempt(
    //         ['email' => $request -> input('email'),
    //         'password'=> $request -> input('password')
    //         ]
    //     ))
    //         return redirect('admin');
        
    //         return redirect()-> back();
    // }
    public function show_book(){
        $books = book::all();
        return view('book',[
            'books' => $books,
        ]);
    }
    public function send_book(Request $request){
        $token = Str::random(8);
        $book = new book;
        $book -> name = $request -> input('name');
        $book -> phone = $request -> input('phone');
        $book -> email = $request -> input('email');
        $book -> quantity = $request -> input('quantity');
        $book -> date = $request -> input('date');
        $book -> hour = $request -> input('hour');
        $book -> save();

        return redirect('/book/success');
    }
    public function success_book(){
        return view('book_success',[
        ]);
    }

    public function show_news(){
        $news = news::all();
        return view('news',[
            'news' => $news,
        ]);
    }
    public function show_product_list(){
        $products = product::paginate(12);
        $categories = category::all();
        return view('product_list',[
            'products' => $products,
            'categories' => $categories
        ]);

    }
    // public function show_product_category(Request $request){
    //     // Lấy ID của danh mục từ request
    //     $categories = category::all();
    //     $category_id = $request->id;
    //     $products = product::paginate(12);
        
    
    //     return view('product_category', [
    //         //'category' => $category,
    //         'products' => $products,
    //         'categories' => $categories
    //     ]);
    // }
    public function show_product_category($id)
{
    // Lấy tất cả danh mục
    $categories = category::all();

    // Lấy danh mục cụ thể theo id
    $category = category::findOrFail($id);

    $products = $category->products()->paginate(12);

    // Truyền dữ liệu vào view
    return view('product_category', [
        'category' => $category,
        'products' => $products,
        'categories' => $categories
    ]);
}
public function search(Request $request)
{
    $query = $request->input('query');
    
    // Tìm kiếm sản phẩm theo tên
    $products = product::where('name', 'LIKE', "%{$query}%")->paginate(12);
    $categories = category::all();

    return view('product_list', [
        'products' => $products,
        'categories' => $categories
    ]);
}

    
}
