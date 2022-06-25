<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class OrderController extends Controller
{
    //pending order
    public function PendingOrders(){
        $orders = Order::where('status','pending')->orderBy('id','desc')->get();
        return view('backend.orders.pending_orders',compact('orders'));
    }

    public function PendingOrdersDetails($order_id){
        $order = Order::with('division','district','state','user')->where('user_id',Auth::id())->where('id',$order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

        return view('backend.orders.pending_order_details',compact('order','orderItem'));

     }
    public function ConfirmOrders(){
        $orders = Order::where('status','confirm')->orderBy('id','desc')->get();
        return view('backend.orders.confirm_orders',compact('orders'));
    }

    public function ProcessingOrders(){
        $orders = Order::where('status','processing')->orderBy('id','desc')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    }

    public function PickedOrders(){
        $orders = Order::where('status','picked')->orderBy('id','desc')->get();
        return view('backend.orders.picked_orders',compact('orders'));
    }

    public function ShippedOrders(){
        $orders = Order::where('status','shipped')->orderBy('id','desc')->get();
        return view('backend.orders.shipped_orders',compact('orders'));
    }

    public function DeliveredOrders(){
        $orders = Order::where('status','delivered')->orderBy('id','desc')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    }


    public function PendingToConfirm($order_id){
       Order::findOrFail($order_id)->update(['status' => "confirm"]);
       $notification = array(
        'message' => 'Commande confirmé avec succès!',
        'alert-type' => 'info'
       );
       return redirect()->route('confirm.order')->with($notification);
    }

    public function ConfirmToProcessing($order_id){
        Order::findOrFail($order_id)->update(['status' => "processing"]);
       $notification = array(
        'message' => 'Commande traité avec succès!',
        'alert-type' => 'info'
       );
       return redirect()->route('processing.order')->with($notification);
    }

    public function ProcessingToPicked($order_id){
        Order::findOrFail($order_id)->update(['status' => "picked"]);
        $notification = array(
         'message' => 'Commande choisie avec succès!',
         'alert-type' => 'info'
        );
        return redirect()->route('picked.order')->with($notification);
    }

    public function PickedToShipped($order_id){
        Order::findOrFail($order_id)->update(['status' => "shipped"]);
        $notification = array(
         'message' => 'Commande envoyé avec succès!',
         'alert-type' => 'info'
        );
        return redirect()->route('shipped.order')->with($notification);
    }

    public function ShippedToDelivered($order_id){
        Order::findOrFail($order_id)->update(['status' => "delivered"]);
        $notification = array(
         'message' => 'Commande livré avec succès!',
         'alert-type' => 'info'
        );
        return redirect()->route('delivered.order')->with($notification);
    }

    public function CancelOrders(){
        $orders = Order::where('status','cancel')->orderBy('id','desc')->get();
        return view('backend.orders.cancel_orders',compact('orders'));
    }//end method


    public function InvoiceDownload($order_id){

        $order = Order::with('division','district','state','user')->where('user_id',Auth::id())->where('id',$order_id)->first();

        $orderItem = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','desc')->get();

        $pdf = PDF::loadView('backend.orders.order_invoice',compact('order','orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('Facture.pdf');
    }

}
