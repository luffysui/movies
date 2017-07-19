@extends('admin.parent')
@section('title')
    添加电影
@endsection
@section('content')
    <div class="contentwrapper">
        <form class="stdform" action="{{ url('admin/movie').'/'.$id }}" method="post" enctype="multipart/form-data">
            {{--{{ csrf_token() }}--}}
            {{--{{ csrf_field() }}--}}
            <input type="hidden" name="_method" value="PUT">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <script>
                    if( "{{ session('msg') }}" ){
                        alert("{{ session('msg') }}");
                    }
                </script>
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            <img style="width:300px" src="{{ asset('upload/admin').'/'.$info->poster }}" alt="">
            <p>
                <label>影片名</label>
                <span class="field"><input type="text" name="name" onblur="checkname()" value="{{ $info->name }}" class="smallinput"></span>
            </p>
            <p>
                <label>导演</label>
                <span class="field"><input type="text" name="director" value="{{ $info->director }}" class="smallinput"></span>
            </p>
            <p>
                <label>主演</label>
                <span class="field"><input type="text" name="star" value="{{ $info->star }}" class="smallinput"></span>
            </p>
            <p>
                <label>国家</label>
                <span class="field">
                    @foreach($state as $v)
                        <input type="checkbox" name="state[]" value="{{ $v->type_id }}" >{{ $v->name }}
                    @endforeach
                    @foreach($moviestatearr as $v)
                        <input type="checkbox" name="state[]" value="{{ $v->type_id }}" checked>{{ $v->name }}
                    @endforeach
                </span>
            </p>
            <p>
                <label>类型</label>
                <span class="field">

                    @foreach($type as $v)
                        <input type="checkbox" name="typeid[]" value="{{ $v->type_id }}">{{ $v->name }}
                    @endforeach
                    @foreach($movietypearr as $v)
                        <input type="checkbox" name="typeid[]" checked value="{{ $v->type_id }}" >{{ $v->name }}
                    @endforeach

                </span>
            </p>

            <p>
                <label>影片描述</label>
                <span class="field">
                    <textarea cols="80" rows="5" id="textarea2" name="description" class="longinput" >{{ $info->description }}</textarea>
                </span>
            </p>

            <p>
                <label>语言</label>
                <span class="field"><input type="text" name="language" value="{{ $info->language }}" class="smallinput"></span>
            </p>
            <p>
                <label>时长（分钟）</label>
                <span class="field"><input type="number" name="duration" style="height: 14px;padding-top:8px;padding-bottom:8px;border:1px solid #ccc;box-shadow: inset 0 1px 3px #ddd;background: #fcfcfc" value="{{ $info->duration }}" class="smallinput">分钟</span>
            </p>
            <p>
                <label>上映时间</label>
                <span class="field"><input type="date" name="start_time" id="starttime" style="height: 14px;padding-top:8px;padding-bottom:8px;border:1px solid #ccc;box-shadow: inset 0 1px 3px #ddd;background: #fcfcfc" value="{{ date('Y-m-d',$info->start_time) }}" class="smallinput"></span>
            </p>
            <p>
                <label>下档时间</label>
                <span class="field"><input type="date" onblur="check()" name="stop_time" id="stoptime" style="height: 14px;padding-top:8px;padding-bottom:8px;border:1px solid #ccc;box-shadow: inset 0 1px 3px #ddd;background: #fcfcfc" value="{{ date('Y-m-d',$info->stop_time) }}"  class="smallinput"></span>
            </p>
            {{--验证选择的下档时间与上映时间是否符合实际--}}
            <script>
                function check(){
                    var stoptime = document.getElementById('stoptime').value;
                    var starttime = document.getElementById('starttime').value;
                    if(stoptime<starttime){
                        alert("下档时间必须大于上映时间,请重新选择");
                        document.getElementById('stoptime').value='0-0-0';
                    }

                }
            </script>
            <p>
                <label>3D</label>
                <span class="formwrapper">
                    @if($info->d3==1)
                    &nbsp;&nbsp;<input name="d3" value="1" checked type="radio">是&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="0" name="d3">否
                    @else
                        &nbsp;&nbsp;<input name="d3" value="1" type="radio">是&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" value="0" checked name="d3">否
                        @endif
                </span>
            </p>
            <p>
                <label>IMAX</label>
                <span class="formwrapper">
                    @if($info->imax==1)
                        &nbsp;&nbsp;<input type="radio" name="imax" checked value="1">是&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="imax" value="0">否
                        @else
                        &nbsp;&nbsp;<input type="radio" name="imax" value="1">是&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="imax" checked value="0">否
                        @endif
                </span>
            </p>
            <p>
                <label>重新选择海报</label>
                <input type="file"  name="poster">
            </p>

            <br clear="all"><br>

            <p class="stdformbutton">
                <button class="submit radius2">Submit</button>
                <input type="reset" class="reset radius2" value="Reset">
            </p>


        </form>
    </div>
@endsection