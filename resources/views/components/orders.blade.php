<table class="table table-condensed">
    <tbody>
    <tr>
        <th style="width: 10px">#</th>
        <th>Name</th>
        <th>Avatar</th>
        <th>Price</th>
        <th>Qty</th>
        <th>Total</th>
        <th style="width: 40px">Action</th>
    </tr>
    @foreach($orders as $order)
    <tr>
        <td>{{$order->id}}</td>
        <td><a href="">{{$order->product->pro_name}}</a></td>
        <td>
            <img src="{{pare_url_file( $order->product->pro_avatar) ?? "[N/A]"}}" style="height: 80px;width: 80px" alt="">
        </td>
        <td>{{number_format($order->od_price,0,',','.')}} d</td>
        <td>{{$order->od_qty}}</td>
        <td>{{number_format($order->od_price * $order->od_qty,0,',','.')}} d</td>
        <td>
            <a href="{{ route('ajax_admin.transaction.order_item',$order->id) }}" class="label label-danger js-delete-order-item">delete</a>
        </td>
    </tr>
    @endforeach
    </tbody></table>
