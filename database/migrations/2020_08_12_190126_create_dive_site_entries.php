<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiveSiteEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dive_site_entries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dive_site_id');
            $table->unsignedBigInteger('entry_id');
            $table->foreign('dive_site_id')->references('id')
                ->on('dive_sites')->onDelete('cascade');
            $table->foreign('entry_id')->references('id')
                ->on('dive_entries')->onDelete('cascade');
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
        Schema::dropIfExists('dive_site_entries');
    }
}
