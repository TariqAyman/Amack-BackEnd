<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLicenseDataToUserLicenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_licenses', function (Blueprint $table) {
            $table->string('license_number')->after('course_id');
            $table->string('front_photo')->after('license_number');
            $table->string('back_photo')->after('front_photo');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_licenses', function (Blueprint $table) {
            $table->dropColumn('license_number');
            $table->dropColumn('front_photo');
            $table->dropColumn('back_photo');

        });
    }
}
