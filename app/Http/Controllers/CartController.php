<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Cart;
use PHPUnit\Framework\Constraint\Count;

class CartController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('shop.cart.cart');
    }

    public function addCart(Request $request, $id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        if ($product != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);
            $request->session()->put('Cart', $newCart);
        }
    }
    public function DeleteItemCart(Request $request, $id): Factory|View|Application
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        if (Count($oldCart->products) > 0) {
            $request->session()->put('Cart', $newCart);

        } else {
            $request->session()->forget('Cart');

        }
        return view('shop.cart.cart');

    }

    public function checkout()
    {
        return view('shop.cart.checkout');
    }

}
