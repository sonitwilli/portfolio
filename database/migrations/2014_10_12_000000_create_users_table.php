<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('images')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('type')->default(2);
            $table->integer('active')->default(0);
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('active_token', 100)->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $value =  array(
            array('Admin', 'admin@localhost.com',bcrypt("bca123"), 1, 1)
        );
        $col = array(
            'name',
            'email',
            'password',
            'type',
            'active'
        );
        foreach ($value as $item){
            \Illuminate\Support\Facades\DB::table('users')->insert(
                [
                    $col[0] => $item[0],
                    $col[1] => $item[1],
                    $col[2] => $item[2],
                    $col[3] => $item[3],
                    $col[4] => $item[4]
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
        Schema::drop('users');
    }
}
