@extends('admin.layouts.app')
@section('extra-css')
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12 mx-auto col-sm-10 mt-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Edit</h2>
                    <a class="btn btn-info float-right" href="{{route('admin.blog.index')}}">Back</a>
                </div>
                <form method="post" role="form" id="pageEditForm" action="{{route('admin.blog.update',[$blog])}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @csrf
                        @method('put')
                        @include('admin.blog.form')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>


        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- Main content -->
@endsection

@section('custom-js')
<script>

</script>
@endsection