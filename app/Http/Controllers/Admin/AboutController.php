<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Settings;
use Illuminate\Support\Facades\File;


class AboutController extends Controller
{
    public function index(){
        $data['about_us_section'] = $about = Settings::where('name','about_us_section')->first();
        if(!$about){
            return view('admin.about.index');
        }else{
            return view('admin.about.index',$data);
        }
       
    }
    public function store(Request $request){

        $about_us_section = auth()->user()->settings()->where('name','about_us_section')->first();

        if ($about_us_section && isset($about_us_section->value)){
            $about_us_section_data = json_decode($about_us_section->value);
        }

        if(isset($about_us_section_data) && isset($about_us_section_data->about_us_section_img_one)){
            $request['about_us_section_img_one'] = $about_us_section_data->about_us_section_img_one;
         }

        if ($request->hasFile('about_sec_image_one')) {
            $file = $request->file('about_sec_image_one');
            $imageName = time() . '_1' . '.' . $file->getClientOriginalExtension();
            if(isset($about_us_section_data) && isset($about_us_section_data->about_us_section_img_one)){
                $file_path = public_path('/uploads') . '/' . $about_us_section_data->about_us_section_img_one;
                if (File::exists($file_path)) {
                    unlink($file_path);
                }
             }
     
           $file->move(public_path('/uploads'), $imageName);
           $request['about_us_section_img_one'] = $imageName;
        }

        if (isset($about_us_section) && $about_us_section->name == 'about_us_section'){
            $template = Settings::where('name', 'about_us_section')->first();
            $template->value = json_encode($request->only('about_sec_heading_one','about_sec_des_one','about_us_section_img_one'));
            $template->save();
        }else{
            $template = new Settings();
            $template->name = 'about_us_section';
            $template->value = json_encode($request->only('about_sec_heading_one','about_sec_des_one','about_us_section_img_one'));
            $template->admin_id = auth()->user()->id;
            $template->save();
        }
        cache()->flush();
        return redirect()->back()->with('success','About Section successfully update');
    }
}