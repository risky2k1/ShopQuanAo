<?php

namespace App;

class Cart
{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuantity = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->products= $cart->products;
            $this->totalPrice= $cart->totalPrice;
            $this->totalQuantity= $cart->totalQuantity;
        }
    }
    public function addCart($product, $id){
            $newProduct = ['quantity'=> 0 , 'price'=>$product->sellPrice,'productInfo'=>$product];
                if($this->products)
                {
                    if (array_key_exists($id,$this->products))
                    {
                        $newProduct=$this->products[$id];
                    }
                }
                $newProduct['quantity']++;
                $newProduct['price']=$newProduct['quantity']*$product->sellPrice;
                $this->products[$id] = $newProduct;
                $this->totalPrice += $product->sellPrice;
                $this->totalQuantity ++;
    }
    public function DeleteItemCart($id){
//        dd($this->products);
        $this->totalQuantity-=$this->products[$id]['quantity'];
        $this->totalPrice-=$this->products[$id]['price'];
        unset($this->products[$id]);
    }
}
