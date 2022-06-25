<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function ReviewStore(Request $request){

        $product = $request->product_id;
        $request->validate([
            'summary' => 'required',
            'comment' => 'required',

        ]);
        Review::insert([
            'product_id' => $product,
            'user_id' => Auth::id(),
            'comment' => $request->comment,
            'summary' => $request->summary,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => "L'avis approuvera par admin!",
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ReviewView(){

        $reviews = Review::where('status',0)->latest()->get();
        return view('backend.review.review_view',compact('reviews'));
    }

    public function ReviewPublish($id){

        Review::findOrFail($id)->update(['status' => 1]);

             $notification = array(
            'message' => "L'avis publié avec success!",
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function PublishReview(){

        $reviews = Review::where('status',1)->latest()->get();
        return view('backend.review.review_publish',compact('reviews'));
    }

    public function PublishDelete($id){
        Review::findOrFail($id)->delete();

        $notification = array(
            'message' => "L'avis supprimé avec success!",
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
