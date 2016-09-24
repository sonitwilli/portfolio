<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('language');
            $table->integer('publish')->default(1);
            $table->timestamps();
        });

        $value =  array(
            array('Vietnam', 'vn', 1),
            array('France', 'fr', 1),
            array('Japan', 'jp', 1));
        $col = array(
            'name',
            'language',
            'publish'
        );
        foreach ($value as $item){
            \Illuminate\Support\Facades\DB::table('languages')->insert(
                [
                    $col[0] => $item[0],
                    $col[1] => $item[1],
                    $col[2] => $item[2]
                ]
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('languages');
    }
}
