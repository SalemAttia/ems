<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class workexprince extends Model
{
    //
    public function employee()
    {
    	return belongsTo(Employee::class);
    }
}
