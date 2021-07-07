<div id="footer">
    <div class="container footer">
        <div class="footer__left">
            <div class="top">
                <div class="item">
                    <div class="title">Về chúng tôi</div>
                    <ul>
                        <li>
                            <a href="{{ route('get.blog.home') }}">Bài viết</a>
                        </li>
                        <li>
                            <a href="{{ route('get.product.list') }}">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{ route('get.register') }}">Đăng ký</a>
                        </li>
                        <li>
                            <a href="{{ route('get.login') }}">Đăng nhập</a>
                        </li>
                    </ul>
                </div>
                <div class="item">
                    <div class="title">Tin tức</div>
                    <ul>
                        @if (isset($menus))
                            @foreach($menus as $menu)
                                <li>
                                    <a title="{{ $menu->mn_name }}"
                                       href="{{ route('get.article.by_menu',$menu->mn_slug.'-'.$menu->id) }}">
                                        {{ $menu->mn_name }}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                        <li><a href="{{--{{ route('get.contact') }}--}}">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="item">
                    <div class="title">Chính sách</div>
                    <ul>
                        <li><a href="{{--{{ route('get.static.shopping_guide') }}--}}">Hướng dẫn mua hàng</a></li>
                        <li><a href="{{--{{  route('get.static.return_policy') }}--}}">Chính sách đổi trả</a></li>
                    </ul>
                </div>
            </div>
            <div class="bot">
                <div class="social">
                    <div class="title">KẾT NỐI VỚI CHÚNG TÔI</div>
                    <p>
                        <a href="" class="fa fa fa-youtube"></a>
                        <a href="" class="fa fa-facebook-official"></a>
                        <a href="" class="fa fa-twitter"></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer__mid">
            <div class="title">Hệ thống cửa hàng</div>
<!--            <div class="image">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3721.4375216920366!2d105.54715101417061!3d21.134979689521245!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134f7d365cb6685%3A0x76dca4c2694056ca!2zxJDDrG5oIEzDoG5nIFbDtW5nIE5nb-G6oWk!5e0!3m2!1svi!2sus!4v1588582545364!5m2!1svi!2sus" width="100%" height="130px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>-->
        </div>
        <div class="footer__right">
            <div class="title">Fanpage của chúng tôi</div>
{{--             <div class="image">--}}
{{--                <div class="fb-page"--}}
{{--                      data-href="https://www.facebook.com/NhacNonStop1/"--}}
{{--                      data-width="380"--}}
{{--                      data-height="240"--}}
{{--                      data-hide-cover="false"--}}
{{--                      data-show-facepile="false" ></div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
{{--<div id="fb-root"></div>--}}
{{--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0" nonce="svqGcd1Y"></script>--}}

