<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartUserService;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartUserService $cart){
        $this->cart = $cart;
    }

    public function index(){
        return view('admin.carts.customer', [
            'title' => 'Danh sách đơn hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }
}
