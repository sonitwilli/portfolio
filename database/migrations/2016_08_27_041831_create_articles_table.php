<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->string('images')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('slug')->nullable();
            $table->integer('publish');
            $table->integer('featured');
            $table->integer('order_by');
            $table->text('title')->nullable();
            $table->text('descriptions')->nullable();
            $table->text('keywords')->nullable();
            $table->timestamps();
            $table->index('category_id');
            $table->foreign('category_id')->references('id')->on('menus');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
