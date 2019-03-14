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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->integer('classrooms_id')->nullable();
            $table->integer('classNo')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('role')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.e
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
