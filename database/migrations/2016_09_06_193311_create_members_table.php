<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');

            //Personal Info
            $table->string('firstName');
            $table->string('lastName');
            $table->string('otherNames')->nullable();
            $table->enum('gender',['M','F','U'])->default('U');
            $table->date('dateOfBirth');
            $table->integer('age')->unsigned();

            $table->string('nationality');
            $table->string('placeOfBirth');
            $table->string('homeTown');

            $table->string('phone');
            $table->string('alternatePhone');
            $table->string('email');

            $table->string('address',200);
            $table->string('houseNumber',200)->nullable();
            $table->string('suburb',200)->nullable();


            // Marriage Info && family
            $table->enum('marriageStatus',['single','married','divorced','widowed'])->default('single');
            $table->string('nameOfSpouse')->nullable();
            $table->string('spousePhone')->nullable();

            $table->string('fathersName')->nullable();
            $table->string('mothersName')->nullable();
            $table->integer('numberOfChildren')->default(0);

            $table->string('nextOfKin')->nullable();

            // Church Info
            $table->enum('status',['active','inactive'])->default('inactive');
            $table->date('dateMemberJoinedChurch')->nullable();
            $table->date('dateConfirmed')->nullable();

            $table->date('dateBaptized')->nullable();
            $table->string('confirmationMinister')->nullable();
            $table->string('baptismMinister')->nullable();

            $table->string('confirmationLocation')->nullable();
            $table->string('baptismLocation')->nullable();
            $table->integer('positionInChurch')->unsigned()->foreign('positions')->references("id")->onDelete("cascade");

            //Occupation
            $table->string('occupation');
            $table->string('workPhone')->nullable();
            $table->string('employerAddress',200);

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
        Schema::drop('members');
    }
}
