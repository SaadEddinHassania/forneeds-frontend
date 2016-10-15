<?php

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
            $table->string('password');
            $table->string('avatar')->nullable(); //user image
            $table->timestamp('dob');
            $table->string('phone_number')->nullable();
            $table->boolean('verified')->default(false);
            $table->boolean('is_ready')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->string('token')->nullable();
            $table->rememberToken();
            $table->char('api_token', 60)->nullable();
            $table->string('facebook_id')->nullable();;
            $table->string('facebook_token')->nullable();;
            $table->string('google_token')->nullable();;
            $table->string('google_id')->nullable();;
            $table->timestamps();
            $table->softDeletes();
        });
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
