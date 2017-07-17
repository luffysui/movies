@extends('admin.parent')

@section('content')
    <form class="stdform stdform2" method="post" action="{{ url('admin/cinema').'/'.$cinema_id }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <div class="contenttitle2 nomargintop" style="margin:6px;"><h2>修改影院信息</h2></div>
        <p>
            <label>影院名称</label>
            <span class="field"><input type="text" name="cinema_name" id="" class="longinput" value="{{ $cinema->cinema_name}}"></span>
        </p>
        <p>
            <label>影院评分</label>
            <span class="field"><input type="text" name="cinema_score" id="" class="longinput" value="{{ $cinema->cinema_score}}"></span>
        </p>
        <p>
            <label>影院区域</label>
            <span class="field"><input type="text" name="region_code" id="" class="longinput" value="{{ $cinema->region_code}}"></span>
        </p>
        <p>
            <label>影院地址</label>
            <span class="field"><input type="text" name="cinema_address" id="" class="longinput" value="{{ $cinema->cinema_address}}"></span>
        </p>
        <p>
            <label>影院电话</label>
            <span class="field"><input type="text" name="cinema_phone" id="" class="longinput" value="{{ $cinema->cinema_phone}}"></span>
        </p>
        <p>
            <label>正在上映</label>
            <span class="field"><input type="text" name="cinema_movie" id="" class="longinput" value="{{ $cinema->cinema_movie}}"></span>
        </p>
        <p>
            <label>交通信息</label>
            <span class="field"><input type="text" name="cinema_travel" id="" class="longinput" value="{{ $cinema->cinema_travel}}"></span>
        </p>



{{--lkj--}}

        <p class="stdformbutton">
            <button class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
    </form>
@endsection
