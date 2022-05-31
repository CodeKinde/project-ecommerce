<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index(){
        $sliders = Slider::where('status',1)->orderBy('id','desc')->get();
        $categories = Category::orderBy('id','asc')->get();
        $products = Product::where('status',1)->latest()->get();
        $featured = Product::where('featured',1)->orderBy('product_name_fr','desc')->get();
        $special_offer = Product::where('special_offer',1)->orderBy('product_name_fr','desc')->get();
        $special_deals = Product::where('special_deals',1)->orderBy('product_name_fr','desc')->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_subcategory_0  = SubCategory::skip(0)->first();
        $skip_sproduct_0 = Product::where('status',1)->where('subcategory_id',$skip_subcategory_0->id)->orderBy('id','DESC')->get();

        $skip_brand_1 = Brand::skip(1)->first();

        $skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','desc')->get();

        //return $ski_category->id;
        //die();

        return view('frontend.index',compact('sliders','categories','products','featured','special_offer','special_deals','skip_category_0','skip_product_0','skip_subcategory_0','skip_sproduct_0','skip_brand_1','skip_brand_product_1'));
    }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_image/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_image'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => ' profile utilisateur mise à jour avec succès!',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function UserChangePassword(){

        $id = Auth::user()->id;
        $user = User::find($id);

        return view('frontend.profile.user_change_password',compact('user'));
    }

    public function UserPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }
    }

    public function ProductDetails($id,$name){
    $product = Product::findOrFail($id);
    $multiImage = MultiImg::where('product_id',$id)->get();
    return view('frontend.product.product_details',compact('product','multiImage'));
    }
}
