<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class OrderController extends Controller
{
    public function list_order(){
        $orders = order::all();
        return view('admin.order.list',[
            'orders' => $orders
        ]);
    }
}
