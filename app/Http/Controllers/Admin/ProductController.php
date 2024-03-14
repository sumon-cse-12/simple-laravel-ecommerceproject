<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(){
    
        return view('admin.product.index');
    }
    public function create(){
        $data['categories'] = Category::where('status','active')->get();
        return view('admin.product.create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'product_image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'discount_price' => 'required',
            'weight' => 'required',
            'status' => 'required|in:in_stock,stock_out',
        ]);

        $request['slug']=Str::slug($request->name, '-');
        $product = new Product();
        $product->name = $request->name;
        $product->slug = $request['slug'];
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->category_id = $request->category_id;
        
        $all_images = [];
        foreach ($request->file('product_image') as $key => $file) {
            $product_image_name = time() . $key . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $product_image_name);
            $all_images[] = ['image' => $product_image_name];
        }
        $product->image = json_encode($all_images);
        
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->weight = $request->weight;
        $product->status = $request->status;   
        $product->meta_title = $request->meta_title;   
        $product->meta_description = $request->meta_description;   
        $product->meta_keywords = $request->meta_keywords;   
        $product->save();
        
        return back()->with('success', 'Product successfully created');
    }
    
    public function getAll(){
        $products = Product::all();
        // dd($products->get());
        return datatables()->of($products)
        
        ->addColumn('name', function ($q) {
    
            return $q->name;
        })

            ->addColumn('description', function ($q) {
                $limit =  (strip_tags($q->description));
                return substr($limit,0,100);
            })
            ->addColumn('image', function ($q) {
                $image = '<img class="img-demo-setting" src="'.asset('uploads/'.$q->image).'" alt="">';
                return $image;
            })

            ->addColumn('created_at', function ($q) {
                $time = new Carbon($q->created_at);
               
                return $time;
            })

            ->addColumn('action',function($q){   
                return '
                <a class="btn btn-info btn-sm m-1" href=' . route('admin.product.edit', [$q->id]) . '><i class="fas fa-edit" aria-hidden="true"></i></a>'.
                                        '<a class="btn btn-danger btn-sm" href="#" data-message="Are you sure you want to delete ?"
                                        data-action='.route('admin.product.destroy',[$q]).'
                                        data-input={"_method":"delete"}
                                        data-toggle="modal" data-target="#modal-confirm" ><i class="fa fa-times-circle" aria-hidden="true"></i></a>' ;
            })
            ->rawColumns(['image','action'])
            ->toJson();
    }
    public function edit(Product $product)
    {   $data['categories'] = Category::where('status','active')->get();
        $data['product'] = $product;
        return view('admin.product.edit', $data);
    }

    public function update(Product $product,Request $request){
        $request->validate([
            'name' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'discount_price' => 'required',
            'weight' => 'required',
            'status'=>'required|in:in_stock,stock_out'
        ]);
        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $productImage = time(). '_111'. '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $productImage);
            $request['image'] = $productImage;
        }else{
            $request['image'] = isset($product->image)?$product->image:'';
        }
        $request['slug']=Str::slug($request->name, '-');
        $product->update($request->all());

        return back()->with('success', 'Product successfully updated');
    }

    public function destroy(Product $product){
        $product->delete();
        return back()->with('success', 'Product successfully deleted');
    }
}
