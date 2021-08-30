<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFieldSizesInSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('address', 70)->change();
            $table->string('email', 50)->change();
            $table->string('phone', 30)->change();
            $table->string('nursery_hours', 70)->change();
            $table->string('pricing_sheet_link', 70)->change();
            $table->string('order_form_link', 70)->change();
            $table->string('nursery_link', 70)->change();
            $table->string('facebook_link', 100)->change();
            $table->string('twitter_link', 100)->change();
            $table->string('instagram_link', 100)->change();
            $table->string('youtube_link', 100)->change();
            $table->string('home_description_video', 100)->change();
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
            //
        });
    }
}
