<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobCreateRequest;
use App\Http\Requests\JobUpdateRequest;
use App\Models\Client;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\ServiceCategory;
use Carbon\Carbon;
use CountryState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $job = null;
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function index()
    {

        $categories         = JobCategory::orderBy('created_at','desc')->get();
        $jobs               = Job::orderBy('created_at','desc')->get();
        $countries          = CountryState::getCountries();
        $clients            = Client::orderBy('created_at','desc')->get();
        $service_categories = ServiceCategory::orderBy('created_at','desc')->get();

        return view('backend.job.index',compact('categories','jobs','countries','clients','service_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $end     = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
        $start   = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        $category_id = $request->job_category_id;
        $client_id = $request->client_ids;

        $data=[
            'lt_number'            => $request->input('lt_number'),
            'category_ids'         => ($category_id !== null) ? implode(',', $category_id):null,
            'name'                 => $request->input('name'),
            'title'                => $request->input('title'),
            'slug'                 => $this->job->changeToSlug($request->input('name')),
            'client_ids'           => ($client_id !== null) ? implode(',', $client_id):null,
            'required_number'      => $request->input('required_number'),
            'extra_company'        => $request->input('extra_company'),
            'salary'               => $request->input('salary'),
            'min_qualification'    => $request->input('min_qualification'),
            'description'          => $request->input('description'),
            'start_date'           => $start,
            'end_date'             => $end,
            'status'               => $request->input('status'),
            'formlink'             => $request->input('formlink'),
            'created_by'           => Auth::user()->id,
        ];

        if(!empty($request->file('image'))){
            $image          = $request->file('image');
            $name           = uniqid().'_jobs_'.$image->getClientOriginalName();
            $thumb_name     = 'thumb_'.$name;
            $path           = base_path().'/public/images/uploads/jobs/';
            $thumb_path     = base_path().'/public/images/uploads/jobs/thumb/';
            $moved          = Image::make($image->getRealPath())->orientate()->save($path.$name);
            $thumb          = Image::make($image->getRealPath())->fit(70,70)->orientate()->save($thumb_path.$thumb_name);

            if ($moved && $thumb){
                $data['image']= $name;
            }
        }

        $status = Job::create($data);
        if($status){
            Session::flash('success','Job details Created Successfully');
        }
        else{
            Session::flash('error','Job details Creation Failed');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit           = Job::find($id);
        $countries      = CountryState::getCountries();
        $end            = Carbon::createFromFormat('Y-m-d', $edit->end_date)->format('d/m/Y');
        $start          = Carbon::createFromFormat('Y-m-d', $edit->start_date)->format('d/m/Y');

        return response()->json(["edit"=>$edit,"countries"=>$countries,"start"=>$start,"end"=>$end]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $end     = Carbon::createFromFormat('d/m/Y', $request->end_date)->format('Y-m-d');
        $start   = Carbon::createFromFormat('d/m/Y', $request->start_date)->format('Y-m-d');
        $category_id = $request->job_category_id;
        $client_id = $request->client_ids;

        $job                        = Job::find($id);
        $job->category_ids          = ($category_id !== null) ? implode(',', $category_id):null;
        $job->name                  = $request->input('name');
        $job->title                 = $request->input('title');
        $job->lt_number             = $request->input('lt_number');
        $job->client_ids            = ($client_id !== null) ? implode(',', $client_id):null;
        $job->extra_company         = $request->input('extra_company');
        $job->required_number       = $request->input('required_number');
        $job->salary                = $request->input('salary');
        $job->min_qualification     = $request->input('min_qualification');
        $job->description           = $request->input('description');
        $job->formlink              = $request->input('formlink');
        $job->start_date            = $start;
        $job->end_date              = $end;
        $job->updated_by            = Auth::user()->id;
        $oldimage                   = $job->image;
        $thumbimage                 = 'thumb_'.$job->image;


        if (!empty($request->file('image'))){
            $image          = $request->file('image');
            $name           = uniqid().'_jobs_'.$image->getClientOriginalName();
            $thumb_name     = 'thumb_'.$name;
            $path           = base_path().'/public/images/uploads/jobs/';
            $thumb_path     = base_path().'/public/images/uploads/jobs/thumb/';
            $moved          = Image::make($image->getRealPath())->orientate()->save($path.$name);
            $thumb          = Image::make($image->getRealPath())->fit(70,70)->orientate()->save($thumb_path.$thumb_name);

            if ($moved && $thumb){
                $job->image = $name;
                if (!empty($oldimage) && file_exists(public_path().'/images/uploads/jobs/'.$oldimage)){
                    @unlink(public_path().'/images/uploads/jobs/'.$oldimage);
                }
                if (!empty($thumbimage) && file_exists(public_path().'/images/uploads/jobs/thumb/'.$thumbimage)){
                    @unlink(public_path().'/images/uploads/jobs/thumb/'.$thumbimage);
                }
            }
        }

        $status                     = $job->update();
        if($status){
            Session::flash('success','Job details was updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Job details could not be Updated');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete       = Job::find($id);
        $rid          = $delete->id;
        $thumbimage   = 'thumb_'.$delete->image;

        if (!empty($delete->image) && file_exists(public_path().'/images/uploads/jobs/'.$delete->image)){
            @unlink(public_path().'/images/uploads/jobs/'.$delete->image);
        }
        if (!empty($thumbimage) && file_exists(public_path().'/images/uploads/jobs/thumb/'.$thumbimage)){
            @unlink(public_path().'/images/uploads/jobs/thumb/'.$thumbimage);
        }
        $delete->delete();
        return '#job_'.$rid;
    }
}
