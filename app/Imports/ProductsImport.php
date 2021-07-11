<?php

namespace App\Imports;

use App\Product;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        /*$zoneArray = array(
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
            );*/

        $zoneArray = array(
            ''=>'0',
            '1a'=>'1','1b'=>'1.5',
            '2a'=>'2','2b'=>'2.5',
            '3a'=>'3','3b'=>'3.5',
            '4a'=>'4','4b'=>'4.5',
            '5a'=>'5','5b'=>'5.5',
            '6a'=>'6','6b'=>'6.5',
            '7a'=>'7','7b'=>'7.5',
            '8a'=>'8','8b'=>'8.5',
            '9a'=>'9','9b'=>'9.5',
            '10a'=>'10','10b'=>'10.5',
            '11a'=>'11','11b'=>'11.5',
            '12a'=>'12','12b'=>'12.5',
            '13a'=>'13','13b'=>'13.5'
        );

        if($row['0'] == 'BOTANICAL NAME' || $row['1'] == 'BOTANICAL NAME' || $row['2'] == 'BOTANICAL NAME') {
            return;
        }
        $exists = \App\Models\Product::where('id',$row['0'])->first();
        //print_r($exists);
        if ($exists) {

            //3' - 5'
            $temp_height = explode('-',str_replace("'","",$row[75]));
            $min_height = ($temp_height[0]?trim($temp_height[0]):'');

            if(count($temp_height)>1)
                $max_height = ($temp_height[1]?trim($temp_height[1]):'');
            else
                $max_height = '';

            $temp_width = explode('-',str_replace("'","",$row[76]));
            $min_width = ($temp_width[0]?trim($temp_width[0]):'');
            //$max_width = ($temp_width[1]?trim($temp_width[1]):'');
            if(count($temp_width)>1)
                $max_width = ($temp_width[1]?trim($temp_width[1]):'');
            else
                $max_width = '';

            \App\Models\Product::updateOrCreate(
                ['id' => $row[0]],
                [
                    //'plant_id_number' => uniqid() . rand(0000, 9999),
                    'botanical_name' => $row[2],
                    'common_name' => $row[3],
                    'other_product_service_name' => $row[4],
                    'include_on_website' => $row[5],
                    'status' => $row[6],
                    'date_entered' => $row[7],
                    'best_sellers' => $row[8],
                    'new_for_this_year' => $row[9],
                    'tax_free' => $row[10],
                    'tags' => $row[11],
                    'purchase_options' => $row[12],
                    'pickup_instructions' => $row[13],
                    'pot_size_a' => $row[14],
                    'inventory_count_a' => $row[15],
                    'low_inventory_count_a' => $row[16],
                    'click_to_inquire_a' => $row[17],
                    'pre_order_a' => $row[18],
                    'contractor_price_a' => $row[19],
                    'retail_sale_price_a' => $row[20],
                    'retail_list_price_a' => $row[21],
                    'pot_size_b' => $row[22],
                    'inventory_count_b' => $row[23],
                    'low_inventory_count_b' => $row[24],
                    'click_to_inquire_b' => $row[25],
                    'pre_order_b' => $row[26],
                    'contractor_price_b' => $row[27],
                    'retail_sale_price_b' => $row[28],
                    'retail_list_price_b' => $row[29],
                    'pot_size_c' => $row[30],
                    'inventory_count_c' => $row[31],
                    'low_inventory_count_c' => $row[32],
                    'click_to_inquire_c' => $row[33],
                    'pre_order_c' => $row[34],
                    'contractor_price_c' => $row[35],
                    'retail_sale_price_c' => $row[36],
                    'retail_list_price_c' => $row[37],
                    'wholesale_supplier_name' => $row[38],
                    'plug_tray_sizes' => $row[39],
                    'raw_cost_range' => $row[40],
                    'purchasing_notes' => $row[41],
                    'year_purchased' => $row[42],
                    'shipping_notes' => $row[43],
                    'images' => $exists->images,
                    'perennial' => $row[45],
                    'shrub' => $row[46],
                    'vine' => $row[47],
                    'grass_bamboo' => $row[48],
                    'hardy_tropical' => $row[49],
                    'water_plant' => $row[50],
                    'annual' => $row[51],
                    'house_deck_plant' => $row[52],
                    'cactus_succulent' => $row[53],
                    'small_tree' => $row[54],
                    'large_tree' => $row[55],
                    'min_zone' => $zoneArray[$row[56]],
                    'max_zone' => $zoneArray[$row[57]],
                    'sunlight' => $row[58],
                    'water_rainfall' => $row[59],
                    'soil_quality' => $row[60],
                    'bloom_season' => $row[61],
                    'flower_color' => $row[62],
                    'berry_fruit_color' => $row[63],
                    'spring_foliage_color' => $row[64],
                    'summer_foliage_color' => $row[65],
                    'fall_foliage_color' => $row[66],
                    'has_evergreen_foliage' => $row[67],
                    'has_winter_interest' => $row[68],
                    'scented_flowers' => $row[69],
                    'drought_tolerance' => $row[70],
                    'wet_feet_tolerance' => $row[71],
                    'humidity_tolerance' => $row[72],
                    'wind_tolerence' => $row[73],
                    'poor_soil_tolerance' => $row[74],
                    'min_height' => $min_height,
                    'max_height' => $max_height,
                    'min_width' => $min_width,
                    'max_width' => $max_width,
                    'growth_rate' => $row[77],
                    'service_life' => $row[78],
                    'maintenance_requirements' => $row[79],
                    'spreading_potential' => $row[80],
                    'yearly_trimming_tips' => $row[81],
                    'plant_grouping_size' => $row[82],
                    'best_side_of_house' => $row[83],
                    'extreme_planting_locations' => $row[84],
                    'ornamental_features' => $row[85],
                    'special_landscape_uses' => $row[86],
                    'possible_pest_problems' => $row[87],
                    'plant_limitations' => $row[88],
                    'sustainable_garden' => $row[89],
                    'native_plant_garden' => $row[90],
                    'bird_wildlife_garden' => $row[91],
                    'butterfly_bee_garden' => $row[92],
                    'lush_tropical_garden' => $row[93],
                    'dry_shade_garden' => $row[94],
                    'edible_medicinal_garden' => $row[95],
                    'rain_garden' => $row[96],
                    'colorado_rustic_garden' => $row[97],
                    'desert_cactus_rock_garden' => $row[98],
                    'video_link' => $row[99],
                    'description' => $row[100],
                    'how_to_grow_in_kansas' => $row[101],
                    'patent_trademark_names' => $row[102],
                    'plant_assets_and_uses' => $row[103],
                    'plant_picture_in_dynascape_y_n' => $row[104],
                    'year_entered_in_dynascape' => $row[105],
                    'updated_at' => time(),
                ]
            );
            return null;
        }
        else {

            do {
                $refrence_id = mt_rand( 100000, 999999 );
            } while ( DB::table( 'products' )->where( 'plant_id_number', $refrence_id )->exists() );

            //3' - 5'
            $temp_height = explode('-',str_replace("'","",$row[73]));
            $min_height = ($temp_height[0]?trim($temp_height[0]):'0');

            if(count($temp_height)>1)
                $max_height = ($temp_height[1]?trim($temp_height[1]):'0');
            else
                $max_height = '0';

            $temp_width = explode('-',str_replace("'","",$row[74]));
            $min_width = ($temp_width[0]?trim($temp_width[0]):'0');
            //$max_width = ($temp_width[1]?trim($temp_width[1]):'');
            if(count($temp_width)>1)
                $max_width = ($temp_width[1]?trim($temp_width[1]):'0');
            else
                $max_width = '0';

            return new \App\Models\Product([
                'plant_id_number' => $refrence_id,
                'botanical_name' => $row[0],
                'common_name' => $row[1],
                'other_product_service_name' => $row[2],
                'include_on_website' => $row[3],
                'status' => $row[4],
                'date_entered' => $row[5],
                'best_sellers' => $row[6],
                'new_for_this_year' => $row[7],
                'tax_free' => $row[8],
                'tags' => $row[9],
                'purchase_options' => $row[10],
                'pickup_instructions' => $row[11],
                'pot_size_a' => $row[12],
                'inventory_count_a' => $row[13],
                'low_inventory_count_a' => $row[14],
                'click_to_inquire_a' => $row[15],
                'pre_order_a' => $row[16],
                'contractor_price_a' => $row[17],
                'retail_sale_price_a' => $row[18],
                'retail_list_price_a' => $row[19],
                'pot_size_b' => $row[20],
                'inventory_count_b' => $row[21],
                'low_inventory_count_b' => $row[22],
                'click_to_inquire_b' => $row[23],
                'pre_order_b' => $row[24],
                'contractor_price_b' => $row[25],
                'retail_sale_price_b' => $row[26],
                'retail_list_price_b' => $row[27],
                'pot_size_c' => $row[28],
                'inventory_count_c' => $row[29],
                'low_inventory_count_c' => $row[30],
                'click_to_inquire_c' => $row[31],
                'pre_order_c' => $row[32],
                'contractor_price_c' => $row[33],
                'retail_sale_price_c' => $row[34],
                'retail_list_price_c' => $row[35],
                'wholesale_supplier_name' => $row[36],
                'plug_tray_sizes' => $row[37],
                'raw_cost_range' => $row[38],
                'purchasing_notes' => $row[39],
                'year_purchased' => $row[40],
                'shipping_notes' => $row[41],
                'images' => $row[42],
                'perennial' => $row[43],
                'shrub' => $row[44],
                'vine' => $row[45],
                'grass_bamboo' => $row[46],
                'hardy_tropical' => $row[47],
                'water_plant' => $row[48],
                'annual' => $row[49],
                'house_deck_plant' => $row[50],
                'cactus_succulent' => $row[51],
                'small_tree' => $row[52],
                'large_tree' => $row[53],
                'min_zone' => ($row[54]?$zoneArray[$row[54]]:0),
                'max_zone' => ($row[55]?$zoneArray[$row[55]]:0),
                /*'min_zone' => $row[54],
                'max_zone' => $row[55],*/
                'sunlight' => $row[56],
                'water_rainfall' => $row[57],
                'soil_quality' => $row[58],
                'bloom_season' => $row[59],
                'flower_color' => $row[60],
                'berry_fruit_color' => $row[61],
                'spring_foliage_color' => $row[62],
                'summer_foliage_color' => $row[63],
                'fall_foliage_color' => $row[64],
                'has_evergreen_foliage' => $row[65],
                'has_winter_interest' => $row[66],
                'scented_flowers' => $row[67],
                'drought_tolerance' => $row[68],
                'wet_feet_tolerance' => $row[69],
                'humidity_tolerance' => $row[70],
                'wind_tolerence' => $row[71],
                'poor_soil_tolerance' => $row[72],
                'min_height' => $min_height,
                'max_height' => $max_height,
                'min_width' => $min_width,
                'max_width' => $max_width,
                'growth_rate' => $row[75],
                'service_life' => $row[76],
                'maintenance_requirements' => $row[77],
                'spreading_potential' => $row[78],
                'yearly_trimming_tips' => $row[79],
                'plant_grouping_size' => $row[80],
                'best_side_of_house' => $row[81],
                'extreme_planting_locations' => $row[82],
                'ornamental_features' => $row[83],
                'special_landscape_uses' => $row[84],
                'possible_pest_problems' => $row[85],
                'plant_limitations' => $row[86],
                'sustainable_garden' => $row[87],
                'native_plant_garden' => $row[88],
                'bird_wildlife_garden' => $row[89],
                'butterfly_bee_garden' => $row[90],
                'lush_tropical_garden' => $row[91],
                'dry_shade_garden' => $row[92],
                'edible_medicinal_garden' => $row[93],
                'rain_garden' => $row[94],
                'colorado_rustic_garden' => $row[95],
                'desert_cactus_rock_garden' => $row[96],
                'video_link' => $row[97],
                'description' => $row[98],
                'how_to_grow_in_kansas' => $row[99],
                'patent_trademark_names' => $row[100],
                'plant_assets_and_uses' => $row[101],
                'plant_picture_in_dynascape_y_n' => $row[102],
                'year_entered_in_dynascape' => $row[103],
                'created_at' => time(),
                'updated_at' => time(),
            ]);
        }
    }
}
