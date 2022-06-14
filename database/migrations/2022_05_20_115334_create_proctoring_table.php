<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('proctoring', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('quiz_id');
            $table->integer('user_id');
            $table->integer('voice_db');
            $table->longText('img_log');
            $table->integer('user_movement_updown');
            $table->integer('user_movement_ir');
            $table->integer('user_movement_eyes');
            $table->integer('phone_detection');
            $table->integer('person_status');

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
        Schema::dropIfExists('proctoring');
    }
};
