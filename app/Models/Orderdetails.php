<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
