<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartUserService;
use App\Models\Customer;

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

    public function show(Customer $customer){
        $carts = $this->cart->getProductForCart($customer);
        return view('admin.carts.detail', [
            'title' => 'Chi tiết đơn hàng' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
