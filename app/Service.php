<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = ['name'];

    public function sessions()
    {
        return $this->hasMany('App\Session');
    }
}
