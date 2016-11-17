<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{

    //

    protected $fillable = [
        'firstName','lastName','otherNames','gender','dateOfBirth','age'
        ,'nationality','placeOfBirth','homeTown','phone','alternatePhone','email','address'
        ,'houseNumber','suburb','marriageStatus','nameOfSpouse','spousePhone','fathersName'
        ,'mothersName','numberOfChildren','nextOfKin','status','dateMemberJoinedChurch'
        ,'dateConfirmed','dateBaptized','confirmationMinister','baptismMinister','confirmationLocation'
        ,'baptismLocation','positionInChurch','occupation','workPhone','employerAddress'
    ];


    public function setPhoneAttribute($phone)
    {
        $this->attributes['phone'] = $this->formatMSISDN($phone);

    }

    public function setAlternatePhoneAttribute($phone)
    {
        $this->attributes['alternatePhone'] = $this->formatMSISDN($phone);
    }

    public function setSpousePhoneAttribute($phone)
    {
        $this->attributes['spousePhone'] = $this->formatMSISDN($phone);
    }

    public function getPhoneAttribute($phone)
    {
        return str_replace("+233","0", $phone);

    }

    public function getAlternatePhoneAttribute($phone)
    {
        return str_replace("+233","0",$phone);
    }

    public function getSpousePhoneAttribute($phone)
    {
        return str_replace("+233","0",$phone);
    }


    private function formatMSISDN($msisdn)
    {
        if (starts_with($msisdn,"00234"))
        {
            $msisdn = "+".substr($msisdn,2);
        }if (starts_with($msisdn,"0234"))
        {
            $msisdn = "+".substr($msisdn,1);
        }if (starts_with($msisdn,"234"))
        {
            $msisdn = "+".$msisdn;
        }if (starts_with($msisdn,"0"))
        {
            $msisdn = "+234".substr($msisdn,1);
        }


        return $msisdn;
    }

    public function groups()
    {
        return $this->belongsToMany('App\Group')->withTimestamps();
    }


    public function country()
    {
        return $this->hasOne('App\Country');
    }


    public function tithes()
    {
        return $this->hasMany('App\Tithe');
    }

    public function donations()
    {
        return $this->hasMany('App\Donation');
    }

    public function pledges()
    {
        return $this->hasMany('App\Pledge');
    }

    public function welfares()
    {
        return $this->hasMany('App\Welfare');
    }


}
