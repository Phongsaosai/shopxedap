<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartUserService;
use Illuminate\Support\Facades\Session;

class CartUserController extends Controller
{
    protected $cartService;

    public function __construct(CartUserService $cartService){
        $this->cartService = $cartService;
    }
    
    public function index(Request $request){
        $result = $this->cartService->create($request);
        if($result === false){
            return redirect()->back();
        }
        
        return redirect('/carts');
    }

    public function show(){
        $products = $this->cartService->getProduct();
        return view('carts.list', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts')
        ]);
    }

    public function update(Request $request){
        $this->cartService->update($request);
        return redirect('/carts');
    }

    public function remove($id = 0){
        $this->cartService->remove($id);
        return redirect('/carts');
    }

    public function addCart(Request $request){
        $this->cartService->addCart($request);
        return redirect()->back();
    }
}
