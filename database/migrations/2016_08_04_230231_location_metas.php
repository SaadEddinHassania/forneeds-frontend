<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LocationMetas extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('location_metas', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('population');
            $table->integer('unemployment');
            $table->integer('poverty_lvl');
            $table->string('model'); //the type of the location this meta describes
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
        Schema::drop('location_metas');
    }

}
