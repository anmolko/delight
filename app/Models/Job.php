<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use CountryState;


class Job extends Model
{
    use HasFactory;
    protected $table ='jobs';
    protected $fillable =['id','category_ids','name','title','slug','lt_number','country','client_id','client_ids','extra_company','required_number','min_qualification','image','salary','description','formlink','end_date','start_date','created_by','updated_by'];

//    public function category(){
//        return $this->belongsTo('App\Models\JobCategory','job_category_id','id')->with('service');
//    }

    public function client(){
        return $this->belongsTo('App\Models\Client','client_id','id');
    }

    public function jobapplication(){
        return $this->hasMany('App\Models\JobApplication');
    }

    public function changeToSlug($name){
        return Str::slug(base64_encode($name), '-');
    }

    public function getJobCategories($ids){
        $category_id = explode(",", $ids);
        return implode (", ", array_map(function ($item) {
            return JobCategory::find($item)->name ?? null;
        }, $category_id));
    }

    public function getCountryKey($id){
        $client_id = explode(",", $id);
        return array_unique(array_map(function ($item) {
            return Client::find($item)->country ?? null;
        }, $client_id));
    }

    public function getCountryName($country_key){
        $countries = CountryState::getCountries();
        $val = null;
        foreach ($countries as $key=>$value){
            if($country_key == $key){
                $val = $value;
            }
        }
        return $val;
    }

    public function getClientName($ids){
        $client_id = explode(",", $ids);
        return implode (", ", array_map(function ($item) {
            return Client::find($item)->name ?? "N/A";
        }, $client_id));
    }
}
