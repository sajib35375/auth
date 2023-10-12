<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Image;

class SiteSettingController extends Controller
{
    public function SiteSetting(){
        $setting = SiteSetting::find(1);
        return view('admin.setting.site_setting',compact('setting'));
    }
    public function SiteSettingUpdate(Request $request,$id){
        $update_setting = SiteSetting::find($id);

        $unique_name='';
        if ($request->hasFile('logo')){
            $img = $request->file('logo');
            $unique_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(139,36)->save('images/logo/'.$unique_name);
//            unlink('images/logo/'.$request->old_logo);
        }else{
            $unique_name = $request->old_logo;
        }

        $update_setting->logo = $unique_name;
        $update_setting->email = $request->email;
        $update_setting->company_name = $request->company_name;
        $update_setting->company_address = $request->company_address;
        $update_setting->phone_one = $request->phone_one;
        $update_setting->phone_two = $request->phone_two;
        $update_setting->facebook = $request->facebook;
        $update_setting->twitter = $request->twitter;
        $update_setting->linkedin = $request->linkedin;
        $update_setting->youtube = $request->youtube;
        $update_setting->update();

        $notification = array(
            'message' => 'Site Setting Updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SeoPage(){
        $seo = Seo::find(1);
        return view('admin.setting.seo_setting',compact('seo'));
    }

    public function SeoPageUpdate(Request $request,$id){
        $seo_update = Seo::find($id);

        $seo_update->meta_title = $request->meta_title;
        $seo_update->meta_author = $request->meta_author;
        $seo_update->meta_keywords = $request->meta_keywords;
        $seo_update->meta_description = $request->meta_description;
        $seo_update->google_analytics = $request->google_analytics;
        $seo_update->update();

        $notification = array(
            'message' => 'Seo Setting Updated successfully',
            'alert_type' => 'success'
        );
        return redirect()->back()->with($notification);
    }













}
