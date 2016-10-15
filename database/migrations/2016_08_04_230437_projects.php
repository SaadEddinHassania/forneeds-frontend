<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Projects extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('serialno');
            $table->text('description');
            $table->integer('sector_id')->unsigned()->nullable()->index();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('SET NULL');
            $table->integer('service_provider_id')->unsigned()->nullable()->index();
            $table->foreign('service_provider_id')->references('id')->on('service_providers')->onDelete('SET NULL');
            $table->integer('marginalized_situation_id')->unsigned()->nullable()->index();
            $table->foreign('marginalized_situation_id')->references('id')->on('marginalized_situations')->onDelete('SET NULL');
            $table->integer('location_meta_id')->unsigned()->nullable()->index();
            $table->foreign('location_meta_id')->references('id')->on('location_metas')->onDelete('SET NULL');
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
        Schema::drop('projects');
    }

}
