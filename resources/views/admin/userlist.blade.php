@extends('admin.parent')
@section('title')
    用户列表
@endsection
@section('content')
    <div class="contentwrapper">


    <div class="dataTables_wrapper" id="dyntable_wrapper">
        <div id="dyntable_length" class="dataTables_length">
            <form action="{{ url('admin/user')}}" >

                <label>Search: <input type="text col-lg-4" name="name"></label>
                <a href="" class="btn btn_search radius50"><input type="submit"></a>
            </form>
        </div>

        <table cellpadding="0" cellspacing="0" border="0" class="stdtable" id="dyntable">

            <thead>
                <tr>
                    <th class="head0" rowspan="1" colspan="1" style="width: 20px;">ID</th>
                    <th class="head0" rowspan="1" colspan="1" style="width: 202px;">用户名</th>
                    <th class="head1" rowspan="1" colspan="1" style="width: 200px;">手机</th>
                    <th class="head1" rowspan="1" colspan="1" style="width: 50px">性别</th>
                    <th class="head0" rowspan="1" colspan="1" style="width: 271px;">状态（绿色正常，红色已禁用）</th>
                    <th class="head1" rowspan="1" colspan="1" style="width: 174px;">积分</th>
                    <th class="head1" rowspan="1" colspan="1" style="width: 174px;">注册时间</th>
                    <th class="head1" rowspan="1" colspan="1" style="width: 174px;">生日</th>

                </tr>
            </thead>
            <tbody>
            @foreach($users as $v)
                <tr class="gradeA odd">
                    <td>{{ $v->user_id }}</td>
                    <td class=" sorting_1">{{ $v->name }}</td>
                    <td>{{ $v->phone }}</td>
                    <td>
                        @if($v->sex ==1)
                            <span>男</span>
                            @else
                            <span>女</span>
                        @endif
                    </td>
                    <td>
                        @if($v->status==1)
                            <a href="{{ url('admin/user/').'/'.$v->user_id }}"><button class="stdbtn btn_lime">禁用他</button></a>
                        @else
                            <a href="{{ url('admin/user/').'/'.$v->user_id }}"><button class="stdbtn btn_red">启用他</button></a>
                        @endif
                    </td>
                    <td class="center">{{ $v->score }}</td>
                    <td>{{ $v->creat_time }}</td>
                    <td>{{ $v->birthday }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $users->appends($where)->render() !!}
    </div>

    </div>
    <script>
        if( "{{ session('msg') }}" ){
            alert("{{ session('msg') }}");
        }
    </script>
@endsection