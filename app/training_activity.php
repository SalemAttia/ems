<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class training_activity extends Model
{
    public function employee()
    {
    	return belongsTo(Employee::class);
    }
}
