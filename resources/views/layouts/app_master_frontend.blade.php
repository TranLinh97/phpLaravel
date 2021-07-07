<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
        <title>{{ $title_page ?? "Dự án dịch" }}</title>
        <link rel="stylesheet" type="text/css" href="https://codeseven.github.io/toastr/build/toastr.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @yield('css')
{{--        <style>--}}
{{--            .mainmenubtn {--}}
{{--                background-color: red;--}}
{{--                color: white;--}}
{{--                border: none;--}}
{{--                cursor: pointer;--}}
{{--                padding:20px;--}}
{{--            }--}}
{{--            .dropdown {--}}
{{--                position: relative;--}}
{{--                display: inline-block;--}}
{{--            }--}}
{{--            .dropdown-child {--}}
{{--                display: none;--}}
{{--                background-color: black;--}}
{{--                min-width: 200px;--}}
{{--                position: absolute;--}}
{{--                top:45px;--}}
{{--                right:0px;--}}
{{--                z-index: 0;--}}
{{--            }--}}
{{--            .dropdown-child a {--}}
{{--                color: white;--}}
{{--                text-decoration: none;--}}
{{--                display: block;--}}
{{--                position: relative;--}}
{{--            }--}}
{{--            .dropdown:hover .dropdown-child {--}}
{{--                display: block;--}}
{{--            }--}}
{{--            .menu:hover .menu-list{--}}
{{--                display: block;--}}
{{--            }--}}
{{--            .top-header {--}}
{{--                background-color: #f48803;--}}
{{--            }--}}
{{--            #headers {--}}
{{--                background: #f36f21;--}}
{{--            }--}}
{{--            #headers .search form .btnSearch {--}}
{{--                align-items: center;--}}
{{--                background: #f36f21;--}}
{{--                border: 1px solid #f36f21;--}}
{{--                color: #fff;--}}
{{--                display: flex;--}}
{{--                outline: 0;--}}
{{--                padding: 0 10px;--}}
{{--                cursor: pointer;--}}
{{--            }--}}
{{--        </style>--}}
        {{--         Thông báo--}}
        @if(session('toastr'))
            <script>
                var TYPE_MESSAGE = "{{session('toastr.type')}}";
                var MESSAGE = "{{session('toastr.message')}}";
            </script>
        @endif
    </head>
    <body>
        @include('frontend.components.header')
        @yield('content')
        @include('frontend.components.footer')
        <script>
            var DEVICE = '{{device_agent()}}';
        </script>
        @yield('script')
        <script  src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
        <script  src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>
            if(typeof TYPE_MESSAGE != "undefined")
            {
                switch (TYPE_MESSAGE) {
                    case 'success':
                        toastr.success(MESSAGE);
                        break;
                    case 'erro':
                        toastr.error(MESSAGE);
                        break;
                }
            }
            $(".js-show-login").click(function (event){
                event.preventDefault();
                toastr.warning("Bạn phải đăng nhập để thực hiện !");
            })
        </script>
    </body>
</html>
