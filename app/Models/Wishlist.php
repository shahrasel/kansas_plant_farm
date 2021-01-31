<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Wishlist extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function checkUsersWishlist(Product $product) {
        $wishlist_list = DB::table('wishlists')
            ->where('user_id', '=', Auth::user()->id)
            ->where('product_id', '=', $product->id)
            ->first();
        if(!empty($wishlist_list)) {
            return 1;
        }
        else {
            return 0;
        }
    }
}
