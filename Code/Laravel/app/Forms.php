<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    //MassAssignのエラ回避ーの仕方
    
    protected $fillable=['title','body','state'];
}
