@extends('admin.parent')
@section('title')
    电影列表
@endsection

@section('content')
    <div class="contentwrapper">
        <table style="border: dashed 1px #0000C2;cellspacing:0;" >
            <form action="{{ url('admin/movie')}}" >
                <p>
                    <label>Movie Name</label>
                    <span class="field">
                        <input type="text" name="name" class="smallinput">
                        <button class="stdbtn btn_orange">Search</button>
                    </span>
                </p>
                {{--<label><input type="radio" name="status" checked value="3">全部</label>--}}
                {{--<label><input type="radio" name="status" value="0">已下档</label>--}}
                {{--<label><input type="radio" name="status" value="1">档期中</label>--}}
                {{--<label><input type="radio" name="status" value="2">待上映</label>--}}
            </form>
            <tbody>
                @foreach($movies as $v)
                    <tr style="border-top: 3px solid #000;">
                        <td rowspan="4" style="width:13%;text-align: center;border: dashed 1px #666;position: relative;">
                            @if( strtotime($v->stop_time) < time()  )
                                {{--<img style="position: absolute;top:80px;" width="250" src="{{ asset('admin/images/zhaodalin/timeout.png') }}" alt="">--}}
                                <span style="position: absolute;top: 120px;font-size: 60px;color: red;">已下档</span>
                            @elseif(strtotime($v->start_time)>time() )
                                <span style="position: absolute;top: 120px;font-size: 60px;color: blue;">待上映</span>
                            @elseif(strtotime($v->start_time)<time() && strtotime($v->stop_time)>time())
                                <span style="position: absolute;top: 120px;font-size: 60px;color: green;">正在热播</span>
                            @endif
                            <img height="180" src="{{ asset('upload/admin').'/'.$v->poster }}" alt="">
                        </td>
                        <th height="30px" style="font-weight: bold;font-size: 14px;border:2px dashed #ccc;">ID</th>
                        <th height="30px" style="font-weight: bold;font-size: 14px;border:2px dashed #ccc;">片名</th>
                        <th height="30px" style="font-weight: bold;font-size: 14px;border:2px dashed #ccc;">导演</th>
                        <th height="30px" style="font-weight: bold;font-size: 14px;border:2px dashed #ccc;">主演</th>
                        <th height="30px" style="font-weight: bold;font-size: 14px;border:2px dashed #ccc;">国家</th>
                        <th height="30px" style="font-weight: bold;font-size: 14px;border:2px dashed #ccc;">语言</th>
                        <th height="30px" style="font-weight: bold;font-size: 14px;border:2px dashed #ccc;">描述</th>
                    </tr>
                    <tr>

                        <td style="text-align: center;border: dashed 1px #666">{{ $v->movie_id }}</td>
                        <td style="font-size:26px;font-weight:bold;line-height:40px;width:13%;text-align: center;border: dashed 1px #666">{{ $v->name }}</td>

                        <td style="width:13%;text-align: center;border: dashed 1px #666">{{ $v->director }}</td>
                        <td style="width:13%;text-align: center;border: dashed 1px #666">{{ $v->star }}</td>
                        <td style="width:13%;text-align: center;border: dashed 1px #666">{{ $v->state }}</td>
                        <td style="width:13%;text-align: center;border: dashed 1px #666">{{ $v->language }}</td>
                        <td style="width:13%;text-align: center;border: dashed 1px #666">{{ $v->description }}</td>
                    </tr>
                    <tr>
                        <th height="30px" style="border:2px dashed #ccc;">时长</th>
                        <th height="30px" style="border:2px dashed #ccc;">上映时间</th>
                        <th height="30px" style="border:2px dashed #ccc;">下档时间</th>
                        <th height="30px" style="border:2px dashed #ccc;">是否3D</th>
                        <th height="30px" style="border:2px dashed #ccc;">是否IMAX</th>
                        <th height="30px" style="border:2px dashed #ccc;">类型</th>
                        <th height="30px" style="border:2px dashed #ccc;">操作</th>
                    </tr>
                    <tr style="border-bottom: 3px solid #000">
                        <td style="width:13%;text-align: center;border: dashed 1px #666">{{ $v->duration }}</td>
                        <td style="width:13%;text-align: center;border: dashed 1px #666">{{ $v->start_time }}</td>
                        <td style="width:13%;text-align: center;border: dashed 1px #666">{{ $v->stop_time }}</td>
                        <td style="width:13%;text-align: center;border: dashed 1px #666">
                            @if( $v->d3 ==1)
                            <button class="stdbtn btn_blue">3D</button>
                            @else
                            <button class="stdbtn btn_red">2D</button>
                            @endif
                        </td>
                        <td style="width:13%;text-align: center;border: dashed 1px #666">
                            @if( $v->imax ==1)
                                <button class="stdbtn btn_blue">IMAX</button>
                            @else
                                <button class="stdbtn btn_red">普通</button>
                            @endif
                        </td>
                        <td style="width:13%;text-align: center;border: dashed 1px #666">{{ $v->type }}</td>
                        <td style="width:13%;text-align: center;border: dashed 1px #666">
                            <a href="javascript:doDel({{ $v->movie_id }})"><button class="stdbtn btn_black">删除</button></a>
                            <a href="{{ url('admin/movie').'/'.$v->movie_id.'/edit' }}"><button class="stdbtn btn_yellow">修改</button></a>
                        </td>
                    </tr>
                            <form id='myform' action="" style='display:none' method='post'>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                            <script>
                                function doDel(id)
                                {
                                    if(confirm('你确定要删除吗啊？')){
                                        var form = document.getElementById('myform');
                                        form.action = '{{ url("admin/movie") }}'+'/'+id;
                                        form.submit();
                                    }
                                }
                            </script>
                    <tr>
                        <td height="10px" style="background: #ccc;"></td>
                        <td colspan="7" height="10px" style="background: #ccc;"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $movies->appends($where)->render() !!}
    </div>
    <script>
        if( "{{ session('msg') }}" ){
            alert("{{ session('msg') }}");
        }
    </script>
@endsection