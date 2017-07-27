@extends('home.parent')
@section('title', '在线选座')
@section('content')
<link rel="stylesheet" href="{{ asset('home/Css/detail.css') }}"/>
<link rel="stylesheet" href="{{ asset('home/Css/jquery.jscrollpane.codrops.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ asset('home/Css/jquery.seat-charts.css') }}">
<style>
    div.seatCharts-seat{
        width:30px;
        height:30px;
        padding:5px;
        cursor:pointer;
    }
    div.seatCharts-cell{
        width:30px;
        height:30px;
        padding:5px;

    }
    .cc{
        background-color: red;
        color: red;
    }
</style>
<script>
    Core.movieId = 48522;
    Core.cinemaId = 1655;
    Core.date = '20170720';
    Core.city='beijing';
</script>
<script type="text/javascript">
    Core.maxSeatNum=4;//接入新空气，修改最多选择座位数
</script>


{{--<form id="seatForm" action="" method="">--}}
    <div class="wrap">
        <div class="procedure2 mt10" id="seatArea"></div>
        <div class="seatBox">
            <div class="middle seatWarp clearfix">
                <div class="seatWarp_hall">
                    <div class="seat_info" style=" position:relative;zoom:1;">
                        <div class="legend clearfix">
                            <span class="able">可购座位</span>
                            <span class="sel">您选择的座位</span>
                            <span class="disable">已售出座位</span>
                            {{--<span class="ql">情侣座位</span>--}}
                            {{--<span class="shake">振动座位</span>--}}
                        </div>
                        <div class="hall_name">{{ $cinema->cinema_name.$room->name }}</div>



{{--座位表--}}

<div id="loading_seat" class="loading_seat" style="height: auto; padding: 0px;"><input type="hidden" value="200" id="errorCode">
    <input type="hidden" value="wy_seat_225d01f5f0c82c" name="lockFlagId" id="lockFlagId">
    <div class="seat_area jspScrollable" id="seat_area" style="height: 510px; overflow: hidden; padding: 0px; width: 680px;">
{{--引入--}}

        <div id='seat-map'></div>
        {{--<button>点击订票</button>--}}






{{--引入--}}

    </div>
</div>


{{----}}


                    </div>
                    <div class="bot">
                        <ul>
                            <li>使用说明：</li>
                            <li>1、选择你要预订的座位单击选中，重复点击取消所选座位；</li>
                            <li>2、每笔订单最多可选购4张电票；情侣座不单卖；</li>
                            <li>3、选座时，请尽量选择相邻座位，请不要留下单个座位；</li>
                            <li>4、部分影院3D眼镜需要押金，请观影前准备好现金；</li>
                            <li>5、点击"立即购票"进入付款页面后，请在15分钟内完成支付，超时系统将释放你选定的座位；</li>
                            <li>6、出票成功后，如无使用问题，不得退换；</li>
                            <li>7、购票过程产生的各项咨询，请拨打0571-26201163。</li>
                        </ul>
                    </div>
                </div>
                <div class="seatWarp_buy">
                    <div class="choose_movie clearfix">
                        <div class="poster"><img src="{{ asset('upload/admin/'.$movie->poster)}}" width="70" height="93" alt="{{ $movie->name }}" /></div>
                        <dl class="info">
                            <dt><a href="{{ url('movie/'.$movie->movie_id) }}" class="imp">{{ $movie->name }}</a></dt>
                            <dd>版本：@if($movie->d3) 3D @else 2D @endif</dd>
                            <dd>片长：<?php $h = floor(($round->overtime - $round->starttime)/60/60);$sm =  $round->overtime - $round->starttime -$h*3600; $m = floor($sm/60); echo $h.'小时'.$m.'分钟'?> </dd>
                            <dd>单价：<span class="imp fb">¥<em class="f16 fb" id="price">{{ $round->nprice/100 }}</em></span></dd>
                        </dl>
                    </div>
                    <dl class="choose_cinema mt15 clearfix">
                        <dt>影院：</dt>
                        <dd>{{ $cinema->cinema_name }}</dd>
                    </dl>
                    <dl class="choose_cinema clearfix">
                        <dt>场次：</dt>
                        <dd>
                            <div class="sech">
                                <div class="date_box">
                                    <div class="fb f14">{{ date('m-d',$round->starttime) }}</div>
                                    <div><?php $m = date('N',$round->starttime);  $weekArr=array("星期日","星期一","星期二","星期三","星期四","星期五","星期六"); echo $weekArr[$m];?></div>
                                </div>
                                <div class="time_box">
                                    <div class="f20 fb" style="font-size:30px;padding-top: 10px ">{{ date('H:i',$round->starttime) }}</div>
                                    <div class="changeScreen" id="changeScreen">
                                        <a href="javascript:;" class="sBar" id="sBar" tid="593416468"></a>
                                        <div class="sList" id="sList">

                                            <div id="change_wrap">
                                                <table cellspacing="0" cellpadding="0" border="0" class="cinemaAdd" style="border-top:0">
                                                    <tbody class="movieTbodyAct" id="moreScreen">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </dd>
                    </dl>
                    {{--<dl class="selSeatBox">--}}
                        {{--<dt>您选择的座位：</dt>--}}
                        {{--<dd>--}}
                            {{--未做--}}
                        {{--</dd>--}}
                    {{--</dl>--}}
                    {{--<dl class="choose_cinema mt10 clearfix" >--}}
                        {{--<dt style="padding-top:2px\9;">总价：</dt>--}}
                        {{--<dd class="imp fb">¥<span class="f16" id="totalPrice">0</span> </dd>--}}
                    {{--</dl>--}}
                    <dl class="tel mt10">
                        {{--<dt>请输入您接收电子票的手机号码：</dt>--}}
                        <dd>
                            {{--<input type="hidden" value="593416468" name="ticketId" id="ticketId" />--}}
                            {{--<input type="hidden" name="lockedSeatList" id="lockedSeatList" />--}}
                            {{--<input type="hidden" name="isReserve" id="isReserve" />--}}
                            <div class="clearfix">
                                {{--<input type="text" name="mobileText" value='' id="mobileText"/>--}}
                                {{--<input type="hidden" name="mobile" value="" id="mobile"/>--}}
                            </div>
                            <div class="btn" style="position:relative;zoom:1;">
                                <div class="tip">
                                    <div class="up"></div>
                                    点击"立即购票"后，将为您锁座15分钟！
                                </div>
                                <button class="btn_buy">立即购票</button>
                                {{--<input type="submit" id="seatSub" class="btn_buy" autoComplete="off" value="立即购票"/>--}}
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</form>







<script src="{{ asset('home/Scripts/jquery-1.11.0.min.js') }}"></script>
<script src="{{ asset('home/Scripts/jquery.seat-charts.min.js') }}"></script>
<script>
    $(document).ready(function() {

        var sc = $('#seat-map').seatCharts({
            map: [
                <?php
                $res='';
                foreach ($r as $v)
                {
                    $res .=",'".$v."'";
                }
                echo $res = ltrim($res,',');
                ?>
            ],

            seats: {
                a: {
                    price   : 99.99,
                    classes : 'front-seat' //your custom CSS class
                }
            },
            click: function () {
                if (this.status() == 'available') {
                    //do some stuff, i.e. add to the cart
                    return 'selected';
                } else if (this.status() == 'selected') {
                    //seat has been vacated
                    return 'available';
                } else if (this.status() == 'unavailable') {
                    //seat has been already booked
                    return 'unavailable';
                } else {
                    return this.style();
                }
            }
        });
        var round1 = "{{ $round->round_id }}";
        var getUrl = "{{ url('check') }}";
        $.post(getUrl,{round:round1,'_token':"{{ csrf_token() }}"},function(data){
//             console.log(data);
            for(var i=0;i < data.length;i++){
                $('#'+data[i]).addClass('unavailable');
                // alert('#'+data[i]);
            }
        },'json')

    });
    $('button').click(function(){
        seats = $('.selected');
//        console.log(seats);
        if(seats.length < 1){
            alert('选个座位啊');
            location.reload();
        }
        var seatsStr='';
        seats.each(function(){
            seatsStr +=$(this).attr('id');
            seatsStr +=',';
        })
        var url = "{{ url('home/doorder') }}";
        var round = "{{ $round->round_id }}";
        $.post(url,{round:round,sid:seatsStr,'_token':"{{ csrf_token() }}"}, function(data){

            if(data.length > 10){
                alert('请登录~');
                location.href= " {{ url('/login/order_'.$round->round_id) }} " ;

            }else{
            alert(data);
            location.href = '{{ url('home/user/order') }}';

            }
            console.log(data);

        })
    });
</script>




































@endsection

