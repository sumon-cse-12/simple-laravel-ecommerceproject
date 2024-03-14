@extends('admin.layouts.app')
@section('extra-css')
@endsection
@section('content')
<section class="content-header">					
    <div class="container my-2">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Create Product</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{route('admin.product.index')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="container">
        <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">								
                   @include('admin.product.form')
                </div>							
            </div>
            <div class="pb-5 pt-3">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</section>
<!-- Main content -->
@endsection

@section('custom-js')
<script>
    let j = 1;
        $(document).on("click", ".add-more-product-img-btn", function (e) {
            j++
            let html = `<div class="row align-items-center" id="form_column_${j}">
                                       
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="product_image">Image ${j}</label>
                                                        <input type="file" name="product_image[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <button type="button" class="btn btn-danger btn-sm mt-4 remove_product_img_btn" data-id="${j}">X</button>
                                                </div>

                                            </div>`;
            $("#more-product-image").append(html);
        });
        $(document).on('click', '.remove_product_img_btn', function (e) {
            const id = $(this).attr('data-id');

            $('#form_column_' + id).remove();

        });


</script>
@endsection