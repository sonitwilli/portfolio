<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->string('images')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->integer('price')->nullable();
            $table->integer('sale')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('condition')->default(0);
            $table->string('slug')->nullable();
            $table->integer('publish');
            $table->integer('featured');
            $table->integer('order_by');
            $table->text('title')->nullable();
            $table->text('descriptions')->nullable();
            $table->text('keywords')->nullable();
            $table->timestamps();
            $table->index('category_id');
            $table->foreign('category_id')->references('id')->on('category_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
