@extends('home.parent')
@section('title', '意见')
@section('content')
    <style>
        .maodianred:hover{
            background-color: #f6a9af;
            color:#71c6ee;
            -webkit-transform: scale(1.2);
            transition: all 0.8s ease-in-out;
        }
        .maodianblue{
            color:#fff;
            background-color:#0aa4ec
        }
        .maodianred{
            color:#fff;
            background-color:#e34551;
        }
        .maodianblue:hover{
            color:#059adf;
            background-color: #71c6ee;
            -webkit-transform: scale(1.2);
            transition: all 0.8s ease-in-out;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('home/Css/feedback.css') }}"/>
    <script src="{{ asset('home/Scripts/jquery-1.4.2.js') }}"></script>
    <script src="{{ asset('home/Scripts/easycore.js') }}"></script>
    {{--<div class="top">--}}
        {{--<header>--}}
    	{{--<span class="logo">--}}
        	{{--<a href="{{ url('/') }}" class="piao"></a>--}}
        {{--</span>--}}
        {{--</header>--}}
    {{--</div>--}}
    <form style="padding-bottom:40px;display:block;background: url('{{ asset('home/login/Images/d3-background-1920.2m3fz.jpg') }}');" action="{{ url('home/doidea') }}" method="post" id=" ">
        {{ csrf_field() }}
        <div class="main">
            <div class="title"><em class="imp" style="color: #fff;">写下你的意见、反馈、疑问</em></div>
            <div class="th"><span style="color: #fff;margin:-26px 0 0 10px;">问题或建议</span></div>
            <div class="td">
                <textarea name="idea" id="question"></textarea>
                <span class="errMsg" style="float:right;margin-right:0px;"></span>
            </div>
            <div class="th" style="color: #fff;">您的邮箱</div>
            <div class="td">
                <input type="text" name="email" id="accountId" autocomplete="off"/>
                <span class="errMsg"></span>
            </div>
            <div class="th" style="color: #fff;">您的手机号</div>
            <div class="td">
                <input type="text" name="phone" id="phone" maxlength="11" autocomplete="off"/>
                <span class="errMsg"></span>
            </div>
            <div class="sub">
                <input type="submit" value="提交" id=""/>
            </div>
            {{--用户建议列表--}}
        </div>
    </form>
    <div style=";width:100px;height:150px;position: fixed;right: 20px;bottom: 20px;border-radius: 10px;box-shadow: #666 25px 23px 30px 0px">
        <a class="maodianred" style="font-size: 30px;display: block;width: 100px;height: 75px;line-height: 75px;text-align: center;border-bottom: 1px #fff solid;border-radius: 10px 10px 0 0;" href="#other">other's</a>
        <a class="maodianblue" style="font-size: 30px;display: block;width: 100px;height: 75px;line-height: 75px;text-align: center;border-radius:0 0 10px 10px;" href="#mine">mine</a>
    </div>
    <ul style="border:#e34551 5px solid;margin:40px auto;width:1000px;background: #ccc;padding: 20px;box-shadow: #666 25px 23px 30px 0px;border-radius: 20px">
        <h1 style="font-size: 20px;background: #e34551;font-weight: bolder;color:#fff;"><a id="other"></a> =======大家<span style="font-size: 15px;">的</span><span style="font-size: 25px;">建议</span>=====================</h1>
        @foreach($allidea as $v)
        <li style="margin: 20px 0;position: relative;">
            <p style="padding: 5px;display:inline;font-size: 20px;font-style: italic;font-weight: bold;"><i>{{ $v->name }}</i></p><i style="float: right;position: absolute;top: 0;right:0;">{{ date('Y年m月d日H时i分s秒',$v->time) }}</i>
            <p style="text-indent: 2em;width:700px;margin-left: 10px;font-size: 20px">{{ $v->idea }}</p>
            <p style="float: right;position: absolute;right:0;bottom: 0"><a style="text-decoration: underline;cursor:pointer;font-size: 15px" onclick="zan({{ $v->idea_id }})">赞同他的想法</a>(有{{ $v->zan }}次赞同)</p>
        </li>
        <hr style="color: #0aa4ec;width: 950px">
        @endforeach
    </ul>
    <ul style="border:#00aced 5px solid;margin:40px auto;width:1000px;background: #ccc;padding: 20px;box-shadow: #666 25px 23px 30px 0px;border-radius: 20px">
        <h1 style="font-size: 20px;background: #0aa4ec;font-weight: bolder;color:#fff;"><a id="mine"></a> 我的提交</h1>
        @foreach($useridea as $v)
            <li style="margin: 20px 0;position: relative;">
                <p style="padding: 5px;display:inline;font-size: 20px;font-style: italic;font-weight: bold;"><i>我说：</i></p><i style="float: right;position: absolute;top: 0;right:0;">{{ date('Y年m月d日H时i分s秒',$v->time) }}</i>
                <p style="text-indent: 2em;width:700px;margin-left: 10px;font-size: 20px">{{ $v->idea }}</p>
                <p>管理员回复：{{ $v->content }} <i style="float: right;">{{ date('Y年m月d日H时i分s秒',$v->rtime) }}</i> </p>
            </li>
            <hr style="color: #0aa4ec;width: 950px">
        @endforeach
    </ul>
    <script>
        function zan(ideaid){
            url = "{{ url('/home/zan') }}";
            $.ajax({
                url:url,
                type:'get',
                data:{ideaid:ideaid},
                success:function(data){
                    if(data=='ok'){
                        alert('赞同成功');
                        location.reload(true);
                    }
                }
            });
            location.href('{{ url('////') }}',"asassa");
        }
    </script>

    <script src="{{ asset('home/Scripts/feedback.js') }}"></script>
    <script src="{{ asset('home/Scripts/dialog.js') }}"></script>
    <script src="{{ asset('home/Scripts/ntes.js') }}"></script>
@endsection