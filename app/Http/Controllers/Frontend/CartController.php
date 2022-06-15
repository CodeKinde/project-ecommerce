<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ShipDivision;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);
        if($product->discount_price == null){
            Cart::add([
                'id' => $id,
                'name' => $request->product_name_fr,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'size_fr' => $request->size_fr,
                    'color_fr' => $request->color_fr,
                  ],
                ]);

        return response()->json(['success' => 'Produit ajouté avec succès sur votre panier']);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name_fr,
                 'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'size_fr' => $request->size_fr,
                    'color_fr' => $request->color_fr,
                  ],
                ]);
        return response()->json(['success' => 'Produit ajouté avec succès sur votre panier']);
        }
    }

    public function AddToCartEn(Request $request, $id){
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        $product = Product::findOrFail($id);
        if($product->discount_price == null){
            Cart::add([
                'id' => $id,
                'name' => $request->product_name_en,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'size_en' => $request->size_en,
                    'color_en' => $request->color_en,
                  ],
                ]);

        return response()->json(['success' => 'successfully Added on Your cart']);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name_en,
                 'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thambnail,
                    'size_en' => $request->size_en,
                    'color_en' => $request->color_en,
                  ],
                ]);
        return response()->json(['success' => 'successfully Added on Your cart']);
        }
    }

    public function AddMiniCart(){
       $carts = Cart::content();
       $cartQty = Cart::count();
       $cartTotal = Cart::total();
       return response()->json(array(
           'carts' => $carts,
           'cartQty' => $cartQty,
           'cartTotal' => round($cartTotal),
       ));
    }

    public function RemoveMiniCart($rowId){
     Cart::remove($rowId);
     return response()->json(['error' => 'Produit retirez du panier!']);
    }

    //coupon apply method
    public function CouponApply(Request $request){
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity', '>=',Carbon::now()->format('Y-m-d'))->first();
        if($coupon){
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)
            ]);
            return response()->json(array(
                'validity' => true,
             'success' => 'Coupon Applied successfully'
            ));
        }else{
            return response()->json(['error' => 'Coupon Invalid']);
        }
    }

    public function CouponCalculation(){
        if (Session::has('coupon')) {
          return response()->json(array(
              'subtotal' => Cart::total(),
              'coupon_name' => session()->get('coupon')['coupon_name'],
              'coupon_discount' => session()->get('coupon')['coupon_discount'],
              'discount_amount' => session()->get('coupon')['discount_amount'],
              'total_amount' => session()->get('coupon')['total_amount'],
          ));
        }else{
            return response()->json(array(
                'total' => Cart::total(),
            ));
        }
    }

    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['error' => 'Coupon remove successfuly']);
    }

    public function CheckoutCreate(){
        if (Auth::check()) {
            if(Cart::total() > 0){
             $carts = Cart::content();
             $cartQty = Cart::count();
             $cartTotal = Cart::total();
             $divsions = ShipDivision::orderBy('division_name','asc')->get();

             return view('frontend.checkout.checkout_view',compact('carts','cartQty','cartTotal','divsions'));
            }else{
                $notification = array(
                    'message' => "Achats à la liste un produit",
                    'alert-type' => 'error'
                );
              return redirect()->to('/')->with($notification);
            }
        }else{
            $notification = array(
                'message' => "Vous devez d'abord vous connectez ",
                'alert-type' => 'error'            );
          return redirect()->route('login')->with($notification);
        }
    }
}
