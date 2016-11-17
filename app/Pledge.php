<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pledge extends Model
{
    protected $fillable = ['user_id','currency_id','amount','member_id'];


    public function scopeRedeemed($query)
    {
        $query->where('redeemed',true);
    }

    public function scopeNotRedeemed($query)
    {
        $query->where('redeemed',false);
    }

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function recordedBy()
    {
        return $this->belongsTo('App\User');
    }

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }
}
