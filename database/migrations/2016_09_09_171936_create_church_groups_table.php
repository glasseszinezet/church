<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChurchGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->timestamps();
        });


        Schema::create('group_member', function (Blueprint $table) {
            $table->integer('member_id')->unsigned()->index()->foreign('member_id')->references("id")->on('members')->onDelete("cascade");
            $table->integer('group_id')->unsigned()->index()->foreign('group_id')->references("id")->on('groups')->onDelete("cascade");
            $table->timestamps();
            $table->primary(['member_id','group_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('groups');
        Schema::drop('group_member');
    }
}
