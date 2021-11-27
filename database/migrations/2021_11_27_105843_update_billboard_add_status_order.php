<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBillboardAddStatusOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('billboards', function (Blueprint $table) {
            $table->integer('order')->after('image')->default(0)->nullable();
            $table->integer('status')->after('order')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('billboards', function (Blueprint $table) {
            $table->dropColumn('order');
            $table->dropColumn('status');
        });
    }
}
