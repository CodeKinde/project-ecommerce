<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CouponController extends Controller
{
    public function CouponView(){

        $coupons = Coupon::latest()->get();
        return view('backend.coupon.coupon_view',compact('coupons'));
    }

    public function CouponAdd(){
        return view('backend.coupon.coupon_add');
    }

    public function CouponStore(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
        ]);

        Coupon::insert([
         'coupon_name' => strtoupper($request->coupon_name),
         'coupon_discount' => $request->coupon_discount,
         'coupon_validity' => $request->coupon_validity,
         'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Coupon inséré avec success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
    public function CouponEdit($id){
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit',compact('coupon'));
    }
    public function CouponUpdate(Request $request){
        $coupon_id = $request->id;
        Coupon::findOrFail($coupon_id)->update([
        'coupon_name' => strtoupper($request->coupon_name),
        'coupon_discount' => $request->coupon_discount,
        'coupon_validity' => $request->coupon_validity,
        ]);
        $notification = array(
            'message' => 'Coupon mise à jour avec success!',
            'alert-type' => 'success'
        );

        return redirect()->route('coupon.view')->with($notification);
    }

    public function CouponDelete($id){
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        $notification = array(
            'message' => 'Coupon supprimer avec success!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
