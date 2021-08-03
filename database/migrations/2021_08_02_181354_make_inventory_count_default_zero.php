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
            $table->integer('inventory_count_a')->default(0)->change();
            $table->integer('low_inventory_count_a')->default(0)->change();
            $table->integer('inventory_count_b')->default(0)->change();
            $table->integer('low_inventory_count_b')->default(0)->change();
            $table->integer('inventory_count_c')->default(0)->change();
            $table->integer('low_inventory_count_c')->default(0)->change();
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
            $table->string('inventory_count_a')->change();
            $table->string('low_inventory_count_a')->change();
            $table->string('inventory_count_b')->change();
            $table->string('low_inventory_count_b')->change();
            $table->string('inventory_count_c')->change();
            $table->string('low_inventory_count_c')->change();
        });
    }
}
