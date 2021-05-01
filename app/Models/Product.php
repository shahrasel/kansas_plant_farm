<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cart() {
        return $this->hasMany(Cart::class);
    }

    public function wishlist() {
        return $this->hasMany(Wishlist::class);
    }

    public static function getAllProductsNames() {
        $product_names = DB::table('products')
            ->select('botanical_name', 'common_name')
            ->get();
        $product_arr = array();
        if(!empty($product_names)) {
            $temp_arr = array();
            foreach ($product_names as $product_name) {
                $temp_arr['label'] = $product_name->botanical_name;
                $temp_arr['category'] = 'Botanical Name';
                $temp_arr['rasel'] = 'Botanical-Name';

                $product_arr[] = $temp_arr;
            }

            $temp_arr1 = array();
            foreach ($product_names as $product_name) {
                $temp_arr1['label'] = $product_name->common_name;
                $temp_arr1['category'] = 'Common Name';
                $temp_arr1['rasel'] = 'Common-Name';

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
            return 'img/product/thumb/'.$product->id.'/'.$images[0];
        }
    }
}
