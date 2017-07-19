@extends('admin.parent')
@section('title', '添加场次')
@section('content')
    <div  id="contentwrapper" class="contentwrapper">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div class="notibar msgerror">
                            <a class="close"></a>
                            <p>{{ $error }}</p>
                        </div>
                    @endforeach
            </div>
        @endif
        <form class="stdform" action="{{ url('admin/round') }}" method="post" >
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <p>
                    <label>影片</label>
                    <select id="movie" name="movie_id" >
                       @foreach($movie as $v)
                        <option value="{{ $v->movie_id }}" >{{ $v->name }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <label>影厅</label>
                    <div class="tableoptions" style="background:#fff;border:0">
                        <select name="city" id="cid" style="min-width:12%">
                            <option>---请选择---</option>
                        </select>
                    </div>
                    <div id="room"></div>
                </p>
                <p>
                    <label>开始时间</label>
                    <span class="field">
                        <input type="date" name="startdate" style="width:200px;height: 14px;padding-top:8px;padding-bottom:8px;border:1px solid #ccc;box-shadow: inset 0 1px 3px #ddd;background: #fcfcfc" class="smallinput" >
                        <input type="time" name="starttime" style="width:100px; height: 14px;padding-top:8px;padding-bottom:8px;border:1px solid #ccc;box-shadow: inset 0 1px 3px #ddd;background: #fcfcfc" class="smallinput">
                    </span>
                </p>
                <p>
                    <label>结束时间</label>
                    <span class="field">
                        <input type="date" name="overdate" style="width:200px; height: 14px;padding-top:8px;padding-bottom:8px;border:1px solid #ccc;box-shadow: inset 0 1px 3px #ddd;background: #fcfcfc"  class="smallinput">
                        <input type="time" name="overtime" style="width:100px; height: 14px;padding-top:8px;padding-bottom:8px;border:1px solid #ccc;box-shadow: inset 0 1px 3px #ddd;background: #fcfcfc" class="smallinput">
                    </span>
                </p>
                <p>
                    <label>展示</label>
                    <span class="formwrapper">
                    &nbsp;&nbsp;<input name="display" value="1" type="radio" checked>是&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" value="0" name="display">否
                </span>
                </p>
                <p>
                    <label>IMAX</label>
                    <span class="formwrapper">
                    &nbsp;&nbsp;<input type="radio" name="imax" value="1" >是&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="imax" value="0" checked>否
                </span>
                </p>
                <p>
                    <label>原价(分)</label>
                    <span class="field"><input type="text" name="oprice" class="smallinput"> 分</span>
                </p>
                <p>
                    <label>现价(分)</label>
                    <span class="field"><input type="text" name="nprice" class="smallinput"> 分</span>
                </p>

                <br clear="all"><br>

                <p class="stdformbutton">
                    <button class="submit radius2">提交</button>
                    <input type="reset" class="reset radius2" value="重置">
                </p>


            </form>
    </div>
    <script src='{{ asset("admin/js/jquery-1.8.3.min.js") }}'></script>
    <script>
        //取出省
        var url = "{{ url('/admin/roomajax') }}";
        $.ajax({
            url:url,
            type:'get',
            dataType:'json',
            data:{father_id:0},
            success:function(data){
                //遍历从数据库查出来的数据，生成新的option选项追加到select里面
                for (var i = 0; i < data.length; i++) {
                    $('#cid').append("<option value="+data[i].region_code+">"+data[i].region_name+'</option>');
                }
//                alert(data);
            },
            error:function(){
                alert('ajax请求失败');
            }
        });

        //取出市和区和影院
        $('select:not(.roomnew):not(#movie)').live('change',function(){
            // 干掉当前你选择的select后面所有的select
            $(this).nextAll('select').remove();
            $('.roomnew').remove();
            //获取用户选择的值
            var v = $(this).val();
            //判断是不是选择了---请选择---
            if(v != '---请选择---'){
                //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax回调函数不能用，所以需要一个变量来中转
                var ob = $(this);
                var url = "{{ url('/admin/roomajax/post') }}";
                $.ajax({
                    url:url,
                    type:'post',
                    dataType:'json',
                    data:{father_id:v,'_token':"{{ csrf_token() }}"},
                    success:function(data){
                        //判断是不是最后一级城市，最后一级城市查询数据库的data.length == 0
                        if(data.length>0){
                            //生成一个新的select选项
                            var select = $("<select style='min-width:12%'><option>---请选择---</option></select>");
                            //遍历从数据库查出来的数据，生成新的option选项追加到select里面
                            for (var i = 0; i < data.length; i++) {
                                $(select).append("<option value="+data[i].region_code+">"+data[i].region_name+'</option>');
                            }
//                            console.log(data);
                            //外部插入到前一个select选项后面
                            ob.after(select);
                        }else{
                            var url1 = "{{ url('/admin/roomajax/cinema') }}";
                            var code = $('.tableoptions select:last-child').val();
//                            alert(code);
                            //搜索影院
                            $.ajax({
                                url:url1,
                                type:'get',
                                dataType:'json',
                                data:{region_code:code},
                                success:function(data){
                                    if(data.length>0){
                                        //生成一个新的select选项
                                        var select = $("<select style='min-width:12%'><option>---请选择---</option></select>");
                                        //遍历从数据库查出来的数据，生成新的option选项追加到select里面
                                        for (var i = 0; i < data.length; i++) {
                                            $(select).append("<option value="+data[i].cinema_id+">"+data[i].cinema_name+'</option>');
                                        }
//                            console.log(data);
                                        //外部插入到前一个select选项后面
                                        ob.after(select);
                                        $('.tableoptions select:last-child').live('change',function(){
                                            doShow();
                                        });
                                    }
                                },
                                error:function(){
                                    alert('ajax请求失败');
                                }
                            });
                        }
                    },
                    error:function(){
                        alert('ajax请求失败');
                    }
                });
            }
        });
        //取出影厅
        function doShow(){
            var cid = $('.tableoptions select:last-child').val();
//            console.log(cid);
            var url2 = "{{ url('/admin/roomajax/room') }}";
            $.ajax({
                url:url2,
                type:'post',
                dataType:'json',
                data:{cid:cid,'_token':"{{ csrf_token() }}",'search':'','imax':2},
                success:function(data){
                    var select = $("<select name='room_id' class='roomnew' style='min-width:12%;margin-left: 220px;' ><option>---请选择---</option></select>");
                    //遍历从数据库查出来的数据，生成新的option选项追加到select里面
                    for (var i = 0; i < data.length; i++) {
                        $(select).append("<option value="+data[i].room_id+">"+data[i].name+'</option>');
                    }
                    //外部插入到前一个select选项后面
                    $('.roomnew').remove();
                    $('#room').after(select);
                },
                error:function(){
                    alert('ajax请求失败');
                }
            });

        }
    </script>
@endsection
