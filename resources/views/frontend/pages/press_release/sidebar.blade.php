@if(count($latestPress) > 0)
    <div class="blog-sidebar">
        <div class="widget widget_popular_post">
            <h3 class="widget-title">Latest Press Release</h3>

            @if(!empty($latestPress))
                @foreach($latestPress as $index => $latest)
                    <article class="post">
                        <figure class="post-thumb"><a href="{{route('blog.single',@$latest->slug)}}"><img src="<?php if(@$latest->image){?>{{asset('/images/uploads/press_releases/thumb/thumb_'.@$latest->image)}}<?php }?>" alt="{{@$latest->slug}}"></a></figure>
                        <h5><a href="{{route('press.single',@$latest->slug)}}">{{ucwords(@$latest->title)}}</a></h5>
                        <div class="post-info">{{date('j F, Y',strtotime(@$latest->created_at))}}</div>
                    </article>
                @endforeach
            @endif
        </div>
</div>
@endif
<div class="blog-sidebar mt-4">

<!--Popular Posts-->
@if(count($latestPosts) > 0)

    <div class="widget widget_popular_post">
        <h3 class="widget-title">Our Blogs</h3>

        @if(!empty($latestPosts))
            @foreach($latestPosts as $index => $latest)
                <article class="post">
                    <figure class="post-thumb"><a href="{{route('blog.single',@$latest->slug)}}"><img src="<?php if(@$latest->image){?>{{asset('/images/uploads/blog/thumb/thumb_'.@$latest->image)}}<?php }?>" alt="{{@$latest->slug}}"></a></figure>
                    <h5><a href="{{route('blog.single',@$latest->slug)}}">{{ucwords(@$latest->title)}}</a></h5>
                    <div class="post-info">{{date('j F, Y',strtotime(@$latest->created_at))}}</div>
                </article>
            @endforeach
        @endif
    </div>
@endif
</div>

