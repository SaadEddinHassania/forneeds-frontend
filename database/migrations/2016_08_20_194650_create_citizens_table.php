<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile_number')->nullable();
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->integer('marital_status_id')->unsigned()->nullable()->index();
            $table->foreign('marital_status_id','msId')->references('id')->on('marital_statuses')->onDelete('SET NULL');
            $table->integer('age_id')->unsigned()->nullable()->index();
            $table->foreign('age_id','ageId')->references('id')->on('ages')->onDelete('SET NULL');
            $table->integer('gender_id')->unsigned()->nullable()->index();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('SET NULL');

            $table->integer('refugee_state_id')->unsigned()->nullable()->index();
            $table->foreign('refugee_state_id')->references('id')->on('refugee_states')->onDelete('SET NULL');
            $table->integer('working_state_id')->unsigned()->nullable()->index();
            $table->foreign('working_state_id')->references('id')->on('working_states')->onDelete('SET NULL');
            $table->integer('disability_id')->unsigned()->nullable()->index();
            $table->foreign('disability_id')->references('id')->on('disabilities')->onDelete('SET NULL');
            $table->integer('academic_level_id')->unsigned()->nullable()->index();
            $table->foreign('academic_level_id')->references('id')->on('academic_levels')->onDelete('SET NULL');
            $table->boolean('contactable');
            $table->softDeletes();
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
        Schema::drop('citizens');
    }
}
