<?php

namespace App\Http\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;
use App\Models\Product;

Class CartComposer
{
    protected $users;

    public function __construct(){

    }

    public function compose(View $view){

        $carts = Session::get('carts');
        if(is_null($carts)){
            return [];
        }

        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
                        ->where('active', 1)
                        ->whereIn('id', $productId)
                        ->get();

        $view->with('products', $products);

    }
}