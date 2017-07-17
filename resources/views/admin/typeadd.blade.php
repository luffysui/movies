@extends('admin.parent')
@section('title')
    添加类别and国家
@endsection
@section('content')
    <div class="contentwrapper">
        <form class="stdform" id="realform" action="{{ url('admin/type') }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>


            <h2>添加电影分类</h2>
            <p>
                <label>名称</label>
                <span class="field"><input type="text" name="name" class="smallinput"></span>
            </p>
            <p>
                <label>类型</label>
                <span class="field">
                    <select name="status">
                        <option value="asdjkashgasdgfsaigf">--请选择--</option>
                        <option value="0">类别</option>
                        <option value="1">国别</option>
                    </select>
                </span>
            </p>
            <p>
                <span class="field">
                    <button type="submit"  class="stdbtn btn_lime">提交</button>
                    <button type="reset" class="stdbtn btn_red">重置</button>
                </span>
            </p>
            <p>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </p>
        </form>
        <script>
            if( "{{ session('msg') }}" ){
                alert("{{ session('msg') }}");
            }
        </script>


    </div>
@endsection