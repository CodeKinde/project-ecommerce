<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function AddToWishlist(Request $request, $product_id){
        if (Auth::check()) {
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
         if(!$exists){
            Wishlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now(),
            ]);
          }else{
            return response()->json(['error' => "Ce produit a déjà sur votre liste de souhaits
            "]);
          }
            return response()->json(['success' => "ajouté avec succès à votre liste de souhaits
            "]);
        }else{
            return response()->json(['error' => "Connectez-vous d'abord à votre compte
            "]);
        }
    }

    public function WishlistView(){

        return view('frontend.wishlist.view_wishlist');
    }

    public function GetWishlistProduct(){
     $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
     return response()->json($wishlist);
    }

    public function RemoveWishlistProductFr($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['error' => "produit supprimer avec succès!"]);
    }
    public function RemoveWishlistProduct($id){

        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['error' => "successfully product remove!"]);
    }
}
