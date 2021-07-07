@extends('layouts.app_master_frontend')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/user_view_product.css') }}">
    <link rel="stylesheet" href="{{ asset('css/product_insights.min.css') }}">
    <style>

        .filter-tab .active a {
            color: red;
        }
    </style>
@stop
@section('content')
    <div class="container">
        <div class="product-list">
            <div class="left">
                @include('frontend.pages.product.include._inc_sidebar')
            </div>
            <div class="right">
                <div class="breadcrumb">
                    <ul>
                        <li >
                            <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                        </li>
                        <li >
                            <a href="" title="Đồng hồ chính hãng"><span itemprop="title"> {{$category->c_name ?? 'Sản phẩm'}}  </span></a>
                        </li>
                    </ul>
                </div>
{{--                 <div class="filter-tab">--}}
{{--                    <ul>--}}
{{--                        @for( $i = 1; $i <= 5 ; $i++ )--}}
{{--                        <li >--}}
{{--                            <a href="{{ request()->fullUrlWithQuery(['price' => $i]) }}">--}}
{{--                                Giá < {{$i * 2}}Triệu--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        @endfor--}}
{{--                        <li>--}}
{{--                            <a href="{{ request()->fullUrlWithQuery(['price' => 6]) }}">Lớn hơn 10 triệu</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                 </div>--}}
                <div class="filter-tab">
                    <ul>
                        <li class="{{ Request::get('price') == 1 ? "active" : "" }}">
                            <a href="{{ request()->fullUrlWithQuery(['price' =>  1]) }}">
                                Giá < 2 triệu
                            </a>
                        </li>
                        <li class="{{ Request::get('price') == 2 ? "active" : "" }}">
                            <a href="{{ request()->fullUrlWithQuery(['price' =>  2]) }}">
                                Giá từ 2 - 5 triệu
                            </a>
                        </li>
                        <li class="{{ Request::get('price') == 3 ? "active" : "" }}">
                            <a href="{{ request()->fullUrlWithQuery(['price' =>  3]) }}">
                                Giá từ 5 - 10 triệu
                            </a>
                        </li>
                        <li class="{{ Request::get('price') == 4 ? "active" : "" }}">
                            <a href="{{ request()->fullUrlWithQuery(['price' =>  4]) }}">
                                Giá từ 10 - 20 triệu
                            </a>
                        </li>
                        <li class="{{ Request::get('price') == 5 ? "active" : "" }}">
                            <a href="{{ request()->fullUrlWithQuery(['price' =>  5]) }}">
                                Giá > 20 triệu
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="order-tab">
                    <span class="total-prod">Tổng số: {{ $products->total() }} sản phẩm Tính năng</span>
                    <div class="sort">
                        <div class="item">
                            <span class="title js-show-sort">Sắp xếp <i class="fa fa-caret-down"></i></span>
                           {{-- <ul>
                                <li><a class="{{ Request::get('sort') == 'desc' ? "active" : "" }}" href="{{ request()->fullUrlWithQuery(['sort'=> 'desc']) }}">Mới nhất</a></li>
                                <li><a class="{{ Request::get('sort') == 'asc' ? "active" : "" }}" href="{{ request()->fullUrlWithQuery(['sort'=> 'asc']) }}">Cũ nhất</a></li>
                            </ul>--}}
                        </div>
                    </div>
                </div>
                <div class="group">
                    @foreach($products as $product)
                        @include('frontend.components.product_item', ['product' => $product])
                    @endforeach
                </div>
                <div style="display: block;">
                    {!! $products->appends($query ?? [])->links() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script src="{{ asset('css/product_search.min.css') }}" type="text/javascript"></script>
    <script src="{{ asset('js/product_search.js') }}" type="text/javascript"></script>
@stop
