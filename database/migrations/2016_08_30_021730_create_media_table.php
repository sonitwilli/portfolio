<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->default(0);
            $table->integer('category_product_id')->default(0);
            $table->integer('article_id')->default(0);
            $table->integer('banner_id')->default(0);
            $table->integer('block_id')->default(0);
            $table->integer('product_id')->default(0);
            $table->string('images');
            $table->string('name')->nullable();
            $table->integer('order_by')->nullable()->default(0);
            $table->string('type');
            $table->index('category_id');
            $table->index('category_product_id');
            $table->index('article_id');
            $table->index('banner_id');
            $table->index('block_id');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('media');
    }
}
