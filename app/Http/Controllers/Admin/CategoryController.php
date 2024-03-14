<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
      
        return view('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_image' => 'required'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $categoryImage = time() . '_13' . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/uploads'), $categoryImage);
            $category->image = $categoryImage;
        }

        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        return redirect()->back()->with('success','Category successfully created');
    }
    public function getAll()
    {
        $categories = Category::orderByDesc('created_at');

        return datatables()->of($categories)

 
            ->addColumn('created_at', function (Category $q) {

                return $q->created_at->format('d-m-Y');
               })

            ->addColumn('action', function (Category $q) {
                return "<a class='btn btn-sm btn-info' href='" . route('admin.category.edit', [$q->id]) . "'>Edit</a>  &nbsp; &nbsp;" .
                    '<button class="btn btn-sm btn-danger" data-message="Are you sure you want to delete this Category?"
                                        data-action=' . route('admin.category.destroy', [$q]) . '
                                        data-input={"_method":"delete"}
                                        data-toggle="modal" data-target="#modal-confirm">Delete</button>';
            })
            ->rawColumns(['action', 'profile'])
            ->toJson();
    }
    public function edit($category)
    {
        $data['category'] = Category::findOrFail($category);
        return view('admin.category.edit',$data);
    }
    public function update($category, Request $request)
    {
       $category = Category::findOrFail($category);
       if ($request->hasFile('category_image')) {
        $file = $request->file('category_image');
        $categoryImage = time() . '_14' . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/uploads'), $categoryImage);
        $category->image = $categoryImage;
    }
    $category->name = $request->name;
    $category->slug = $request->slug;
    $category->description = $request->description;
    $category->meta_title = $request->meta_title;
    $category->meta_description = $request->meta_description;
    $category->meta_keywords = $request->meta_keywords;
    $category->save();
    return redirect()->route('admin.category.index')->with('success', 'Category successfully update');
    }
    public function destroy($category)
    {
        $category = Category::findOrFail($category);
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Category successfully Deleted');
    }

}