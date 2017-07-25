@extends('admin.parent')
@section('title', '订单管理')
@section('content')
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/custom/tables.js') }}"></script>

    <div id="contentwrapper" class="contentwrapper">

        <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
            <thead>
            <tr>
                <th class="head1" style="width:2%">验证码</th>
                <th class="head1" style="width:3%">编号</th>
                <th class="head1" style="width:3%">订单编号</th>
                <th class="head0" style="width:3%">用户</th>
                <th class="head1" style="width:6%">影片</th>
                <th class="head0" style="width:8%">影院</th>
                <th class="head1" style="width:4%">影厅</th>
                <th class="head0" style="width:2%">场次</th>
                <th class="head0" style="width:4%">订单总金额</th>
                <th class="head0" style="width:4%">座位信息</th>
                <th class="head1" style="width:4%">订票时间</th>
                <th class="head0" style="width:5%">订单状态</th>

            </tr>
            </thead>
            <tbody>

                <tr>
                    <td><b>{{ $order->code }}</b></td>
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->order_code }}</td>
                    <td>{{ $order->userName }}</td>
                    <td>{{ $order->movieName  }}</td>
                    <td>{{ $order->cinemaName }}</td>
                    <td>{{ $order->roomName }}</td>
                    <td>{{ $order->round_id }}</td>
                    <td class="center">{{ $order->total_money/100 }}</td>
                    <td class="center">{{ $order->seats }}</td>
                    <td class="center">{{ date('Y-m-d H:i:s',$order->dateline) }}</td>
                    <td class="center">
                        <?php
                            switch($order->status){
                                case 0:
                                    echo '未支付';
                                    break;
                                case 1:
                                    echo '已支付';
                                    break;
                                case 2:
                                    echo '已出票';
                                    break;
                                case 3:
                                    echo '已发码';
                                    break;
                                case 4:
                                    echo '退款中';
                                    break;
                                case 5:
                                    echo '已退款';
                                    break;
                                case 6:
                                    echo '已退票';
                                    break;
                                case 7:
                                    echo '支付失败';
                                    break;
                                case 8:
                                    echo '出票失败';
                                    break;
                                case 9:
                                    echo '发码失败';
                                    break;
                                case 10:
                                    echo '退款被驳回';
                                    break;
                                case 11:
                                    echo '退款失败';
                                    break;
                            }
                        ?>
                    </td>

                </tr>
            </tbody>
        </table>
        <br>
        <form action="{{ url('/admin/code/check') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" value="{{ $order->code }}" name="code">
            <button>验证</button>
        </form>
    </div>
@endsection
