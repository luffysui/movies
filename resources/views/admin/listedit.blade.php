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
    <form class="stdform stdform2" method="post" action="{{ url('admin/list').'/'.$list_id }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
        <p>
            <label>用户名</label>
            <span class="field"><input type="text" name="list_name" id="" class="longinput" value="{{ $list->list_name}}" ></span>
        </p>

{{--lkj--}}

        <p class="stdformbutton">
            <button class="submit radius2">提交</button>
            <input type="reset" class="reset radius2" value="重置">
        </p>
    </form>
@endsection
