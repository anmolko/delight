<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $table ='sliders';
    protected $fillable =['id','heading','subheading_one','button_one','button_one_link','slider_front_image','slider_back_image','status','created_by','updated_by'];

}
