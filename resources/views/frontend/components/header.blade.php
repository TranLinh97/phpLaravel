<section class="top-header desktop">
    <div class="container">
        <div class="content">
            <div class="left">
                <a href="{{ route('get.blog.home') }}" title="Chăm sóc khách hàng" rel="nofollow">Tin tức</a>
                <a href="{{--{{ route('get.contact') }}--}}" title="Kiểm tra đơn hàng" rel="nofollow">Liên hệ chúng tôi</a>
            </div>
            <div class="right">
                @if (Auth::check())
                    <a href="">Xin chào {{ Auth::user()->name }}</a>
                    <a href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>
                    <a href="{{  route('get.logout') }}">Đăng xuất </a>
                @else
                    <a href="{{  route('get.register') }}">Đăng ký</a>
                    <a href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
            </div>
        </div>
    </div>
</section>
<section class="top-header mobile">
    <div class="container">
        <div class="content">
            <div class="left">
                <a href="{{--{{ route('get.static.customer_care') }}--}}" title="Chăm sóc khách hàng" rel="nofollow">Chăm sóc khách hàng</a>
                <a href="{{--{{ route('get.user.transaction') }}--}}" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
                @if (Auth::check())
                    <a href="">Xin chào {{ Auth::user()->name }}</a>
                    <a href="{{--{{  route('get.user.dashboard') }}--}}">Quản lý tài khoản</a>
                    <a href="{{  route('get.logout') }}">Đăng xuất </a>
                @else
                    <a href="{{  route('get.register') }}">Đăng ký</a>
                    <a href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
            </div>
        </div>
    </div>
</section>

<div class="commonTop">
    <div id="headers" >
        <div class="container header-wrapper">
            <!--Thay đổi-->
            <div class="logo">
                <a href="/" class="desktop">
                    <img src="{{ url('images/logo.png') }}" style="height: 35px;" alt="Home">
                </a>
                <span class="menu js-menu-cate"><i class="fa fa-list-ul"></i> </span>
            </div>
            <div class="search">

                <form action="{{ $link_search ?? route('get.product.list',['k' => Request::get('k')]) }}" role="search" method="GET">
                    <input type="text" name="k" value="{{ Request::get('k') }}" class="form-control" placeholder="Tìm kiếm sản phẩm ...">
                    <button type="submit" class="btnSearch">
                        <i class="fa fa-search"></i>
                        <span>Tìm kiếm</span>
                    </button>
                </form>
            </div>
            <ul class="right">
                <li>
                    <a href="{{ route('get.shopping.list') }}" title="Giỏ hàng">
                        <i class="la la-shopping-cart"></i>
                        <span class="text">
                            <span class="">Giỏ hàng ({{ \Cart::count() }})</span>
                            <span></span>
                        </span>
                    </a>
                </li>
                <li class="desktop dropdown">
                    <a href="{{route('get.user.dashboard')}}" title="">
                        @if(Auth::user())
                            <img src=" {{ Auth::user()->avatar}} " alt="" style="width:30px;height:30px;border-radius:50%;border:solid white 1px;">
                            <span class="text">
                            <span class=""></span>
                            <span> {{ Auth::user()->name }} </span>
                        </span>

                        @else
                            <img src="https://lh3.googleusercontent.com/proxy/6gUU3WDZUT-QkqJclfPkiJf9dSfN-65LzOxAKvp7MIMF5EogiF1hk6oXgcSV9kuVfskJFUXaun7F6boXNGbMipE5E7uGra4M5_fjETinggPY_oxCvI7_SZrPWjtmdoa5rFHc" alt="" style="width:30px;height:30px;border-radius:50%;border:solid white 1px;">
                        @endif
                    </a>
                    {{-- <div class="dropdown-child">
                            <a href="http://wwww.yourdonain.com/page1.html">Child menu 1</a>
                            <a href="http://wwww.yourdonain.com/page2.html">Child menu 2</a>
                            <a href="http://wwww.yourdonain.com/page3.html">Child menu 3</a>
                            <a href="http://wwww.yourdonain.com/page4.html">Child menu 4</a>
                            <a href="http://wwww.yourdonain.com/page5.html">Child menu 5</a>
                    </div> --}}
                </li>
            </ul>
            <div id="menu-main" class="container" style="display: none;">
                <ul class="menu-list">
                    @foreach($categories as $item)
                        <li>
                            <a href="{{ route('get.category.list', $item->c_slug.'-'.$item->id) }}" title="{{  $item->c_name }}" class="js-open-menu">
                                <img src="{{ pare_url_file($item->c_avatar) }}" alt="{{ $item->c_name }}">
                                <span>{{  $item->c_name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
