<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentersSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('centers_schools');

        Schema::create('centers_schools', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('center_id');
            $table->unsignedBigInteger('school_id');
            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
            $table->foreign('school_id')->references('id')->on('diving_schools')->onDelete('cascade');
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
        Schema::dropIfExists('centers_schools');
    }
}
