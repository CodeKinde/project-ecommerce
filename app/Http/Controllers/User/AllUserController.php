<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AllUserController extends Controller
{
    public function MyOrderView(){
        $order = Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
        return view('frontend.user.order.order_view',compact('order'));
    }

    public function OrderDetail($order_id){

        $order = Order::with('division','district','state','user')->where('user_id',Auth::id())->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

        return view('frontend.user.order.order_detail',compact('order','orderItem'));

    }
}
