@extends('admin.parent')
@section('title', '订单管理')
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
            <form action="{{ url('/admin/order') }}" >
                用户名:&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input style="width:500px;margin-top:10px" type="text" name="user"><br/>
                订单编号:&nbsp; &nbsp;<input style="width:500px;margin-top:10px" type="text" name="order_code"><br/><br/>
                <span class="formwrapper">
                    订单状态:
                    <input type="checkbox" name="status[]"  class="imax" value="all">全部 &nbsp; &nbsp;
                    <input type="checkbox" name="status[]" value="0" >未支付
                    <input type="checkbox" name="status[]" value="1" >已支付
                    <input type="checkbox" name="status[]" value="2" >已出票
                    <input type="checkbox" name="status[]" value="3" >已发码
                    <input type="checkbox" name="status[]" value="4" >退款中
                    <input type="checkbox" name="status[]" value="5" >已退款
                    <input type="checkbox" name="status[]" value="6" >已退票
                    <input type="checkbox" name="status[]" value="7" >支付失败
                    <input type="checkbox" name="status[]" value="8" >出票失败
                    <input type="checkbox" name="status[]" value="9" >发码失败
                    <input type="checkbox" name="status[]" value="10" >退款被驳回
                    <input type="checkbox" name="status[]" value="11" >退款失败
                </span><br/><br/>
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
                <th class="head1" style="width:4%">支付总金额</th>
                <th class="head0" style="width:4%">座位信息</th>
                <th class="head1" style="width:4%">订票时间</th>
                <th class="head0" style="width:5%">订单状态</th>
                <th class="head0" style="width:5%">发送验证码</th>
            </tr>
            </thead>
            <tbody>
                @foreach($orderList as $v)
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
                    <td class="center">{{ $v->pay_money/100 }}</td>
                    <td class="center">{{ $v->seats }}</td>
                    <td class="center">{{ date('Y-m-d H:i:s',$v->dateline) }}</td>
                    <td class="center">
                        <?php
                            switch($v->status){
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
                    <td class="center">
                        @if($v->status=='1' || $v->status=='3'|| $v->status=='2'|| $v->status=='8'|| $v->status=='9' || $v->status=='10')
                            <button class="stdbtn btn_lime" onclick="doSend($v->user_id, $v->code )" >发送</button>
                         @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <form action="{{ url('admin/order/send') }}" name="sendForm" method="post">
                {{ csrf_field() }}
            </form>
        </table>
    </div>
    {!! $orderList->appends($where)->render() !!}
    <script src='{{ asset("admin/js/jquery-1.8.3.min.js") }}'></script>
    <script>
        function doSend(id,code)
        {
            if(confirm('确定要发送吗？')){
                var form = document.sendForm;
                var str = "<input type='hidden' name='user_id' value="+id+ ">";
                var str2 ="<input type='hidden' name='user_code' value="+code+ ">";
                $('form').append(str);
                $('form').append(str2);
                form.submit();
            }
        }
    </script>
@endsection
