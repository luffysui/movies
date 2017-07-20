<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
<div class="" style="width: 400px;height: 500px;margin: 0 auto;">
    <h2>信息修改</h2>
    <form style="display: block;margin: 0 auto" action="{{ url('/home/userpost') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ $id }}">
        <table>
            <tr>
                <td>name</td>
                <td><input type="text" name="name" value="{{ $in->name }}"><br></td>
            </tr>
            <tr>
                <td>nickname</td>
                <td><input type="text" name="nickname" value="{{ $in->nickname }}"><br></td>
            </tr>
            <tr>
                <td>old password</td>
                <td><input style="border: 2px red dashed;outline:none" type="password" name="password"><br></td>
            </tr>
            <tr>
                <td>new password</td>
                <td><input type="password" name="npass"></td>
            </tr>
            <tr>
                <td>re new password</td>
                <td><input type="password" name="rnpass"></td>
            </tr>
            <tr>
                <td>phone </td>
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
                <td>qq</td>
                <td><input type="number" name="qq" value="{{ $fo->qq }}"><br></td>
            </tr>
            <tr>
                <td>sex</td>
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
                <td><input type="submit"></td>
                <td><button><a href="{{ url('/') }}">我不改了，返回首页</a></button></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>



