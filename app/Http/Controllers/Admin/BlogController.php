<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        return view('admin.blog.index');
    }

    public function create(){
        $data['blog_categories'] = BlogCategory::where('status','active')->get();
        return view('admin.blog.create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'blog_category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'blog_image' => 'required',
            'status' => 'required|in:published,unpublished'
        ]);
        
        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $imageBlog = time(). '_6' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageBlog);
            $request['image'] = $imageBlog;
        }

        $request['url']=Str::slug($request->title , '-');

        auth()->user()->blogs()->create($request->all());
        return back()->with('success', 'Blog successfully created');
    }
    public function getAll(){
        $blogs = auth()->user()->blogs()->select(['id', 'blog_category_id','title','description','status', 'created_at']);

        return datatables()->of($blogs)
        ->addColumn('category', function ($q) {
         
            return $q->blog_category->name;
        })
        ->addColumn('description', function ($q) {
            
            return strip_tags($q->description);
        })
            ->addColumn('created_at', function ($q) {
                return $q->created_at;
            })
            ->addColumn('status', function ($q) {
                if($q->status=='published'){
                    $status='<span class="badge bg-green">Published</span>';
                }else{
                    $status='<span class="badge bg-danger">Unpublished</span>';
                }
                return $status;
            })

            ->addColumn('action',function($q){   
                return "<a class='btn btn-sm btn-info' href='" . route('admin.blog.edit', [$q->id]) . "'>Edit</a>".'&nbsp;&nbsp;&nbsp;
                <button class="btn btn-sm btn-danger" data-message="Are you sure you want to delete this blog?"
                                        data-action=' . route('admin.blog.destroy', [$q]) . '
                                        data-input={"_method":"delete"}
                                        data-toggle="modal" data-target="#modal-confirm">Delete</button>';
            })


            ->rawColumns(['action','status'])
            ->toJson();
    }
    public function edit(Blog $blog){
        $data['blog']= $blog;
        $data['blog_categories'] = BlogCategory::all();
        return view('admin.blog.edit',$data);
    }
    public function update(Blog $blog,Request $request){

        $request->validate([
            'blog_category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:published,unpublished'
        ]);

        if ($request->hasFile('blog_image')) {
            $file = $request->file('blog_image');
            $imageBlog = time(). '_6' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $imageBlog);
            $request['image'] = $imageBlog;
        }
        else{
            $request['image'] = $blog->image;
        }
        $request['url']=Str::slug($request->title , '-');
        $blog->update($request->all());
        return back()->with('success', 'Blog successfully updated');
    }
    public function destroy(Blog $blog){
        $blog->delete();
        return back()->with('success', 'blog successfully deleted');
    }
}
