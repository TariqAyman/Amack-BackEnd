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

            $table->integer('max_divers_per_trip');
            $table->integer('max_divers_per_day');
            $table->integer('max_day_divers');
            $table->integer('max_night_dives');
            $table->integer('max_em_dives');

            $table->integer('mini_days_shore_dives');
            $table->integer('mini_days_boat_dives');

            $table->integer('max_days_shore_dives');
            $table->integer('max_days_boat_dives');

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
