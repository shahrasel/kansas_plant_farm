<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


/**
 * App\Models\Cart
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property int $quantity
 * @property string|null $size
 * @property string|null $pot_size
 * @property string $unit_price
 * @property string $total_price
 * @property string $user_session_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Product $product
 * @method static \Database\Factories\CartFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart wherePotSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereTotalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserSessionId($value)
 * @mixin \Eloquent
 */
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
