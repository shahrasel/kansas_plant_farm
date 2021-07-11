<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMinMaxHeightWidthColumnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function($table)
        {
            //$table->double('contractor_price_a',15,2)->default(0.00)->nullable();
            $table->float('max_height',8,0)->after('min_height')->default(0)->nullable();
            $table->float('max_width',8,0)->after('min_width')->default(0)->nullable();

            $table->float('min_height',8)->default(0)->nullable()->change();
            $table->float('min_width',8)->default(0)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table)
        {
            $table->drop('max_height');
            $table->drop('max_width');
        });
    }
}
