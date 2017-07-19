@extends('admin.parent')
@section('title')
    轮播图修改
@endsection
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
    <script>
        if( "{{ session('msg') }}" ){
            alert("{{ session('msg') }}");
        }
    </script>

    <div class="contentwrapper">


        <form class="stdform" action="{{ url('admin/carousel').'/'.$id }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <p>
                <label>名称</label>
                <span class="field">
                    <input type="text" name="name" value="{{ $info->name }}" class="smallinput">
                </span>
            </p>
            <p>
                <label>图片</label>
                <span class="field">
                    <img width="200px" src="{{ asset('upload/carousel').'/'.$info->photo }}" alt="">
                </span>
            </p>
            <p>
                <label>重新上传图片</label>
                {{--<span class="field">--}}
                <input type="file" name="photo" >
                {{--</span>--}}
            </p>
            <p>
                <label>对应电影</label>
                <span class="field">
                    <select name="movie_id">
                        @foreach($movies as $v)
                            @if($info->movie_id == $v->movie_id)
                            <option selected value="{{ $v->movie_id }}">{{ $v->name }}</option>
                            @else
                                <option value="{{ $v->movie_id }}">{{ $v->name }}</option>
                            @endif
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