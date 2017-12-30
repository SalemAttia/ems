<?php

namespace App\feedback;

use Illuminate\Database\Eloquent\Model;

class Feedform extends Model
{
    protected $table = 'Feedforms';
    //public $timestamps = false;

    protected $fillable = [
        'name', 'desc', 'link'
    ];

    protected $hidden = [];
    public function questions(){
        return $this->hasMany('App\feedback\question');
    }

    public function response(){
        return $this->hasMany('App\feedback\response');
    }
}
