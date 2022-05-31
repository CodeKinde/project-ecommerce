<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function SliderView(){
        $sliders = Slider::latest()->get();
        return view('backend.slider.slider_view',compact('sliders'));
    }
    public function SliderAdd(){
        return view('backend.slider.slider_add');
    }

    public function SliderStore(Request $request){
        $request->validate([
            'slider_img' => 'required',
        ],['slider_img.required' => 'Sur vous plais inséré un image']);
        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;
        Slider::insert([
            'title' => $request->title,
            'descrip' => $request->descrip,
            'slider_img' => $save_url,
        ]);
        $notification = array(
            'message' => 'slider inséré avec success!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit',compact('slider'));
    }

    public function SliderUpdate(Request $request){
        $slider_id = $request->id;
        $image = $request->old_img;
        if($request->file('slider_img')){
         unlink($image);
        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;
        Slider::findOrFail($slider_id)->update([
            'title' => $request->title,
            'descrip' => $request->descrip,
            'slider_img' => $save_url,
        ]);
        $notification = array(
            'message' => 'slider modifié avec success!',
            'alert-type' => 'info'
        );

        return redirect()->route('slider.view')->with($notification);
        }else{
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'descrip' => $request->descrip,
            ]);
            $notification = array(
                'message' => 'slider modifié avec success!',
                'alert-type' => 'info'
            );

            return redirect()->route('slider.view')->with($notification);
        }

    }

    public function SliderInactive($id){
        Slider::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'slider InActive!',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }

    public function SliderActive($id){
        Slider::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'slider Active!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SliderDelete($id){
        $slider = Slider::findOrFail($id);
        $image = $slider->slider_img;
        unlink($image);
        Slider::findOrFail($id)->delete();
        $notification = array(
            'message' => 'slider supprimé avec succès!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
