<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Menu\MenuService;

class MenuUserController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService){
        $this->menuService = $menuService;
    }


    public function index(Request $request, $id, $slug = ''){
        $menu = $this->menuService->getId($id);
        // $menu = $this->menuService->getSlug($slug);
        
        $products = $this->menuService->getProduct($menu, $request);

        return view('menu',[
            'title' => $menu->name,
            'products' => $products,
            'menu' => $menu
        ]);
    }
}
