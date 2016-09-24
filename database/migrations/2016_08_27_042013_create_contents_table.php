<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned()->default(0);
            $table->integer('category_product_id')->unsigned()->default(0);
            $table->integer('article_id')->unsigned()->default(0);
            $table->integer('banner_id')->unsigned()->default(0);
            $table->integer('block_id')->unsigned()->default(0);
            $table->integer('product_id')->unsigned()->default(0);
            $table->integer('setting_id')->unsigned()->default(0);
            $table->integer('menu_id')->unsigned()->default(0);
            $table->integer('language_id')->unsigned()->default(0);
            $table->string('type');
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->text('title')->nullable();
            $table->text('descriptions')->nullable();
            $table->text('keywords')->nullable();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->index('category_id');
            $table->index('category_product_id');
            $table->index('article_id');
            $table->index('product_id');
            $table->index('banner_id');
            $table->index('block_id');
            $table->index('setting_id');
            $table->index('menu_id');
            $table->index('language_id');
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
        Schema::drop('contents');
    }
}
