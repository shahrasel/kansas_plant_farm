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

    public static function getProductPrice($product) {
        $price = "";
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
        return $price;
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

    public function getRouteKeyName()
    {
        return 'slug';
    }

}


