@extends('admin.layouts.app')
@section('extra-css')
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endsection
@section('content')
<section class="content-header">					
    <div class="container-fluid my-2">
        <div class="row mb-2">
           <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">
                   <h4 class="pb=0"> Settings</h4>
                </div>
                @php 
                $app_section = get_settings('app_section')?json_decode(get_settings('app_section')):''; 
                @endphp
                    <div class="card-body">
                    <form action="{{route('admin.settings.app.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">App Name</label>
                            <input type="text" value="{{isset($app_section->app_name)?$app_section->app_name:''}}" name="app_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">App Logo</label>
                            <input type="file" name="app_logo" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Fab Icon</label>
                            <input type="file" name="fab_icon" class="form-control">
                        </div>
                        <h4>Contact Info</h4>
                        <hr>
                        <div class="form-group">
                            <label for="">Contact Address</label>
                            <textarea name="contact_address" class="form-control" id="" cols="4" rows="4">{{isset($app_section->contact_address)?$app_section->contact_address:''}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Email Address</label>
                            <input type="email" value="{{isset($app_section->email_address)?$app_section->email_address:''}}" name="email_address" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="number" value="{{isset($app_section->phone_number)?$app_section->phone_number:''}}" name="phone_number" class="form-control">
                        </div>
                        <h4>Banner Section</h4>
                        <hr>
                        <div class="form-group">
                            <label for="">Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Banner Heading</label>
                            <input type="text" value="{{isset($app_section->banner_heading)?$app_section->banner_heading:''}}" name="banner_heading" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Banner Short Description</label>
                            <textarea name="banner_short_description" class="form-control" id="" cols="4" rows="4">{{isset($app_section->banner_short_description)?$app_section->banner_short_description:''}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
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

@endsection