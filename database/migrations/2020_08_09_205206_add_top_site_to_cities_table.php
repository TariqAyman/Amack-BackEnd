<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTopSiteToCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->unsignedBigInteger('top_site_id')->nullable();
            $table->foreign('top_site_id')->references('id')
                ->on('dive_sites')->onDelete('cascade');
            $table->unsignedBigInteger('peak_season_id')->nullable();
            $table->foreign('peak_season_id')->references('id')
                ->on('seasons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('top_site_id');
            $table->dropColumn('peak_season_id');
        });
    }
}
