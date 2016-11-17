<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    protected $fillable = ['user_id','viewDashBoard','addNewMember','updateMemberInfo','viewMemberDetails','viewMembershipList','recordTithe','recordWelfare','recordDonations','recordOffertory','recordExpenditure','recordPledges','redeemPledges','viewMemberPaymentHistory','sendSMStifications','sendVoicetifications','sendEmailtifications','removeAccount','addAccount','editAccountPrivileges','recordAttendance','updateChurchDetails','addGroupOrMinistry','updateBirthDayWisherDetails','viewTitheReport','viewWelfareReport','viewPledgeReport','viewActivityLogReport','viewOffertoryReport','viewDonationsReport','viewAttendanceReport','viewMembershipReport','viewAccountUsageReport'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
