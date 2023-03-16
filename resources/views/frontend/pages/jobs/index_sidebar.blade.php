<aside class="sidebar">
    <!--search box-->
    <div class="sidebar-widget search-box">
        <form  action="{{route('searchJob')}}" method="get" id="searchform">
            <div class="form-group">
                <input type="search" name="s" placeholder="Your Keyword ..." oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
                <button type="submit"><span class="icon fa fa-search"></span></button>
            </div>
        </form>
    </div>

    @if(count($latestJobs) > 0)
        <!-- Latest Jobs -->
        <div class="sidebar-widget latest-news">
            <div class="sidebar-title">
                <h2>Latest Jobs</h2>
            </div>
            <div class="widget-content">
                @if(!empty($latestJobs))
                    @foreach($latestJobs as $index => $latest)
                        <article class="post">
                            <div class="post-thumb">
                                <a href="{{route('job.single',@$latest->slug)}}">
                                    <img src="{{ ($latest->image !== null) ? asset('/images/uploads/jobs/'.@$latest->image): asset('assets/frontend/images/delight.png')   }}"
                                         alt="{{@$latest->slug}}"></a>
                            </div>
                            <h3><a href="{{route('job.single',@$latest->slug)}}">
                                    {{ucwords(@$latest->name)}}
                                </a></h3>
                            <div class="post-info">
                                @if(@$latest->start_date <= $today && @$latest->end_date >= $today)
                                    {{date('M j, Y',strtotime(@$latest->start_date))}} - {{date('M j, Y',strtotime(@$latest->end_date))}}
                                @else
                                    Expired
                                @endif
                            </div>
                        </article>
                    @endforeach
                @endif

            </div>
        </div>
    @endif

</aside>
