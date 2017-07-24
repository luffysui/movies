@extends('admin.parent')
@section('title')
    回复反馈
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
    <form class="stdform stdform2" method="post" action="{{ url('admin/idea').'/'.$toid }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <p>
            <label>反馈人</label>
            <span class="field">
                <span>{{ $idea->name }}</span>
            </span>
        </p>
        <p>
            <label>反馈时间</label>
            <span class="field">
                <span>{{ date('Y年m月d日 H时i分s秒',$idea->time) }}</span>
            </span>
        </p>
        <p>
            <label>反馈内容</label>
            <span class="field" disabled="">
                <span>{{ $idea->idea }}</span>
            </span>
        </p>
        <p>
            <label>赞同次数</label>
            <span class="field">
                <span> {{ $idea->zan }}</span>
            </span>
        </p>
        <p>
            <label>电话 <br> E-mail</label>
            <span class="field">
                <span> {{ $idea->phone }}</span> <br>
                <span> {{ $idea->email }}</span>
            </span>
        </p>

        <p>
            <label>回复他的建议或问题</label>
            <span class="field">
                <input type="text" name="content" id="firstname2" class="longinput">
            </span>
        </p>
        <p class="stdformbutton">
            <button class="submit radius2">Submit Button</button>
            <input type="reset" class="reset radius2" value="Reset Button">
        </p>

    </form>

</div>
@endsection