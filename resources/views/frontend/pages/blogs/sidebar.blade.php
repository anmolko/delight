
<div class="blog-sidebar">
    <div class="widget widget_search">
        <form action="{{route('searchBlog')}}" method="get" id="searchform" class="search-form">
            <div class="form-group">
                <input type="search" name="s" placeholder="Your Keyword ..." oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
                <button type="search"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <div class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <div class="widget-content">
            <ul class="categories-list clearfix">
                @if(!empty($bcategories))
                    @foreach(@$bcategories as $bcategory)
                    <li><a class="@if(Request::url() === url('/blog/categories/'.$bcategory->slug))active @endif" href="{{url('/blog/categories/'.$bcategory->slug)}}">{{ucwords(@$bcategory->name)}}<span>{{count(@$bcategory->blogs)}}</span></a></li>
                    @endforeach
                @endif
               
            </ul>
        </div>
    </div>
    <!--Popular Posts-->
    @if(count($latestPosts) > 0)

        <div class="widget widget_popular_post">
            <h3 class="widget-title">Latest Post</h3>

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

