@extends('admin.layouts.app')
@section('extra-css')
@endsection
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12 mx-auto col-sm-10 mt-3">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Create Blog</h2>
                    <a class="btn btn-info float-right" href="{{route('admin.blog.index')}}">Back</a>
                </div>
                <form method="post" role="form" id="pageCreateForm" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
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
    let j = 1;
        $(document).on("click", ".add-more-blog-img-btn", function (e) {
            j++
            let html = `<div class="row align-items-center" id="form_column_${j}">
                                       
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="blog_image">Image ${j}</label>
                                                        <input type="file" name="blog_image[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <button type="button" class="btn btn-danger btn-sm mt-4 remove_blog_img_btn" data-id="${j}">X</button>
                                                </div>

                                            </div>`;
            $("#more-blog-image").append(html);
        });
        $(document).on('click', '.remove_blog_img_btn', function (e) {
            const id = $(this).attr('data-id');

            $('#form_column_' + id).remove();

        });


</script>
@endsection