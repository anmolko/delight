<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Mail\ContactDetail;
use App\Models\Award;
use App\Models\Album;
use App\Models\AlbumGallery;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Client;
use App\Models\CoreValue;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\ManagingDirector;
use App\Models\Page;
use App\Models\PageSection;
use App\Models\PressRelease;
use App\Models\SectionElement;
use App\Models\SectionGallery;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Team;
use CountryState;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class FrontController extends Controller
{
    protected $blog = null;
    protected $bcategory = null;
    protected $slider = null;
    protected $S_category = null;
    protected $testimonial = null;
    protected $client = null;
    protected $award = null;
    protected $team = null;
    protected $settting = null;
    protected $page = null;
    protected $pagesection = null;
    protected $jobcategory = null;
    protected $album = null;
    protected $album_gallery = null;
    protected $career = null;
    protected $press = null;



    public function __construct(PressRelease $press,Career $career,AlbumGallery $album_gallery,Album $album,Job $job,JobCategory $jobcategory,PageSection $pagesection,Page $page,Setting $setting,BlogCategory $bcategory,Blog $blog,Slider $slider,ServiceCategory $S_category,Testimonial $testimonial,Client $client,Award $award,Team $team)
    {
        $this->bcategory = $bcategory;
        $this->press = $press;
        $this->blog = $blog;
        $this->slider = $slider;
        $this->S_category = $S_category;
        $this->testimonial = $testimonial;
        $this->client = $client;
        $this->award = $award;
        $this->team = $team;
        $this->setting = $setting;
        $this->page = $page;
        $this->pagesection = $pagesection;
        $this->jobcategory = $jobcategory;
        $this->job = $job;
        $this->album = $album;
        $this->album_gallery = $album_gallery;
        $this->career = $career;
    }


    public function index()
    {
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();
        $sliders =$this->slider->where('status','active')->orderBy('created_at', 'asc')->get();
        $service_categories =$this->S_category->orderBy('name', 'asc')->take('4')->get();
        $testimonials =$this->testimonial->orderBy('title', 'asc')->get();
        $client_groups =$this->client->orderBy('created_at', 'asc')->get()->groupBy('country');
        $clients = $this->client->orderBy('created_at', 'asc')->take('8')->get();

        $countries  = CountryState::getCountries();
        $awards =$this->award->orderBy('name', 'asc')->get();
        $welcome_settings = $this->setting->first();
        $today = date('Y-m-d');
        $alljobs = $this->job->orderBy('created_at', 'asc')->where('start_date','<=',$today)->take(3)->get();
        $today = date('Y-m-d');
        $directors = ManagingDirector::orderBy('order', 'asc')->get();
        $allcores =CoreValue::orderBy('heading', 'asc')->get();

        return view('welcome',compact('alljobs','allcores','directors','today','welcome_settings','awards','sliders','service_categories','latestPosts','testimonials','countries','client_groups','clients'));

    }


    public function loadPdf()
    {
        $theme_data = Setting::first();
        return view('frontend.brocher.brocher',compact('theme_data'));
    }

    public function team(){
        $teams =$this->team->orderBy('order', 'asc')->get();
        return view('frontend.pages.team',compact('teams'));
    }

    public function album(){
        $albums =$this->album->with('gallery')->get();
        return view('frontend.pages.album',compact('albums'));
    }

    public function albumgallery($slug){
        $singleAlbum = $this->album->where('slug', $slug)->with('gallery')->first();
        if (!$singleAlbum) {
            return abort(404);
        }
        return view('frontend.pages.album_gallery',compact('singleAlbum'));
    }


    public function postRequirement(){
        return view('frontend.pages.post_requirement');
    }

    public function press(){
        $allPress = $this->press->orderBy('created_at', 'DESC')->where('status','publish')->paginate(6);
        $latestPress = $this->press->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();

        return view('frontend.pages.press_release.index',compact('allPress','latestPress','latestPosts'));

    }

    public function pressSingle($slug){

        $singlePress   = $this->press->where('slug', $slug)->first();
        $latestPress   = $this->press->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();
        $latestPosts   = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();

        return view('frontend.pages.press_release.single',compact('singlePress','latestPress','latestPosts'));
    }


    public function sliderSingle($slug){

        $singleSlider = SectionElement::with('section')->where('subheading', $slug)->first();
        if (!$singleSlider) {
            return abort(404);
        }
        $slider_lists = SectionElement::with('section')->where('page_section_id', @$singleSlider->page_section_id)->get();


        return view('frontend.pages.sliderlist.single',compact('singleSlider','slider_lists'));
    }

    public function clients(){
        $client_groups =    $this->client->orderBy('country', 'asc')->get();
        $countrycodes =    $this->client->select('country')->distinct()->get();
        $countries          = CountryState::getCountries();

        return view('frontend.pages.clients',compact('client_groups','countries','countrycodes'));
    }


    public function career(){
        $careers =    $this->career->orderBy('end_date', 'DESC')->get();
        return view('frontend.pages.career',compact('careers'));
    }
    public function jobs(){
        $today = date('Y-m-d');
        $alljobs = $this->job->orderBy('created_at', 'asc')->where('start_date','<=',$today)->paginate(6);
        $latestJobs = $this->job->orderBy('created_at', 'DESC')->where('start_date','<=',$today)->take(3)->get();

        return view('frontend.pages.jobs.index',compact('today','alljobs','latestJobs'));
    }


    public function jobSingle($slug){

        $singleJob = $this->job->where('slug', $slug)->first();
        if (!$singleJob) {
            return abort(404);
        }

        $today = date('Y-m-d');
        $service_categories = $this->S_category->orderBy('name', 'asc')->take(3)->get();
        $countries  = CountryState::getCountries();
        $latestJobs = $this->job->orderBy('created_at', 'DESC')->where('start_date','<=',$today)->take(3)->get();

        return view('frontend.pages.jobs.single',compact('today','countries','singleJob','latestJobs'));
    }

    public function searchJob(Request $request)
    {
        $today = date('Y-m-d');
        $title = $request->s;
        $alljobs = $this->job
                ->where('name', 'LIKE', '%' . $title . '%')->orderBy('name', 'asc')
                ->where('start_date','<=',$today)
                ->paginate(6);
        $latestJobs = $this->job->orderBy('created_at', 'DESC')->where('start_date','<=',$today)->take(3)->get();

        return view('frontend.pages.jobs.search',compact('today','alljobs','title','latestJobs'));
    }


    public function apply($id){
        $singleJob = $this->job->where('id', $id)->first();
        $countries  = CountryState::getCountries();

        if (!$singleJob) {
            return abort(404);
        }
        return view('frontend.pages.apply',compact('countries','singleJob'));
    }

    public function services(){
        $service_categories =$this->S_category->orderBy('name', 'asc')->get();
        return view('frontend.pages.services.index',compact('service_categories'));
    }

    public function serviceSingle($slug){
        $singleService = $this->S_category->where('slug', $slug)->first();
        $service_categories = $this->S_category->orderBy('name', 'asc')->get();
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();
        return view('frontend.pages.services.single',compact('singleService','service_categories','latestPosts'));
    }

    public function blogs(){
        $bcategories = $this->bcategory->with('blogs')->get();
        $allPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->paginate(6);
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();
        return view('frontend.pages.blogs.index',compact('allPosts','latestPosts','bcategories'));
    }

    public function blogSingle($slug){

        $singleBlog = $this->blog->where('slug', $slug)->first();
        $catid = $singleBlog->blog_category_id;
        $relatedBlogs = Blog::where('blog_category_id', '=', $catid)->where('status','publish')->take(2)->get();
        $bcategories = $this->bcategory->get();
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();
        return view('frontend.pages.blogs.single',compact('singleBlog','relatedBlogs','bcategories','latestPosts'));
    }



    public function blogCategories($slug){
        $bcategory = $this->bcategory->where('slug', $slug)->first();
        $catid = $bcategory->id;
        $cat_name = $bcategory->name;
        $allPosts = $this->blog->where('blog_category_id', $catid)->where('status','publish')->orderBy('title', 'asc')->paginate(6);
        $bcategories = $this->bcategory->get();
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();
        return view('frontend.pages.blogs.category',compact('allPosts','cat_name','latestPosts','bcategories'));
    }





    public function searchBlog(Request $request)
    {
        $query = $request->s;
        $allPosts = $this->blog->where('title', 'LIKE', '%' . $query . '%')->where('status','publish')->orderBy('title', 'asc')->paginate(6);
        $bcategories = $this->bcategory->get();
        $latestPosts = $this->blog->orderBy('created_at', 'DESC')->where('status','publish')->take(3)->get();

        return view('frontend.pages.blogs.search',compact('allPosts','query','latestPosts','bcategories'));
    }

    public function page($page)
    {
        $page_detail = $this->page->with('sections')->where('slug', $page)->where('status','active')->first();
        if (!$page_detail) {
            return abort(404);
        }
        $page_section = $this->pagesection->with('page')->where('page_id', $page_detail->id)->orderBy('position', 'ASC')->get();
        if (!$page_section) {
            return abort(404);
        }
        $sorted_sections        = array();
        $list_1 = "";
        $list_2 = "";
        $list_3 = "";
        $basic_elements = "";
        $call1_elements = "";
        $call2_elements = "";
        $bgimage_elements = "";
        $flash_elements = "";
        $header_descp_elements = "";
        $accordian1_elements = "";
        $accordian2_elements = "";
        $image_des_elements = "";
        $slider_list_elements = "";
        $accordian2_chunks = "";
        $gallery_elements = "";
        $heading = "";
        $subheading = "";


        foreach ($page_section as $section){
            $sorted_sections[$section->id] = $section->section_slug;
            if($section->section_slug == 'basic_section'){
                $basic_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            elseif ($section->section_slug == 'image_description_section'){
                $image_des_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            elseif ($section->section_slug == 'call_to_action_1'){
                $call1_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            elseif ($section->section_slug == 'call_to_action_2'){
                $call2_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            elseif ($section->section_slug == 'simple_tab_list'){
                $bgimage_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }
            else if ($section->section_slug == 'flash_cards'){
                $flash_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }
            else if ($section->section_slug == 'simple_header_and_description'){
                $header_descp_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'accordion_section_1'){
                $list_1 = $section->list_number_1;
                $accordian1_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }
            else if ($section->section_slug == 'accordion_section_2'){
                $list_2 = $section->list_number_2;
                $half = ceil($list_2 / 2);
                $accordian2_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
                $accordian2_chunks = @$accordian2_elements->chunk($half);
            }
            else if ($section->section_slug == 'slider_list'){
                $list_3 = $section->list_number_3;
                $slider_list_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }
            else if ($section->section_slug == 'gallery'){
                $gallery_elements = SectionGallery::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
                $heading    = $section->gallery_heading;
                $subheading = $section->gallery_subheading;
            }
        }


        return view('frontend.pages.dynamic_page', compact('sorted_sections','heading','subheading','gallery_elements','image_des_elements','accordian2_chunks','page_detail','list_1','list_2','list_3','basic_elements','call1_elements','call2_elements','bgimage_elements','flash_elements','header_descp_elements','accordian1_elements','accordian2_elements','slider_list_elements'));

    }

    public function contact()
    {
        return view('frontend.pages.contact');

    }

    public function contactStore(Request $request)
    {
        $theme_data = Setting::first();
            $data = array(
                'fullname'        =>$request->input('fullname'),
                'message'        =>$request->input('message'),
                'email'        =>$request->input('email'),
                'subject'        =>$request->input('subject'),
                'address'        =>ucwords($theme_data->address),
                'site_email'        =>ucwords($theme_data->email),
                'site_name'        =>ucwords($theme_data->website_name),
                'phone'        =>ucwords($theme_data->phone),
                'logo'        =>ucwords($theme_data->logo),
            );
//             Mail::to('surajmzn75@gmail.com')->send(new ContactDetail($data));

            Mail::to($theme_data->email)->cc(['suraj@canosoft.com.np','info@canosoft.com.np'])->send(new ContactDetail($data));

            Session::flash('success','Thank you for contacting us!');

        return redirect()->back();
    }
}
