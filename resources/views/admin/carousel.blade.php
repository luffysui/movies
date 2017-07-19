@extends('admin.parent')
@section('title')
    轮播图添加
@endsection
@section('content')
    <div class="contentwrapper">

        <h1>添加轮播图</h1>
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
        <form class="stdform" action="{{ url('admin/carousel') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <p>
                <label>名称</label>
                <span class="field">
                    <input type="text" name="name" class="smallinput">
                </span>
            </p>
            <p>
                <label>图片</label>
                {{--<span class="field">--}}
                    <input type="file" name="photo" >
                {{--</span>--}}
            </p>
            <p>
                <label>对应电影</label>
                <span class="field">
                    <select name="movie_id">
                        <option value="">Choose One</option>
                        @foreach($movies as $v)
                            <option value="{{ $v->movie_id }}">{{ $v->name }}</option>
                        @endforeach
                    </select>
                </span>
            </p>
            <p class="stdformbutton">
                <button class="submit radius2">Submit</button>
                <input type="reset" class="reset radius2" value="Reset">
            </p>
        </form>
    </div>
@endsection