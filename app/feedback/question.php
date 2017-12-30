<?php

namespace App\feedback;

use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    protected $table = 'questions';
    //public $timestamps = false;

    protected $fillable = [
        'feedform_id', 'type', 'body'
    ];

    protected $hidden = [];
    public function form(){
        return $this->belongsTo('App\feedback\Feedform');
    }
}
