
<div class="col-lg-8">
    <div class="shopping__cart__table">
        <table>
            <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @if(Session::has('Cart') !=null)
{{--                {{dd(Session::get('Cart'))}}--}}
                @foreach(Session::get('Cart')->products as $pro)
                    <tr>
                        <td class="product__cart__item">
                            <div class="product__cart__item__pic">
                                <img src="{{asset('storage/avatar'.$pro['productInfo']->img)}}" alt="">
                            </div>
                            <div class="product__cart__item__text">
                                <h6>
                                    {{$pro['productInfo']->name}}
                                </h6>
                                <h5>
                                    {{$pro['productInfo']->sellPrice}}
                                </h5>
                            </div>
                        </td>
                        <td class="quantity__item">
                            <div class="quantity">
                                <div class="pro-qty-2">
                                    <input type="text" value="1">
                                </div>
                            </div>
                        </td>
                        <td class="cart__price">
{{--                            {{$pro->sellPrice}}--}}
                        </td>
                        <td class="cart__close"><i class="fa fa-close"></i></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="continue__btn">
                <a href="#">Continue Shopping</a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="continue__btn update__btn">
                <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4">
    <div class="cart__discount">
        <h6>Discount codes</h6>
        <form action="#">
            <input type="text" placeholder="Coupon code">
            <button type="submit">Apply</button>
        </form>
    </div>
    <div class="cart__total">
        <h6>Cart total</h6>
        <ul>
            <li>Subtotal <span>$ 169.50</span></li>
            <li>Total <span>$ 169.50</span></li>
        </ul>
        <a href="#" class="primary-btn">Proceed to checkout</a>
    </div>
</div>
