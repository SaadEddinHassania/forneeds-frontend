<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiaryServiceProviderPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiary_service_provider', function (Blueprint $table) {
            $table->integer('beneficiary_id')->unsigned()->index();
            $table->foreign('beneficiary_id','benId')->references('id')->on('beneficiaries')->onDelete('cascade');
            $table->integer('service_provider_id')->unsigned()->index();
            $table->foreign('service_provider_id','spId')->references('id')->on('service_providers')->onDelete('cascade');
            $table->primary(['beneficiary_id', 'service_provider_id'],"ben_id_sp_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('beneficiary_service_provider');
    }
}
