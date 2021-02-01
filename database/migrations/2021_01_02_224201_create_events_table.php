<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('events');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('center_id');
            $table->foreign('center_id')->references('id')->on('centers')->onDelete('cascade');
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
            $table->string('type');
            $table->boolean('guided')->default(0);
            $table->boolean('is_public')->default(0);
            $table->boolean('take_credit')->default(0);
            $table->dateTime('trip_date')->nullable();
            $table->integer('trip_duration')->nullable();
            $table->integer('divers_per_trip')->nullable();
            $table->integer('min_days')->nullable();
            $table->integer('max_days')->nullable();
            $table->time('arrival_time')->nullable();
            $table->string('transportation')->nullable();
            $table->integer('required_license')->nullable();

            $table->string('type_of_dives')->nullable();
            $table->string('nitrox')->nullable();

            $table->decimal('original_price')->nullable();
            $table->decimal('base_price')->nullable();
            $table->decimal('deduct_half_equipment')->nullable();
            $table->decimal('deduct_full_equipment')->nullable();

            $table->time('voyage_time')->nullable();
            $table->string('boat_name')->nullable();
            $table->integer('total_boat')->nullable();
            $table->string('departs_from')->nullable();
            $table->time('arrives_at')->nullable();

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
        Schema::dropIfExists('events');
    }
}
