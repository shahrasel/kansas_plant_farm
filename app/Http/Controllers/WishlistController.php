<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    //
    public function store(Request $request) {
        if($request->has('user_id') && $request->has('product_id')) {
            $wishlist_list = DB::table('wishlists')
                ->where('user_id', '=', $request->get('user_id'))
                ->where('product_id', '=', $request->get('product_id'))
                ->first();

            if (!empty($wishlist_list)) {
                $wishlist_info = Wishlist::find($wishlist_list->id);
                $wishlist_info->delete();
                echo 'Removed from the wishlist successfully!';
            } else {
                $wishlist = new Wishlist();
                $wishlist->user_id = $request->get('user_id');
                $wishlist->product_id = $request->get('product_id');
                $wishlist->save();
                echo 'Added to the wishlist successfully!';
            }
            exit;
        }
    }
}
