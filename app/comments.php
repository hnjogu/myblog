<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    //comments table details
    protected $guarded =[];
    //user who write a comment
    public function author(){
    	return $this->belongsTo('App\User','frmom _users');
    }
    //return post my acount comment
    public function post(){
    	return $this->belongsTo('App\User','frmom _post');
    }
}
