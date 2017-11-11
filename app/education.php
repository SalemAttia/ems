<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    //
    public function employee()
    {
    	return belongsTo(Employee::class);
    }
}
