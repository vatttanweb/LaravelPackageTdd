<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("token");
            $table->timestamps();
        });
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("title",100);
            $table->string("description");
            $table->boolean("status");
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
        Schema::create('labels', function (Blueprint $table) {
            $table->id();
            $table->string("lablename");
            $table->bigInteger('task_id')->unsigned()->nullable();
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->unique("lablename");
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
        Schema::dropIfExists('labels');
        Schema::dropIfExists('tasks');
    }
}
