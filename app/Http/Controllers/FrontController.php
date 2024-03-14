<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Blog;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\BlogCategory;
use App\Models\Page;

class FrontController extends Controller
{
  public function products(){
    $data['products'] = Product::get();
    return view('frontend.all_products',$data);
  }

    public function index(){
        $data['categories'] = Category::withCount('products')->get();
        $data['feature_products'] = Product::orderBy('created_at','DESC')->limit(4)->get();
        $data['blogs'] = Blog::orderBy('created_at','DESC')->limit(4)->get();
        // dd($data['feature_products']);
        $data['best_selling_products'] = Product::orderBy('created_at','ASC')->get();
        return view('frontend.index',$data);
    }

    public function about()
    {
      $about_us_section = Settings::where('name', 'about_us_section')->first();


      $data['about_us_section_data'] = json_decode($about_us_section->value);
        if (!$about_us_section) {
            return view('frontend.error')->with('message', 'About section data not found');
        }else{
          return view('frontend.abouts', $data);
        }
    }
    

    public function contact(){
      return view('frontend.contact_us');
    }
    public function contact_us_store(Request $request){

          $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required'
          ]);

          $contact = new ContactInfo();
          $contact->name = $request->name;
          $contact->email = $request->email;
          $contact->subject = $request->subject;
          $contact->message = $request->message;
          $contact->save();
          return back()->with('success', 'Message Send successfully');
    }

    public function blog_details($url){
     $data['blog_detail'] = Blog::where('url', $url)->firstOrFail();
     $data['blog_categories'] = BlogCategory::where('status','active')->get();
     $data['recent_blogs'] = Blog::where('status', 'published')
     ->orderBy('created_at', 'desc')
     ->limit(7)
     ->get();
       return view('frontend.blog_details',$data);
    }
    // public function products6(){
    //   dd('oppp');
    // $data['products'] = Product::get();
    //   return view('frontend.all_products',$data);
    // }

    public function search_product(Request $request){
      $request->validate([
        'name'=>'required'
      ]);
      $searchTerm = $request->name;
      $data['products'] = $product = Product::where('name', 'LIKE', '%' . $searchTerm . '%')->get();
      $data['total_product'] = $product->count();
      return view('frontend.searched_product',$data);
    }

    public function blog(){
      $data['blogs'] = Blog::where('status', 'published')
      ->orderBy('created_at', 'desc')
      ->get();
      return view('frontend.blogs',$data);
    }
    public function page($page){

      $data['page'] = Page::where('url',$page)->where('status','published')->firstOrFail();
      return  view('frontend.page',$data);
  }
}
