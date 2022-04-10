<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageSection;
use App\Models\SectionElement;
use App\Models\SectionGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Null_;


class SectionElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $photos_path;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $page_section = PageSection::with('page')->where('page_id', $id)->get();
        $sections      = array();
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
        $slider_list_elements = "";
        foreach ($page_section as $section){
            $sections[$section->id] = $section->section_slug;
            if($section->section_slug == 'basic_section'){
                $basic_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'call_to_action_1'){
                $call1_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'call_to_action_2'){
                $call2_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->first();
            }
            else if ($section->section_slug == 'simple_tab_list'){
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
                $accordian2_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }
            else if ($section->section_slug == 'slider_list'){
                $list_3 = $section->list_number_3;
                $slider_list_elements = SectionElement::with('section')
                    ->where('page_section_id', $section->id)
                    ->get();
            }
        }


        return view('backend.pages.section_elements.create',compact( 'sections','list_1','list_2','list_3','basic_elements','call1_elements','bgimage_elements','call2_elements','flash_elements','header_descp_elements','accordian1_elements','accordian2_elements','slider_list_elements','id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section_name = $request->input('section_name');
        $section_id   = $request->input('page_section_id');
        if($section_name == 'basic_section'){
            $data=[
                'heading'                => $request->input('heading'),
                'subheading'             => $request->input('subheading'),
                'page_section_id'        => $section_id,
                'description'            => $request->input('description'),
                'button'                 => $request->input('button'),
                'button_link'            => $request->input('button_link'),
                'created_by'             => Auth::user()->id,
            ];
            if(!empty($request->file('image'))){
                $image        = $request->file('image');
                $name         = uniqid().'_basic_'.$image->getClientOriginalName();
                $path         = base_path().'/public/images/uploads/section_elements/basic_section/';
                $moved        = Image::make($image->getRealPath())->fit(570, 570)->orientate()->save($path.$name);
                if ($moved){
                    $data['image']= $name;
                }
            }
            $status = SectionElement::create($data);
        }
        elseif ($section_name == 'call_to_action_1'){
            $data=[
                'page_section_id'        => $section_id,
                'heading'                => $request->input('heading'),
                'button'                 => $request->input('button'),
                'button_link'            => $request->input('button_link'),
                'created_by'             => Auth::user()->id,
            ];
            if(!empty($request->file('image'))){
                $image        = $request->file('image');
                $name         = uniqid().'_call1_'.$image->getClientOriginalName();
                $path         = base_path().'/public/images/uploads/section_elements/call_1/';
                $moved        = Image::make($image->getRealPath())->fit(1920, 1080)->orientate()->save($path.$name);
                if ($moved){
                    $data['image']= $name;
                }
            }
            $status = SectionElement::create($data);
        }
        elseif ($section_name == 'call_to_action_2'){

            $data=[
                'page_section_id'        => $section_id,
                'heading'                => $request->input('heading'),
                'button'                 => $request->input('button'),
                'button_link'            => $request->input('button_link'),
                'description'            => $request->input('description'),
                'created_by'             => Auth::user()->id,
            ];
            $status = SectionElement::create($data);
        }
        elseif ($section_name == 'simple_tab_list'){
            for ($i=0;$i<2;$i++){
                $heading =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $subheading =  (array_key_exists($i, $request->input('subheading')) ?  $request->input('subheading')[$i]: Null);
                $data=[
                    'heading'                => $heading,
                    'subheading'             => $subheading,
                    'list_header'            => $request->input('list_header')[$i],
                    'description'            => $request->input('description')[$i],
                    'page_section_id'        => $section_id,
                    'list_description'       => $request->input('list_description')[$i],
                    'created_by'             => Auth::user()->id,
                ];

                $status = SectionElement::create($data);
            }

        }
        elseif ($section_name == 'flash_cards'){
            for ($i=0;$i<3;$i++){
                $heading =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $subheading =  (array_key_exists($i, $request->input('subheading')) ?  $request->input('subheading')[$i]: Null);

                $data=[
                    'heading'                => $heading,
                    'subheading'             => $subheading,
                    'list_header'            => $request->input('list_header')[$i],
                    'page_section_id'        => $section_id,
                    'list_description'       => $request->input('list_description')[$i],
                    'created_by'             => Auth::user()->id,
                ];
                $status = SectionElement::create($data);
            }
        }
        elseif ($section_name == 'simple_header_and_description'){
            $data=[
                'page_section_id'        => $section_id,
                'heading'                => $request->input('heading'),
                'description'            => $request->input('description'),
                'created_by'             => Auth::user()->id,
            ];
            $status = SectionElement::create($data);
        }
        elseif ($section_name == 'accordion_section_1'){
            $list1_num   = $request->input('list_number_1');
            for ($i=0;$i<$list1_num;$i++){
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $description =  (array_key_exists($i, $request->input('description')) ?  $request->input('description')[$i]: Null);
                $data=[
                    'heading'               => $heading,
                    'description'           => $description,
                    'page_section_id'       => $section_id,
                    'list_header'           => $request->input('list_header')[$i],
                    'list_description'      => $request->input('list_description')[$i],
                    'created_by'            => Auth::user()->id,
                ];
                $status = SectionElement::create($data);
            }
        }
        elseif ($section_name == 'accordion_section_2'){
                $list2_num   = $request->input('list_number_2');
                for ($i=0;$i<$list2_num;$i++){
                    $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                    $description =  (array_key_exists($i, $request->input('description')) ?  $request->input('description')[$i]: Null);
                    $data=[
                        'heading'               => $heading,
                        'description'           => $description,
                        'page_section_id'       => $section_id,
                        'list_header'           => $request->input('list_header')[$i],
                        'list_description'      => $request->input('list_description')[$i],
                        'created_by'            => Auth::user()->id,
                    ];
                    $status = SectionElement::create($data);
                }
        }
        elseif ($section_name == 'slider_list'){
            $list3_num   = $request->input('list_number_3');
            for ($i=0;$i<$list3_num;$i++){
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $subheading     =  (array_key_exists($i, $request->input('image')) ?  $request->input('image')[$i]: Null);
                $data=[
                    'heading'               => $heading,
                    'image'                 => $subheading,
                    'list_header'           => $request->input('list_header')[$i],
                    'subheading'            => $request->input('subheading')[$i],
                    'page_section_id'       => $section_id,
                    'list_description'      => $request->input('list_description')[$i],
                    'created_by'            => Auth::user()->id,
                ];
                if (array_key_exists($i,$request->file('list_image'))){
                    $image        = $request->file('list_image')[$i];
                    $name         = uniqid().'_list1_'.$image->getClientOriginalName();
                    $thumb_name   = 'thumb_' . $name;
                    $path         = base_path().'/public/images/uploads/section_elements/list_1/';
                    $thumb_path   = base_path() . '/public/images/uploads/section_elements/list_1/thumb/';
                    $moved        = Image::make($image->getRealPath())->fit(770, 450)->orientate()->save($path.$name);
                    $thumb        = Image::make($image->getRealPath())->fit(570, 300)->orientate()->save($thumb_path.$thumb_name);

                    if ($moved && $thumb){
                        $data['list_image']= $name;
                    }
                }
                $status = SectionElement::create($data);
            }
        }

        if($status){
            $response = 'successfully created';
        }
        else{
            $response = 'error';
        }
        return response()->json($response);
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
        //
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
        $section_name = $request->input('section_name');
        $section_id   = $request->input('page_section_id');

        if($section_name == 'basic_section'){
            $basic                      = SectionElement::find($id);
            $basic->heading             = $request->input('heading');
            $basic->subheading          = $request->input('subheading');
            $basic->page_section_id     = $section_id;
            $basic->description         = $request->input('description');
            $basic->button              = $request->input('button');
            $basic->button_link         = $request->input('button_link');
            $basic->updated_by          = Auth::user()->id;
            $oldimage                   = $basic->image;

            if (!empty($request->file('image'))){
                $image                = $request->file('image');
                $name                 = uniqid().'_basic_'.$image->getClientOriginalName();
                $path                 = base_path().'/public/images/uploads/section_elements/basic_section/';
                $moved                = Image::make($image->getRealPath())->fit(570, 570)->orientate()->save($path.$name);
                if ($moved){
                    $basic->image = $name;
                    if (!empty($oldimage) && file_exists(public_path().'/images/uploads/section_elements/basic_section/'.$oldimage)){
                        @unlink(public_path().'/images/uploads/section_elements/basic_section/'.$oldimage);
                    }
                }
            }
            $status = $basic->update();
        }
        elseif ($section_name == 'call_to_action_1'){
            $action                      = SectionElement::find($id);
            $action->page_section_id     = $section_id;
            $action->heading             = $request->input('heading');
            $action->button              = $request->input('button');
            $action->button_link         = $request->input('button_link');
            $action->updated_by          = Auth::user()->id;
            $oldimage                    = $action->image;

            if (!empty($request->file('image'))){
                $image                = $request->file('image');
                $name                 = uniqid().'_call1_'.$image->getClientOriginalName();
                $path                 = base_path().'/public/images/uploads/section_elements/call_1/';
                $moved                = Image::make($image->getRealPath())->fit(1920, 1280)->orientate()->save($path.$name);
                if ($moved){
                    $action->image = $name;
                    if (!empty($oldimage) && file_exists(public_path().'/images/uploads/section_elements/call_1/'.$oldimage)){
                        @unlink(public_path().'/images/uploads/section_elements/call_1/'.$oldimage);
                    }
                }
            }
            $status                      = $action->update();

        }
        elseif ($section_name == 'call_to_action_2'){
            $action                      = SectionElement::find($id);
            $action->page_section_id     = $section_id;
            $action->heading             = $request->input('heading');
            $action->button              = $request->input('button');
            $action->button_link         = $request->input('button_link');
            $action->description         = $request->input('description');
            $action->updated_by          = Auth::user()->id;
            $status                      = $action->update();

        }
        elseif ($section_name == 'simple_header_and_description'){
            $header                      = SectionElement::find($id);
            $header->page_section_id     = $section_id;
            $header->heading             = $request->input('heading');
            $header->description         = $request->input('description');
            $header->updated_by          = Auth::user()->id;
            $status                      = $header->update();
        }

        if($status){
            $response = 'successfully updated';
        }
        else{
            $response = 'error';
        }
        return response()->json($response);
    }

    public function tablistUpdate(Request $request)
    {

        $section_name       = $request->input('section_name');
        $section_id         = $request->input('page_section_id');


        if($section_name == 'simple_tab_list'){

            for ($i=0;$i<2;$i++){
                $heading =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $subheading =  (array_key_exists($i, $request->input('subheading')) ?  $request->input('subheading')[$i]: Null);

                $bgsection                    = SectionElement::find($request->input('id')[$i]);
                $bgsection->heading           = $heading;
                $bgsection->subheading        = $subheading;
                $bgsection->list_header       = $request->input('list_header')[$i];
                $bgsection->description       = $request->input('description')[$i];
                $bgsection->page_section_id   = $section_id;
                $bgsection->list_description  = $request->input('list_description')[$i];
                $bgsection->updated_by        = Auth::user()->id;

                $status = $bgsection->update();
            }

        }
        elseif ($section_name == 'flash_cards') {
            for ($i=0;$i<3;$i++){
                $heading =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $subheading =  (array_key_exists($i, $request->input('subheading')) ?  $request->input('subheading')[$i]: Null);

                $flash                   = SectionElement::find($request->input('id')[$i]);
                $flash->heading          = $heading;
                $flash->subheading       = $subheading;
                $flash->list_header      = $request->input('list_header')[$i];
                $flash->page_section_id  = $section_id;
                $flash->list_description = $request->input('list_description')[$i];
                $flash->updated_by       = Auth::user()->id;
                $status                  = $flash->update();
            }

        }
        elseif ($section_name == 'accordion_section_1') {
            $list1_num       = $request->input('list_number_1');
            $db_elements     = json_decode($request->input('accordion1_elements'),true);
            $db_elements_id  = array_map(function($item){ return $item['id']; }, $db_elements);

            for ($i=0;$i<$list1_num;$i++){
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $description =  (array_key_exists($i, $request->input('description')) ?  $request->input('description')[$i]: Null);
                if($request->input('id')[$i] == null){
                    $data=[
                        'heading'               => $heading,
                        'description'           => $description,
                        'page_section_id'       => $section_id,
                        'list_header'           => $request->input('list_header')[$i],
                        'list_description'      => $request->input('list_description')[$i],
                        'created_by'            => Auth::user()->id,
                    ];
                    $status = SectionElement::create($data);
                }
                else{
                    $accordian1                      = SectionElement::find($request->input('id')[$i]);
                    $accordian1->heading             = $heading;
                    $accordian1->description         = $description;
                    $accordian1->page_section_id     = $section_id;
                    $accordian1->list_header         = $request->input('list_header')[$i];
                    $accordian1->list_description    = $request->input('list_description')[$i];
                    $accordian1->updated_by          = Auth::user()->id;
                    $status                          = $accordian1->update();

                }
            }
            foreach ($db_elements_id as $key=>$value){
                if(!in_array($value,$request->input('id'))){
                    $delete_element = SectionElement::find($value);
                    $status         = $delete_element->delete();
                }
            }

        }
        elseif ($section_name == 'accordion_section_2') {
            $list2_num       = $request->input('list_number_2');
            $db_elements     = json_decode($request->input('accordion2_elements'),true);
            $db_elements_id  = array_map(function($item){ return $item['id']; }, $db_elements);

            for ($i=0;$i<$list2_num;$i++) {
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $description =  (array_key_exists($i, $request->input('description')) ?  $request->input('description')[$i]: Null);
                if($request->input('id')[$i] == null){
                    $data=[
                        'heading'               => $heading,
                        'description'           => $description,
                        'page_section_id'       => $section_id,
                        'list_header'           => $request->input('list_header')[$i],
                        'list_description'      => $request->input('list_description')[$i],
                        'created_by'            => Auth::user()->id,
                    ];
                    $status = SectionElement::create($data);
                }
                else{
                    $accordian2                      = SectionElement::find($request->input('id')[$i]);
                    $accordian2->heading             = $heading;
                    $accordian2->description         = $description;
                    $accordian2->page_section_id     = $section_id;
                    $accordian2->list_header         = $request->input('list_header')[$i];
                    $accordian2->list_description    = $request->input('list_description')[$i];
                    $accordian2->updated_by          = Auth::user()->id;
                    $status                          = $accordian2->update();
                }
            }

            foreach ($db_elements_id as $key=>$value){
                if(!in_array($value,$request->input('id'))){
                    $delete_element = SectionElement::find($value);
                    $status         = $delete_element->delete();
                }
            }
        }
        elseif ($section_name == 'slider_list') {
            $list3_num   = $request->input('list_number_3');
            $db_elements     = json_decode($request->input('slider_list_elements'),true);
            $db_elements_id  = array_map(function($item){ return $item['id']; }, $db_elements);
            for ($i=0;$i<$list3_num;$i++) {
                $heading     =  (array_key_exists($i, $request->input('heading')) ?  $request->input('heading')[$i]: Null);
                $subheading     =  (array_key_exists($i, $request->input('image')) ?  $request->input('image')[$i]: Null);

                if($request->input('id')[$i] == null){
                    $data=[
                        'heading'               => $heading,
                        'image'                 => $subheading,
                        'list_header'           => $request->input('list_header')[$i],
                        'page_section_id'       => $section_id,
                        'subheading'            => $request->input('subheading')[$i],
                        'list_description'      => $request->input('list_description')[$i],
                        'created_by'            => Auth::user()->id,
                    ];
                    if (array_key_exists($i,$request->file('list_image'))){
                        $image        = $request->file('list_image')[$i];
                        $name         = uniqid().'_list1_'.$image->getClientOriginalName();
                        $thumb_name   = 'thumb_' . $name;
                        $path         = base_path().'/public/images/uploads/section_elements/list_1/';
                        $thumb_path   = base_path() . '/public/images/uploads/section_elements/list_1/thumb/';
                        $moved        = Image::make($image->getRealPath())->fit(770, 450)->orientate()->save($path.$name);
                        $thumb        = Image::make($image->getRealPath())->fit(570, 300)->orientate()->save($thumb_path.$thumb_name);

                        if ($moved && $thumb){
                            $data['list_image']= $name;
                        }
                    }
                    $status = SectionElement::create($data);
                }
                else{
                    $sliderlist                      = SectionElement::find($request->input('id')[$i]);
                    $sliderlist->heading             = $heading;
                    $sliderlist->list_header         = $request->input('list_header')[$i];
                    $sliderlist->page_section_id     = $section_id;
                    $sliderlist->subheading          = $request->input('subheading')[$i];
                    $sliderlist->list_description    = $request->input('list_description')[$i];
                    $sliderlist->updated_by          = Auth::user()->id;
                    $oldimage                        = $sliderlist->list_image;

                    if($request->file('list_image') !== null){
                        if (array_key_exists($i,$request->file('list_image'))){
                            $image        = $request->file('list_image')[$i];
                            $name         = uniqid().'_list1_'.$image->getClientOriginalName();
                            $thumb_name   = 'thumb_' . $name;
                            $path         = base_path().'/public/images/uploads/section_elements/list_1/';
                            $thumb_path   = base_path() . '/public/images/uploads/section_elements/list_1/thumb/';
                            $moved        = Image::make($image->getRealPath())->fit(770, 400)->orientate()->save($path.$name);
                            $thumb        = Image::make($image->getRealPath())->fit(570, 300)->orientate()->save($thumb_path.$thumb_name);

                            if ($moved){
                                $sliderlist->list_image = $name;
                                if (!empty($oldimage) && file_exists(public_path().'/images/uploads/section_elements/list_1/'.$oldimage)){
                                    @unlink(public_path().'/images/uploads/section_elements/list_1/'.$oldimage);
                                }
                                if (!empty($thumbimage) && file_exists(public_path().'/images/uploads/section_elements/list_1/thumb/'.$thumbimage)){
                                    @unlink(public_path().'/images/uploads/section_elements/list_1/thumb/'.$thumbimage);
                                }
                            }
                        }
                    }
                    $status = $sliderlist->update();
                }
            }


            foreach ($db_elements_id as $key=>$value){
                if(!in_array($value,$request->input('id'))){
                    $delete_element = SectionElement::find($value);
                    if (!empty($delete_element->list_image) && file_exists(public_path().'/images/uploads/section_elements/list_1/'.$delete_element->list_image)){
                        @unlink(public_path().'/images/uploads/section_elements/list_1/'.$delete_element->list_image);
                    }
                    $status        = $delete_element->delete();
                }
            }

        }

        if($status){
            $response = 'successfully updated';
        }
        else{
            $response = 'error';
        }
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
