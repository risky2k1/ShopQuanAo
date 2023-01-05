<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    protected Product $modelP;

    protected Category $modelC;
    protected Brand $modelB;

    public function __construct()
    {
        $this->modelP=new Product();
        $this->modelC=new Category();
    }
    public function index(){

        $product= $this->modelP->get();
        $category = $this->modelC->all();
//        $brand=$this->modelB->all();
        return view('shop.shop',[
            'product'=>$product,
            'category'=>$category,
        ]);
    }
}
