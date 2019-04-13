<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sid');
            $table->string('rf_id');
            $table->string('bid')->nullable();
            $table->string('name');
            $table->string('fname');
            $table->string('mname');
            $table->string('sex');
            $table->string('roll');
            $table->string('year')->nullable();
            $table->string('classname');
            $table->string('section');
            $table->string('bdate');
            $table->string('gsm');
            $table->string('email',100);
            $table->string('password');
            $table->string('mfee');
            $table->string('address')->nullable();
            $table->string('paddress')->nullable();
            $table->string('fnid')->nullable();
            $table->string('mnid')->nullable();
            $table->string('bgroup')->nullable();
            $table->string('p_ins')->nullable();
            $table->string('adate')->nullable();
            $table->string('active')->nullable();
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
        Schema::dropIfExists('student');
    }
}
