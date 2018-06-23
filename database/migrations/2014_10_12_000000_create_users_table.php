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
            $table->string('email')->unique();
            $table->string('location')->nullable();
            $table->string('photo')->nullable();
            $table->string('role')->nullable();
            $table->date('date_birthday')->nullable();
            $table->integer('age')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('sex')->nullable();
            $table->string('descr')->nullable();
            $table->string('prev_job')->nullable();
            $table->string('cover_photo')->nullable();
            $table->string('tshirt_size')->nullable();
            $table->string('height')->nullable();
            $table->string('hair')->nullable();
            $table->string('shoes_size')->nullable();
            $table->string('eyes')->nullable();
            $table->string('password');
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
