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
        $orders = Order::where('status','Traitement')->orderBy('id','desc')->get();
        return view('backend.orders.processing_orders',compact('orders'));
    }

    public function PickedOrders(){
        $orders = Order::where('status','Choisie')->orderBy('id','desc')->get();
        return view('backend.orders.picked_orders',compact('orders'));
    }

    public function ShippedOrders(){
        $orders = Order::where('status','Envoyé')->orderBy('id','desc')->get();
        return view('backend.orders.shipped_orders',compact('orders'));
    }

    public function DeliveredOrders(){
        $orders = Order::where('status','Livré')->orderBy('id','desc')->get();
        return view('backend.orders.delivered_orders',compact('orders'));
    }

    public function CancelOrders(){
        $orders = Order::where('status','Annulé')->orderBy('id','desc')->get();
        return view('backend.orders.cancel_orders',compact('orders'));
    }//end method

    public function PendingToConfirm($order_id){
       Order::findOrFail($order_id)->update(['status' => "Confirmé"]);
       $notification = array(
        'message' => 'Commande confirmé avec succès!',
        'alert-type' => 'info'
       );
       return redirect()->route('confirm.order')->with($notification);
    }

    public function ConfirmToProcessing($order_id){
        Order::findOrFail($order_id)->update(['status' => "Traitement"]);
       $notification = array(
        'message' => 'Commande traité avec succès!',
        'alert-type' => 'info'
       );
       return redirect()->route('processing.order')->with($notification);
    }

    public function ProcessingToPicked($order_id){
        Order::findOrFail($order_id)->update(['status' => "Choisie"]);
        $notification = array(
         'message' => 'Commande choisie avec succès!',
         'alert-type' => 'info'
        );
        return redirect()->route('picked.order')->with($notification);
    }

    public function PickedToShipped($order_id){
        Order::findOrFail($order_id)->update(['status' => "Envoyé"]);
        $notification = array(
         'message' => 'Commande envoyé avec succès!',
         'alert-type' => 'info'
        );
        return redirect()->route('shipped.order')->with($notification);
    }

    public function ShippedToDelivered($order_id){
        Order::findOrFail($order_id)->update(['status' => "Livré"]);
        $notification = array(
         'message' => 'Commande livré avec succès!',
         'alert-type' => 'info'
        );
        return redirect()->route('delivered.order')->with($notification);
    }
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
