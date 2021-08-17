<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsInSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('about_us_images')->after('our_gurantee')->nullable();
            $table->text('spring_plant_link')->after('about_us_images')->nullable();
            $table->text('summer_plant_link')->after('spring_plant_link')->nullable();
            $table->text('fall_plant_link')->after('summer_plant_link')->nullable();
            $table->text('winter_plant_link')->after('fall_plant_link')->nullable();

            $table->text('red_plant_link')->after('winter_plant_link')->nullable();
            $table->text('orange_plant_link')->after('red_plant_link')->nullable();
            $table->text('yellow_plant_link')->after('orange_plant_link')->nullable();
            $table->text('green_plant_link')->after('yellow_plant_link')->nullable();
            $table->text('blue_plant_link')->after('green_plant_link')->nullable();
            $table->text('lavendar_plant_link')->after('blue_plant_link')->nullable();
            $table->text('purple_plant_link')->after('lavendar_plant_link')->nullable();
            $table->text('pink_plant_link')->after('purple_plant_link')->nullable();

            $table->text('magenta_plant_link')->after('pink_plant_link')->nullable();
            $table->text('white_plant_link')->after('magenta_plant_link')->nullable();

            $table->text('facebook_link')->after('white_plant_link')->nullable();
            $table->text('twitter_link')->after('facebook_link')->nullable();
            $table->text('instagram_link')->after('twitter_link')->nullable();
            $table->text('youtube_link')->after('instagram_link')->nullable();
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
            $table->dropColumn('about_us_images');
            $table->dropColumn('spring_plant_link');
            $table->dropColumn('summer_plant_link');
            $table->dropColumn('fall_plant_link');
            $table->dropColumn('winter_plant_link');

            $table->dropColumn('red_plant_link');
            $table->dropColumn('orange_plant_link');
            $table->dropColumn('yellow_plant_link');
            $table->dropColumn('green_plant_link');
            $table->dropColumn('blue_plant_link');
            $table->dropColumn('lavendar_plant_link');
            $table->dropColumn('purple_plant_link');
            $table->dropColumn('pink_plant_link');

            $table->dropColumn('magenta_plant_link');
            $table->dropColumn('white_plant_link');

            $table->dropColumn('facebook_link');
            $table->dropColumn('twitter_link');
            $table->dropColumn('instagram_link');
            $table->dropColumn('youtube_link');
        });
    }
}
