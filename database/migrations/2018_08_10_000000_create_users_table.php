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
        Schema::defaultStringLength(191);
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger("profession_id")->nullable();
            $table->foreign("profession_id")->references("id")->on("professions");
            $table->boolean("is_admin")->default(0);
            //$table->string("website")->nullable();

            $table->rememberToken();
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
