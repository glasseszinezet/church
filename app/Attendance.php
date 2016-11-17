<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $fillable = ['session_id','service_id','count'];

    public function session()
    {
        return $this->belongsTo('App\Session');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
