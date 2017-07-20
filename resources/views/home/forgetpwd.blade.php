<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn" class="zh-cn cn">
<head>
    <title>找回密码</title>
    <script type="text/javascript" src="{{ asset('home/login/Scripts/polyfills.min.1syus.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/login/Scripts/core.min.3qhih.js') }}"></script>
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/navbar.css') }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/blizzard-web.47jgv.css') }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/global.4z8lx.css') }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/creation.20zvh.css') }}" />
    <!--[if IE 8]> <link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/creation-ie8.3txse.css') }}" />
    <![endif]-->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/social.0eh1b.css') }}" />
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/zh-cn.0vit0.css') }}" />

    <script type="text/javascript" src="{{ asset('home/login/Scripts/jquery-1.11.0.1aj0k.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home/login/Scripts/core.299ql.js') }}"></script>

</head>
<body style="background-image: url('../Images/login-background-1280.4jlng.jpg');" class="zh-cn blizzard-template cn web" >
<div id="layout-middle">
    <div class="wrapper">
        <div id="content">
            <script type="text/javascript">
                document.body.className += " js-enabled";
            </script>
            <div class="body-content grid">
                <!--LOGO-->
                <div class="grid-100">
                    <h1 class="logo">找回密码</h1>
                </div>

                <div class="content-container creation-container grid-parent">
                    <div class="" id-="information-container">
                        <h1>找回密码</h1>
                    </div>
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
                    <div class="grid-parent" id="form-container">
                        <form action="{{ url('/findpwd') }}" method="post">
                            {{ csrf_field() }}

                            <fieldset>
                                <div class="control-group row-emailAddress">
                                    <input type="text" id="phone" onblur="findquestion()" name="phone" placeholder="手机号码" class="grid-100" />
                                    <span id="emailAddress-error-inline" class="help-block"></span>
                                </div>
                                <script src="{{ asset('home/Scripts/jquery-1.8.3.js') }}"></script>
                                <script>
                                    function findquestion(){
                                        var phone = $('#phone').val();
                                        var url = "{{ url('/getquestion') }}";
                                        $.ajax({
                                            url:url,
                                            type:'get',
                                            data:{phone:phone},
                                            success:function(data){
                                                $('#question').val(data);
                                            },
                                            error:function(){
                                                alert('ajax请求失败');
                                            }
                                        });
                                    }
                                </script>
                            </fieldset>
                            <fieldset>
                                <div class="control-group row-answer1">
                                    <input type="text" id="question" name="question" value="输入手机号点击获取按钮获取你的密保问题" class="grid-100" />
                                    <button type="button">获取</button>
                                    <span id="answer1-error-inline" class="help-block"></span>
                                </div>
                                <div class="control-group row-answer1">
                                    <input type="text" id="answer" name="answer" onblur="findanswer()" placeholder="输入你的答案然后点击验证" maxlength="99" autocapitalize="off" autocomplete="off" autocorrect="off" class="grid-100" spellcheck="false" required="true" />
                                    <button type="button">验证答案</button>
                                    <span id="answer1-error-inline" class="help-block"></span>
                                </div>
                                <script>

                                    function findanswer(){
                                        var phone = $('#phone').val();
                                        var answer = $('#answer').val();
                                        var question = $('#question').val();
                                        var url = "{{ url('/getanswer') }}";
                                        $.ajax({
                                            url:url,
                                            type:'get',
                                            data:{answer:answer,phone:phone,question:question},
                                            success:function(data){
                                                $('#root').val(data);
                                            }
                                        });
                                    }
                                </script>
                                <div class="control-group row-answer1">
                                    <input type="text" id="root" name="root" value="是否通过验证" maxlength="99" autocapitalize="off" autocomplete="off" autocorrect="off" class="grid-100" spellcheck="false" required="true" />
                                    <span id="answer1-error-inline" class="help-block"></span>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="control-group row-password">
                                    <input type="password" id="password" name="password" value="" maxlength="16" placeholder="新密码" class="password-input showGuidelines" data-email_field="#emailAddress" autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" required="true" />
                                    <input type="password" id="rePassword" name="rpassword" value="" maxlength="16" placeholder="确认密码" class="password-input" />
                                    <div class="password-rating"></div>
                                    <span id="password-error-inline" class="help-block"></span>
                                </div>

                            </fieldset>
                            <fieldset>
                            </fieldset>
                            <div class="form-controls">
                                <button class="btn btn-block btn-primary" id="creation-submit-button" type="submit">
                                    <span class="button-text">确认修改密码</span>
                                    <i class="spinner-battlenet"></i>
                                </button>
                                <a class="btn btn-block" id="creation-cancel-button" href="{{ url('/login') }}">
                                    <span class="button-text">返回登录</span>
                                    <i class="spinner-battlenet"></i>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="templates">
                <div id="error" class="alert alert-error"></div>
            </div>

            <script src="{{ asset('home/login/Scripts/embed-0.1.5.min.js') }}"></script>

        </div>
    </div>
</div>
<div class="NavbarFooter is-region-limited">
</div>
<script type="text/javascript" src="{{ asset('home/login/Scripts/account-creation.min.4hqlm.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/login/Scripts/passwordrequirements.485xs.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/login/Scripts/toolkit-select.4ecdw.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/login/Scripts/toolkit.min.3crdu.js') }}"></script>
<script type="text/javascript" src="{{ asset('home/login/Scripts/navbar.js') }}"></script>
</body>

</html>