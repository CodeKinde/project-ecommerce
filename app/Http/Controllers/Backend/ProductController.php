<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function ProductView(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }

    public function ProductAdd(){

       $categories = Category::orderBy('category_name_fr','ASC')->get();
       $brands = Brand::orderBy('id','desc')->get();
       return view('backend.product.product_add',compact('categories','brands'));
    }

    public function ProductStore(Request $request){
     $product_image = $request->file('product_thambnail');
     $name_gen = hexdec(uniqid()).'.'.$product_image->getClientOriginalExtension();
     Image::make($product_image)->resize(917,1000)->save('upload/product/thambnail/'.$name_gen);
     $save_url = 'upload/product/thambnail/'.$name_gen;
    $product_id = Product::insertGetId([
    'brand_id' => $request->brand_id,
    'category_id' => $request->category_id,
    'subcategory_id' => $request->subcategory_id,
    'subsubcategory_id' => $request->subsubcategory_id,
    'product_name_fr' => $request->product_name_fr,
    'product_name_en' => $request->product_name_en,
    'product_slug_fr' => str_replace('','-',$request->product_name_fr),
    'product_slug_en' => strtolower(str_replace('','-',$request->product_name_en)),
    'product_qty' => $request->product_qty,
    'product_code' => $request->product_code,
    'product_tags_fr' => $request->product_tags_fr,
    'product_tags_en' => $request->product_tags_en,
    'product_size_fr' => $request->product_size_fr,
    'product_size_en' => $request->product_size_en,
    'product_color_fr' => $request->product_color_fr,
    'product_color_en' => $request->product_color_en,
    'selling_price' => $request->selling_price,
    'discount_price' => $request->discount_price,
    'short_descp_fr' => $request->short_descp_fr,
    'short_descp_en' => $request->short_descp_en,
    'long_descp_fr' => $request->long_descp_fr,
    'long_descp_en' => $request->long_descp_en,
    'product_thambnail' => $save_url,
    'hot_deals' => $request->hot_deals,
    'featured' => $request->featured,
    'special_offer' => $request->special_offer,
    'special_deals' => $request->special_deals,
    'status' => 1,
    'created_at' => Carbon::now(),

     ]);
     ///=============Multip image upload=============///
     $images = $request->file('multi_img');
     foreach($images as $img){
        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/product/multi_image/'.$name_gen);
        $uploadPath = 'upload/product/multi_image/'.$name_gen;
        MultiImg::insert([
         'product_id' => $product_id,
         'photo_name' => $uploadPath,
         'created_at' => Carbon::now(),

        ]);
     }

     $notification = array(
        'message' => 'produit inséré avec success!',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
    }
    public function ProductEdit($id){
     $multiImgs = MultiImg::where('product_id',$id)->get();
    $categories = Category::latest()->get();
    $brands = Brand::latest()->get();
    $subcategory = SubCategory::latest()->get();
    $subsubcategory = SubSubCategory::latest()->get();
    $product = Product::findOrFail($id);
    return view('backend.product.product_edit',compact('categories','brands','subcategory','subsubcategory','product','multiImgs'));
   }

   public function ProductUpdate(Request $request){

    $product_id = $request->id;
    Product::findOrFail($product_id)->update([
    'brand_id' => $request->brand_id,
    'category_id' => $request->category_id,
    'subcategory_id' => $request->subcategory_id,
    'subsubcategory_id' => $request->subsubcategory_id,
    'product_name_fr' => $request->product_name_fr,
    'product_name_en' => $request->product_name_en,
    'product_slug_fr' => str_replace('','-',$request->product_name_fr),
    'product_slug_en' => strtolower(str_replace('','-',$request->product_name_en)),
    'product_qty' => $request->product_qty,
    'product_code' => $request->product_code,
    'product_tags_fr' => $request->product_tags_fr,
    'product_tags_en' => $request->product_tags_en,
    'product_size_fr' => $request->product_size_fr,
    'product_size_en' => $request->product_size_en,
    'product_color_fr' => $request->product_color_fr,
    'product_color_en' => $request->product_color_en,
    'selling_price' => $request->selling_price,
    'discount_price' => $request->discount_price,
    'short_descp_fr' => $request->short_descp_fr,
    'short_descp_en' => $request->short_descp_en,
    'long_descp_fr' => $request->long_descp_fr,
    'long_descp_en' => $request->long_descp_en,
    'hot_deals' => $request->hot_deals,
    'featured' => $request->featured,
    'special_offer' => $request->special_offer,
    'special_deals' => $request->special_deals,
    'status' => 1,
    'created_at' => Carbon::now(),
    ]);

    $notification = array(
        'message' => 'produit mise à jour sans image  avec success!',
        'alert-type' => 'info'
    );

    return redirect()->route('product.view')->with($notification);
   }

   public function MultiImageUpdate(Request $request){
       $imgs = $request->multi_img;
       foreach($imgs as $id => $img){
        $imgDel = MultiImg::findOrFail($id);
        unlink($imgDel->photo_name);
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/product/multi_image/'.$make_name);
        $uploadPath = 'upload/product/multi_image/'.$make_name;
        MultiImg::where('id',$id)->update([
            'photo_name' => $uploadPath,
            'updated_at' => Carbon::now(),
        ]);
       }
       $notification = array(
        'message' => 'produit multiple image mise à jour avec success!',
        'alert-type' => 'info'
    );

    return redirect()->back()->with($notification);
   }

   public function ThambnailImageUpdate(Request $request){
       $pro_id = $request->id;
       $oldImage = $request->old_image;
       unlink($oldImage);
       $image = $request->file('product_thambnail');
       $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(917,1000)->save('upload/product/thambnail/'.$name_gen);
       $save_url = 'upload/product/thambnail/'.$name_gen;
       Product::findOrFail($pro_id)->update([
        'product_thambnail' => $save_url,
        'updated_at' => Carbon::now(),
       ]);

       $notification = array(
        'message' => 'produit image thambnail mise à jour avec success!',
        'alert-type' => 'info'
    );

    return redirect()->back()->with($notification);
   }

   public function ProductInactive($id){

    Product::findOrFail($id)->update(['status' => 0]);
    $notification = array(
        'message' => 'produit Inactive!',
        'alert-type' => 'error'
    );

    return redirect()->back()->with($notification);
   }


   public function ProductActive($id){

    Product::findOrFail($id)->update(['status' => 1]);
    $notification = array(
        'message' => 'produit Active!',
        'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
   }

   public function ProductDelete($id){

    $product = Product::findOrFail($id);
    unlink($product->product_thambnail);
    Product::findOrFail($id)->delete();

    $images = MultiImg::where('product_id',$id)->get();
    foreach ($images as $img) {
        unlink($img->photo_name);
        MultiImg::where('product_id',$id)->delete();
    }
    $notification = array(
        'message' => 'produit Supprimer avec success!',
        'alert-type' => 'info'
    );
    return redirect()->back()->with($notification);
   }

   public function ProductDetails($id){
    $multiImgs = MultiImg::where('product_id',$id)->get();
    $product = Product::findOrFail($id);
    return view('backend.product.product_details',compact('product','multiImgs'));
   }
}
