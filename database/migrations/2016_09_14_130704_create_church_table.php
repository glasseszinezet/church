<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChurchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('churches', function (Blueprint $table) {
            $table->increments('id');
            $table->string("name");
            $table->string("motto");
            $table->string("address");
            $table->string("phone");
            $table->string("alternatePhone");
            $table->string("email");
            $table->string("website");
            $table->string("headOfCongregation");
            $table->string("presbytery");
            $table->string("district");
            $table->string("logoName")->nullable();
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
        Schema::drop('church');
    }
}
