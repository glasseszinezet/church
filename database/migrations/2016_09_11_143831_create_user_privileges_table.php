<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->foreign('users')->references('id')->ondelete("cascade");
            $table->boolean('viewDashBoard',[true,false])->default(true);

            //membership
            $table->boolean('addNewMember',[true,false])->default(false);
            $table->boolean('updateMemberInfo',[true,false])->default(false);
            $table->boolean('viewMemberDetails',[true,false])->default(false);
            $table->boolean('viewMembershipList',[true,false])->default(false);

            //finances
            $table->boolean('recordTithe',[true,false])->default(false);
            $table->boolean('recordWelfare',[true,false])->default(false);
            $table->boolean('recordDonations',[true,false])->default(false);
            $table->boolean('recordOffertory',[true,false])->default(false);
            $table->boolean('recordExpenditure',[true,false])->default(false);
            $table->boolean('recordPledges',[true,false])->default(false);
            $table->boolean('redeemPledges',[true,false])->default(false);
            $table->boolean('viewMemberPaymentHistory',[true,false])->default(false);


            //notifications
            $table->boolean('sendSMSNotifications',[true,false])->default(false);
            $table->boolean('sendVoiceNotifications',[true,false])->default(false);
            $table->boolean('sendEmailNotifications',[true,false])->default(false);


            //accounts
            $table->boolean('removeAccount',[true,false])->default(false);
            $table->boolean('addAccount',[true,false])->default(false);
            $table->boolean('editAccountPrivileges',[true,false])->default(false);



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('privileges');
    }
}
