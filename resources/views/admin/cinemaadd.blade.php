@extends('admin.parent')

@section('content')
@if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif
    <form class="stdform stdform2" method="post" action="{{ url('admin/cinema') }}">
    {{ csrf_field() }}
        <div class="contenttitle2 nomargintop" style="margin:6px;"><h2>添加影院</h2></div>
        <p>
            <label>影院名称</label>
            <span class="field"><input type="text" name="cinema_name" id="" class="longinput"></span>
        </p>
        <p>
            <label>影院评分</label>
            <span class="field"><input type="text" name="cinema_score" id="" class="longinput"></span>
        </p>
        <p>
            <label>影院区域</label>
            <span class="field" >
                <b class="myselect" >
                    <select name="region_code" id="cid" style="min-width:20%">
                        <option value="dfff">---请选择---</option>
                    </select>
                </b>
            </span>
        </p>
        <p>
            <label>影院地址</label>
            <span class="field"><input type="text" name="cinema_address" id="" class="longinput"></span>
        </p>
        <p>
            <label>影院电话</label>
            <span class="field"><input type="text" name="cinema_phone" id="" class="longinput"></span>
        </p>
        <p>
            <label>正在上映</label>
            <span class="field"><input type="text" name="cinema_movie" id="" class="longinput"></span>
        </p>
        <p>
            <label>交通信息</label>
            <span class="field"><input type="text" name="cinema_travel" id="" class="longinput"></span>
        </p>


{{--lkj--}}

        <p class="stdformbutton">
            <button class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
    </form>
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
                 //console.log(data);
                //遍历从数据库查出来的数据，生成新的option选项追加到select里面
                for (var i = 0; i < data.length; i++) {
                    $('#cid').append("<option value="+data[i].region_code+">"+data[i].region_name+'</option>');
                }
               // alert(data);
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
                        //console.log(data);
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
                            $('#ssss > select:last-child').attr('name',"region_code");
                            var url1 = "{{ url('/admin/roomajax/cinema') }}";
                            var code = $('.myselect select:last-child').val();
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