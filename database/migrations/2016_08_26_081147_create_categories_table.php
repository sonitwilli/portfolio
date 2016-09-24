<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu_id')->unsigned();
            $table->string('name');
            $table->string('images')->nullable();
            $table->text('description')->nullable();
            $table->integer('publish');
            $table->integer('featured');
            $table->integer('order_by');
            $table->string('type');
            $table->string('slug')->nullable();
            $table->text('title')->nullable();
            $table->text('descriptions')->nullable();
            $table->text('keywords')->nullable();
            $table->index('menu_id');
            $table->foreign('menu_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
