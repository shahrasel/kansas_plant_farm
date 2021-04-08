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
            $table->text('botanical_name')->nullable();
            $table->text('common_name')->nullable();
            $table->text('other_product_service_name')->nullable();
            $table->text('include_on_website')->nullable();
            $table->text('status')->nullable();
            $table->text('date_entered')->nullable();
            $table->text('best_sellers')->nullable();
            $table->text('new_for_this_year')->nullable();
            $table->text('other_product_service')->nullable();
            $table->text('tags')->nullable();
            $table->text('purchase_options')->nullable();
            $table->text('pickup_instructions')->nullable();
            $table->text('pot_size_a')->nullable();
            $table->text('inventory_count_a')->nullable();
            $table->text('low_inventory_count_a')->nullable();
            $table->text('click_to_inquire_a')->nullable();
            $table->text('pre_order_a')->nullable();
            $table->text('contractor_price_a')->nullable();
            $table->text('retail_sale_price_a')->nullable();
            $table->text('retail_list_price_a')->nullable();
            $table->text('pot_size_b')->nullable();
            $table->text('inventory_count_b')->nullable();
            $table->text('low_inventory_count_b')->nullable();
            $table->text('click_to_inquire_b')->nullable();
            $table->text('pre_order_b')->nullable();
            $table->text('contractor_price_b')->nullable();
            $table->text('retail_sale_price_b')->nullable();
            $table->text('retail_list_price_b')->nullable();
            $table->text('pot_size_c')->nullable();
            $table->text('inventory_count_c')->nullable();
            $table->text('low_inventory_count_c')->nullable();
            $table->text('click_to_inquire_c')->nullable();
            $table->text('pre_order_c')->nullable();
            $table->text('contractor_price_c')->nullable();
            $table->text('retail_sale_price_c')->nullable();
            $table->text('retail_list_price_c')->nullable();
            $table->text('wholesale_supplier_name')->nullable();
            $table->text('plug_tray_sizes')->nullable();
            $table->text('raw_cost_range')->nullable();
            $table->text('purchasing_notes')->nullable();
            $table->text('year_purchased')->nullable();
            $table->text('shipping_notes')->nullable();
            $table->text('image_file')->nullable();
            $table->text('perennial')->nullable();
            $table->text('shrub')->nullable();
            $table->text('vine')->nullable();
            $table->text('grass_bamboo')->nullable();
            $table->text('hardy_tropical')->nullable();
            $table->text('water_plant')->nullable();
            $table->text('annual')->nullable();
            $table->text('house_deck_plant')->nullable();
            $table->text('cactus_succulent')->nullable();
            $table->text('small_tree')->nullable();
            $table->text('large_tree')->nullable();
            $table->text('min_zone')->nullable();
            $table->text('max_zone')->nullable();
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
