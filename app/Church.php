<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    //
    protected $fillable = ['name','motto','address','phone','alternatePhone','email','website','headOfCongregation','presbytery','district','logoName'];
}
