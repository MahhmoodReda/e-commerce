<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id' , Auth::user()->id)->paginate(4);
        return view('user.pages.orders.orders',compact('orders'));
    }

    public function showOrder($id)
    {
        $order = Order::where('id',$id)->where('user_id',Auth::user()->id)->first();
        if($order)
        {
            return view('user.pages.orders.show-order',compact('order'));
        }else{
            return redirect()->back()->with('error' , 'no order found');
        }
    }
}
