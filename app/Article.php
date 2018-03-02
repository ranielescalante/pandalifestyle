<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    function user(){
    	return $this->belongsTo('App\User');
    }

    function comment(){
    	return $this->hasMany('App\Comment');
    }

    function category(){
    	return $this->belongsTo('App\Category');
    }

    function read_more(){
    	return Str::words($this->content, $words = 80, $end = ' ...');
    }

}
