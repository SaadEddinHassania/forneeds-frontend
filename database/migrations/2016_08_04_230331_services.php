<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Services extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('sector_id')->unsigned()->index();
            $table->integer('service_type_id')->unsigned()->nullable()->index();
            $table->foreign('service_type_id')->references('id')->on('service_types')->onDelete('SET NULL');
            $table->integer('location_meta_id')->unsigned()->nullable()->index();
            $table->foreign('location_meta_id')->references('id')->on('location_metas')->onDelete('SET NULL');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
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
        Schema::drop('services');
    }

}
