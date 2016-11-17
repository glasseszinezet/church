<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffertoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offertories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->foreign('users')->references('id')->onDelete('cascade');
            $table->integer('currency_id')->unsigned()->foreign('currencies')->references('id')->onDelete('cascade');
            $table->integer('service_id')->unsigned()->foreign('services')->references('id')->onDelete('cascade');
            $table->integer('session_id')->unsigned()->foreign('sessions')->references('id')->onDelete('cascade');
            $table->float('amount')->unsigned();
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
        Schema::drop('offertories');
    }
}
