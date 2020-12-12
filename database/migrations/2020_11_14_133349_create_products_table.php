<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('plant_id_number');
            $table->string('botanical_name');
            $table->string('common_name');
            $table->string('include_on_website');
            $table->string('status');
            $table->string('date_entered');
            $table->string('best_sellers');
            $table->string('new_for_this_year');
            $table->text('tags');
            $table->text('purchase_options');
            $table->text('pickup_instructions');
            $table->text('pot_size_a');
            $table->string('inventory_count_a');
            $table->string('low_inventory_count_a');
            $table->text('click_to_inquire_a');
            $table->text('pre_order_a');
            $table->unsignedDecimal('contractor_price_a');
            $table->unsignedDecimal('retail_sale_price_a');
            $table->unsignedDecimal('retail_list_price_a');
            $table->text('pot_size_b');
            $table->string('inventory_count_b');
            $table->string('low_inventory_count_b');
            $table->text('click_to_inquire_b');
            $table->text('pre_order_b');
            $table->unsignedDecimal('contractor_price_b');
            $table->unsignedDecimal('retail_sale_price_b');
            $table->unsignedDecimal('retail_list_price_b');
            $table->text('pot_size_c');
            $table->string('inventory_count_c');
            $table->string('low_inventory_count_c');
            $table->text('click_to_inquire_c');
            $table->text('pre_order_c');
            $table->unsignedDecimal('contractor_price_c');
            $table->unsignedDecimal('retail_sale_price_c');
            $table->unsignedDecimal('retail_list_price_c');
            $table->text('wholesale_supplier_name');
            $table->text('plug_tray_sizes');
            $table->text('raw_cost_range');
            $table->text('purchasing_notes');
            $table->text('year_purchased');
            $table->text('shipping_notes');
            $table->text('perennial');
            $table->text('shrub');
            $table->text('vine');
            $table->text('grass_bamboo');
            $table->text('hardy_tropical');
            $table->text('water_plant');
            $table->text('annual');
            $table->text('house_deck_plant');
            $table->text('cactus_succulent');
            $table->text('small_tree');
            $table->text('large_tree');
            $table->text('min_zone');
            $table->text('max_zone');
            $table->text('sunlight');
            $table->text('water_rainfall');
            $table->text('soil_quality');
            $table->text('bloom_season');
            $table->string('flower_color');
            $table->text('berry_fruit_color');
            $table->text('spring_foliage_color');
            $table->text('summer_foliage_color');
            $table->text('fall_foliage_color');
            $table->text('has_evergreen_foliage');
            $table->text('has_winter_interest');
            $table->text('maintenance_requirements');
            $table->text('growth_rate');
            $table->string('height');
            $table->text('width');
            $table->text('ph');
            $table->text('soil_tolerance');
            $table->text('drought_tolerance');
            $table->text('wet_feet_tolerance');
            $table->string('humidity_tolerance');
            $table->text('black_walnut_tolerance');
            $table->text('failure_rate');
            $table->text('spreading_potential');
            $table->text('problems');
            $table->text('service_life');
            $table->text('functional_uses');
            $table->text('special_micro_climates');
            $table->text('sustainable_garden');
            $table->text('native_plant_garden');
            $table->text('bird_wildlife_garden');
            $table->text('butterfly_bee_garden');
            $table->text('hardy_tropical_garden');
            $table->string('dry_shade_garden');
            $table->string('edible_medicinal_garden');
            $table->string('rain_garden');
            $table->string('colorado_rustic_garden');
            $table->string('desert_cactus_rock_garden');
            $table->string('plant_picture_in_dynascape_y_n');
            $table->string('year_entered_in_dynascape');
            $table->string('image_file_names');
            $table->string('how_to_grow_in_kansas');
            $table->string('plant_description');
            //$table->timestamps();
            $table->unsignedBigInteger('created');
            $table->unsignedBigInteger('updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
