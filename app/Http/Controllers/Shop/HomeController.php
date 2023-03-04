<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private Product $models;
    public function __construct()
    {
        $this->models = new Product();
    }
    public function home()
    {
        //        $product = Product::query()->get();

        $productNew = DB::table('products')
            ->select('*')
            ->where('type', '=', 1)
            ->get();
        $productHot = DB::table('products')
            ->select('*')
            ->where('type', '=', 2)
            ->get();
        return view('shop.product', [
            'productN'=>$productNew,
            'productH'=>$productHot,
        ]);
    }
}
