@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/home_insights.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@stop
@section('content')
    <div id="slider">
        <div class="imageSlide js-banner owl-carousel" >
            @if($slides)
            @foreach($slides as $item)
                <div>
                    <a href="{{ $item->sd_link }}" title="{{ $item->sd_title }}">
                        <img style="position: relative;" alt="Đồ án tốt nghiệp" src="{{ pare_url_file($item->sd_image) }}"  style="max-width: 100%;height: 300px;" class="" />
                    </a>
                </div>
            @endforeach
                @endif

        </div>
    </div>
{{--    <div id="content-slide">--}}
{{--        <div class="spinner">--}}
{{--            @include('frontend.pages.home.include._inc_slide',['slides'=>$slides])--}}
{{--            <div class="rect1"></div>--}}
{{--            <div class="rect2"></div>--}}
{{--            <div class="rect3"></div>--}}
{{--            <div class="rect4"></div>--}}
{{--            <div class="rect5"></div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="container" id="before-slide">
{{--         <div class="logo-partner">--}}
{{--            @for($i = 0; $i < 6; $i++)--}}
{{--                <div class="item">--}}
{{--                    <a href="#" title="Đồng hồ Atlantic Swiss">--}}
{{--                        <img class="lazyload" src="https://www.dangquangwatch.vn/view/Pic/Jacques.jpg" data-src="" alt="Atlantic Swiss" />--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            @endfor--}}
{{--        </div>--}}
        <div class="product-one">
            <div class="top">
                <a href="#" title="" class="main-title">SẢN PHẨM BÁN CHẠY</a>

{{--                 <ul class="top__tab">--}}
{{--                    <li data-id="proNewst1" class="active"><a href="javascript://" title="">Tất cả</a></li>--}}
{{--                    <li data-id="proNewst2"><a href="javascript://" title=""><h2>Đồng hồ nam</h2></a></li>--}}
{{--                    <li data-id="proNewst3"><a href="javascript://" title=""><h2>Đồng hồ nữ</h2></a></li>--}}
{{--                </ul>--}}
            </div>
            <div class="bot">
                {{--                @for($i = 1 ; $i <= 5; $i ++)--}}
                {{--                    <div></div>--}}
                {{--                @endfor--}}
                @if ($event1)
                    <div class="left">
                        <div class="image">
                            <a href="{{  $event1->e_link }}" title="" class="{{ $event1->e_name }}" target="_blank">
                                <img style="height: 310px;" class="lazyload lazy" alt="{{ $event1->e_name }}" src="{{  asset('images/preloader.gif') }}"  data-src="{{  pare_url_file($event1->e_banner) }}" />
                            </a>
                        </div>
                    </div>
                @endif
                <div class="right js-product-one owl-carousel owl-theme owl-custom">
                        @foreach($productsPay as $product)
                            <div class="item">
                                @include('frontend.components.product_item',[ 'product' => $product])
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
        @if ($event2)
            @include('frontend.pages.home.include._inc_flash_sale')
        @endif

         <div class="product-two">
            <div class="top">
            </div>
            <div class="bot">
                @for($i=0; $i < 4; $i++)
                    <div class="item">
                        @include('frontend.components.product_item')
                    </div>
                @endfor
            </div>
        </div>
        <div class="product-three">
            <div class="top">
                <a href="#" title="" class="main-title">SẢN PHẨM MỚI</a>
            </div>
            <div class="bot">
                @if ($event3)
                    <div class="left">
                        <div class="image">
                            <a href="{{  $event3->e_link }}" title="" class="{{ $event3->e_name }}" target="_blank">
                                <img style="height: 310px;" class="lazyload lazy" alt="{{ $event3->e_name }}" src="{{  asset('images/preloader.gif') }}"  data-src="{{  pare_url_file($event3->e_banner) }}" />
                            </a>
                        </div>
                    </div>
                @endif
                <div class="right js-product-one owl-carousel owl-theme owl-custom">
                    @if (isset($productsNew))
                        @foreach($productsNew as $product)
                            <div class="item">
                                @include('frontend.components.product_item',['product' => $product])
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="product-two">
            <div class="top">
                <a href="#" class="main-title">SẢN PHẨM NỔI BẬT</a>
            </div>
            <div class="bot">
                @if (isset($productsHot))
                    @foreach($productsHot as $product)
                        <div class="item">
                            @include('frontend.components.product_item',['product' => $product])
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="product-two" id="product-recently"></div>
        @if ($categoriesHot)
            @foreach($categoriesHot as $category)
                <div class="product-five">
                    <div class="top">
                        <a href="#" class="main-title">{{ $category->c_name }}</a>
                    </div>
                    <div class="bot js-product-5 owl-carousel owl-theme owl-custom">
                        @if (isset($category->products))
                            @foreach($category->products as $product)
                                <div class="item">
                                    @include('frontend.components.product_item',['product' => $product])
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
        @include('frontend.pages.home.include._inc_article')
    </div>
@stop
@section('script')
    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/home.css')}}"></script>
<!--        --><?php //$js = file_get_contents('js/home.js');echo $js;?>
@stop
