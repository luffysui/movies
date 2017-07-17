@extends('admin.parent')
@section('title')
    类型列表
@endsection
@section('content')
    <div class="contentwrapper">
        <form style="float: left;margin-left: 30px" action="{{ url('admin/type') }}">
            <input type="hidden" name="condition" value="all">
            <button type="submit" class="stdbtn btn_blue">显示所有（默认）</button>
        </form>
        <form style="float: left;margin-left: 30px" action="{{ url('admin/type') }}">
            <input type="hidden" name="condition" value="type">
            <button class="stdbtn">显示所有类别</button>
        </form>
        <form style="float: left;margin-left: 30px" action="{{ url('admin/type') }}">
            <input type="hidden" name="condition" value="state">
            <button class="stdbtn btn_black">显示所有国别</button>
        </form>
        <form style="float: left;margin-left: 30px" action="{{ url('admin/type') }}">
            <input type="hidden" name="condition" value="displayon">
            <button class="stdbtn btn_lime">显示所有启用的类型</button>
        </form>
        <form style="float: left;margin-left: 30px" action="{{ url('admin/type') }}">
            <input type="hidden" name="condition" value="displayoff">
            <button class="stdbtn btn_red"">显示所有禁用的类型</button>
        </form>



        <table cellpadding="0" cellspacing="0" border="0" class="stdtable stdtablecb">
            <thead>
            <tr>
                <th class="head1">ID</th>
                <th class="head0">NAME</th>
                <th class="head1">TYPE</th>
                <th class="head0">DISPLAY</th>
                <th class="head1">DO</th>
            </tr>
            </thead>

            <tbody>
            @foreach($info as $v)
            <tr>
                <td>{{ $v->type_id }}</td>
                <td>{{ $v->name }}</td>
                <td>
                @if($v->status==0)
                    类别
                @else
                    国别
                @endif
                </td>

                <td class="center">
                @if($v->display==1)
                        {{--<button class="aaaa stdbtn btn_lime" onclick="displayon()">点击禁用--}}
                    <button class="aaaa stdbtn btn_lime">
                        <a href="{{ url('admin/type').'/'.$v->type_id.'and'.$v->display.'and'.$where['condition'] }}">点击禁用</a>
                    </button>
                @else
                        {{--<button class="aaaa stdbtn btn_red" onclick="displayoff()">点击启用--}}
                    <button class="aaaa stdbtn btn_red">
                        <a href="{{ url('admin/type').'/'.$v->type_id.'and'.$v->display.'and'.$where['condition'] }}">点击启用</a>
                    </button>
                @endif
                </td>
                <script>
//                    function display(){
//                        var display=jQuery('.aaaa + input').val();
//                        alert(display);
//                    }
                    function displayon(){
                        display=1;
                        alert(display);
                        dis();
                    }
                    function displayoff(){
                        display=0;
                        alert(display);
                        dis();
                    }
                    function dis(){
                        jQuery.ajax({
                            type: "GET",// 请求方式
                            url: "{{ url('admin/type') }}",//url地址
                            data:{
                                type_id:$v->type_id,
                                display:$v->display,
                                where:$where['condition']
                            },//数据
                            success:function(data){//callback
                                if(data != null){
                                    alert(data);
                                }else {
                                    alert("登陆成功.无模拟进行跳转.");
                                }
                            }
                        });
                    }
                </script>
                <td class="center">
                    <button class="stdbtn btn_yellow"><a href="{{ url('admin/type').'/'.$v->type_id.'/edit' }}">UPDATE</a></button>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        if( "{{ session('msg') }}" ){
            alert("{{ session('msg') }}");
        }
    </script>
@endsection