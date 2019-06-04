<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Companie extends Model
{
    protected $fillable = [
        'name', 'password',
    ];
    public function coments()
    {
        return $this->hasMany('App\Coment','company_id','id');
    }

    public function comentsOwner()
    {
        return $this->hasMany('App\Coment','owner','id');
    }

    public function employee()
    {
        return $this->hasMany('App\Employee','company_id','id');
    }
}
