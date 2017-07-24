<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>个人信息修改</title>
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/blizzard-web.min.2btzh.css') }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/global.min.1bnlq.css') }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/nav-client.2utvw.css') }}" />
    <link rel="stylesheet" type="text/css" media="(max-width:800px)" href="{{ asset('home/login/Css/nav-client-responsive.0r6na.css') }}" />
    <style>
        tr td:first-child{
            padding-right: 20px;
            text-align: right;
            vertical-align: middle;
        }
    </style>
</head>
<body style="background: url('{{ asset('home/login/Images/sc2-background-1920.10cat.jpg') }}')">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color: red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <script>
        if( "{{ session('msg') }}" ){
            alert("{{ session('msg') }}");
        }
    </script>
<div class="" style="width: 400px;height: 500px;margin: 200px auto;">
    <h2>信息修改</h2>
    <form style="display: block;margin: 0 auto" action="{{ url('/home/userpost') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ Session::get('homeuser')['user_id'] }}">
        <table>
            <tr>
                <td>用户名</td>
                <td><input type="text" name="name" value="{{ $in->name }}"><br></td>
            </tr>
            <tr>
                <td>昵称</td>
                <td><input type="text" name="nickname" value="{{ $in->nickname }}"><br></td>
            </tr>
            <tr>
                <td>原密码</td>
                <td><input style="border: 2px red dashed;outline:none" type="password" name="password"><br></td>
            </tr>
            <tr>
                <td>新密码</td>
                <td><input type="password" name="npass"></td>
            </tr>
            <tr>
                <td>确认新密码</td>
                <td><input type="password" name="rnpass"></td>
            </tr>
            <tr>
                <td>电话</td>
                <td><input type="text" name="phone" value="{{ $in->phone }}"><br></td>
            </tr>
            {{--<tr>--}}
                {{--<td>question</td>--}}
                {{--<td><select name="question">--}}
                        {{--<option value="">选择一个安全提问问题</option>--}}
                        {{--<option value="你的第一辆车是什么车">你的第一辆车是什么车？</option>--}}
                        {{--<option value="你读高中时住在哪一条街">你读高中时住在哪一条街？</option>--}}
                        {{--<option value="你第一次坐飞机是飞往哪里">你第一次坐飞机是飞往哪里？</option>--}}
                        {{--<option value="你第一个通关了的电子游戏叫什么名字">你第一个通关了的电子游戏叫什么名字？</option>--}}
                        {{--<option value="你的第二只宠物叫什么名字">你的第二只宠物叫什么名字？</option>--}}
                        {{--<option value="你最喜欢的球队或者球员叫什么名字">你最喜欢的球队或者球员叫什么名字？</option>--}}
                    {{--</select><br></td>--}}
            {{--</tr>--}}
            {{--<tr>--}}
                {{--<td>answer</td>--}}
                {{--<td><input type="text" name="answer" value="{{ $fo->answer }}"><br></td>--}}
            {{--</tr>--}}
            <tr>
                <td>QQ</td>
                <td><input type="number" name="qq" value="{{ $fo->qq }}"><br></td>
            </tr>
            <tr>
                <td>性别</td>
                <td>@if($fo->sex==1)
                        <input type="radio" name="sex" checked value="1">boy
                        <input type="radio" name="sex" value="0">girl
                    @else
                        <input type="radio" name="sex" value="1">boy
                        <input type="radio" name="sex" checked value="0">girl
                    @endif<br>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="确认修改信息">
                    <a href="{{ url('/') }}">我不改了，返回首页</a>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>



