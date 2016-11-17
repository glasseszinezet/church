<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityLoggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_loggers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->foreign('users')->references('id')->onDelete('cascade');
            $table->text("logMessage");
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
        Schema::drop('activity_loggers');
    }
}
