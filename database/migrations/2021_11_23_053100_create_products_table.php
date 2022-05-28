<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table){
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignId('mark_id');
            $table->foreign('mark_id')->references('id')->on('marks');
            $table->foreignId('type_technic_id');
            $table->foreign('type_technic_id')->references('id')->on('type_technics');
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories_products');
            $table->binary('photo');
            $table->float('weight');
            $table->float('price');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
