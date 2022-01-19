<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishlistController extends Controller
{
    //
    public function store(Request $request) {
        //dd(Auth::user()->id);
        if(Auth::check()) {
            if (Auth::user() && $request->has('product_id')) {
                $wishlist_list = DB::table('wishlists')
                    ->where('user_id', '=', Auth::user()->id)
                    ->where('product_id', '=', $request->post('product_id'))
                    ->first();

                //dd($wishlist_list);

                if (!empty($wishlist_list)) {
                    $wishlist_info = Wishlist::find($wishlist_list->id);
                    $wishlist_info->delete();
                    echo 'Removed from the wishlist successfully!';
                } else {
                    $wishlist = new Wishlist();
                    $wishlist->user_id = Auth::user()->id;
                    $wishlist->product_id = $request->post('product_id');
                    $wishlist->save();
                    echo 'Added to the wishlist successfully!';
                }
                exit;
            }
        }
    }

    public function index() {
        $product_lists = array();
        if(Auth::check()) {
            $product_lists = Wishlist::where('user_id', Auth::user()->id)->get();
        }
        return view('user.wishlist', [
            'product_lists' => $product_lists
        ]);
    }
}
