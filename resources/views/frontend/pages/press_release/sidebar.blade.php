

<aside class="sidebar">

    @if(count($latestPress) > 0)

    <!-- Latest News -->
    <div class="sidebar-widget latest-news">
        <div class="sidebar-title">
            <h2>Latest Press</h2>
        </div>
        <div class="widget-content">
            @if(!empty($latestPress))
                @foreach($latestPress as $index => $latest)
                    <article class="post">
                        <div class="post-thumb">
                            <a href="{{route('press.single',@$latest->slug)}}"><img src="<?php if(@$latest->image){?>{{asset('/images/uploads/press_releases/thumb/thumb_'.@$latest->image)}}<?php }?>" alt="{{@$latest->slug}}"></a>
                        </div>
                        <h3><a href="{{route('press.single',@$latest->slug)}}">{{ucwords(@$latest->title)}}</a></h3>
                        <div class="post-info">{{date('F j, Y',strtotime(@$latest->created_at))}}</div>
                    </article>
                @endforeach
            @endif
        
        </div>
    </div>
    @endif


    
    @if(count($latestPosts) > 0)

    <!-- Latest News -->
    <div class="sidebar-widget latest-news">
        <div class="sidebar-title">
            <h2>Our Blogs</h2>
        </div>
        <div class="widget-content">
            @if(!empty($latestPosts))
                @foreach($latestPosts as $index => $latest)
                    <article class="post">
                        <div class="post-thumb">
                            <a href="{{route('blog.single',@$latest->slug)}}"><img src="<?php if(@$latest->image){?>{{asset('/images/uploads/blog/thumb/thumb_'.@$latest->image)}}<?php }?>" alt="{{@$latest->slug}}"></a>
                        </div>
                        <h3><a href="{{route('blog.single',@$latest->slug)}}">{{ucwords(@$latest->title)}}</a></h3>
                        <div class="post-info">{{date('F j, Y',strtotime(@$latest->created_at))}}</div>
                    </article>
                @endforeach
            @endif
        
        </div>
    </div>
    @endif


</aside>