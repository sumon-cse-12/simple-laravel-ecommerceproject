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
                <a href="{{route('admin.category.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container">
        <form method="post" role="form" id="customerForm"  enctype="multipart/form-data" action="{{route('admin.category.update',[$category])}}">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-body">								
                   @include('admin.category.form')
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- Main content -->
@endsection

@section('custom-js')
@endsection