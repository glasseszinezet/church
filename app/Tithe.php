<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Tithe extends Model
{
    //
    protected $fillable = ['user_id','currency_id','amount','member_id'];

}
