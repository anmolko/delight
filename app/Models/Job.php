<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table ='jobs';
    protected $fillable =['id','job_category_id','name','slug','lt_number','country','client_id','required_number','min_qualification','image','salary','description','formlink','end_date','start_date','created_by','updated_by'];

    public function category(){
        return $this->belongsTo('App\Models\JobCategory','job_category_id','id')->with('service');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client','client_id','id');
    }

    public function jobs(){
        return $this->hasMany('App\Models\JobApplication');
    }
}
