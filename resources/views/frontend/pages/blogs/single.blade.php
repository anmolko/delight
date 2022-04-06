@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleBlog->title)}}@endsection
@section('styles')

    <style>
        .blog-single-post .image {
            margin-bottom: 30px;
        }
        .blog-single-post .text .media {
            display: block;
        }
    </style>
@endsection
@section('content')
    <!-- Page Title -->
    <section class="page-title-two" style="background-image: url({{asset('assets/frontend/images/background/bg-26.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="category">{{ucwords($singleBlog->category->name)}}</div>
                    <ul class="post-meta">
                        <li><a href="#">{{date('j F, Y',strtotime(@$singleBlog->created_at))}}</a></li>
                    </ul>
                    <div class="title">
                        <h1>{{ucwords(@$singleBlog->title)}}</h1>
                    </div>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 content-side">
                    <div class="blog-single-post">
                        <div class="image"><img src="{{ asset('/images/uploads/blog/'.@$singleBlog->image) }}" alt=""></div>

                        <h3>{{ucwords(@$singleBlog->title)}}</h3>
                        <div class="text">
                            {!! @$singleBlog->description !!}
                        </div>
                        
                        <div class="share-icon">
                            <h5>Share this post</h5>
                            <ul class="social-links">
                                <li><a href="#" onclick='fbShare("{{route('blog.single',$singleBlog->slug)}}")'  class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                <li><a href="#" onclick='twitShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")' class="twitter"><i class="fab fa-twitter"></i>Twiter</a></li>
                                <li><a href="#" onclick='whatsappShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")' class="whatsapp"><i class="fab fa-whatsapp"></i>Whatsapp</a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <aside class="col-lg-4 sidebar">
                        @include('frontend.pages.blogs.sidebar')            

                </aside>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->

@endsection

@section('js')
<script>
function fbShare(url) {
  window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
}
function twitShare(url, title) {
    window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
}
function whatsappShare(url, title) {
    message = title + " " + url;
    window.open("https://api.whatsapp.com/send?text=" + message);
}

</script>
@endsection