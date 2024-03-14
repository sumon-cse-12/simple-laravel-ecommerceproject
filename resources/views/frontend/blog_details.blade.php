@extends('frontend.layouts.app')
@section('main-content')

<section class="section-9 pt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
            <div class="blog-categories">
              <div class="blog-categories-list-title">
                Blog category
              </div>
                <hr>
                <div class="blog-categories-list">
                    @if (isset($blog_categories) && $blog_categories)
                    @foreach ($blog_categories as $blog_category)
                    <div class="blog-category-item">
                        <a class="blog-category-link" href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i><span class="mx-1">{{isset($blog_category->name)?$blog_category->name:''}}</span></a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="recent-blogs-list-sec">
                <div class="blog-categories-list-title">
                   Recent Blogs
                </div>
                <hr>
                <div class="recent-blogs-list">
                    @if (isset($recent_blogs)&& $recent_blogs)
                        @foreach ($recent_blogs as $blog )
                        <li class="mb-3 mt-3">
                            <a href="{{route('front.blog.details',['url'=>$blog->url])}}" class="recent-blog-link">
                                <div class="blog-list-sec d-flex align-items-center">
                                    <div class="recent-blog-image">
                                        <img src="{{asset('uploads/'.$blog->image)}}" class="recent-blog-img" alt="">
                                    </div>
                                    <div class="recent-blog-contnet-sec ml-3">
                                        <div class="recent-blog-title">
                                            @php
                                            $title = strip_tags($blog->title);
                                            $max_length = 30;
                                            $ellipsis = '...'; // or you can use an icon here
                                            $truncated_title = mb_substr($title, 0, $max_length);
                                            if (mb_strlen($title, 'UTF-8') > $max_length) {
                                                $truncated_title = mb_substr($truncated_title, 0, mb_strrpos($truncated_title, ' ', 0, 'UTF-8'));
                                                $truncated_title .= $ellipsis; // or icon HTML
                                            }
                                        @endphp
                                        {{ $truncated_title }}
                                        </div>
                                        <div class="recent-blog-short-des">
                                            @php
                                            $description = strip_tags($blog->description);
                                            $max_length = 100;
                                            $ellipsis = '... read more';
                                            $truncated_description = mb_substr($description, 0, $max_length);
                                            if (mb_strlen($description, 'UTF-8') > $max_length) {
                                                $truncated_description = mb_substr($truncated_description, 0, mb_strrpos($truncated_description, ' ', 0, 'UTF-8'));
                                                $truncated_description .= $ellipsis;
                                            }
                                        @endphp 
                                        {{ $truncated_description }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                           </li>
                        @endforeach
                    @endif
                 
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="blog-details-sec-wrapper">
                <div class="blog-image-sec">
                    <img src="{{asset('uploads/'.$blog_detail->image)}}" class="img-fluid" alt="">
                </div>
                <hr>
                <div class="blog-detials-content-sec">
                    <div class="blog-published-sec d-flex">
                        <div class="blog-published-by">
                            <i class="fas fa-user"></i>  Admin
                        </div>
                        <div class="blog-published-date mx-5">
                            <i class="fas fa-calendar-alt"></i> {{isset($blog_detail->created_at)?$blog_detail->created_at:''}}
                        </div>
                    </div>
                    <div class="blog-title">
                        {!! $blog_detail->title !!}
                    </div>
                    <div class="blog-des-sec">
                        {!! $blog_detail->description !!}
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>
@endsection
@section('extra-js')
@endsection