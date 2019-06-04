<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    public function companie_id()
    {
        return $this->belongsTo('App\Companie','companie_id','id');
    }

}
