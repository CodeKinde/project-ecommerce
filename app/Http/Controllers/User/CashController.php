<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CashController extends Controller
{
    public function CashOrder(Request $request){

        if(Session::has('coupon')){
            $total_amount = session()->get('coupon')['total_amount'];
        }else{
            $total_amount = round(Cart::total());
        }

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'notes' => $request->notes,
            'payment_type' => 'Cash On Delibery',
            'payment_method' => "Cash On Delibery",
            'currency' => "Usd",
            'amount' => $total_amount,
            'invoice_no' => 'AEL'.mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'created_at' => Carbon::now(),
            'status' => 'Pending',

        ]);
        $invoice = Order::findOrFail($order_id);
        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
        ];
        Mail::to($request->email)->send(new OrderMail($data));

        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::insert([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color_fr,
                'size' => $cart->options->size_fr,
                'price' => $cart->price,
                'qty' => $cart->qty,
                'created_at' => Carbon::now(),
            ]);
        }
        if(Session::has('coupon')){
            session()->forget('coupon');
        }
        Cart::destroy();

        $notification = array(
            'message' => ' Votre commande place avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }//end method
}
