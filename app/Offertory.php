<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offertory extends Model
{
    //
    protected $fillable = ['user_id','currency_id','service_id','session_id','amount'];
}
