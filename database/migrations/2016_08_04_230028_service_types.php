<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ServiceTypes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('service_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('sector_id')->unsigned()->nullable()->index();
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('SET NULL');
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
        Schema::drop('service_types');
    }

}
