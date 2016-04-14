<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //MassAssignの例外を解除する。
    
    protected $fillable =['title','body','summary'];
}
