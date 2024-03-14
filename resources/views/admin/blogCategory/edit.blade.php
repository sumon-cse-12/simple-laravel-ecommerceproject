@extends('admin.layouts.app')
@section('extra-css')
@endsection
@section('content')
<section class="content-header">					
    <div class="container my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Category</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('admin.blog-category.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container">
       <div class="card">
        <form method="post" role="form" id="categoryCreateForm" action="{{route('admin.blog-category.update',[$blog_category])}}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                @include('admin.blogCategory.form')
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
       </div>
    </div>
    <!-- /.card -->
</section>
<!-- Main content -->
@endsection

@section('custom-js')
@endsection