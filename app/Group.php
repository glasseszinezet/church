<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

   protected $fillable = ['name'];

    public function members()
    {
        return $this->belongsToMany('App\Member');
    }
}
