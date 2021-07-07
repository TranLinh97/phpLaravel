@extends('layouts.app_master_user')
<section>
    <link rel="stylesheet" href="{{ asset('css/user.min.css') }}">
</section>
@section('content')
    <section class="py-lg-3" style="background: white;padding: 10px">
        <div class="title" style="text-align: center">
            <h2>Thông tin đơn hàng</h2>
        </div>
        <form class="form-inline">
            <div class="form-group " style="margin-right: 10px;">
                <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="ID">
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <select name="status" class="form-control">
                    <option value="">Trạng thái</option>
                    <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : "" }}>Tiếp nhận</option>
                    <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : "" }}>Đang vận chuyển
                    </option>
                    <option value="3" {{ Request::get('status') == 3 ? "selected='selected'" : "" }}>Đã bàn giao
                    </option>
                    <option value="-1" {{ Request::get('status') == -1 ? "selected='selected'" : "" }}>Huỷ bỏ</option>
                </select>
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <button type="submit" class="btn btn-pink btn-sm">Tìm kiếm</button>
            </div>
        </form>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Name</th>
                        <th scope="col">Total</th>
                        <th scope="col">Time</th>
                        <th scope="col">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($transactions as $transaction)
                        <tr>
                            <th scope="row">
                                <a href="{{--{{ route('r', $transaction->id) }}--}}">DH {{ $transaction->id }}</a>
                            </th>
                            <th>{{ $transaction->tst_name }}</th>
                            <th>{{ number_format($transaction->tst_total_money,0,',','.') }} đ</th>
                            <th>{{  $transaction->created_at }}</th>
                            <th>
                        <span
                            class="label label-{{ $transaction->getStatus($transaction->tst_status)['class'] }}">
                            {{ $transaction->getStatus($transaction->tst_status)['name'] }}
                        </span>
                            </th>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
    </section>
@stop
