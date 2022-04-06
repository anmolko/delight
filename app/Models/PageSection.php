<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    use HasFactory;
    protected $table ='page_sections';
    protected $fillable =['id','section_name','position','section_slug','list_number_1','list_number_2','list_number_3','page_id','created_by','updated_by'];

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }

    public function elements()
    {
        return $this->hasMany('App\Models\SectionElement');
    }

    public function gallery()
    {
        return $this->hasMany('App\Models\SectionGallery');
    }
}
