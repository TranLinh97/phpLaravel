@extends('layouts.app_master_user')
<section>
    <link rel="stylesheet" href="{{ asset('css/user.min.css') }}">
</section>
@section('content')
    <section class="py-lg-3" style="background: white;padding: 10px">
        <div class="title" style="text-align: center">
            <h2>Sản phẩm yêu thích</h2>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Mã ĐH</th>
                <th class="w-25" scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Avatar</th>
                <th scope="col">Price</th>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $item)
                <tr>
                    <th scope="row">DH{{ $item->id }}</th>
                    <th>{{ $item->pro_name }}</th>
                    <th>
                        <span class="label label-success">{{ $item->category->c_name ?? "[N\A]" }}</span>
                    </th>
                    <th>
                        <img src="{{ pare_url_file($item->pro_avatar) }}" style="width: 80px;height: 100px">
                    </th>
                    <th>{{ number_format($item->pro_price,0,',','.') }} đ</th>
                    <th>
                        <a class="btn btn-default" href="{{  route('get.user.favourite.delete', $item->id) }}">Huỷ bỏ</a>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </section>
@stop
