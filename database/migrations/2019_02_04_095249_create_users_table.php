<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('api_token')->nullable();
            $table->string('full_name',45);
            $table->string('email',100)->unique();
            $table->string('password',200);
            $table->enum('user_type', ['admin','user','api'])->default('admin');
            $table->string('mobile_no',20)->nullable();
            $table->enum('sex',['male', 'female'])->default('male');
            $table->string('photo',100)->nullable();
            $table->text('address')->nullable();
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
        Schema::dropIfExists('users');
    }
}
