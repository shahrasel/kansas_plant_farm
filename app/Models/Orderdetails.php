<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Orderdetails
 *
 * @property int $id
 * @property int $order_id
 * @property int $product_id
 * @property int $quantity
 * @property string $size
 * @property string $unit_price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Product $product
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Orderdetails whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Orderdetails extends Model
{
    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function getOrderDetails($id) {
        $where_query= array();
        $where_query['order_id'] = $id;

        $orderdetails_lists = Orderdetails::with('product')
            ->where('order_id', $id)
            ->orderBy('id', 'desc')->get();



        return $orderdetails_lists;
    }
}
