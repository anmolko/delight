<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $table ='job_applications';
    protected $fillable =['id','job_id','name','email','number','current_address','permanent_address','message','status','cv','passport','latest_photo','created_by','updated_by'];

    public function job(){
        return $this->belongsTo('App\Models\Job','job_id','id')->with('category','client');
    }

}
