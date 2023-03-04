@extends('shop.index')

@section('content')
<div class="row product__filter">

    @foreach ($productN as $pro)
        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix new-arrivals">
            <div class="product__item">
                <div class="product__item__pic set-bg"
                     data-setbg="{{asset('/storage').'/'.$pro->img}}"
                >
                    <span class="label"></span>
                    <ul class="product__hover">
                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6>
                        {{$pro->name}}
                    </h6>
                    <a href="#" class="add-cart">+ Add To Cart</a>
                    <div class="rating">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <h5>
                        {{$pro->sellPrice}}
                    </h5>
                    <div class="product__color__select">
                        <label for="pc-1">
                            <input type="radio" id="pc-1">
                        </label>
                        <label class="active black" for="pc-2">
                            <input type="radio" id="pc-2">
                        </label>
                        <label class="grey" for="pc-3">
                            <input type="radio" id="pc-3">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($productH as $pro)
        <div class="col-lg-3 col-md-6 col-sm-6 col-md-6 col-sm-6 mix hot-sales">
            <div class="product__item">
                <div class="product__item__pic set-bg"
                     data-setbg="{{asset('/storage').'/'.$pro->img}}"
                >
                    <span class="label"></span>
                    <ul class="product__hover">
                        <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                        <li><a href="#"><img src="img/icon/compare.png" alt=""> <span>Compare</span></a></li>
                        <li><a href="#"><img src="img/icon/search.png" alt=""></a></li>
                    </ul>
                </div>
                <div class="product__item__text">
                    <h6>
                        {{$pro->name}}
                    </h6>
                    <a href="#" class="add-cart">+ Add To Cart</a>
                    <div class="rating">
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <h5>
                        {{$pro->sellPrice}}
                    </h5>
                    <div class="product__color__select">
                        <label for="pc-1">
                            <input type="radio" id="pc-1">
                        </label>
                        <label class="active black" for="pc-2">
                            <input type="radio" id="pc-2">
                        </label>
                        <label class="grey" for="pc-3">
                            <input type="radio" id="pc-3">
                        </label>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection
