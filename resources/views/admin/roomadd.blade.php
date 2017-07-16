@extends('admin.parent')
@section('title', '添加影厅')
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
        <form class="stdform stdform2" method="post" action="{{ url('/admin/room') }}">

            <p>
                <label>影厅名称</label>
                <span class="field"><input type="text" name="name" id="firstname2" class="longinput" /></span>
            </p>
            <p>
                <label>所属影院</label>
                <span class="field">
                    <b class="myselect" >
                        <select name="city" id="cid" style="min-width:20%">
                            <option>---请选择---</option>
                        </select>
                    </b>
                </span>

            </p>
            <p>
                <label>IMAX</label>
                <span class="field">
                    <input type="radio" name="imax"  value="0"  checked="checked" />&nbsp; 否 &nbsp; &nbsp;
                    <input type="radio" name="imax"  value="1" />&nbsp; 是 &nbsp; &nbsp;
                </span>
            </p>
            <p>
                <label>座位</label>
                <span class="field"><textarea cols="80" rows="5" name="seats" id="location2" class="longinput"></textarea></span>
            </p>
            {{--<p>--}}
                {{--<label>Select</label>--}}
                {{--<span class="field"><select name="selection" id="selection2">--}}
                    {{--<option value="">Choose One</option>--}}
                    {{--<option value="1">Selection One</option>--}}
                    {{--<option value="2">Selection Two</option>--}}
                    {{--<option value="3">Selection Three</option>--}}
                    {{--<option value="4">Selection Four</option>--}}
                {{--</select></span>--}}
            {{--</p>--}}
            <p class="stdformbutton">
                <button class="submit radius2">提交</button>
                <input type="reset" class="reset radius2" value="重置" />
            </p>
            {{ csrf_field() }}
        </form>
    </div>

    <script src='{{ asset("admin/js/jquery-1.8.3.min.js") }}'></script>
    <script>
        //展示省
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

        //给所有的select标签绑定change事件
        //展示市和区
        $('select').live('change',function(){
            // 干掉当前你选择的select后面所有的select
            $(this).nextAll('select').remove();
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
                            var select = $("<select style='min-width:20%'><option>---请选择---</option></select>");
                            //遍历从数据库查出来的数据，生成新的option选项追加到select里面
                            for (var i = 0; i < data.length; i++) {
                                $(select).append("<option value="+data[i].region_code+">"+data[i].region_name+'</option>');
                            }
                            //外部插入到前一个select选项后面
                            ob.after(select);
                        }else{
                            var url1 = "{{ url('/admin/roomajax/cinema') }}";
                            var code = $('.myselect select:last-child').val();
                            //展示影院
                            $.ajax({
                                url:url1,
                                type:'get',
                                dataType:'json',
                                data:{region_code:code},
                                success:function(data){
                                    if(data.length>0){
                                        //生成一个新的select选项
                                        var select = $("<select name='cid'><option>---请选择---</option></select>");
                                        //遍历从数据库查出来的数据，生成新的option选项追加到select里面
                                        for (var i = 0; i < data.length; i++) {
                                            $(select).append("<option value="+data[i].cinema_id+">"+data[i].cinema_name+'</option>');
                                        }
//                            console.log(data);
                                        //外部插入到前一个select选项后面
                                        ob.after(select);
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
    </script>
@endsection
