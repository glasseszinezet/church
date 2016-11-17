<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActivityLogger extends Model
{
    //
    protected $fillable = ['user_id','logMessage'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
