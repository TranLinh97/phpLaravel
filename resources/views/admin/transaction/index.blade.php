@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý đơn hàng</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.transaction.index')}}">Transaction</a></li>
            <li class="active"> List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-title">
                    <form class="form-inline">
                        @csrf
                        <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="ID">
                        <input type="text" class="form-control" value="{{ Request::get('email') }}" name="email" placeholder="Email ...">
                        <select name="type" class="form-control">
                            <option value="0">Phân loại khách</option>
                            <option value="1" {{--{{ Request::get('type') == 1 ? "selected='selected'" : "" }}--}}>Thành viên</option>
                            <option value="2" {{--{{ Request::get('type') == 2 ? "selected='selected'" : "" }}--}}>Khách</option>
                        </select>
                        <select name="status" class="form-control">
                            <option value="">Trạng thái</option>
                            <option value="1" {{--{{ Request::get('status') == 1 ? "selected='selected'" : "" }}--}}>Tiếp nhận</option>
                            <option value="2" {{--{{ Request::get('status') == 2 ? "selected='selected'" : "" }}--}}>Đang vận chuyển</option>
                            <option value="3" {{--{{ Request::get('status') == 3 ? "selected='selected'" : "" }}--}}>Đã bàn giao</option>
                            <option value="-1" {{--{{ Request::get('status') == -1 ? "selected='selected'" : "" }}--}}>Huỷ bỏ</option>
                        </select>
                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                        <button type="submit" name="export" value="true" class="btn btn-info">
                            <i class="fa fa-save"></i> Export
                        </button>
                    </form>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Info</th>
                                <th>Account</th>
                                <th>payment</th>
                                <th>Status</th>
                                <th>Time</th>
                                <th>Active</th>
                            </tr>
                            @if(isset($transactions))
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
                                        <td>
                                            <a data-id="{{$transaction->id}}" href="{{route('ajax.admin.transaction.detail',$transaction->id)}}" class=" btn btn-xs btn-info js-view-transaction"><i class="fa fa-eye"></i>View</a>
                                            <div class="btn-group">
                                                <button class="btn btn-success btn-xs dropdown-toggle " type="button" data-toggle="dropdown">
                                                    Dropdown
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li> <a href="{{route('admin.transaction.delete',$transaction->id)}}"><i class="fa fa-trash"></i> Delete</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="{{ route('admin.action.transaction',['process',$transaction->id]) }}">Đang bàn giao</a></li>
                                                    <li><a href="{{ route('admin.action.transaction',['success',$transaction->id]) }}">Đã bàn giao</a></li>
                                                    <li><a href="{{ route('admin.action.transaction',['cancel',$transaction->id]) }}">Hủy</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box-footer">
                {!! $transactions->appends($query)->links() !!}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
    <div class="modal fade fade" id="modal-view-transaction">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" style="text-align: center">Chi tiet don hang <b id="idTransaction"></b></h4>
                </div>
                <div class="modal-body">
                    <div class="content">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop
