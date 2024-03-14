<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function index(){
        return view('admin.blogCategory.index');
    }
    public function create(){
        return view('admin.blogCategory.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'status'=>'required|in:active,inactive',
        ]);
        auth()->user()->blog_categories()->create($request->all());

        return back()->with('success', 'blog_category successfully created');
    }
    public function getAll(){
        $categories = auth()->user()->blog_categories()->select(['id', 'name', 'status', 'created_at']);
        return datatables()->of($categories)
            ->addColumn('created_at', function ($q) {
                return $q->created_at;
            })
            ->addColumn('status', function ($q) {
                if($q->status=='active'){
                    $status='<span class="badge bg-green">Active</span>';
                }else{
                    $status='<span class="badge bg-danger">Inactive</span>';
                }
                return $status;
            })

            ->addColumn('action', function (BlogCategory $q) {

                return '<div class="btn-group-vertical">
                                            <div class="btn-group">
                                            <i class="fa fa-ellipsis-v text-success" type="button" data-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu" style="">
                                            <li><a class="dropdown-item " href="'.route('admin.blog-category.edit',[$q]). '" > <i class="fa fa-pencil m-1" aria-hidden="true"></i>Edit</a></li>
                                             <li><a class="dropdown-item" href="#" data-message="Are you sure you want to delete ?"
                                        data-action='.route('admin.blog-category.destroy',[$q]).'
                                        data-input={"_method":"delete"}
                                        data-toggle="modal" data-target="#modal-confirm" ><i class="fa fa-trash m-1" aria-hidden="true"></i>Delete</a></li>
                                            </ul>
                                            </div>
                                            </div>' ;

            })


            ->rawColumns(['action','status'])
            ->toJson();
    }
    public function edit(BlogCategory $blog_category)
    {
        $data['blog_category'] = $blog_category;
        $data['blog_categoryTypes'] = auth()->user()->blogs()->get();
        return view('admin.blogCategory.edit', $data);
    }
    public function update(BlogCategory $blog_category, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'status'=>'required|in:active,inactive',
        ]);

        $blog_category->update($request->all());

        return back()->with('success', 'Blog category successfully updated');
    }

    public function destroy(BlogCategory $blog_category)
    {
        $blog_category->delete();

        return back()->with('success', 'blog category successfully deleted');
    }
}

