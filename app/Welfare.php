<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Welfare extends Model
{
    protected $fillable = ['user_id','currency_id','amount','member_id'];
}
