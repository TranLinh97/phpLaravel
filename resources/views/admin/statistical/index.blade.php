@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Trang quản trị hệ thống website xây dựng website bán đồng hồ</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Tổng số đơn hàng</span>
                        <span class="info-box-number">{{$totalProduct}}<small><a href="{{ route('admin.transaction.index') }}">(Chi tiết)</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Thành viên</span>
                        <span class="info-box-number">{{$totalUser}} <small><a href="{{ route('admin.user.index') }}">Chi tiết</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Bài viết</span>
                        <span class="info-box-number">{{$totalAriticel}} <small><a href="{{ route('admin.article.index') }}">Chi tiết</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Đánh giá</span>
                        <span class="info-box-number">20 <small><a href="">Chi tiết</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <!-- /.row -->
{{--        <div class="row" style="margin-bottom: 15px;">--}}
{{--            <div class="col-sm-8">--}}
{{--                <figure class="highcharts-figure">--}}
{{--                    <div id="container2" data-list-day="{{ $listDay }}" data-money-default={{ $arrRevenueTransactionMonthDefault }} data-money={{ $arrRevenueTransactionMonth }}>--}}
{{--                    </div>--}}
{{--                </figure>--}}
{{--                <div class="col-sm-6">--}}
{{--                    <i class="fa fa-money"><span> Doanh thu tuần: {{ number_format($moneyWeek,0,',','.') }} vnđ</span></i>--}}
{{--                    <i class="fa fa-money"><span> Doanh thu tháng: {{ number_format($moneyMonth,0,',','.') }} vnđ</span></i>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-4">--}}
{{--                <figure class="highcharts-figure">--}}
{{--                    <div id="container"></div>--}}
{{--                </figure>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
                <!-- TABLE: LATEST ORDERS -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Danh sách đơn hàng mới</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Info</th>
                                    <th>Account</th>
                                    <th>payment</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{$transaction->id}}</td>
                                        <td>
                                            <ul>
                                                <li>Name: {{$transaction->tst_name}}</li>
                                                <li>Phone: {{$transaction->tst_phone}}</li>
                                                <li>Email: {{$transaction->tst_email}}</li>
                                                <li>Address: {{$transaction->tst_address}}</li>
                                            </ul>
                                        </td>
                                        <td>
                                            @if($transaction->tst_user_id)
                                                <span class="label label-success">Thành viên</span>
                                            @else
                                                <span class="label label-default">Khách hàng</span>
                                            @endif
                                        </td>
                                        <td>{{number_format($transaction->tst_total_money,0,',','.')}} đ</td>
                                        <td>
                                            <span class="label label-{{$transaction->getStatus($transaction->tst_status)['class']}}">
                                                {{$transaction->getStatus($transaction->tst_status)['name']}}
                                            </span>
                                        </td>
                                        <td>{{$transaction->created_at}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Danh sách đơn hàng</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Top sản phẩm bán chạy </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($topViewProducts as $item)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{ pare_url_file($item->pro_avatar) }}" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">
                                            {{  $item->pro_view }} <i class="fa fa-eye"></i>
                                            <span class="label label-warning pull-right">{{ number_format($item->pro_price,0,',','.') }} đ</span>
                                        </a>
                                        <span class="product-description">{{ $item->pro_name }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-4">
                <!-- PRODUCT LIST -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Top sản phẩm xem nhiều </h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <ul class="products-list product-list-in-box">
                            @foreach($topViewProducts as $item)
                                <li class="item">
                                    <div class="product-img">
                                        <img src="{{ pare_url_file($item->pro_avatar) }}" alt="Product Image">
                                    </div>
                                    <div class="product-info">
                                        <a href="javascript:void(0)" class="product-title">
                                            {{  $item->pro_view }} <i class="fa fa-eye"></i>
                                            <span class="label label-warning pull-right">{{ number_format($item->pro_price,0,',','.') }} đ</span>
                                        </a>
                                        <span class="product-description">{{ $item->pro_name }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-center">
                        <a href="javascript:void(0)" class="uppercase">View All Products</a>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop
{{--@section('script')--}}
{{--    <script src="https://code.highcharts.com/highcharts.js"></script>--}}
{{--    <script src="https://code.highcharts.com/modules/exporting.js"></script>--}}
{{--    <script src="https://code.highcharts.com/modules/export-data.js"></script>--}}
{{--    <script src="https://code.highcharts.com/modules/accessibility.js"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        Highcharts.chart('container', {--}}
{{--            chart: {--}}
{{--                plotBackgroundColor: null,--}}
{{--                plotBorderWidth: null,--}}
{{--                plotShadow: false,--}}
{{--                type: 'pie'--}}
{{--            },--}}
{{--            title: {--}}
{{--                text: 'Browser market shares in January, 2018'--}}
{{--            },--}}
{{--            tooltip: {--}}
{{--                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'--}}
{{--            },--}}
{{--            accessibility: {--}}
{{--                point: {--}}
{{--                    valueSuffix: '%'--}}
{{--                }--}}
{{--            },--}}
{{--            plotOptions: {--}}
{{--                pie: {--}}
{{--                    allowPointSelect: true,--}}
{{--                    cursor: 'pointer',--}}
{{--                    dataLabels: {--}}
{{--                        enabled: true,--}}
{{--                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',--}}
{{--                        connectorColor: 'silver'--}}
{{--                    }--}}
{{--                }--}}
{{--            },--}}
{{--            series: [{--}}
{{--                name: 'Share',--}}
{{--                data: [--}}
{{--                    { name: 'Chrome', y: 61.41 },--}}
{{--                    { name: 'Internet Explorer', y: 11.84 },--}}
{{--                    { name: 'Firefox', y: 10.85 },--}}
{{--                    { name: 'Edge', y: 4.67 },--}}
{{--                    { name: 'Safari', y: 4.18 },--}}
{{--                    { name: 'Other', y: 7.05 }--}}
{{--                ]--}}
{{--            }]--}}
{{--        });--}}
{{--    </script>--}}
{{--@stop--}}
