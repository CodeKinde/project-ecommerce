<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function BlogCategoryView(){
        $categories = BlogPostCategory::orderBy('blog_category_name_fr','asc')->get();
        return view('backend.blog.category.category_view',compact('categories'));
    }

    public function BlogCategoryStore(Request $request){
        $datavalidation = $request->validate([
            'blog_category_name_fr' => 'required',
            'blog_category_name_en' => 'required',
        ],[
            'blog_category_name_fr.required' => 'entré categorie nom frensh',
            'blog_category_name_en.required' => 'input categorie english name'

        ]);
        BlogPostCategory::insert([
            'blog_category_name_fr' => $request->blog_category_name_fr,
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_slug_fr' => str_replace('','-',$request->blog_category_name_fr),
            'blog_category_slug_en' => strtolower(str_replace('','-',$request->blog_category_name_en)),
        ]);
        $notification = array(
            'message' => 'categorie inséré avec success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BlogCategoryEdit($id){
        $category = BlogPostCategory::findOrFail($id);
        return view('backend.blog.category.category_edit',compact('category'));
    }

    public function BlogCategoryUpdate(Request $request){

        $categ_id = $request->id;
        BlogPostCategory::findOrFail($categ_id)->update([
            'blog_category_name_fr' => $request->blog_category_name_fr,
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_slug_fr' => str_replace('','-',$request->blog_category_name_fr),
            'blog_category_slug_en' => strtolower(str_replace('','-',$request->blog_category_name_en)),
        ]);

        $notification = array(
            'message' => 'categorie update avec success!',
            'alert-type' => 'info'
        );

        return redirect()->route('category.view')->with($notification);
    }
    public function BlogCategoryDelete(Request $request,$id){

        $category = BlogPostCategory::findOrFail($id);
        $category->delete();

        $notification = array(
            'message' => 'categorie supprimé avec success!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
    ///===============Blog post category============///

    public function BlogPostView(){
        $posts = BlogPost::orderBy('title_fr','asc')->get();
        return view('backend.blog.post.post_view',compact('posts'));
    }

    public function BlogPostAdd(){

        $category = BlogPostCategory::orderBy('blog_category_name_fr','asc')->get();
        return view('backend.blog.post.post_add',compact('category'));
    }

    public function BlogPostStore(Request $request){
        $request->validate([
            'blog_category_id' => 'required',
            'title_fr' => 'required',
            'title_en' => 'required',
            'post_details_fr' => 'required',
            'post_details_en' => 'required',
            'post_image' => 'required',

        ],[
            'title_fr.required' => 'entré titre post nom frensh',
            'title_en.required' => 'input titre post english name',
            'post_details_fr.required' => 'entré  post frensh name',
            'post_details_en.required' => 'input post english name',
        ]);

        if ($request->file('post_image')) {
            $file = $request->file('post_image');
            $filename = hexdec(uniqid().''.$file->getClientOriginalExtension());
            Image::make($file)->resize(780,433)->save('upload/post_image/'.$filename);
            $save_url = 'upload/post_image/'.$filename;
        }

        BlogPost::insert([
            'blog_category_id' => $request->blog_category_id,
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'post_details_fr' => $request->post_details_fr,
            'post_details_en' => $request->post_details_en,
            'post_slug_en' => str_replace('','-',$request->post_details_fr),
            'post_slug_fr' => strtolower(str_replace('','-',$request->post_details_en)),
            'post_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'post inséré avec success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BlogPostDetails($id){

        $details = BlogPost::findOrFail($id);
        return view('backend.blog.post.post_details',compact('details'));
    }

    public function BlogPostEdit($id){
        $posts = BlogPost::findOrFail($id);
        $category = BlogPostCategory::orderBy('blog_category_name_fr','asc')->get();

        return view('backend.blog.post.post_edit',compact('posts','category'));
    }

    public function BlogPostUpdate(Request $request){
        $post_id = $request->id;
        $image = $request->old_image;
        if ($request->file('post_image')) {
            $file = $request->file('post_image');
            unlink($image);
            $filename = hexdec(uniqid().''.$file->getClientOriginalExtension());
            Image::make($file)->resize(780,433)->save('upload/post_image/'.$filename);
            $save_url = 'upload/post_image/'.$filename;


        BlogPost::findOrFail($post_id)->update([
            'blog_category_id' => $request->blog_category_id,
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'post_details_fr' => $request->post_details_fr,
            'post_details_en' => $request->post_details_en,
            'post_slug_en' => str_replace('','-',$request->post_details_fr),
            'post_slug_fr' => strtolower(str_replace('','-',$request->post_details_en)),
            'post_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'post mise à jour avec success!',
            'alert-type' => 'success'
        );

        return redirect()->route('post.view')->with($notification);
     }else{

        BlogPost::findOrFail($post_id)->update([
            'blog_category_id' => $request->blog_category_id,
            'title_fr' => $request->title_fr,
            'title_en' => $request->title_en,
            'post_details_fr' => $request->post_details_fr,
            'post_details_en' => $request->post_details_en,
            'post_slug_en' => str_replace('','-',$request->post_details_fr),
            'post_slug_fr' => strtolower(str_replace('','-',$request->post_details_en)),
        ]);
        $notification = array(
            'message' => 'post mise à jour avec success!',
            'alert-type' => 'success'
        );

        return redirect()->route('post.view')->with($notification);
     }
    }
    public function BlogPostDelete($id){
        $posts = BlogPost::findOrFail($id);
        $image = $posts->post_image;
        unlink($image);
        BlogPost::findOrFail($id)->delete();
        $notification = array(
            'message' => 'post supprimé avec success!',
            'alert-type' => 'error'
        );

        return redirect()->route('post.view')->with($notification);
    }
}
