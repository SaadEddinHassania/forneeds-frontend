<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Surveys extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->text('description');
            $table->integer('project_id')->unsigned()->nullable()->index();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('SET NULL');
            $table->string('questions_count');

            $table->softDeletes();	
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('surveys');
    }

}
