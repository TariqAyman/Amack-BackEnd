<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentersDiveSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('centers_dive_sites');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Schema::create('centers_dive_sites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('center_id');
            $table->unsignedBigInteger('dive_site_id');
            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
            $table->foreign('dive_site_id')->references('id')->on('dive_sites')->onDelete('cascade');

            $table->boolean('custom');

            $table->json('dates')->nullable();

            $table->boolean('guided')->nullable();

            $table->json('time_of_dives')->nullable();

            $table->string('max_divers')->nullable();
            $table->string('mini_days')->nullable();
            $table->string('max_days')->nullable();

            $table->decimal('original_price')->nullable();
            $table->decimal('base_price')->nullable();
            $table->decimal('full_equipment')->nullable();
            $table->decimal('half_equipment')->nullable();

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
        Schema::dropIfExists('centers_dive_sites');
    }
}
