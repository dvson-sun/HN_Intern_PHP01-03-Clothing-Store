@extends('store.master.master')
@section('title','Clothing Store - Home')
@section('content')
<!-- main -->
<div id="colorlib-featured-product">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <a href="shop.html" class="f-product-1">
                    <div class="desc">
                        <h2> {{ __('For') }} <br>{{ __('Man') }}</h2>
                    </div>
                </a>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <a href="" class="f-product-2 fd-2">
                            <div class="desc">
                                <h2> <br>{{ __('Dress')}}</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="f-product-2 fd-3">
                            <div class="desc">
                                <h2>{{ __('Sale')}} <br> 20%</h2>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-12">
                        <a href="" class="f-product-2 fd-4">
                            <div class="desc">
                                <h2>{{ __('Shoes') }}</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2><span>{{ __('Featured Product')}}</span></h2>
                <p> {{ __('featured_prd_description') }}</p>
            </div>
        </div>
        <div class="row">
            @foreach ($featuredProducts as $item)
            <div class="col-md-3 text-center">
                <div class="product-entry">
                    <div class="product-img" style="background-image: url(../uploads/{{ $item->images->first()['name']}});">
                        <div class="cart">
                            <p>
                                <span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
                                <span><a href="#"><i class="icon-eye"></i></a></span>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="#">{{ $item['name'] }}</a></h3>
                        <p class="price"><span>{{ number_format($item['price']) }} VND</span></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="colorlib-shop">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center colorlib-heading">
                <h2><span>{{ __('New Product')}}</span></h2>
                <p> {{ __('new_prd_description') }}</p>
            </div>
        </div>
        <div class="row">
            @foreach ($newProducts as $item)
            <div class="col-md-3 text-center">
                <div class="product-entry">
                    <div class="product-img" style="background-image: url(../uploads/{{ $item->images->first()['name']}});">
                        <p class="tag"><span class="new">New</span></p>
                        <div class="cart">
                            <p>
                                <span class="addtocart"><a href="#"><i class="icon-shopping-cart"></i></a></span>
                                <span><a href="#"><i class="icon-eye"></i></a></span>
                            </p>
                        </div>
                    </div>
                    <div class="desc">
                        <h3><a href="#">{{ $item['name'] }}</a></h3>
                        <p class="price"><span></span></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
