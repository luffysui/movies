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
    <form class="stdform stdform2" method="post" action="{{ url('admin/list') }}">
    {{ csrf_field() }}
        <p>
            <label>榜单名称</label>
            <span class="field"><input type="text" name="list_name" id="" class="longinput"></span>
        </p>

{{--lkj--}}

        <p class="stdformbutton">
            <button class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
    </form>
@endsection
