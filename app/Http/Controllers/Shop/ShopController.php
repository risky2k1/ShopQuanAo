<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    protected Product $modelP;

    protected Category $modelC;
    protected Brand $modelB;

    public function __construct()
    {
        $this->modelP = new Product();
        $this->modelC = new Category();
    }

    public function index(Request $request)
    {
        $product = $this->modelP->get();
        $category = $this->modelC->all();
        return view('shop.shop', [
            'product' => $product,
            'category' => $category,
        ]);
    }

    public function productDetail($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
//        dd($product);
        return view('shop.productDetail', [
            'product' => $product,
        ]);
    }
}
