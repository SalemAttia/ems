<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];

    public function education(){
        return $this->hasMany('App\education');
    }

    public function socialmeadi(){
        return $this->hasMany('App\socialmeadi');
    }
    
    public function workexprince(){
        return $this->hasMany('App\workexprince');
    }

     public function training_activity(){
        return $this->hasMany('App\training_activity');
    }
    
}
