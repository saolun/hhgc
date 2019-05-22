<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>航哥工场--@yield('title')</title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <link rel="stylesheet" media="all"
          href="/web/static/css/application-f742c9f4d291b8a5e98f7948d3ab74777a2b906c7081c9c6a7b3a231883543f5.css"
          data-turbolinks-track="true"/>

    <script src="/web/static/js/application-a53f0e0a6a61a86e6cb8f94a2fb64a861d3f1c5f341a2ae992c4adf325a4ea38.js"
            data-turbolinks-track="true"></script>
    @yield('js')
    @yield('css')
</head>

<body>
<div class="header" style="z-index: 999;">
    <div class="w rel">
        <a href="/" class="fl">
            <img src="/web/static/picture/logo-b-7dc7909fd0c649f0c33ead53590ba017abe9398b2493a0a86bff0fdbd0093c5e.png"
                 alt="Logo b 7dc7909fd0c649f0c33ead53590ba017abe9398b2493a0a86bff0fdbd0093c5e" width="147" height="38"/>
        </a>
        <ul class="mnav fl">
            <li>
                <a href="/projects/release">发布项目</a>
            </li>
            <li>
                <a href="/projects/sala">项目大厅</a>
            </li>
            <li>
                <a href="/companies">企业/团队</a>
            </li>
            <li>
                <a href="/hang-brother">找航哥</a>
            </li>
            <li>
                <a href="/case">案例展示</a>
            </li>
            <li>
                <a href="/speed">速配中心</a>
            </li>
        </ul>

        <div class="login mr">
            <div class="loginLater">
                <a class="userTitle new" href="javascript:void(0);">
                    超级合作
                    <img src="/web/static/picture/nav_dropdown-8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2.png"
                         alt="Nav dropdown 8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2"/>
                </a>

                <div class="umenu" style="position: absolute; left:0;">
                    <ul style="display: block;">
                        <li>
                            <a href="/job">求职招聘</a>
                        </li>
                        <li>
                            <a href="/cooperation">培训合作</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="login fr">


            <a class="loginButton" onclick="$('#show_login_div').show()" href="javascript:;">登录</a>

            <a class="regButton" href="{{ url('/user/register') }}">注册</a>

        </div>
    </div>
</div>
<div class="clearfix"></div>

@yield('content')
@extends('web.layouts.footer')
@extends('web.layouts.toolBar')
</body>
</html>