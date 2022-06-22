<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class SiteSettingController extends Controller
{
    public function SiteSetting(){
        $site = SiteSetting::find(1);
        return view('backend.setting.site_update',compact('site'));
    }

    public function SiteSettingUpdate(Request $request){
       $site_id = $request->id;
       if ($request->file('logo')) {
        $file = $request->file('logo');
        $filename = hexdec(uniqid()).''.$file->getClientOriginalExtension();
        Image::make($file)->resize(139,36)->save('upload/logo/'.$filename);
        $save_url = 'upload/logo/'.$filename;

       SiteSetting::findOrFail($site_id)->update([
        'phone_one' => $request->phone_one,
        'phone_two' => $request->phone_two,
        'email' => $request->email,
        'company_name' => $request->company_name,
        'company_address' => $request->company_address,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'linkedin' => $request->linkedin,
        'youtube' => $request->youtube,
        'logo' =>$save_url,
        'created_at' => Carbon::now(),
       ]);
       $notification = array(
        'message' => "site paramètre mise à jour avec succès",
        'alert-type' => 'info'
       );
       return redirect()->back()->with($notification);
    }else{
        SiteSetting::findOrFail($site_id)->update([
        'phone_one' => $request->phone_one,
        'phone_two' => $request->phone_two,
        'email' => $request->email,
        'company_name' => $request->company_name,
        'company_address' => $request->company_address,
        'facebook' => $request->facebook,
        'twitter' => $request->twitter,
        'linkedin' => $request->linkedin,
        'youtube' => $request->youtube,
        'created_at' => Carbon::now(),
      ]);

      $notification = array(
        'message' => "site paramètre mise à jour avec succès",
        'alert-type' => 'info'
       );
       return redirect()->back()->with($notification);
    }

 }

 public function SeoSetting(){
    $seo = SeoSetting::find(1);
    return view('backend.setting.seo_update',compact('seo'));
 }

 public function SeoSettingUpdate(Request $request){
     $seo_id = $request->id;

    SeoSetting::findOrFail($seo_id)->update([
        'meta_title' => $request->meta_title,
        'meta_author' => $request->meta_author,
        'meta_keyword' => $request->meta_keyword,
        'meta_description' => $request->meta_description,
        'google_analytics' => $request->google_analytics,
        'created_at' => Carbon::now(),
      ]);

      $notification = array(
        'message' => "seo paramètre mise à jour avec succès",
        'alert-type' => 'info'
       );
       return redirect()->back()->with($notification);
 }
}
