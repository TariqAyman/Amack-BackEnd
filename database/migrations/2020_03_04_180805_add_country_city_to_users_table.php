<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryCityToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable()->after('gender');
            $table->unsignedBigInteger('city_id')->nullable()->after('gender');
            $table->foreign('country_id')->references('id')
                ->on('countries')->onDelete('set null');
            $table->foreign('city_id')->references('id')
                ->on('cities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_country_id_foreign');
            $table->dropForeign('users_city_id_foreign');
            $table->dropColumn('country_id');
            $table->dropColumn('city_id');
        });
    }
}
