@extends('admin.parent')
@section('title', '退款管理')
@section('content')
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/custom/tables.js') }}"></script>

    <div id="contentwrapper" class="contentwrapper">
        @if (session('msg'))
            <div class="notibar msgsuccess">
                <a class="close"></a>
                <p>{{ session('msg') }}</p>
            </div>
        @endif
        @if (session('error'))
            <div class="notibar msgerror">
                <a class="close"></a>
                <p>{{ session('error') }}</p>
            </div>
        @endif
        <div class="tableoptions"><br/>
            <form action="{{ url('/admin/order/refund') }}" >
                用户名:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:500px;margin-top:10px" type="text" name="user"><br/>
                订单编号:&nbsp; &nbsp;<input style="width:500px;margin-top:10px" type="text" name="order_code"><br/><br/>
                <input type="submit" value="搜索">
            </form>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
            <thead>
            <tr>
                <th class="head1" style="width:3%">编号</th>
                <th class="head1" style="width:3%">订单编号</th>
                <th class="head0" style="width:3%">用户</th>
                <th class="head1" style="width:6%">影片</th>
                <th class="head0" style="width:8%">影院</th>
                <th class="head1" style="width:4%">影厅</th>
                <th class="head0" style="width:2%">场次</th>
                <th class="head1" style="width:2%">验证码</th>
                <th class="head0" style="width:4%">订单总金额</th>
                <th class="head0" style="width:4%">座位信息</th>
                <th class="head1" style="width:4%">订票时间</th>
                <th class="head0" style="width:8%">订单状态</th>
            </tr>
            </thead>
            <tbody>
                @foreach($refundList as $v)
                <tr>
                    <td>{{ $v->order_id }}</td>
                    <td>{{ $v->order_code }}</td>
                    <td>{{ $v->userName }}</td>
                    <td>{{ $v->movieName  }}</td>
                    <td>{{ $v->cinemaName }}</td>
                    <td>{{ $v->roomName }}</td>
                    <td>{{ $v->round_id }}</td>
                    <td>{{ $v->code }}</td>
                    <td class="center">{{ $v->total_money/100 }}</td>
                    <td class="center">{{ $v->seats }}</td>
                    <td class="center">{{ date('Y-m-d H:i:s',$v->dateline) }}</td>
                    <td class="center">
                        <button class="stdbtn btn_red" onclick="doRefund({{$v->order_id}})">退款</button>
                        <button class="stdbtn btn_orange" onclick="doReject({{$v->order_id}})">拒绝</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="" method='post' name='refundForm' style='display:none'>
            <input type="hidden" name="type" value="1">
            {{ csrf_field() }}
            {{ method_field("PUT") }}
        </form>
        <form action="" method='post' name='rejectForm' style='display:none'>
            <input type="hidden" name="type" value="0">
            {{ csrf_field() }}
            {{ method_field("PUT") }}
        </form>
    </div>
    {!! $refundList->appends($where)->render() !!}
    <script>
        function doRefund(id)
        {
            if(confirm('确定要退款吗？')){
                var form = document.refundForm;
                form.action = "{{ url('admin/order') }}"+'/'+id;
                form.submit();
            }
        }
        function doReject(id)
        {
            if(confirm('确定要拒绝吗？')){
                var form = document.rejectForm;
                form.action = "{{ url('admin/order') }}"+'/'+id;
                form.submit();
            }
        }
    </script>
@endsection
