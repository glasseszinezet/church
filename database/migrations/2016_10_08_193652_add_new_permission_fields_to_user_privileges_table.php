<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewPermissionFieldsToUserPrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('privileges', function (Blueprint $table) {
            $table->boolean('recordAttendance',[true,false])->default(false);
            $table->boolean('updateChurchDetails',[true,false])->default(false);
            $table->boolean('addGroupOrMinistry',[true,false])->default(false);
            $table->boolean('updateBirthDayWisherDetails',[true,false])->default(false);



            $table->boolean('viewTitheReport',[true,false])->default(false);
            $table->boolean('viewWelfareReport',[true,false])->default(false);
            $table->boolean('viewPledgeReport',[true,false])->default(false);
            $table->boolean('viewActivityLogReport',[true,false])->default(false);
            $table->boolean('viewOffertoryReport',[true,false])->default(false);
            $table->boolean('viewDonationsReport',[true,false])->default(false);
            $table->boolean('viewAttendanceReport',[true,false])->default(false);
            $table->boolean('viewMembershipReport',[true,false])->default(false);
            $table->boolean('viewAccountUsageReport',[true,false])->default(false);
//            $table->boolean('',[true,false])->default(false);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('privileges', function (Blueprint $table) {
            $table->dropColumn('recordAttendance');
            $table->dropColumn('updateChurchDetails');
            $table->dropColumn('addGroupOrMinistry');
            $table->dropColumn('updateBirthDayWisherDetails');
            $table->dropColumn('viewTitheReport');
            $table->dropColumn('viewWelfareReport');
            $table->dropColumn('viewPledgeReport');
            $table->dropColumn('viewActivityLogReport');
            $table->dropColumn('viewOffertoryReport');
            $table->dropColumn('viewDonationsReport');
            $table->dropColumn('viewAttendanceReport');
            $table->dropColumn('viewMembershipReport');
            $table->dropColumn('viewAccountUsageReport');
        });
    }
}
