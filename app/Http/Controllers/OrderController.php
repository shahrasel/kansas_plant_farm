<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Orderdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function checkout() {
        $cart = new Cart();
        $cart_lists = $cart->getCartData();
        //dd($cart_lists);
        return view('order.checkout', [
            'cart_lists' => $cart_lists
        ]);
    }

    public function paymentConfirmation(Request $request) {
        $cart = new Cart();
        $cart_lists = $cart->getCartData();
        $total_val = 0;
        $total_amount = 0;
        if(!empty($cart_lists)) {
            foreach ($cart_lists as $cart_list) {
                if($cart_list->product->tax_free != 'YES') {
                    $total_val = 9.30/100*($cart_list->quantity*$cart_list->unit_price);
                }
                else {
                    $total_val = $cart_list->quantity*$cart_list->unit_price;
                }
            }
            $total_amount += $total_val;
        }
        if(number_format($total_amount, 2, '.', ',') == $request->get('amount')) {
            $order = new Order();
            $order->orderid = $request->get('orderId');
            $order->user_id = auth()->id()?auth()->id():'0';
            $order->firstname = $request->get('payerFname');
            $order->lastname = $request->get('payerLname');
            $order->email = $request->get('payerEmail');
            $order->total_price = $request->get('amount');
            $order->status = 'Payment Completed';
            $order->save();

            $orderId = $order->id;

            if(!empty($cart_lists)) {
                foreach ($cart_lists as $cart_list) {
                    $orderdetails = new Orderdetails();
                    $orderdetails->order_id = $orderId;
                    $orderdetails->product_id = $cart_list->product_id;
                    $orderdetails->quantity = $cart_list->quantity;
                    $orderdetails->size = $cart_list->size;
                    $orderdetails->unit_price = $cart_list->unit_price;
                    $orderdetails->save();

                    $cart_info = Cart::find($cart_list->id);
                    $cart_info->delete();
                }
            }

        }
        else {
            echo 'not done';
            exit;
        }

    }

    public function adminOrders() {
        $where_query= array();
        //$where_query['usertype'] = 'buyer';

        $order_lists = DB::table('orders')
            ->where($where_query)
            ->orderBy('id', 'desc')->get();

        return view('admin.order.allOrders', [
            'order_lists' => $order_lists
        ]);
    }

    public function adminOrderDetails($id, Request $request) {
        $oderInfo = Order::find($id);
        if($request->has('status')) {
            $oderInfo->status = $request->input('status');
            $oderInfo->save();
        }


        $orderDetails = new Orderdetails();
        $orderdetails_lists = $orderDetails->getOrderDetails($id);

        return view('admin.order.order_details', [
            'oderInfo' => $oderInfo,
            'orderdetails_lists' => $orderdetails_lists
        ]);
    }
}
