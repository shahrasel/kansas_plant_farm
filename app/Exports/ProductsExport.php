<?php

namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return \App\Models\Product::all();
        /*$a =  \App\Models\Product::all();
        dd($a);*/
    }

    public function headings(): array

    {
        return [
            'ID',
            'PRODUCT ID NUMBER','BOTANICAL NAME','COMMON NAME','OTHER PRODUCTS / SERVICES NAME','INCLUDE ON WEBSITE','STATUS','DATE ENTERED','BEST SELLERS','NEW FOR THIS YEAR','OTHER PRODUCTS / SERVICES NAME','TAGS','PURCHASE OPTIONS','PICKUP INSTRUCTIONS','POT SIZE(A)','INVENTORY_COUNT(A)','LOW_INVENTORY_COUNT(A)','CLICK TO INQUIRE(A)','PRE-ORDER(A)','CONTRACTOR PRICE(A)','RETAIL SALE PRICE(A)','RETAIL LIST PRICE(A)','POT SIZE(B)','INVENTORY_COUNT(B)','LOW_INVENTORY_COUNT(B)','CLICK TO INQUIRE(B)','PRE-ORDER(B)','CONTRACTOR PRICE(B)','RETAIL SALE PRICE(B)','RETAIL LIST PRICE(B)','POT SIZE(C)','INVENTORY_COUNT(C)','LOW_INVENTORY_COUNT(C)','CLICK TO INQUIRE(C)','PRE-ORDER(C)','CONTRACTOR PRICE(C)','RETAIL SALE PRICE(C)','RETAIL LIST PRICE(C)','WHOLESALE SUPPLIER NAME','PLUG / TRAY SIZES','RAW COST RANGE','PURCHASING NOTES','YEAR PURCHASED','SHIPPING NOTES','IMAGE FILE NAMES','PERENNIAL','SHRUB','VINE','GRASS / BAMBOO','HARDY TROPICAL','WATER PLANT','ANNUAL','HOUSE / DECK PLANT','CACTUS / SUCCULENT','SMALL TREE','LARGE TREE','MIN ZONE','MAX ZONE','SUNLIGHT','WATER/RAINFALL','SOIL QUALITY','BLOOM SEASON','FLOWER COLOR','BERRY / FRUIT COLOR','SPRING FOLIAGE COLOR','SUMMER FOLIAGE COLOR','FALL FOLIAGE COLOR','HAS EVERGREEN FOLIAGE','HAS WINTER INTEREST','SCENTED FLOWERS / FOLIAGE','DROUGHT TOLERANCE','WET-FEET TOLERANCE','HUMIDITY TOLERANCE','WIND TOLERANCE','POOR SOIL TOLERANCE','HEIGHT','WIDTH','GROWTH RATE','SERVICE LIFE','MAINTENANCE NEEDS','SPREADING POTENTIAL','YEARLY TRIMMING TIPS','PLANT GROUPING SIZE','BEST SIDE OF HOUSE','EXTREME PLANTING LOCATIONS','ORNAMENTAL FEATURES','SPECIAL LANDSCAPE USES','POSSIBLE PEST PROBLEMS','PLANT LIMITATIONS','SUSTAINABLE GARDEN','NATIVE PLANT GARDEN','BIRD & WILDLIFE GARDEN','BUTTERFLY & BEE GARDEN','LUSH TROPICAL GARDEN','DRY SHADE GARDEN','EDIBLE & MEDICINAL GARDEN','RAIN GARDEN','COLORADO & RUSTIC GARDEN','DESERT, CACTUS,& ROCK GARDEN','VIDEO LINK','DESCRIPTION','HOW TO GROW IN KANSAS','PATENT / TRADEMARK NAMES','PLANT ASSETS AND USES','PLANT PICTURE IN DYNASCAPE Y/N','YEAR ENTERED IN DYNASCAPE'
        ];
    }
    public function map($row): array
    {
        $zoneArray = array(
            '1'=>'1a','1.5'=>'1b',
            '2'=>'2a','2.5'=>'2b',
            '3'=>'3a','3.5'=>'3b',
            '4'=>'4a','4.5'=>'4b',
            '5'=>'5a','5.5'=>'5b',
            '6'=>'6a','6.5'=>'6b',
            '7'=>'7a','7.5'=>'7b',
            '8'=>'8a','8.5'=>'8b',
            '9'=>'9a','9.5'=>'9b',
            '10'=>'10a','10.5'=>'10b',
            '11'=>'11a','11.5'=>'11b',
            '12'=>'12a','12.5'=>'12b',
            '13'=>'13a','13.5'=>'13b'
        );

        return [
            $row->id,
            $row->plant_id_number,
            $row->botanical_name,
            $row->common_name,
            $row->other_product_service_name,
            $row->include_on_website,
            $row->status,
            $row->date_entered,
            $row->best_sellers,
            $row->new_for_this_year,
            $row->other_product_service,
            $row->tags,
            $row->purchase_options,
            $row->pickup_instructions,
            $row->pot_size_a,
            $row->inventory_count_a,
            $row->low_inventory_count_a,
            $row->click_to_inquire_a,
            $row->pre_order_a,
            $row->contractor_price_a,
            $row->retail_sale_price_a,
            $row->retail_list_price_a,
            $row->pot_size_b,
            $row->inventory_count_b,
            $row->low_inventory_count_b,
            $row->click_to_inquire_b,
            $row->pre_order_b,
            $row->contractor_price_b,
            $row->retail_sale_price_b,
            $row->retail_list_price_b,
            $row->pot_size_c,
            $row->inventory_count_c,
            $row->low_inventory_count_c,
            $row->click_to_inquire_c,
            $row->pre_order_c,
            $row->contractor_price_c,
            $row->retail_sale_price_c,
            $row->retail_list_price_c,
            $row->wholesale_supplier_name,
            $row->plug_tray_sizes,
            $row->raw_cost_range,
            $row->purchasing_notes,
            $row->year_purchased,
            $row->shipping_notes,
            $row->images,
            $row->perennial,
            $row->shrub,
            $row->vine,
            $row->grass_bamboo,
            $row->hardy_tropical,
            $row->water_plant,
            $row->annual,
            $row->house_deck_plant,
            $row->cactus_succulent,
            $row->small_tree,
            $row->large_tree,
            $zoneArray[$row->min_zone],
            $zoneArray[$row->max_zone],
            $row->sunlight,
            $row->water_rainfall,
            $row->soil_quality,
            $row->bloom_season,
            $row->flower_color,
            $row->berry_fruit_color,
            $row->spring_foliage_color ,
            $row->summer_foliage_color,
            $row->fall_foliage_color,
            $row->has_evergreen_foliage,
            $row->has_winter_interest,
            $row->scented_flowers,
            $row->drought_tolerance,
            $row->wet_feet_tolerance,
            $row->humidity_tolerance,
            $row->wind_tolerence,
            $row->poor_soil_tolerance,
            $row->height,
            $row->width,
            $row->growth_rate,
            $row->service_life,
            $row->maintenance_requirements,
            $row->spreading_potential,
            $row->yearly_trimming_tips,
            $row->plant_grouping_size,
            $row->best_side_of_house,
            $row->extreme_planting_locations,
            $row->ornamental_features,
            $row->special_landscape_uses,
            $row->possible_pest_problems,
            $row->plant_limitations,
            $row->sustainable_garden,
            $row->native_plant_garden,
            $row->bird_wildlife_garden,
            $row->butterfly_bee_garden,
            $row->lush_tropical_garden,
            $row->dry_shade_garden,
            $row->edible_medicinal_garden,
            $row->rain_garden,
            $row->colorado_rustic_garden,
            $row->desert_cactus_rock_garden,
            $row->video_link,
            $row->description,
            $row->how_to_grow_in_kansas,
            $row->patent_trademark_names,
            $row->plant_assets_and_uses,
            $row->plant_picture_in_dynascape_y_n,
            $row->year_entered_in_dynascape
        ];
    }
}
