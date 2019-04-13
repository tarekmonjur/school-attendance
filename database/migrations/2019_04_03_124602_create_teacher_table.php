<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->bigIncrements('em_id');
            $table->string('rf_id');
            $table->string('bid')->nullable();
            $table->string('name');
            $table->string('post');
            $table->string('gsm');
            $table->string('nid');
            $table->string('salary');
            $table->string('sex');
            $table->string('bgroup');
            $table->string('address');
            $table->string('edu');
            $table->string('note');
            $table->string('balance');
            $table->string('password');
            $table->string('date');
            $table->string('location');
            $table->string('serial_sequence');
            $table->string('active');
            $table->string('billdate');
            $table->string('staff_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher');
    }
}
