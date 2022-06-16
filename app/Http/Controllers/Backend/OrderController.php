<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //pending order
    public function PendingOrders(){
        $orders = Order::where('status','Pending')->orderBy('id','desc')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    }

    public function PendingOrdersDetails($order_id){
        $order = Order::with('division','district','state','user')->where('user_id',Auth::id())->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

        return view('backend.orders.pending_order_details',compact('order','orderItem'));

     }
    public function ConfirmOrders(){
        $orders = Order::where('status','Confirmé')->orderBy('id','desc')->get();
        return view('backend.orders.confirm_orders',compact('orders'));
    }

    public function ProcessingOrders(){
        $orders = Order::where('status','Processing')->orderBy('id','desc')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    }

    public function PickedOrders(){
        $orders = Order::where('status','Picked')->orderBy('id','desc')->get();
        return view('backend.orders.picked_orders',compact('orders'));
    }

    public function ShippedOrders(){
        $orders = Order::where('status','Shipped')->orderBy('id','desc')->get();
        return view('backend.orders.shipped_orders',compact('orders'));
    }

    public function DeliveredOrders(){
        $orders = Order::where('status','Delivered')->orderBy('id','desc')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    }
}
