<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContactEmailPhoneAddressPdfLinksInSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('address')->after('youtube_link')->nullable();
            $table->string('email')->after('address')->nullable();
            $table->string('phone')->after('email')->nullable();
            $table->string('nursery_hours')->after('phone')->nullable();

            $table->string('pricing_sheet_link')->after('nursery_hours')->nullable();
            $table->string('order_form_link')->after('pricing_sheet_link')->nullable();
            $table->string('nursery_link')->after('order_form_link')->nullable();
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
            $table->dropColumn('address');
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('nursery_hours');
            $table->dropColumn('pricing_sheet_link');
            $table->dropColumn('order_form_link');
            $table->dropColumn('nursery_link');
        });
    }
}
