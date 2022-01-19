<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $plant_id_number
 * @property string|null $botanical_name
 * @property string|null $common_name
 * @property string $slug
 * @property string|null $other_product_service_name
 * @property int $is_featured
 * @property int $featured_order
 * @property string|null $include_on_website
 * @property string|null $status
 * @property string|null $date_entered
 * @property string|null $best_sellers
 * @property string|null $new_for_this_year
 * @property string|null $tax_free
 * @property string|null $tags
 * @property string|null $purchase_options
 * @property string|null $pickup_instructions
 * @property string|null $pot_size_a
 * @property int|null $inventory_count_a
 * @property int|null $low_inventory_count_a
 * @property string|null $click_to_inquire_a
 * @property string|null $pre_order_a
 * @property float|null $contractor_price_a
 * @property float|null $retail_sale_price_a
 * @property float|null $retail_list_price_a
 * @property string|null $pot_size_b
 * @property int|null $inventory_count_b
 * @property int|null $low_inventory_count_b
 * @property string|null $click_to_inquire_b
 * @property string|null $pre_order_b
 * @property float|null $contractor_price_b
 * @property float|null $retail_sale_price_b
 * @property float|null $retail_list_price_b
 * @property string|null $pot_size_c
 * @property int|null $inventory_count_c
 * @property int|null $low_inventory_count_c
 * @property string|null $click_to_inquire_c
 * @property string|null $pre_order_c
 * @property float|null $contractor_price_c
 * @property float|null $retail_sale_price_c
 * @property float|null $retail_list_price_c
 * @property string|null $wholesale_supplier_name
 * @property string|null $plug_tray_sizes
 * @property string|null $raw_cost_range
 * @property string|null $purchasing_notes
 * @property string|null $year_purchased
 * @property string|null $shipping_notes
 * @property string|null $images
 * @property int $image_count
 * @property string|null $perennial
 * @property string|null $shrub
 * @property string|null $vine
 * @property string|null $grass_bamboo
 * @property string|null $hardy_tropical
 * @property string|null $water_plant
 * @property string|null $annual
 * @property string|null $house_deck_plant
 * @property string|null $cactus_succulent
 * @property string|null $small_tree
 * @property string|null $large_tree
 * @property int|null $min_zone
 * @property int|null $max_zone
 * @property string|null $sunlight
 * @property string|null $water_rainfall
 * @property string|null $soil_quality
 * @property string|null $bloom_season
 * @property string|null $flower_color
 * @property string|null $berry_fruit_color
 * @property string|null $spring_foliage_color
 * @property string|null $summer_foliage_color
 * @property string|null $fall_foliage_color
 * @property string|null $has_evergreen_foliage
 * @property string|null $has_winter_interest
 * @property string|null $scented_flowers
 * @property string|null $drought_tolerance
 * @property string|null $wet_feet_tolerance
 * @property string|null $humidity_tolerance
 * @property string|null $wind_tolerence
 * @property string|null $poor_soil_tolerance
 * @property float|null $min_height
 * @property float|null $max_height
 * @property float|null $min_width
 * @property float|null $max_width
 * @property string|null $growth_rate
 * @property string|null $service_life
 * @property string|null $maintenance_requirements
 * @property string|null $spreading_potential
 * @property string|null $yearly_trimming_tips
 * @property string|null $plant_grouping_size
 * @property string|null $best_side_of_house
 * @property string|null $extreme_planting_locations
 * @property string|null $ornamental_features
 * @property string|null $special_landscape_uses
 * @property string|null $possible_pest_problems
 * @property string|null $plant_limitations
 * @property string|null $sustainable_garden
 * @property string|null $native_plant_garden
 * @property string|null $bird_wildlife_garden
 * @property string|null $butterfly_bee_garden
 * @property string|null $lush_tropical_garden
 * @property string|null $dry_shade_garden
 * @property string|null $edible_medicinal_garden
 * @property string|null $rain_garden
 * @property string|null $colorado_rustic_garden
 * @property string|null $desert_cactus_rock_garden
 * @property string|null $video_link
 * @property string|null $description
 * @property string|null $how_to_grow_in_kansas
 * @property string|null $patent_trademark_names
 * @property string|null $plant_assets_and_uses
 * @property string|null $plant_picture_in_dynascape_y_n
 * @property string|null $year_entered_in_dynascape
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cart[] $cart
 * @property-read int|null $cart_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Wishlist[] $wishlist
 * @property-read int|null $wishlist_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereAnnual($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBerryFruitColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBestSellers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBestSideOfHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBirdWildlifeGarden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBloomSeason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBotanicalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereButterflyBeeGarden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCactusSucculent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereClickToInquireA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereClickToInquireB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereClickToInquireC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereColoradoRusticGarden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCommonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereContractorPriceA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereContractorPriceB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereContractorPriceC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDateEntered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDesertCactusRockGarden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDroughtTolerance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDryShadeGarden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereEdibleMedicinalGarden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereExtremePlantingLocations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFallFoliageColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFeaturedOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereFlowerColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGrassBamboo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGrowthRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHardyTropical($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHasEvergreenFoliage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHasWinterInterest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHouseDeckPlant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHowToGrowInKansas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereHumidityTolerance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImageCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIncludeOnWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereInventoryCountA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereInventoryCountB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereInventoryCountC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLargeTree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLowInventoryCountA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLowInventoryCountB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLowInventoryCountC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereLushTropicalGarden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMaintenanceRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMaxHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMaxWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMaxZone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMinHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMinWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereMinZone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNativePlantGarden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereNewForThisYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOrnamentalFeatures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereOtherProductServiceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePatentTrademarkNames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePerennial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePickupInstructions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePlantAssetsAndUses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePlantGroupingSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePlantIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePlantLimitations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePlantPictureInDynascapeYN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePlugTraySizes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePoorSoilTolerance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePossiblePestProblems($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePotSizeA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePotSizeB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePotSizeC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePreOrderA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePreOrderB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePreOrderC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePurchaseOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePurchasingNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRainGarden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRawCostRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRetailListPriceA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRetailListPriceB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRetailListPriceC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRetailSalePriceA($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRetailSalePriceB($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereRetailSalePriceC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereScentedFlowers($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereServiceLife($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShippingNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereShrub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSmallTree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSoilQuality($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSpecialLandscapeUses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSpreadingPotential($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSpringFoliageColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSummerFoliageColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSunlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSustainableGarden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTaxFree($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVideoLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereVine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWaterPlant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWaterRainfall($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWetFeetTolerance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWholesaleSupplierName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereWindTolerence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereYearEnteredInDynascape($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereYearPurchased($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereYearlyTrimmingTips($value)
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;
    use HasSlug;
    protected $guarded = [];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('botanical_name')
            ->saveSlugsTo('slug');
    }

    public function cart() {
        return $this->hasMany(Cart::class);
    }

    public function wishlist() {
        return $this->hasMany(Wishlist::class);
    }

    public static function zoneLists() {
        return $zoneArray = array(
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
    }

    public static function getAllProductsNames() {
        $product_names = DB::table('products')
            ->select('botanical_name', 'common_name', 'slug')
            ->get();
        $product_arr = array();
        if(!empty($product_names)) {
            $temp_arr = array();
            foreach ($product_names as $product_name) {
                $temp_arr['label'] = $product_name->botanical_name;
                $temp_arr['category'] = 'Botanical Name';
                $temp_arr['slug'] = $product_name->slug;

                $product_arr[] = $temp_arr;
            }

            $temp_arr1 = array();
            foreach ($product_names as $product_name) {
                $temp_arr1['label'] = $product_name->common_name;
                $temp_arr1['category'] = 'Common Name';
                $temp_arr1['slug'] = $product_name->slug;

                $product_arr[] = $temp_arr1;
            }
        }
        return $product_arr;
    }

    public static function getAllImages($product) {
        if(!empty($product->images)) {
            $images = json_decode($product->images);

            return $images;
        }
    }

    public static function getImage($product) {
        if(!empty($product->images)) {
            $images = json_decode($product->images);
            if(!empty($images)) {
                return 'img/product/thumb/' . $product->id . '/' . $images[0];
            }
            else {
                return false;
            }
        }
    }

    public static function getProductListPrice($product) {

        $price = "";
        if(!empty($product->other_product_service_name)) {
            if (Auth::check()) {
                if(Auth()->user()->usertype=='contractor') {
                    if (!empty($product->contractor_price_a)) {
                        $price = number_format($product->contractor_price_a, 2);
                    } else if (!empty($product->contractor_price_b)) {
                        $price = number_format($product->contractor_price_b, 2);
                    } else if (!empty($product->contractor_price_c)) {
                        $price = number_format($product->contractor_price_c, 2);
                    }
                }
                else {
                    if (!empty($product->retail_sale_price_a)) {
                        $price = number_format($product->retail_list_price_a, 2);
                    } else if (!empty($product->retail_sale_price_b)) {
                        $price = number_format($product->retail_list_price_b, 2);
                    } else if (!empty($product->retail_sale_price_c)) {
                        $price = number_format($product->retail_list_price_c, 2);
                    }
                }
            }
            else {
                if (!empty($product->retail_sale_price_a)) {
                    $price = number_format($product->retail_list_price_a, 2);
                } else if (!empty($product->retail_sale_price_b)) {
                    $price = number_format($product->retail_list_price_b, 2);
                } else if (!empty($product->retail_sale_price_c)) {
                    $price = number_format($product->retail_list_price_c, 2);
                }
            }
        }
        else {
            if (Auth::check()) {
                if (Auth()->user()->usertype == 'contractor') {
                    if (!empty($product->pot_size_a) && !empty($product->contractor_price_a)) {
                        $price = number_format($product->contractor_price_a, 2);
                    } else if (!empty($product->pot_size_b) && !empty($product->contractor_price_b)) {
                        $price = number_format($product->contractor_price_b, 2);
                    } else if (!empty($product->pot_size_c) && !empty($product->contractor_price_c)) {
                        $price = number_format($product->contractor_price_c, 2);
                    }
                } else {
                    if (!empty($product->pot_size_a) && !empty($product->retail_sale_price_a)) {
                        $price = number_format($product->retail_list_price_a, 2);
                    } else if (!empty($product->pot_size_b) && !empty($product->retail_sale_price_b)) {
                        $price = number_format($product->retail_list_price_b, 2);
                    } else if (!empty($product->pot_size_c) && !empty($product->retail_sale_price_c)) {
                        $price = number_format($product->retail_list_price_c, 2);
                    }
                }
            } else {
                if (!empty($product->pot_size_a) && !empty($product->retail_sale_price_a)) {
                    $price = number_format($product->retail_list_price_a, 2);
                } else if (!empty($product->pot_size_b) && !empty($product->retail_sale_price_b)) {
                    $price = number_format($product->retail_list_price_b, 2);
                } else if (!empty($product->pot_size_c) && !empty($product->retail_sale_price_c)) {
                    $price = number_format($product->retail_list_price_c, 2);
                }
            }
        }
        return $price;
    }

    public static function getProductPrice($product) {
        //dd($product);
        $price = "";
        if(!empty($product->other_product_service_name)) {
            if (Auth::check()) {
                if(Auth()->user()->usertype=='contractor') {
                    if (!empty($product->contractor_price_a)) {
                        $price = number_format($product->contractor_price_a, 2);
                    } else if (!empty($product->contractor_price_b)) {
                        $price = number_format($product->contractor_price_b, 2);
                    } else if (!empty($product->contractor_price_c)) {
                        $price = number_format($product->contractor_price_c, 2);
                    }
                }
                else {
                    if (!empty($product->retail_sale_price_a)) {
                        $price = number_format($product->retail_sale_price_a, 2);
                    } else if (!empty($product->retail_sale_price_b)) {
                        $price = number_format($product->retail_sale_price_b, 2);
                    } else if (!empty($product->retail_sale_price_c)) {
                        $price = number_format($product->retail_sale_price_c, 2);
                    }
                }
            }
            else {
                if (!empty($product->retail_sale_price_a)) {
                    $price = number_format($product->retail_sale_price_a, 2);
                } else if (!empty($product->retail_sale_price_b)) {
                    $price = number_format($product->retail_sale_price_b, 2);
                } else if (!empty($product->retail_sale_price_c)) {
                    $price = number_format($product->retail_sale_price_c, 2);
                }
            }
        }
        else {
            if (Auth::check()) {
                if (Auth()->user()->usertype == 'contractor') {
                    if (!empty($product->pot_size_a) && !empty($product->contractor_price_a)) {
                        $price = number_format($product->contractor_price_a, 2);
                    } else if (!empty($product->pot_size_b) && !empty($product->contractor_price_b)) {
                        $price = number_format($product->contractor_price_b, 2);
                    } else if (!empty($product->pot_size_c) && !empty($product->contractor_price_c)) {
                        $price = number_format($product->contractor_price_c, 2);
                    }
                } else {
                    if (!empty($product->pot_size_a) && !empty($product->retail_sale_price_a)) {
                        $price = number_format($product->retail_sale_price_a, 2);
                    } else if (!empty($product->pot_size_b) && !empty($product->retail_sale_price_b)) {
                        $price = number_format($product->retail_sale_price_b, 2);
                    } else if (!empty($product->pot_size_c) && !empty($product->retail_sale_price_c)) {
                        $price = number_format($product->retail_sale_price_c, 2);
                    }
                }
            } else {
                if (!empty($product->pot_size_a) && !empty($product->retail_sale_price_a)) {
                    $price = number_format($product->retail_sale_price_a, 2);
                } else if (!empty($product->pot_size_b) && !empty($product->retail_sale_price_b)) {
                    $price = number_format($product->retail_sale_price_b, 2);
                } else if (!empty($product->pot_size_c) && !empty($product->retail_sale_price_c)) {
                    $price = number_format($product->retail_sale_price_c, 2);
                }
            }
        }
        return $price;
    }

    public static function getProductStock($product) {

        $stock = "";
        if(!empty($product->other_product_service_name)) {
            /*if (Auth::check()) {
                if(Auth()->user()->usertype=='contractor') {
                    if (!empty($product->contractor_price_a)) {
                        $price = number_format($product->contractor_price_a, 2);
                    } else if (!empty($product->contractor_price_b)) {
                        $price = number_format($product->contractor_price_b, 2);
                    } else if (!empty($product->contractor_price_c)) {
                        $price = number_format($product->contractor_price_c, 2);
                    }
                }
                else {
                    if (!empty($product->retail_sale_price_a)) {
                        $price = number_format($product->retail_sale_price_a, 2);
                    } else if (!empty($product->retail_sale_price_b)) {
                        $price = number_format($product->retail_sale_price_b, 2);
                    } else if (!empty($product->retail_sale_price_c)) {
                        $price = number_format($product->retail_sale_price_c, 2);
                    }
                }
            }
            else {
                if (!empty($product->retail_sale_price_a)) {
                    $price = number_format($product->retail_sale_price_a, 2);
                } else if (!empty($product->retail_sale_price_b)) {
                    $price = number_format($product->retail_sale_price_b, 2);
                } else if (!empty($product->retail_sale_price_c)) {
                    $price = number_format($product->retail_sale_price_c, 2);
                }
            }*/
            return 10;
        }
        else {
            if (Auth::check()) {
                if (Auth()->user()->usertype == 'contractor') {
                    if (!empty($product->pot_size_a) && !empty($product->contractor_price_a)) {
                        $stock = $product->inventory_count_a;
                    } else if (!empty($product->pot_size_b) && !empty($product->contractor_price_b)) {
                        $stock = $product->inventory_count_b;
                    } else if (!empty($product->pot_size_c) && !empty($product->contractor_price_c)) {
                        $stock = $product->inventory_count_c;
                    }
                }
                else {
                    if (!empty($product->pot_size_a) && !empty($product->retail_sale_price_a)) {
                        $stock = $product->inventory_count_a;
                    } else if (!empty($product->pot_size_b) && !empty($product->retail_sale_price_b)) {
                        $stock = $product->inventory_count_b;
                    } else if (!empty($product->pot_size_c) && !empty($product->retail_sale_price_c)) {
                        $stock = $product->inventory_count_c;
                    }
                }
            } else {
                if (!empty($product->pot_size_a) && !empty($product->retail_sale_price_a)) {
                    $stock = $product->inventory_count_a;
                } else if (!empty($product->pot_size_b) && !empty($product->retail_sale_price_b)) {
                    $stock = $product->inventory_count_b;
                } else if (!empty($product->pot_size_c) && !empty($product->retail_sale_price_c)) {
                    $stock = $product->inventory_count_c;
                }
            }
        }

        return $stock;
    }

    public static function getProductStockByPotSize($product,$pot_size) {

        //dd($product);

        $stock = "";
        if(!empty($product->other_product_service_name)) {
            return 10;
        }
        else {

            if($pot_size == 'a') {
                $stock = $product->inventory_count_a;
            }
            else if($pot_size == 'b') {
                $stock = $product->inventory_count_b;
            }
            else if($pot_size == 'c') {
                $stock = $product->inventory_count_c;
            }
        }

        return $stock;
    }

    public static function getProductSize($product) {
        $sizes = array();
        if (Auth::check()) {
            if(Auth()->user()->usertype=='contractor') {
                if (!empty($product->contractor_price_a)) {
                    $sizes[] = $product->pot_size_a;
                } if (!empty($product->contractor_price_b)) {
                    $sizes[] = $product->pot_size_b;
                } if (!empty($product->contractor_price_c)) {
                    $sizes[] = $product->pot_size_c;
                }
            }
            else {
                if (!empty($product->retail_sale_price_a)) {
                    $sizes[] = $product->pot_size_a;
                } if (!empty($product->retail_sale_price_b)) {
                    $sizes[] = $product->pot_size_b;
                } if (!empty($product->retail_sale_price_c)) {
                    $sizes[] = $product->pot_size_c;
                }
            }
        }
        else {
            if (!empty($product->retail_sale_price_a)) {
                $sizes[] = $product->pot_size_a;
            } if (!empty($product->retail_sale_price_b)) {
                $sizes[] = $product->pot_size_b;
            } if (!empty($product->retail_sale_price_c)) {
                $sizes[] = $product->pot_size_c;
            }
        }

        return $sizes;
    }

    public static function getProductPriceByIDandSize($id,$size) {
        $product = Product::where('id',$id)->first();

        $price_arr = array();
        $available = 0;
        $pot_size = "";

        if (Auth::check()) {
            if(Auth()->user()->usertype=='contractor') {
                if(!empty($product->other_product_service_name)) {
                    $price_arr[]= number_format($product->contractor_price_a,2);
                    $available = $product->inventory_count_a;
                    $pot_size = "a";
                }
                else {
                    if($size == $product->pot_size_a) {
                        $price_arr[]= number_format($product->contractor_price_a,2);
                        $available = $product->inventory_count_a;
                        $pot_size = "a";
                    }
                    elseif($size == $product->pot_size_b) {
                        $price_arr[]= number_format($product->contractor_price_b,2);
                        $available = $product->inventory_count_b;
                        $pot_size = "b";
                    }
                    elseif($size == $product->pot_size_c) {
                        $price_arr[]= number_format($product->contractor_price_c,2);
                        $available = $product->inventory_count_c;
                        $pot_size = "c";
                    }
                }
            }
            else {

                if(!empty($product->other_product_service_name)) {
                    $price_arr[] = number_format($product->retail_sale_price_a, 2);
                    $price_arr[] = number_format($product->retail_list_price_a, 2);
                    $available = $product->inventory_count_a;
                    $pot_size = "a";
                }
                else {
                    if ($size == $product->pot_size_a) {
                        $price_arr[] = number_format($product->retail_sale_price_a, 2);
                        $price_arr[] = number_format($product->retail_list_price_a, 2);
                        $available = $product->inventory_count_a;
                        $pot_size = "a";
                    } elseif ($size == $product->pot_size_b) {
                        $price_arr[] = number_format($product->retail_sale_price_b, 2);
                        $price_arr[] = number_format($product->retail_list_price_b, 2);
                        $available = $product->inventory_count_b;
                        $pot_size = "b";
                    } elseif ($size == $product->pot_size_c) {
                        $price_arr[] = number_format($product->retail_sale_price_c, 2);
                        $price_arr[] = number_format($product->retail_list_price_c, 2);
                        $available = $product->inventory_count_c;
                        $pot_size = "c";
                    }
                }
            }
        }
        else {
            if(!empty($product->other_product_service_name)) {
                $price_arr[] = number_format($product->retail_sale_price_a, 2);
                $price_arr[] = number_format($product->retail_list_price_a, 2);
                $available = $product->inventory_count_a;
                $pot_size = "a";
            }
            else {
                if ($size == $product->pot_size_a) {
                    $price_arr[] = number_format($product->retail_sale_price_a, 2);
                    $price_arr[] = number_format($product->retail_list_price_a, 2);
                    $available = $product->inventory_count_a;
                    $pot_size = "a";
                } elseif ($size == $product->pot_size_b) {
                    $price_arr[] = number_format($product->retail_sale_price_b, 2);
                    $price_arr[] = number_format($product->retail_list_price_b, 2);
                    $available = $product->inventory_count_b;
                    $pot_size = "b";
                } elseif ($size == $product->pot_size_c) {
                    $price_arr[] = number_format($product->retail_sale_price_c, 2);
                    $price_arr[] = number_format($product->retail_list_price_c, 2);
                    $available = $product->inventory_count_c;
                    $pot_size = "c";
                }
            }
        }

        $return_arr = array();
        $return_arr['price'] = $price_arr;
        $return_arr['available'] = $available;
        $return_arr['pot_size'] = $pot_size;



        return json_encode($return_arr);

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}


