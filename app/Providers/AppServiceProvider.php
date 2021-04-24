<?php

namespace App\Providers;
use Illuminate\Support\Facades\DB;
use App\Models\cart;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Config;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        /*$cart = new cart();
        $cart_lists = $cart->getAllCartData();


        view()->share('global_cart_lists', $cart_lists);*/

        /*$cart = new cart();
        $cart_lists = $cart->getCartData();*/
    }
}
