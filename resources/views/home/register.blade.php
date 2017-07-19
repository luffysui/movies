<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn" class="zh-cn cn">
	<head>
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />-->
		<title>悦影注册</title>
		<!--<link rel="shortcut icon" href="//www.battlenet.com.cn/account/static/images/meta/favicon.0gxnz.ico" />-->
		<!--<link rel="search" type="application/opensearchdescription+xml" href="http://www.battlenet.com.cn/zh-cn/data/opensearch" title="暴雪游戏搜索" />-->
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
		
		<!--<meta name="viewport" content="width=device-width" />-->
		<!--<og:image content="asd" />-->
		<script type="text/javascript" src="{{ asset('home/login/Scripts/jquery-1.11.0.1aj0k.js') }}"></script>
		<script type="text/javascript" src="{{ asset('home/login/Scripts/core.299ql.js') }}"></script>
		
	</head>
	<body style="background-image: url('../Images/login-background-1280.4jlng.jpg');" class="zh-cn blizzard-template cn web" >
		<div id="layout-middle">
			<div class="wrapper">
				<div id="content">
					<script type="text/javascript">
						//<![CDATA[
						document.body.className += " js-enabled";
						//]]>
					</script>
					<div class="body-content grid">
						<!--LOGO-->
						<div class="grid-100">
							<h1 class="logo">创建账号</h1>
						</div>
						
						<div class="content-container creation-container grid-parent">
							<div class="" id="information-container">
								<h1>创建账号</h1>
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
<form action="{{ url('/doregister') }}" id="account-creation" method="post" name="account-creation" novalidate="novalidate">
	{{ csrf_field() }}
	
	<fieldset class="first">
		<div class="control-group row-firstname">
			<input type="text" id="firstname" name="name" value="" maxlength="32" placeholder="用户名" autocapitalize="off" autocomplete="off" autocorrect="off" class="grid-100" spellcheck="false" required="true" /> <span id="firstname-error-inline" class="help-block"></span>
		</div>
		<div class="control-group row-firstname">
			<input type="text" id="firstname" name="qq" value="" maxlength="32" placeholder="QQ" autocapitalize="off" autocomplete="off" autocorrect="off" class="grid-100" spellcheck="false" required="true" /> <span id="firstname-error-inline" class="help-block"></span> 
		</div>
		<div class="control-group row-firstname">
			<input type="date" id="firstname" name="birthday" value="" maxlength="32" placeholder="QQ" autocapitalize="off" autocomplete="off" autocorrect="off" class="grid-100" spellcheck="false" required="true" /> <span id="firstname-error-inline" class="help-block"></span>
		</div>
	</fieldset>
	<fieldset>
		<div class="control-group row-emailAddress">
			<input type="email" id="emailAddress" name="phone" value="" placeholder="手机号码" maxlength="320" autocapitalize="off" autocomplete="off" autocorrect="off" class="grid-100" spellcheck="false" required="true" /> <span id="emailAddress-error-inline" class="help-block"></span>
		</div>
		<div class="control-group row-emailAddressConfirmation">
			<input type="email" id="emailAddressConfirmation" name="rphone" value="" placeholder="确认电手机号码" maxlength="320" autocapitalize="off" autocomplete="off" autocorrect="off" class="grid-100" spellcheck="false" required="true" /> <span id="emailAddressConfirmation-error-inline" class="help-block"></span>
		</div>
		<div class="control-group row-password">
			<input type="password" id="password" name="password" value="" maxlength="16" placeholder="密码" class="password-input showGuidelines" data-email_field="#emailAddress" autocapitalize="off" autocomplete="off" autocorrect="off" spellcheck="false" required="true" />
			<input type="password" id="rePassword" name="rpassword" value="" maxlength="16" placeholder="确认密码" class="password-input" />
			<div class="password-rating"></div>
			<span id="password-error-inline" class="help-block"></span>
		</div>
		
	</fieldset>
	<fieldset>
		<div class="control-group row-secret-question">
			<div class="mobile-arrow"></div>
			<select class="select-box grid-100" id="question1" name="question" required="required">
				<option value="">选择一个安全提问问题</option>
				<option value="你的第一辆车是什么车">你的第一辆车是什么车？</option>
				<option value="你读高中时住在哪一条街">你读高中时住在哪一条街？</option>
				<option value="你第一次坐飞机是飞往哪里">你第一次坐飞机是飞往哪里？</option>
				<option value="你第一个通关了的电子游戏叫什么名字">你第一个通关了的电子游戏叫什么名字？</option>
				<option value="你的第二只宠物叫什么名字">你的第二只宠物叫什么名字？</option>
				<option value="你最喜欢的球队或者球员叫什么名字">你最喜欢的球队或者球员叫什么名字？</option>
			</select>
			<span id="question1-error-inline" class="help-block"></span>
		</div>
		<div class="control-group row-answer1">
			<input type="text" id="answer1" name="answer" value="" placeholder="安全提问回答" maxlength="99" autocapitalize="off" autocomplete="off" autocorrect="off" class="grid-100" spellcheck="false" required="true" /> <span id="answer1-error-inline" class="help-block"></span>
		</div>
	</fieldset>
	<fieldset>
		<div class="grid-100 row-captcha">
			<a href="{{ url('/register') }}"><img src="{{ url('/vc') }}"></a>
			<i class="captcha-reloader"></i>
		</div>
		<div class="control-group row-captchaInput">
			<input type="text" id="captchaInput" name="vc" placeholder="输入验证码" autocapitalize="off" autocomplete="off" autocorrect="off" class="grid-100" spellcheck="false" required="true" /> <span id="captchaInput-error-inline" class="help-block"></span>
		</div>
	</fieldset>
	<fieldset>
	</fieldset>
	
	<div class="form-controls">
		<button class="btn btn-block btn-primary" id="creation-submit-button" type="submit">
		<span class="button-text">免费注册账号</span>
		<i class="spinner-battlenet"></i>
		</button>
		<a class="btn btn-block" id="creation-cancel-button" href="{{ url('/login') }}">
			<span class="button-text">已经有账号了？</span>
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