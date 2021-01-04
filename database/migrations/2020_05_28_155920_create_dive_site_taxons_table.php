<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiveSiteTaxonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dive_site_taxons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dive_site_id');
            $table->unsignedBigInteger('taxon_id');
            $table->integer('position');
            $table->foreign('dive_site_id')->references('id')->on('dive_sites')->onDelete('cascade');
            $table->foreign('taxon_id')->references('id')->on('taxons')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dive_site_taxons');
    }
}
