@extends('admin.layouts.app')
@section('extra-css')
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Category List</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('admin.category.create')}}" class="btn btn-primary">Create New Category</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container-fluid">
 <div class="card">
    <div class="card-body table-body">
        <table id="category" class="table table-striped table-bordered dt-responsive nowrap">
            <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Created At</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>

        </table>
    </div>
 </div>
    </div>
    <!-- /.card -->
</section>
<!-- Main content -->
<section class="content">

</section>
@endsection

@section('custom-js')
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
{{-- <script src="{{asset('backend/js/readmore.min.js')}}"></script> --}}

<script>
    "use strict";
    $('#category').DataTable({
        processing: true,
        serverSide: true,
        responsive:true,
        ajax:'{{route('admin.get.all.category')}}',
        columns: [
            { "data": "name" },
            { "data": "slug" },
            { "data": "created_at" },
            { "data": "status" },
            { "data": "action" },
        ],
    });
</script>
@endsection