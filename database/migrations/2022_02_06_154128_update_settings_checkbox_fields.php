<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSettingsCheckboxFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('check_label_1')->after('about_us_image')->nullable();
            $table->string('check_label_2')->after('check_label_1')->nullable();
            $table->string('check_label_3')->after('check_label_2')->nullable();
            $table->string('check_label_4')->after('check_label_3')->nullable();
            $table->string('check_label_5')->after('check_label_4')->nullable();
            $table->string('check_label_6')->after('check_label_5')->nullable();
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
            $table->dropColumn('check_label_1');
            $table->dropColumn('check_label_2');
            $table->dropColumn('check_label_3');
            $table->dropColumn('check_label_4');
            $table->dropColumn('check_label_5');
            $table->dropColumn('check_label_6');
        });
    }
}
