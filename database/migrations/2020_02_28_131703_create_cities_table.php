<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')
                ->on('countries')->onDelete('cascade');
            $table->boolean('is_dive')->default(1);
            $table->string('temp')->nullable();
            $table->string('wind')->nullable();
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('emergency_phone')->nullable();
            $table->decimal('emergency_latitude', 10, 8)->nullable();
            $table->decimal('emergency_longitude', 11, 8)->nullable();
            $table->integer('rate')->default(0);
            $table->boolean('enabled')->default(1);
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
        Schema::dropIfExists('cities');
    }
}
