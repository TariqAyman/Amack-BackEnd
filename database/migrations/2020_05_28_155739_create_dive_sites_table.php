<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiveSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dive_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->integer('max_depth');
            $table->integer('visibility');
            $table->string('current');
            $table->unsignedBigInteger('dive_city_id');
            $table->unsignedBigInteger('main_taxon_id');
            $table->unsignedBigInteger('license_id');
            $table->unsignedBigInteger('dive_entry_id');
            $table->foreign('dive_city_id')->references('id')
                ->on('dive_cities')->onDelete('cascade');
            $table->foreign('main_taxon_id')->references('id')
                ->on('taxons')->onDelete('cascade');
            $table->foreign('license_id')->references('id')
                ->on('diving_courses')->onDelete('cascade');
            $table->foreign('dive_entry_id')->references('id')
                ->on('dive_entries')->onDelete('cascade');
            $table->boolean('enabled')->default(false);
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
        Schema::dropIfExists('dive_sites');
    }
}
