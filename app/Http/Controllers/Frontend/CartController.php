<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id){

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
}
