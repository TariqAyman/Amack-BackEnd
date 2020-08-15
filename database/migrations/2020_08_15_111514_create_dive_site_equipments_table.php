<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiveSiteEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dive_site_equipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dive_site_id');
            $table->unsignedBigInteger('equipment_id');
            $table->foreign('dive_site_id')->references('id')
                ->on('dive_sites')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')
                ->on('equipments')->onDelete('cascade');
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
        Schema::dropIfExists('dive_site_equipments');
    }
}
