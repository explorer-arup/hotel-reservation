<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //
    function admin(){
    	return $this->hasOne('App/User');
    }
}
