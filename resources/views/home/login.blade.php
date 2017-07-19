<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="zh-cn" class="zh-cn blizzard">

	<head xmlns:og="http://ogp.me/ns#" xmlns:fb="http://ogp.me/ns/fb#">
		<meta http-equiv="imagetoolbar" content="false" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>用户登录</title>
		<link rel="shortcut icon" href="/login/static/images/meta/favicon.0gxnz.ico" />
		<!--[if gt IE 8]><!-->
		<link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/blizzard-web.min.2btzh.css') }}" />
		<!-- <![endif]-->
		<!--[if IE 8]><link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/blizzard-web-ie8.min.css') }}" /><![endif]-->
		<link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/global.min.1bnlq.css') }}" />
		<link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/nav-client.2utvw.css') }}" />
		<link rel="stylesheet" type="text/css" media="(max-width:800px)" href="{{ asset('home/login/Css/nav-client-responsive.0r6na.css') }}" />
		<!--[if IE 8]>
<link rel="stylesheet" type="text/css" media="all" href="{{ asset('home/login/Css/ie8.1xfhv.css') }}" />
<![endif]-->
		<link rel="search" type="application/opensearchdescription+xml" href="http://www.battlenet.com.cn/zh-cn/data/opensearch" title="搜索" />
		<script type="text/javascript" src="{{ asset('home/login/Scripts/jquery-1.11.0.min.1ugdg.js') }}"></script>
		<script type="text/javascript" src="{{ asset('home/login/Scripts/toolkit.min.3crdu.js') }}"></script>
		<script type="text/javascript" src="{{ asset('home/login/Scripts/core.min.1sfez.js') }}"></script>
		<meta name="viewport" content="width=device-width" />
	</head>

	<body class="cn zh-cn login-template web blizzard">
		<script type="text/javascript" src="{{ asset('home/login/Scripts/analytics.min.1oxm5.js') }}"></script>
		<div class="grid-container wrapper">
			<h1 class="logo">暴雪游戏通行证登录</h1>
			<div class="hide" id="info-wrapper">
				<h2><strong class="info-title"></strong></h2>
				<p class="info-body"></p>
				<button class="btn btn-block hide visible-phone" id="info-phone-close">Close</button>
			</div>
			<div class="input" id="login-wrapper">
				<div class="login">
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
<form action="{{ url('dologin') }}" method="post" id="password-form" novalidate="novalidate" class="username-requiredinput-focus">
	{{ csrf_field() }}
	<div id="login-input-container" class="">
		<div class="control-group">
			<label id="accountName-label" class="control-label" name="phone" for="accountName">手机号</label>
			<div class="controls">
				<input aria-labelledby="accountName-label" id="accountName" name="phone" title="手机号码登录" maxlength="320" type="text" tabindex="1" class="input-block input-large" placeholder="手机号码" autocorrect="off" spellcheck="false" />
			</div>
		</div>
		<div class="control-group">
			<label id="password-label" class="control-label" for="password">密码</label>
			<div class="controls">
				<input aria-labelledby="password-label" id="password" name="password" title="密码" maxlength="16" type="password" tabindex="1" class="input-block input-large" autocomplete="off" placeholder="密码" autocorrect="off" spellcheck="false" />
			</div>
		</div>
	</div>
	<div class="control-group submit ">
		<button type="submit" id="" class="btn btn-primary btn-large btn-block" tabindex="1">登录<i class="spinner-battlenet"></i>
</button>
	</div>
</form>
					<ul id="help-links">
						<li>
							<a class="btn btn-block" id="creation-cancel-button" href="{{ url('/register') }}">
								<span class="button-text">没有帐号？免费注册</span>
								<i class="spinner-battlenet"></i>
							</a>
						</li>

					</ul>
				</div>
			</div>

		</div>
		<script type="text/javascript" src="{{ asset('home/login/Scripts/embed-0.1.5.min.2qnzn.js') }}"></script>
		<script type="text/javascript" src="{{ asset('home/login/Scripts/global.min.2aoqy.js') }}"></script>
		<script type="text/javascript" src="{{ asset('home/login/Scripts/login.min.31jwf.js') }}"></script>
		<script type="text/javascript" src="{{ asset('home/login/Scripts/srp-client.min.30n9r.js') }}"></script>
	</body>

</html>