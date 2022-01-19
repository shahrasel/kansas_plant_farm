<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSettingsTableAboutUsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->longText('about_who_we_are')->after('nursery_link')->nullable();
            $table->longText('about_our_founder')->after('about_who_we_are')->nullable();
            $table->longText('about_visiting_private_backyard')->after('about_our_founder')->nullable();
            $table->longText('about_buying_plants')->after('about_visiting_private_backyard')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('about_who_we_are');
            $table->dropColumn('about_our_founder');
            $table->dropColumn('about_visiting_private_backyard');
            $table->dropColumn('about_buying_plants');
        });
    }
}
