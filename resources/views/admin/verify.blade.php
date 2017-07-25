@extends('admin.parent')
@section('title')
    验证券码
@endsection
@section('content')
    @if (session('msg'))
        <div class="notibar msgsuccess">
            <a class="close"></a>
            <p>{{ session('msg') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div class="notibar msgerror">
            <a class="close"></a>
            <p>{{ session('error') }}</p>
        </div>
    @endif
    <div class="contentwrapper">
        <form class="stdform" id="realform" action="{{ url('admin/code') }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            {{ csrf_field() }}

            <h2>验证券码</h2>
            <p>
                <label>券码</label>
                <span class="field"><input type="text" name="code" class="smallinput"></span>
            </p>

            <p>
                <span class="field">
                    <button type="submit"  class="stdbtn btn_lime">验证</button>
                    <button type="reset" class="stdbtn btn_red">重置</button>
                </span>
            </p>

        </form>
    </div>
@endsection