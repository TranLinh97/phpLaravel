<style type="text/css">
    .item__content .active a {
        color: red;
    }
</style>
<div class="filter-sidebar">
    {{-- <div class="item">
        <div class="item__title">Thương hiệu</div>
        <div class="item__content">
            <ul>
                <li>
                    <label>
                        <input type="checkbox" value="594">
                        <h2><span>Đồng hồ Philippe Auguste</span></h2>
                    </label>
                </li>

                <li>
                    <label>
                        <input type="checkbox" value="563">
                        <h2><span>Đồng hồ Epos Swiss</span></h2>
                    </label>
                </li>
            </ul>
        </div>
    </div> --}}
    @if(isset($country))
        <div class="item">
            <div class="item__title">Xuất xứ</div>
            <div class="item__content">
                <ul>
                    @foreach($country as $key => $item)
                        <li class="{{ Request::get('country') == $key ? "active" : "" }} js-param-search" data-param="country={{ $key }}">
                            <a href="{{ request()->fullUrlWithQuery(['country'=> $key]) }}">
                                <span>{{ $item }}</span>
{{--                                <img src="{{ pare_url_file($item->logo ?? '') ?? '/images/no-image.jpg' }}" onerror="this.onerror=null;this.src='/images/no-image.jpg';"--}}
{{--                                     alt="" class="img-thumbnail" style="width: 12px;height: 12px;">--}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
     @if (isset($attributes))
        @foreach($attributes as $key => $attribute)
            <div class="item">
                <div class="item__title">{{ $key }}</div>
                <div class="item__content">
                    <ul>
                        @foreach($attribute as $item)
                            <li class=" js-param-search {{ Request::get('attr_'.$item['atb_type']) == $item['id'] ? "active" : "" }}"
                            data-param="attr_{{ $item['atb_type'] }}={{ $item['id'] }}">
                                <a href="{{ request()->fullUrlWithQuery(['attr_'.$item['atb_type'] => $item['id']]) }}">
                                    <span>{{ $item['atb_name'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    @endif
    <div class="item">
        <div class="item__title">{{--Đánh giá--}}</div>
{{--        <div class="item__content ratings">--}}
{{--            <ul>--}}
{{--                --}}{{-- @for ($i = 5 ; $i >0 ; $i--)--}}
{{--                    --}}
{{--                @endfor --}}
{{--                <li class="{{ Request::get('rv') == 1 ? "active" : "" }}">--}}
{{--                    <a href="{{ request()->fullUrlWithQuery(['rv'=> 1]) }}">--}}
{{--                            <span>--}}
{{--                                @for($j = 1 ; $j <= 5 ; $j ++)--}}
{{--                                    <i class="la la-star {{ $j <= 1 ? 'active' : '' }}"></i>--}}
{{--                                @endfor--}}
{{--                                {{ 1 < 5 ? 'Trở lên' : '' }}--}}
{{--                            </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ Request::get('rv') == 2 ? "active" : "" }}">--}}
{{--                    <a href="{{ request()->fullUrlWithQuery(['rv'=> 2]) }}">--}}
{{--                            <span>--}}
{{--                                @for($j = 1 ; $j <= 5 ; $j ++)--}}
{{--                                    <i class="la la-star {{ $j <= 2 ? 'active' : '' }}"></i>--}}
{{--                                @endfor--}}
{{--                                {{ 2 < 5 ? 'Trở lên' : '' }}--}}
{{--                            </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ Request::get('rv') == 3 ? "active" : "" }}">--}}
{{--                    <a href="{{ request()->fullUrlWithQuery(['rv'=> 3]) }}">--}}
{{--                            <span>--}}
{{--                                @for($j = 1 ; $j <= 5 ; $j ++)--}}
{{--                                    <i class="la la-star {{ $j <= 3 ? 'active' : '' }}"></i>--}}
{{--                                @endfor--}}
{{--                                {{ 3 < 5 ? 'Trở lên' : '' }}--}}
{{--                            </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ Request::get('rv') == 4 ? "active" : "" }}">--}}
{{--                    <a href="{{ request()->fullUrlWithQuery(['rv'=> 4]) }}">--}}
{{--                            <span>--}}
{{--                                @for($j = 1 ; $j <= 5 ; $j ++)--}}
{{--                                    <i class="la la-star {{ $j <= 4 ? 'active' : '' }}"></i>--}}
{{--                                @endfor--}}
{{--                                {{ 4 < 5 ? 'Trở lên' : '' }}--}}
{{--                            </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li class="{{ Request::get('rv') == 5 ? "active" : "" }}">--}}
{{--                    <a href="{{ request()->fullUrlWithQuery(['rv'=> 5]) }}">--}}
{{--                            <span>--}}
{{--                                @for($j = 1 ; $j <= 5 ; $j ++)--}}
{{--                                    <i class="la la-star {{ $j <= 5 ? 'active' : '' }}"></i>--}}
{{--                                @endfor--}}
{{--                                {{ 5 < 5 ? 'Trở lên' : '' }}--}}
{{--                            </span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
    </div>
</div>
