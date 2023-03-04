@include('shop.header')

<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <h4>Shopping Cart</h4>
                    <div class="">
                        <a href="">Home</a>
                        <a href="">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row" id="list-cart">
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
                            {{--                                                {{dd(Session::get('Cart'))}}--}}
                            @foreach(Session::get('Cart')->products as $pro)
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{asset('storage/'.$pro['productInfo']->img)}}" alt=""
                                                 style="width: 100px;height: 100px">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>
                                                {{$pro['productInfo']->name}}
                                            </h6>
                                            <h5>
                                                {{number_format($pro['productInfo']->sellPrice)."₫"}}
                                            </h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <div class="quantity">
                                            <div class="pro-qty-2">
                                                <input type="text" value="{{$pro['quantity']}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">{{number_format($pro['price'])."₫"}}</td>
                                    <td class="cart__close"><i class="fa fa-close" data-id="{{$pro['productInfo']->id}}" onclick="DeleteItem({{$pro['productInfo']->id}}); "></i></td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">

                    <form action="#">

                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Total <span>{{Session::get('Cart')?number_format(Session::get('Cart')->totalPrice):'0'."₫"}}</span></li>
                    </ul>
                    <a href="{{route('shop.checkout')}}" class="primary-btn">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shopping Cart Section End -->
@push('scripts')
    <script>
        function DeleteItem(id){
            // console.log(id);
            $.ajax({
                url: 'cart/deleteCart/' + id,
                type: 'GET',
            }).done(function (response) {
                RenderCart(response);
            });
        }
        function RenderCart(response){
            $("#list-cart").empty();
            $("#list-cart").html(response);
        }
    </script>

@endpush
@include('shop.footer')
