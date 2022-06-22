<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Illuminate\Http\Request;

class HomeBlogController extends Controller
{
    public function HomeBlogPost(){
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::latest()->get();

        return view('frontend.blog.blog_list',compact('blogcategory','blogpost'));

    }

    public function BlogPostDetails($id){

        $details = BlogPost::findOrFail($id);
        return view('frontend.blog.blog_details',compact('details'));
    }

    public function BlogPostCategory($category_id){
        $blogcategory = BlogPostCategory::latest()->get();
        $blogpost = BlogPost::where('blog_category_id',$category_id)->orderBy('id','desc')->get();

        return view('frontend.blog.blog_category',compact('blogpost','blogcategory'));
    }
}
