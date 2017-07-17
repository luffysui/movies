@extends('admin.parent')
@section('title', '影厅管理')
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
        <div class="tableoptions">
            <select name="city" id="cid">
                <option>---请选择---</option>
            </select>
        </div>
        <div class="tableoptions">
            影厅名称:&nbsp; &nbsp;<input type="text" name="search">
        </div>
        <div class="tableoptions">
            <p>
                <label>IMAX&nbsp; &nbsp;</label>
                <span class="formwrapper">
                    <input type="radio"  name="imax" checked class="imax" value="2" >全部 &nbsp; &nbsp;
                    <input type="radio" name="imax" value="1">是 &nbsp; &nbsp;
                    <input type="radio" name="imax" value="0">否 &nbsp; &nbsp;
                </span>
            </p>
        </div>
        <div class="tableoptions">
            <input type="submit" onclick="doShow()" value="搜索">
        </div>
            <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">

            <thead>
            <tr>
                <th class="head1" style="width:100px">影厅ID</th>
                <th class="head0">影厅名称</th>
                <th class="head1">座位</th>
                <th class="head0">IMAX</th>
                <th class="head1">状态</th>
                <th class="head0">操作</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <form action="" method='post' name='myform' style='display:none'>
            {{ csrf_field() }}
            {{ method_field("DELETE") }}
        </form>
    </div>
    <script>
        function doDel(id)
        {
            if(confirm('确定要删除吗？')){
                var form = document.myform;
                form.action = "{{ url('admin/room') }}"+'/'+id;
                form.submit();
            }
        }
    </script>
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
                            var select = $("<select><option>---请选择---</option></select>");
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
                                        var select = $("<select><option>---请选择---</option></select>");
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

        //渲染影厅的列表
        function doShow(){
            var search = $('input[name="search"]').val();
            var imax = $('.imax').val();
            var cid = $('.tableoptions select:last-child').val();
            var url2 = "{{ url('/admin/roomajax/room') }}";
            $.ajax({
                url:url2,
                type:'post',
                dataType:'json',
                data:{cid:cid,'_token':"{{ csrf_token() }}",'search':search,'imax':imax},
                success:function(data){
                    var str = '';
                    for(var i = 0;i < data.length;i++){
                        str += '<tr>';
                        str += '<td>'+data[i].room_id+'</td>';
                        str += '<td>'+data[i].name+'</td>';
                        str += '<td class="center">'+data[i].seats+'</td>';
                        str += '<td class="center">';
                        str += (data[i].imax == 1)?'是':'否';
                        str += '</td>';
                        str += '<td class="center">';

                        str += (data[i].status == 1)?'<button class="stdbtn btn_red">禁用</button>':'<button class="stdbtn btn_lime">正常</button>';
                        str += '</td>';
                        str += '<td class="center"><a href="';
                        str += "{{ url('admin/room')}}" +"/"+data[i].room_id +"/edit" +'"' + " class='edit'>修改</a> &nbsp; <a onclick='doDel("+data[i].room_id+")' >删除</a></td>";
                        str += '</tr>';
                    }
                    $('tbody tr').remove();
                    $('tbody').append(str);
                },
                error:function(){
                    alert('ajax请求失败');
                }
            });

        }
    </script>
    <script>
        //处理imax
        $('input[name="imax"]').click(function(){
            $(this).addClass('imax');
            $(this).siblings().removeClass('imax');
        })

    </script>
@endsection
