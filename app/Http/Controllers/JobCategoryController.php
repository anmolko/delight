<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $category = null;

    public function __construct(JobCategory $category)
    {
        $this->middleware('auth');
        $this->category = $category;

    }

    public function index()
    {
//        $category       = JobCategory::all();
//        return view('backend.job.index',compact('category'));
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
        $data=[
            'name'                  => $request->input('name'),
            'slug'                  => $this->category->changeToSlug($request->input('name')),
            'service_category_id'   => $request->input('service_category_id'),
            'created_by'             => Auth::user()->id,
        ];

        if(!empty($request->file('image'))){
            $image        = $request->file('image');
            $name         = uniqid().'_'.$image->getClientOriginalName();
            $path         = base_path().'/public/images/uploads/job_categories/';
            $moved        = Image::make($image->getRealPath())->fit(770,350)->orientate()->save($path.$name);
            if ($moved){
                $data['image']= $name;
            }
        }
        $status = JobCategory::create($data);
        if($status){
            Session::flash('success','Job Category Created Successfully');
        }
        else{
            Session::flash('error','Job Category Creation Failed');
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
        $edit           = JobCategory::find($id);
        return response()->json(["edit"=>$edit]);
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
        $category                       = JobCategory::find($id);
        $category->name                 = $request->input('name');
        $category->slug                 = $this->category->changeToSlug($request->input('name'));
        $category->service_category_id  = $request->input('service_category_id');
        $category->updated_by           = Auth::user()->id;
        $oldimage                       = $category->image;

        if (!empty($request->file('image'))){
            $image                = $request->file('image');
            $name                 = uniqid().'_'.$image->getClientOriginalName();
            $path                 = base_path().'/public/images/uploads/job_categories/';
            $moved                = Image::make($image->getRealPath())->fit(770,350)->orientate()->save($path.$name);
            if ($moved){
                $category->image = $name;
                if (!empty($oldimage) && file_exists(public_path().'/images/uploads/job_categories/'.$oldimage)){
                    @unlink(public_path().'/images/uploads/job_categories/'.$oldimage);
                }
            }
        }
        $status = $category->update();
        if($status){
            Session::flash('success','Job Category was updated Successfully');
        }
        else{
            Session::flash('error','Something Went Wrong. Job Category could not be Updated');
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
        $delete       = JobCategory::find($id);
        $rid          = $delete->id;
        if (!empty($delete->image) && file_exists(public_path().'/images/uploads/job_categories/'.$delete->image)){
            @unlink(public_path().'/images/uploads/job_categories/'.$delete->image);
        }
        $delete->delete();
        return '#jobcat_'.$rid;
    }
}
