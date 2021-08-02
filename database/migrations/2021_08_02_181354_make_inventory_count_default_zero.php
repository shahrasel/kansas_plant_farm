<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeInventoryCountDefaultZero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('inventory_count_a')->default(0)->change();
            $table->string('inventory_count_b')->default(0)->change();
            $table->string('inventory_count_c')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('inventory_count_a')->default(null)->change();
            $table->string('inventory_count_b')->default(null)->change();
            $table->string('inventory_count_c')->default(null)->change();
        });
    }
}
