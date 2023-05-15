<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    use HasFactory;
    protected $table ='core_values';
    protected $fillable =['id','heading','image','description','created_by','updated_by'];

}
