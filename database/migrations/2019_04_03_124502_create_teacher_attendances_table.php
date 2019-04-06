<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('teacher_id')->unsigned();
            $table->string('sid')->nullable();
            $table->string('device_id')->nullable();
            $table->string('rf_id')->nullable();
            $table->date('date');
            $table->time('in_time')->nullable();
            $table->time('out_time')->nullable();
            $table->decimal('total_hour',4,2)->nullable();
            $table->time('late_count_time')->nullable();
            $table->decimal('late_hour',4,2)->nullable();
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
        Schema::dropIfExists('teacher_attendances');
    }
}
