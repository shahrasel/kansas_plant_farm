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
            $table->text('plant_id_number');
            $table->string('botanical_name')->nullable();
            $table->string('common_name')->nullable();
            $table->string('slug')->unique();
            $table->string('other_product_service_name')->nullable();
            $table->string('include_on_website')->nullable();
            $table->string('status')->nullable();
            $table->string('date_entered')->nullable();
            $table->string('best_sellers')->nullable();
            $table->string('new_for_this_year')->nullable();
            $table->string('other_product_service')->nullable();
            $table->string('tags')->nullable();
            $table->string('purchase_options')->nullable();
            $table->text('pickup_instructions')->nullable();
            $table->string('pot_size_a')->nullable();
            $table->string('inventory_count_a')->nullable();
            $table->string('low_inventory_count_a')->nullable();
            $table->string('click_to_inquire_a')->nullable();
            $table->string('pre_order_a')->nullable();
            $table->double('contractor_price_a',15,2)->default(0.00)->nullable();
            $table->double('retail_sale_price_a',15,2)->default(0.00)->nullable();
            $table->double('retail_list_price_a',15,2)->default(0.00)->nullable();
            $table->string('pot_size_b')->nullable();
            $table->string('inventory_count_b')->nullable();
            $table->string('low_inventory_count_b')->nullable();
            $table->string('click_to_inquire_b')->nullable();
            $table->string('pre_order_b')->nullable();
            $table->double('contractor_price_b',15,2)->default(0.00)->nullable();
            $table->double('retail_sale_price_b',15,2)->default(0.00)->nullable();
            $table->double('retail_list_price_b',15,2)->default(0.00)->nullable();
            $table->string('pot_size_c')->nullable();
            $table->string('inventory_count_c')->nullable();
            $table->string('low_inventory_count_c')->nullable();
            $table->string('click_to_inquire_c')->nullable();
            $table->string('pre_order_c')->nullable();
            $table->double('contractor_price_c',15,2)->default(0.00)->nullable();
            $table->double('retail_sale_price_c',15,2)->default(0.00)->nullable();
            $table->double('retail_list_price_c',15,2)->default(0.00)->nullable();
            $table->string('wholesale_supplier_name')->nullable();
            $table->string('plug_tray_sizes')->nullable();
            $table->string('raw_cost_range')->nullable();
            $table->text('purchasing_notes')->nullable();
            $table->string('year_purchased')->nullable();
            $table->text('shipping_notes')->nullable();
            $table->text('images')->nullable();
            $table->string('perennial')->nullable();
            $table->string('shrub')->nullable();
            $table->string('vine')->nullable();
            $table->string('grass_bamboo')->nullable();
            $table->string('hardy_tropical')->nullable();
            $table->string('water_plant')->nullable();
            $table->string('annual')->nullable();
            $table->string('house_deck_plant')->nullable();
            $table->string('cactus_succulent')->nullable();
            $table->string('small_tree')->nullable();
            $table->string('large_tree')->nullable();
            $table->integer('min_zone')->default(0)->nullable();
            $table->integer('max_zone')->default(0)->nullable();
            $table->text('sunlight')->nullable();
            $table->text('water_rainfall')->nullable();
            $table->text('soil_quality')->nullable();
            $table->text('bloom_season')->nullable();
            $table->text('flower_color')->nullable();
            $table->text('berry_fruit_color')->nullable();
            $table->text('spring_foliage_color')->nullable();
            $table->text('summer_foliage_color')->nullable();
            $table->text('fall_foliage_color')->nullable();
            $table->text('has_evergreen_foliage')->nullable();
            $table->text('has_winter_interest')->nullable();
            $table->text('scented_flowers')->nullable();
            $table->text('drought_tolerance')->nullable();
            $table->text('wet_feet_tolerance')->nullable();
            $table->text('humidity_tolerance')->nullable();
            $table->text('wind_tolerence')->nullable();
            $table->text('poor_soil_tolerance')->nullable();
            $table->text('height')->nullable();
            $table->text('width')->nullable();
            $table->text('growth_rate')->nullable();
            $table->text('service_life')->nullable();
            $table->text('maintenance_requirements')->nullable();
            $table->text('spreading_potential')->nullable();
            $table->text('yearly_trimming_tips')->nullable();

            $table->text('plant_grouping_size')->nullable();
            $table->text('best_side_of_house')->nullable();
            $table->text('extreme_planting_locations')->nullable();
            $table->text('ornamental_features')->nullable();
            $table->text('special_landscape_uses')->nullable();
            $table->text('possible_pest_problems')->nullable();
            $table->text('plant_limitations')->nullable();

            $table->text('sustainable_garden')->nullable();
            $table->text('native_plant_garden')->nullable();
            $table->text('bird_wildlife_garden')->nullable();
            $table->text('butterfly_bee_garden')->nullable();
            $table->text('lush_tropical_garden')->nullable();
            $table->text('dry_shade_garden')->nullable();
            $table->text('edible_medicinal_garden')->nullable();
            $table->text('rain_garden')->nullable();
            $table->text('colorado_rustic_garden')->nullable();
            $table->text('desert_cactus_rock_garden')->nullable();

            $table->text('video_link')->nullable();
            $table->text('description')->nullable();

            $table->text('how_to_grow_in_kansas')->nullable();
            $table->text('patent_trademark_names')->nullable();
            $table->text('plant_assets_and_uses')->nullable();
            $table->text('plant_picture_in_dynascape_y_n')->nullable();
            $table->text('year_entered_in_dynascape')->nullable();

            /*$table->unsignedBigInteger('created');
            $table->unsignedBigInteger('updated');*/
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products')->nullable();
    }
}
