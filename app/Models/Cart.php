<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Cart extends Model
{
    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public static function getCartData() {

        $cart_lists = Cart::with('product')
            ->where('user_session_id', session()->getId())
            ->orderBy('id', 'desc')
            ->get();

        return $cart_lists;
    }

    public function generateUniqueCode()

    {

        do {

            $code = random_int(1000000000, 9999999999);

        }
        while (Product::where("code", "=", $code)->first());



        return $code;

    }
}
