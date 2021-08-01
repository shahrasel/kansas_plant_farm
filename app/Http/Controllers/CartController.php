<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        /*$cart_lists = Cart::with('product')->get();
        dd($cart_lists);*/
        if ($request->has('addtocart')) {

            $cart_validation = $request->validate([
                'product_id' => ['required', 'integer'],
                'quantity' => ['required', 'min:1', 'max:255'],
                //'size' => ['required', 'numeric'],
                //'unit_price' => ['required', 'numeric']
            ]);

            $cart = new Cart();
            $cart->product_id = $request->get('product_id');
            $cart->quantity = $request->get('quantity');
            if($request->has('size')) {
                $cart->size = $request->get('size');
            }


            $product_price = json_decode(Product::getProductPriceByIDandSize($request->get('product_id'),$request->get('size')));

            //dd($product_price);

            $cart->unit_price = $product_price->price[0];
            $cart->total_price = $product_price->price[0] * $request->get('quantity');
            $cart->user_session_id = session()->getId();
            //dd($cart);
            $cart->save();

            if (!empty($cart->id)) {
                echo 'Product is added to the cart successfully!';
            }
        }
    }

    public function delete_cart_item(Request $request) {
        if ($request->has('id')) {

            $cart_info = Cart::find($request->get('id'));
            $cart_info->delete();

            if($request->has('main_cart')) {
                $cart = new Cart();
                $cart_lists = $cart->getCartData();

                return view('cart.update_main_cart', [
                    'cart_lists' => $cart_lists
                ]);
            }
            else {
                return view('cart.update_cart', [
                    //'products' => $final_array
                ]);
            }
        }
    }

    public function show() {
        $cart = new Cart();
        $cart_lists = $cart->getCartData();
        return view('cart.main_cart_view', [
            'cart_lists' => $cart_lists
        ]);
    }

    public function store(Request $request) {
        //dd($request->all());
        if($request->has('cart_d')) {
            $arr = explode("#",$request->get('cart_d'));
            if(!empty($arr)) {
                for($i=0;$i<count($arr);$i++) {
                    if(!empty($arr[$i])) {
                        $cart = Cart::find($arr[$i]);
                        $cart->quantity = $request->get('quantity_' . $arr[$i]);
                        $cart->save();
                    }
                }
            }
        }
        $cart = new Cart();
        $cart_lists = $cart->getCartData();
        return view('cart.main_cart_view', [
            'cart_lists' => $cart_lists
        ]);
    }
}
