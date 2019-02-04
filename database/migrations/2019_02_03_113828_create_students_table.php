<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sid')->nullable();
            $table->string('rf_id')->nullable();
            $table->string('bid')->nullable();
            $table->string('name');
            $table->string('fname')->nullable();
            $table->string('mname')->nullable();
            $table->string('sex')->nullable();
            $table->string('roll')->nullable();
            $table->string('year')->nullable();
            $table->string('classname')->nullable();
            $table->string('section')->nullable();
            $table->string('bdate')->nullable();
            $table->string('gsm')->nullable();
            $table->string('email')->nullable();
            $table->string('mfee')->nullable();
            $table->string('address')->nullable();
            $table->string('paddress')->nullable();
            $table->string('fnid')->nullable();
            $table->string('mnid')->nullable();
            $table->string('bgroup')->nullable();
            $table->string('p_ins')->nullable();
            $table->string('adate')->nullable();
            $table->string('active')->nullable();
            $table->string('password')->nullable();
            $table->string('lname')->nullable();
            $table->string('location')->nullable();
            $table->string('f_location')->nullable();
            $table->string('m_location')->nullable();
            $table->string('o_location')->nullable();
            $table->string('m_balance')->nullable();
            $table->string('billdate')->nullable();
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
        Schema::dropIfExists('students');
    }
}
