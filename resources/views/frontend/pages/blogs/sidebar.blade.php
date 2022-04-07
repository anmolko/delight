
<aside class="sidebar">

    <!--search box-->
    <div class="sidebar-widget search-box">
        <form  action="{{route('searchBlog')}}" method="get" id="searchform">
            <div class="form-group">
                <input type="search" name="s" placeholder="Your Keyword ..." oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
                <button type="submit"><span class="icon fa fa-search"></span></button>
            </div>
        </form>
    </div>

    @if(count($bcategories) > 0)
    <!-- Categories -->
    <div class="sidebar-widget blog-categories">
        <div class="sidebar-title">
            <h2>Catagories</h2>
        </div>
        <ul class="cat-list">
            @if(!empty($bcategories))
                @foreach(@$bcategories as $bcategory)
                <li class="@if(Request::url() === url('/blog/categories/'.$bcategory->slug))active @endif"><a  href="{{url('/blog/categories/'.$bcategory->slug)}}">{{ucwords(@$bcategory->name)}}<span>({{count(@$bcategory->blogs)}})</span></a></li>
                @endforeach
            @endif
        </ul>
    </div>
    @endif


    @if(count($latestPosts) > 0)

    <!-- Latest News -->
    <div class="sidebar-widget latest-news">
        <div class="sidebar-title">
            <h2>Latest Posts</h2>
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