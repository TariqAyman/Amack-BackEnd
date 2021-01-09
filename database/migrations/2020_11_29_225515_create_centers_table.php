<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('centers');

        Schema::create('centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('premises');
            $table->string('activities');
            $table->string('mobile')->nullable();
            $table->string('landline')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('stuff_members');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('center_lat')->nullable();
            $table->string('center_lng')->nullable();

            $table->string('manager_name')->nullable();
            $table->string('manager_mobile')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_mobile')->nullable();

            $table->boolean('full_day')->default(0);
            $table->json('working_days');

            $table->json('amenities');
            $table->json('languages');

            $table->integer('max_divers_per_trip')->nullable();
            $table->integer('max_divers_per_day')->nullable();
            $table->integer('max_day_divers')->nullable();
            $table->integer('max_night_dives')->nullable();
            $table->integer('max_em_dives')->nullable();

            $table->integer('mini_days_shore_dives')->nullable();
            $table->integer('mini_days_boat_dives')->nullable();

            $table->integer('max_days_shore_dives')->nullable();
            $table->integer('max_days_boat_dives')->nullable();

            $table->integer('mini_days_em_dives')->nullable();
            $table->integer('mini_days_night_dives')->nullable();
            $table->integer('max_days_em_dives')->nullable();
            $table->integer('max_days_night_dives')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();

            $table->boolean('enabled');
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
        Schema::dropIfExists('centers');
    }
}
