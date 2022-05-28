<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->text('description')->nullable();
            $table->foreignId('type_technic_id');
            $table->foreign('type_technic_id')->references('id')->on('type_technics');
            $table->foreignId('mark_id');
            $table->foreign('mark_id')->references('id')->on('marks');
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->binary('photo')->nullable();
            $table->string('photo_new')->nullable();
            $table->foreignId('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('orders');
    }
}
