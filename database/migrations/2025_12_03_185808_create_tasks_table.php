<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->timestamps();
        });
        Schema::create('roles', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::create('states', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('users',function(Blueprint $table)
        {
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles');
        });
        Schema::table('tasks',function(Blueprint $table)
        {
            $table->unsignedBigInteger('id_state')->default(1);
            $table->foreign('id_state')->references('id')->on('states');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
