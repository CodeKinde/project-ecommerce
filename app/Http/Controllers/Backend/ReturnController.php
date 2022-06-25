<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReturnController extends Controller
{
    public function ReturnRequest(){

        $orders = Order::where('order_return',1)->latest()->get();
        return view('backend.return_order.return_request',compact('orders'));
    }
    public function ReturnRequestApprove($order_id){
        Order::where('id',$order_id)->update(['order_return' => 2]);
        $notification = array(
            'message' => ' Commande return avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function ReturnRequestAll(){
        $orders = Order::where('order_return',2)->latest()->get();
        return view('backend.return_order.all_return_request',compact('orders'));
    }
}
