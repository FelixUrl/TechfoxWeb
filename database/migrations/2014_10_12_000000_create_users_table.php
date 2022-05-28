<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->default('1');
            $table->boolean('isAdmin')->default(false);
            $table->string('login')->unique();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('avatar')->nullable()->default('default-avatar.jpg');
            $table->boolean('ban')->default(false);
            $table->string('reason_block')->nullable();
            $table->string('password');
            $table->boolean('email_confirm')->default(false);
            $table->string('key','256');
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
