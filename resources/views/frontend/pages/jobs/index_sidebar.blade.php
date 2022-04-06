<div class="blog-sidebar">
    <div class="widget widget_search">
        <form action="{{route('searchJob')}}" method="get" id="searchform" class="search-form">
            <div class="form-group">
                <input type="search" name="s" placeholder="Your Keyword ..." oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
                <button type="search"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>

    <!--Popular Posts-->
    @if(count($latestJobs) > 0)

        <div class="widget widget_popular_post">
            <h3 class="widget-title">Latest Jobs</h3>

                @if(!empty($latestJobs))
                    @foreach($latestJobs as $index => $latest)
                    <article class="post">
                        <figure class="post-thumb"><a href="{{route('job.single',@$latest->slug)}}"><img src="<?php if(@$latest->image){?>{{asset('/images/uploads/jobs/thumb/thumb_'.@$latest->image)}}<?php }?>" alt="{{@$latest->slug}}"></a></figure>
                        <h5><a href="{{route('job.single',@$latest->slug)}}">{{ucwords(@$latest->name)}}</a></h5>
                        <div class="post-info">{{date('M j, Y',strtotime(@$latest->start_date))}} - {{date('M j, Y',strtotime(@$latest->end_date))}}</div>
                    </article>
                    @endforeach
                @else
                <p>No Content Found</p>
                @endif
        </div>
    @endif
</div>

