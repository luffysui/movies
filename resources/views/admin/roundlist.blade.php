@extends('admin.parent')
@section('title', '场次管理')
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
            <form action="{{ url('/admin/round') }}" >
                影片名称:&nbsp; &nbsp;<input style="width:500px;margin-top:10px" type="text" name="movie"><br/>
                影院名称:&nbsp; &nbsp;<input style="width:500px;margin-top:10px" type="text" name="cinema"><br/><br/>
                <span class="formwrapper">
                    场次状态:
                    <input type="radio" name="status"  checked="" class="imax" value="4">全部 &nbsp; &nbsp;
                    <input type="radio" name="status"  value="1">未开始 &nbsp; &nbsp;
                    <input type="radio" name="status" value="2">正在播放 &nbsp; &nbsp;
                    <input type="radio" name="status" value="3">已结束 &nbsp; &nbsp;
                </span><br/><br/>
                <input type="submit" value="搜索">
            </form>
        </div>
        <table cellpadding="0" cellspacing="0" border="0" id="table2" class="stdtable stdtablecb">
            <thead>
            <tr>
                <th class="head1" style="width:2%">ID</th>
                <th class="head1" style="width:7%">状态</th>
                <th class="head0" style="width:8%">影片</th>
                <th class="head1" style="width:8%">影院</th>
                <th class="head0" style="width:6%">影厅</th>
                <th class="head1" style="width:4%">原价(元)</th>
                <th class="head0" style="width:4%">现价(元)</th>
                <th class="head1" style="width:6%">开始时间</th>
                <th class="head0" style="width:6%">结束时间</th>
                <th class="head1" style="width:2%">展示</th>
                <th class="head0" style="width:6%">卖出座位</th>
                <th class="head1" style="width:2%">IMAX</th>
                <th class="head0" style="width:7%">操作</th>
            </tr>
            </thead>
            <tbody>
                @foreach($roundList as $v)
                <tr>

                    <td>{{ $v->round_id }}</td>
                    <td>
                        @if(time() < $v->starttime)
                            <button class="stdbtn btn_blue">未开始</button>
                        @elseif( time() > $v->overtime)
                            <button class="stdbtn btn_black">已结束</button>
                        @else
                            <button class="stdbtn btn_lime">正在播放</button>
                        @endif
                     </td>
                    <td>{{ $v->movieName  }}</td>
                    <td>{{ $v->cinemaName }}</td>
                    <td>{{ $v->roomName }}</td>
                    <td class="center">{{ $v->oprice/100 }}</td>
                    <td class="center">{{ $v->nprice/100 }}</td>
                    <td class="center">{{ date('Y-m-d H:i:s',$v->starttime) }}</td>
                    <td class="center">{{ date('Y-m-d H:i:s',$v->overtime) }}</td>
                    <td class="center">{{ $v->display?'是':'否' }}</td>
                    <td class="center">{{ $v->soldseat }}</td>
                    <td class="center">{{ $v->imax?'是':'否' }}</td>
                    <td class="center">
                        @if(time() < $v->starttime)
                            <a href="{{ url("admin/round")."/".$v->round_id }}/edit" class="edit"><button class="stdbtn btn_yellow">修改</button></a> &nbsp;
                            <a onclick="doDel({{$v->round_id}})" >删除</a>
                        @else
                            <button class="stdbtn btn_red">不能操作</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="" method='post' name='myform' style='display:none'>
            {{ csrf_field() }}
            {{ method_field("DELETE") }}
        </form>
    </div>
    {!! $roundList->appends($where)->render() !!}
    <script>
        function doDel(id)
        {
            if(confirm('确定要删除吗？')){
                var form = document.myform;
                form.action = "{{ url('admin/round') }}"+'/'+id;
                form.submit();
            }
        }
    </script>

@endsection
