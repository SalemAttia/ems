<?php

namespace App\feedback;

use Illuminate\Database\Eloquent\Model;

class response extends Model
{
    protected $table = 'responses';
    //public $timestamps = false;

    protected $fillable = [
        'feedform_id', 'user_id'
    ];
    protected $casts = [
        'questionresponse' => 'array'
    ];

    protected $hidden = [];
    public function form(){
        return $this->belongsTo('App\feedback\Feedform');
    }
}
