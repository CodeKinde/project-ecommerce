<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
      $subcategory = SubCategory::latest()->get();
       return view('backend.category.sub_category_view',compact('subcategory'));
    }

    public function SubCategoryAdd(){
      $category = Category::orderBy('category_name_fr','asc')->get();
      return view('backend.category.sub_category_add',compact('category'));
    }//end method

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_fr' => 'required',
            'subcategory_name_en' => 'required',
        ],[
            'category_id.required' => 'Sur vous plais selectionnez un category',
            'subcategory_name_fr.required' => 'Input sub catgeory French name',
            'subcategory_name_en.required' => 'Input sub catgeory English name',
        ]);

        SubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_name_fr' => $request->subcategory_name_fr,
         'subcategory_name_en' => $request->subcategory_name_en,
         'subcategory_slug_fr' => str_replace('','-',$request->subcategory_name_fr),
         'subcategory_slug_en' => strtolower(str_replace('','-',$request->subcategory_name_en)),
        ]);
        $notification = array(
            'message' => 'sub categorie inséré avec success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end method

    public function SubCategoryEdit($id){
        $category = Category::orderBy('category_name_fr','asc')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.sub_category_edit',compact('category','subcategory'));
    }

    public function SubCategoryUpdate(Request $request){
        $subcat_id = $request->id;
        SubCategory::findOrFail($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_fr' => $request->subcategory_name_fr,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_slug_fr' => str_replace('','-',$request->subcategory_name_fr),
            'subcategory_slug_en' => strtolower(str_replace('','-',$request->subcategory_name_en)),
           ]);
           $notification = array(
               'message' => 'sub categorie modifié avec success!',
               'alert-type' => 'info'
           );
           return redirect()->route('subcategory.view')->with($notification);
    }
    public function SubCategoryDelete($id){
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();
        $notification = array(
            'message' => 'sub categorie supprimé avec success!',
            'alert-type' => 'info'
        );
        return redirect()->route('subcategory.view')->with($notification);
    }
    //========================Sub sub Category Method All==================//
    public function SubSubCategoryView(){
        $subsubcategory = SubSubCategory::latest()->get();
        return view('backend.category.sub_sub_category_view',compact('subsubcategory'));
    }

    public function SubSubCategoryAdd(){
        $category = Category::orderBy('category_name_fr','asc')->get();
       // $subcategory = SubCategory::orderBy('subcategory_name_fr','asc')->get();
        return view('backend.category.sub_sub_category_add',compact('category',));
    }

    public function GetSubCategory($category_id){
        $subcateg = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_fr','asc')->get();
        return json_encode($subcateg);
    }
    public function GetSubSubCategory($subcategory_id){
        $subsubcateg = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_fr','asc')->get();
        return json_encode($subsubcateg);
    }

    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_fr' => 'required',
            'subsubcategory_name_en' => 'required',
        ],[
            'category_id.required' => 'Sur vous plais selectionnez un category',
            'subcategory_id.required' => 'Sur vous plais selectionnez un sub category',
            'subsubcategory_name_fr.required' => 'Input sub sub catgeory French name',
            'subsubcategory_name_en.required' => 'Input sub sub catgeory English name',
        ]);

        SubSubCategory::insert([
         'category_id' => $request->category_id,
         'subcategory_id' => $request->subcategory_id,
         'subsubcategory_name_fr' => $request->subsubcategory_name_fr,
         'subsubcategory_name_en' => $request->subsubcategory_name_en,
         'subsubcategory_slug_fr' => str_replace('','-',$request->subsubcategory_name_fr),
         'subsubcategory_slug_en' => strtolower(str_replace('','-',$request->subsubcategory_name_en)),
        ]);
        $notification = array(
            'message' => 'sub sub categorie inséré avec success!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){
        $category = Category::orderBy('category_name_fr','asc')->get();
        $subcategory = SubCategory::orderBy('subcategory_name_fr','asc')->get();

        $subsubcategory = SubSubCategory::findOrFail($id);
       return view('backend.category.sub_sub_category_edit',compact('category','subcategory','subsubcategory'));
    }

    public function SubSubCategoryUpdate(Request $request){
        $subsubcateg_id = $request->id;
        SubSubCategory::findOrFail($subsubcateg_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_fr' => $request->subsubcategory_name_fr,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_slug_fr' => str_replace('','-',$request->subsubcategory_name_fr),
            'subsubcategory_slug_en' => strtolower(str_replace('','-',$request->subsubcategory_name_en)),
           ]);
           $notification = array(
               'message' => 'sub sub categorie modifié avec success!',
               'alert-type' => 'info'
           );
           return redirect()->route('sub-subcategory.view')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        $subsubcategory = SubSubCategory::findOrFail($id);
        $subsubcategory->delete();

        $notification = array(
            'message' => 'sub sub categorie supprimé avec success!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
