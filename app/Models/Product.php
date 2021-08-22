<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

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

        //dd($return_arr);

        return json_encode($return_arr);

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}


