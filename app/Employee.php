<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function postes()
    {
        return $this->belongsTo('App\Post','post','id');
    }
}
