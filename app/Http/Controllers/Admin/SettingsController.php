<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(){
        return view('admin.settings.index');
    }
    public function app_store(Request $request){

        if ($request->hasFile('app_logo')) {
            $file = $request->file('app_logo');
            $logo_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $logo_name);

            $data = ['name' => 'app_logo'];
            $setting = auth()->user()->settings()->firstOrNew($data);
            $setting->value = $logo_name;
            $setting->save();
        }
        if ($request->hasFile('fab_icon')) {
            $file = $request->file('fab_icon');
            $fab_icon = time() . '.fab' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $fab_icon);

            $data = ['name' => 'fab_icon'];
            $setting = auth()->user()->settings()->firstOrNew($data);
            $setting->value = $fab_icon;
            $setting->save();
        }
        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $banner_image = time() . 'b' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $banner_image);

            $data = ['name' => 'banner_image'];
            $setting = auth()->user()->settings()->firstOrNew($data);
            $setting->value = $banner_image;
            $setting->save();
        }

        $data = ['name' => 'app_section'];
        $setting = auth()->user()->settings()->firstOrNew($data);
        $setting->value =  json_encode($request->only('app_name', 'contact_address','email_address','phone_number','banner_heading','banner_short_description'));
        $setting->save();
        cache()->flush();
        return redirect()->back()->with('success', 'Application successfully updated');
    }
}
