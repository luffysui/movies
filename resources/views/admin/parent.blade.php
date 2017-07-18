<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('admin/css/style.default.css') }}" type="text/css" />
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery-1.7.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery-ui-1.8.16.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.uniform.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.flot.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.flot.resize.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/plugins/jquery.slimscroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/custom/general.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/custom/dashboard.js') }}"></script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{ asset('admin/js/plugins/excanvas.min.js') }}"></script><![endif]-->
    <!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="{{ asset('admin/css/style.ie9.css') }}"/>
    <![endif]-->
    <!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="{{ asset('admin/css/style.ie8.css') }}"/>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="{{ asset('admin/js/plugins/css3-mediaqueries.js') }}"></script>
    <![endif]-->
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">悦影<span>MOVIE</span></h1>
            <span class="slogan">后台管理系统</span>

            <div class="search">
                <form action="" method="post">
                    <input type="text" name="keyword" id="keyword" placeholder="请输入" />
                    <button class="submitbutton"></button>
                </form>
            </div><!--search-->

            <br clear="all" />

        </div><!--left-->

        <div class="right">
            <!--<div class="notification">
                <a class="count" href="ajax/notifications.html"><span>9</span></a>
            </div>-->
            <div class="userinfo">
                <img src="{{ asset('admin/images/thumbs/avatar.png') }}" alt="" />
                <span>管理员</span>
            </div><!--userinfo-->

            <div class="userinfodrop">
                <div class="avatar">
                    <a href=""><img src="{{ asset('admin/images/thumbs/avatarbig.png') }}" alt="" /></a>
                    {{--<div class="changetheme">--}}
                        {{--切换主题: <br />--}}
                        {{--<a class="default"></a>--}}
                        {{--<a class="blueline"></a>--}}
                        {{--<a class="greenline"></a>--}}
                        {{--<a class="contrast"></a>--}}
                        {{--<a class="custombg"></a>--}}
                    {{--</div>--}}
                </div><!--avatar-->
                <div class="userdata">
                    <h4>您好</h4><br><br>
                    <span class="text">welcome to yueying</span>
                    <ul>
                        <li><a href="{{ url('admin/logout') }}">退出</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->


    <div class="header">
        <ul class="headermenu">
            <li class="current"><a href="{{ url('admin/index') }}"><span class="icon icon-flatscreen"></span>悦影电影后台管理系统</a></li>
        </ul>
        {{--<ul class="headermenu">--}}
            {{--<li class="current"><a href="dashboard.html"><span class="icon icon-flatscreen"></span>首页</a></li>--}}
            {{--<li><a href="manageblog.html"><span class="icon icon-pencil"></span>博客管理</a></li>--}}
            {{--<li><a href="messages.html"><span class="icon icon-message"></span>查看消息</a></li>--}}
            {{--<li><a href="reports.html"><span class="icon icon-chart"></span>统计报表</a></li>--}}
        {{--</ul>--}}

        <div class="headerwidget">
            <div class="earnings">
                <div class="one_half">
                    <h4>今日销售额</h4>
                    <h2>$640.01</h2>
                </div><!--one_half-->
                <div class="one_half last alignright">
                    <h4>Current Rate</h4>
                    <h2>53%</h2>
                </div><!--one_half last-->
            </div><!--earnings-->
        </div>
        <!--headerwidget-->

    </div><!--header-->

    <div class="vernav2 iconmenu">
        <ul>
            <li><a href="#formsub" class="editor">管理员管理</a>
                <span class="arrow"></span>
                <ul id="formsub">
                    <li><a href="{{ url('admin/ad')  }}">列表</a></li>
                    <li><a href="{{ url('admin/ad/create') }}">添加</a></li>
                </ul>
            </li>
			<li><a href="#movie" class="editor">电影管理</a>
                <span class="arrow"></span>
                <ul id="movie">
                    <li><a href="{{ url('admin/movie')  }}">列表</a></li>
                    <li><a href="{{ url('admin/movie/create') }}">添加</a></li>
                </ul>
            </li>
            <li><a href="#type" class="editor">类型管理</a>
                <span class="arrow"></span>
                <ul id="type">
                    <li><a href="{{ url('admin/type')  }}">列表</a></li>
                    <li><a href="{{ url('admin/type/create') }}">添加</a></li>
                </ul>
            </li>
            <li><a href="#formsuba" class="editor">影院管理</a>
                <span class="arrow"></span>
                <ul id="formsuba">
                    <li><a href="{{ url('admin/cinema')  }}">列表</a></li>
                    <li><a href="{{ url('admin/cinema/create') }}">添加</a></li>
                </ul>
            </li>
            <li><a href="#formsubd" class="editor">影厅管理</a>
                <span class="arrow"></span>
                <ul id="formsubd">
                    <li><a href="{{ url('admin/room')}}">列表</a></li>
                    <li><a href="{{ url('admin/room/create') }}">添加</a></li>
                </ul>
            </li>
            <li><a href="#formsubc" class="editor">场次管理</a>
                <span class="arrow"></span>
                <ul id="formsubc">
                    <li><a href="{{ url('admin/round')}}">列表</a></li>
                    <li><a href="{{ url('admin/round/create') }}">添加</a></li>
                </ul>
            </li>
            <li><a href="#user" class="editor">普通用户管理</a>
                <span class="arrow"></span>
                <ul id="user">
                    <li><a href="{{ url('admin/user')}}">列表</a></li>
                </ul>
            </li>
            <li><a href="#lunbo" class="editor">首页轮播管理</a>
                <span class="arrow"></span>
                <ul id="lunbo">
                    <li><a href="{{ url('admin/carousel')}}">列表</a></li>
                    <li><a href="{{ url('admin/carousel/create') }}">添加</a></li>
                </ul>
            </li>
            <li><a href="#order" class="editor">订单管理</a>
                <span class="arrow"></span>
                <ul id="order">
                    <li><a href="{{ url('admin/order')}}">列表</a></li>
                    <li><a href="{{ url('admin/order/refund') }}">处理退款</a></li>
                </ul>
            </li>
            <li><a href="#asd" class="editor">榜单管理</a>
                <span class="arrow"></span>
                <ul id="asd">
                    <li><a href="{{ url('admin/list')  }}">列表</a></li>
                    <li><a href="{{ url('admin/list/create') }}">添加</a></li>
                </ul>
            </li>
        </ul>
        {{--缩回去--}}
        {{--<a class="togglemenu"></a>--}}
        <br /><br />
    </div><!--leftmenu-->

    <div class="centercontent">
    @yield('content')
    </div><!-- centercontent -->


</div><!--bodywrapper-->

</body>
</html>
