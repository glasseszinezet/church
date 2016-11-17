<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BirthdayWisher extends Model
{
    //
    protected $table = "birthdayWisher";
    protected $fillable = ['message','activeMembersOnly'];
}
