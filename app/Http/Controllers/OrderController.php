<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function checkout() {
        $cart = new Cart();
        $cart_lists = $cart->getCartData();

        return view('order.checkout', [
            'cart_lists' => $cart_lists
        ]);
    }
}
