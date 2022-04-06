<aside class="widget-area left-widget-area">
    <div class="portfolio-meta-wrap">
        <div class="portfolio-meta">
            <ul class="portfolio-meta-list">
                <li>
                    <div class="portfolio-meta-title-wrap">
                        <h6><span class="portfolio-meta-icon"><i class="ti-layout"></i></span>Company</h6>
                    </div> <span class="entry-date">{{ucwords(@$singleJob->client->name)}}</span></li>
                <li>
                    <div class="portfolio-meta-title-wrap">
                        <h6><span class="portfolio-meta-icon"><i class="ti-location-pin"></i></span>Place</h6>
                    </div> <span class="entry-place">
                    <?php
                        if(!empty($singleJob->country)){
                            foreach ($countries as $key=>$value){
                                if($singleJob->country == $key){
                                    echo $value;
                                }
                            }
                        }
                    ?>
                    </span></li>
                <li>
                    <div class="portfolio-meta-title-wrap">
                        <h6><span class="portfolio-meta-icon"><i class="ti-user"></i></span>Required Number</h6>
                    </div> <span class="entry-client">{{ucwords(@$singleJob->required_number)}}</span></li>
               
                <li>
               
                    <div class="portfolio-meta-title-wrap">
                        <h6><span class="portfolio-meta-icon"><i class="ti-money"></i></span>Salary</h6>
                    </div> <span class="entry-estimation">NPR. {{@$singleJob->salary}}</span>
                </li>
                <li>
                    <div class="portfolio-meta-title-wrap">
                        <h6><span class="portfolio-meta-icon"><i class="ti-files"></i></span>Minimum Qualification</h6>
                    </div> <span class="entry-duration">{{ucwords(@$singleJob->min_qualification)}}</span>
                </li>
                
               
            </ul>
        </div>
        <?php 
        $today = date('Y-m-d');
        if($singleJob->end_date >= $today){
        ?>
            <div class="textwidget custom-html-widget"><a href="{{route('apply.job',@$singleJob->id)}}" class="d-block btn btn-default"><span class="mx-2 fa fa-file-text"></span>Apply Now</a></div>
        <?php } ?>
    </div>
    
</aside>