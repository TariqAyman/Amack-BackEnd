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
            $table->string('activity_id');
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

            $table->json('amenities');
            $table->json('languages');

            $table->integer('max_divers_per_trip')->nullable();
            $table->integer('max_divers_per_day')->nullable();
            $table->integer('max_day_divers')->nullable();
            $table->integer('max_night_dives')->nullable();
            $table->integer('max_em_dives')->nullable();
            $table->integer('max_days_shore_dives')->nullable();
            $table->integer('max_days_boat_dives')->nullable();
            $table->integer('max_days_em_dives')->nullable();
            $table->integer('max_days_night_dives')->nullable();

            $table->integer('mini_days_shore_dives')->nullable();
            $table->integer('mini_days_boat_dives')->nullable();
            $table->integer('mini_days_em_dives')->nullable();
            $table->integer('mini_days_night_dives')->nullable();

            $table->string('bank_name')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_number')->nullable();

            $table->string('currency')->nullable();
            $table->json('currencies')->nullable();
            $table->decimal('foreigner_rate')->nullable();

            $table->decimal('shore_original_price')->nullable();
            $table->decimal('shore_base_price')->nullable();
            $table->decimal('boat_dives_original_price')->nullable();
            $table->decimal('boat_base_price')->nullable();

            $table->decimal('early_m_dive_price')->nullable();
            $table->decimal('night_dive_price')->nullable();

            $table->decimal('deduct_price_half_equipment')->nullable();
            $table->decimal('deduct_price_full_equipment')->nullable();

            $table->decimal('discounted_dives')->nullable();
            $table->decimal('discounted_dives_roc')->nullable();
            $table->decimal('discounted_dives_overseen')->nullable();
            $table->decimal('discounted_divers')->nullable();
            $table->decimal('discounted_divers_roc')->nullable();
            $table->decimal('discounted_divers_overseen')->nullable();

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
