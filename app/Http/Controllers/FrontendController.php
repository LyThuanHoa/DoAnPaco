<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\product;
use App\Models\order;
use App\Models\book;
use App\Models\warehouse;
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
        $products = product::orderBy('created_at', 'desc')->paginate(8);
        $allProducts = product::orderBy('price_sale', 'desc')->paginate(8);
        return view('home', [
            'products' => $products,
            'allProducts' => $allProducts
        ]);
    }
    
    public function show_product(Request $request)
    {
        // Tìm sản phẩm theo id
        $product = product::find($request->id);
    
        // Tìm kho hàng dựa trên product_id
        $warehouse = warehouse::where('product_id', $request->id)->first();
    
        // Lấy quantity_sold từ kho hàng
        $quantityInventory = $warehouse ? $warehouse->inventory : 0;
    
        // Truyền dữ liệu tới view
        return view('product_detail', [
            'product' => $product,
            'quantityInventory' => $quantityInventory
        ]);
    }
    public function add_cart(Request $request){
        $product_id = $request->product_id;
        $product_qty = $request->product_qty;
    
        if(is_null(Session::get('cart'))) {
            Session::put('cart', [
                $product_id => $product_qty
            ]);
        } else {
            $cart = Session::get('cart');
            if(Arr::exists($cart, $product_id)) {
                $cart[$product_id] = $cart[$product_id] + $product_qty;
            } else {
                $cart[$product_id] = $product_qty;
            }
            Session::put('cart', $cart);
        }
    
        // Trả về phản hồi JSON
        return response()->json(['success' => true, 'cart_count' => array_sum(Session::get('cart'))]);
    }
    public function getCartCount() {
        $cart = Session::get('cart', []);
        $cartCount = array_sum($cart);
        return response()->json(['cart_count' => $cartCount]);
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
    public function show_login(){
        return view('login');
    }
    public function check_login(Request $request){
         if(Auth::attempt(
             ['email' => $request -> input('email'),
             'password'=> $request -> input('password')
             ]
         ))
             return redirect('admin');
        
             return redirect()-> back();
     }
     public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        $request->session()->invalidate(); // Xóa tất cả các session hiện tại
        $request->session()->regenerateToken(); // Tạo lại token CSRF

        return redirect('/login'); // Chuyển hướng người dùng đến trang chủ hoặc trang đăng nhập
    }
    public function show_book(){
        $books = book::all();
        return view('book',[
            'books' => $books,
        ]);
    }
    public function send_book(Request $request)
    {
        // Trim whitespace from specific input fields
        $request->merge([
            'name' => trim($request->input('name')),
            'phone' => trim($request->input('phone')),
            'email' => trim($request->input('email')),
        ]);
    
        // Validation rules
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9]{10}$/', // Adjust the regex as per your phone number format
            'email' => 'nullable|email|max:255',
            'quantity' => 'required|integer|min:1|max:100',
            'date' => 'required|date|after_or_equal:today',
            'hour' => 'nullable|date_format:H:i', // Adjust the format as needed
        ], [
            'name.required' => 'Họ và tên là bắt buộc.',
            'name.string' => 'Họ và tên phải là chuỗi ký tự.',
            'name.max' => 'Họ và tên không được vượt quá 255 ký tự.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.string' => 'Số điện thoại phải là chuỗi ký tự.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'email.email' => 'Email phải đúng định dạng.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
            'quantity.required' => 'Số lượng người là bắt buộc.',
            'quantity.integer' => 'Số lượng người phải là số nguyên.',
            'quantity.min' => 'Số lượng người tối thiểu là 1.',
            'quantity.max' => 'Số lượng người tối đa là 100.',
            'date.required' => 'Ngày đặt là bắt buộc.',
            'date.date' => 'Ngày đặt không hợp lệ.',
            'date.after_or_equal' => 'Ngày đặt không được là ngày trong quá khứ.',
            'hour.date_format' => 'Giờ đặt không hợp lệ.',
        ]);
    
        // Create new book entry
        $token = Str::random(8);
        $book = new book;
        $book->name = $request->input('name');
        $book->phone = $request->input('phone');
        $book->email = $request->input('email'); 
        $book->quantity = $request->input('quantity');
        $book->date = $request->input('date');
        $book->hour = $request->input('hour'); 
        $book->save();
    
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
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('show', compact('news'));
    }
    public function show_product_list(){
        $products = product::paginate(16);
        $newProducts = product::orderBy('price_sale', 'desc')->paginate(4);
        $categories = category::all();
        return view('product_list',[
            'products' => $products,
            'categories' => $categories,
            'newProducts' => $newProducts
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
public function search(Request $request) {
    $query = $request->input('query');
    $keywords = explode(' ', $query);

    $products = product::query();

    // Sử dụng where để bắt đầu nhóm điều kiện
    $products->where(function($query) use ($keywords) {
        foreach ($keywords as $keyword) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }
    });

    $products = $products->orderBy('created_at', 'desc')->paginate(12);

    $noResults = $products->isEmpty();

    return view('search-results', [
        'products' => $products,
        'query' => $query,
        'noResults' => $noResults
    ]);
}


    
}
