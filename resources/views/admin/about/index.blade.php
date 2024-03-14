@extends('admin.layouts.app')
@section('extra-css')
{{-- <link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}"> --}}
@endsection
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>About us section</h1>
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
        @php
        // Check if $about_us_section is defined before accessing its properties
        if (isset($about_us_section)) {
            $about_us_section_data = json_decode($about_us_section->value);
        }
    @endphp
    
        <form action="{{route('admin.about.us.info.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Heading One</label>
                        <input type="text" value="{{isset($about_us_section_data->about_sec_heading_one)?$about_us_section_data->about_sec_heading_one:''}}" name="about_sec_heading_one" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="">Image</label>
                    <input type="file" name="about_sec_image_one" class="form-control">
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for=""></label>
                        <textarea name="about_sec_des_one" id="" cols="4" rows="4"class="form-control summernote" placeholder="Heading One Description">{{isset($about_us_section_data->about_sec_des_one)?$about_us_section_data->about_sec_des_one:''}}</textarea>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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

@endsection