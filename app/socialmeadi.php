<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class socialmeadi extends Model
{
    //

    public function employee()
    {
    	return belongsTo(Employee::class);
    }
    
}
