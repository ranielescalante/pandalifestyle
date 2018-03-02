<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function category(){
    	return $this->hasMany('App\Category');
    }

    function article(){
    	return $this->belongsTo('App\Article');
    }

}
