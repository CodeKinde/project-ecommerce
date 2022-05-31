<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryView(){

        $category = Category::latest()->get();
        return view('backend.category.category_view',compact('category'));
    }
    public function CategoryAdd(){
        return view('backend.category.category_add');
    }

    public function CategoryStore(Request $request){
        $validateData = $request->validate([
            'category_name_fr' => 'required',
            'category_name_en' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_fr.required' => 'Input catgeory French name',
            'category_name_en.required' => 'Input catgeory English name',
        ]);

        Category::insert([
         'category_name_fr' => $request->category_name_fr,
         'category_name_en' => $request->category_name_en,
         'category_slug_fr' => str_replace('','-',$request->category_name_fr),
         'category_slug_en' => strtolower(str_replace('','-',$request->category_name_en)),
         'category_icon' => $request->category_icon,

        ]);
        $notification = array(
            'message' => 'categorie inséré avec success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend.category.category_edit',compact('category'));
    }
    public function CategoryUpdate(Request $request){
        $categ_id = $request->id;
        Category::findOrFail($categ_id)->update([
            'category_name_fr' => $request->category_name_fr,
            'category_name_en' => $request->category_name_en,
            'category_slug_fr' => str_replace('','-',$request->category_name_fr),
            'category_slug_en' => strtolower(str_replace('','-',$request->category_name_en)),
            'category_icon' => $request->category_icon,

           ]);
           $notification = array(
               'message' => 'categorie modifié avec success!',
               'alert-type' => 'info'
           );

         return redirect()->route('category.view')->with($notification);
    }
    public function CategoryDelete($id){
     $category = Category::findOrFail($id);
     $category->delete();
     $notification = array(
        'message' => 'categorie supprimé avec success!',
        'alert-type' => 'info'
    );

     return redirect()->route('category.view')->with($notification);
    }
}
