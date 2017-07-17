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
        <form class="stdform stdform2" method="post" action="{{ url('admin/room').'/'.$room->room_id }}">

            <p>
                <label>影厅名称</label>
                <span class="field"><input type="text" name="name" id="firstname2" class="longinput" value="{{ $room->name }}" /></span>
            </p>
            <p>
                <label>所属影院(不可修改)</label>
                <span class="field"><input  disabled type="text" name="cinema_name" id="lastname2" class="longinput" value="{{ $cinema->cinema_name }}" />
                </span>
                {{--<input type="hidden"  disabled  name="cid"  class="longinput" value="{{ $room->cid }}" />--}}
            </p>
            <p>
                <label>IMAX</label>
                <span class="field">
                    <input type="radio" name="imax"  value="0"  {{ $room->imax == '0'? 'checked':'' }} />&nbsp; 否 &nbsp; &nbsp;
                    <input type="radio" name="imax"  value="1" {{ $room->imax == '1'? 'checked':'' }} />&nbsp; 是 &nbsp; &nbsp;
                </span>
            </p>
            <p>
                <label>状态</label>
                <span class="field">
                    <input type="radio" name="status"  value="1"  {{ $room->imax == '1'? 'checked':'' }} />&nbsp; 禁用 &nbsp; &nbsp;
                    <input type="radio" name="status"  value="0" {{ $room->imax == '0'? 'checked':'' }} />&nbsp; 正常 &nbsp; &nbsp;
                </span>
            </p>
            <p>
                <label>座位</label>
                <span class="field"><textarea cols="80" rows="5" name="seats" id="location2" class="longinput">{{ $room->seats }}</textarea></span>
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
            {{ method_field('PUT') }}
        </form>
    </div>
@endsection
