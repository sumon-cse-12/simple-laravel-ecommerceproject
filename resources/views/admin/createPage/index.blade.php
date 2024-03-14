@extends('admin.layouts.app')
@section('extra-css')
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">List</h2>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{route('admin.page.create')}}">New</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-body">
                        <table id="pages" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
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
    $('#pages').DataTable({
        processing: true,
        serverSide: true,
        responsive:true,
        ajax:'{{route('admin.page.get.all')}}',
        columns: [
            { "data": "name" },
            { "data": "title" },
            { "data": "description" },
            { "data": "position" },
            { "data": "status" },
            { "data": "action" },
        ]
    });


</script>
@endsection