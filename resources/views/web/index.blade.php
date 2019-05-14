@extends('web.layouts.home')
@section('title','工程行业技术服务众包平台')
@section('css')
    <style>

        body {
            /*padding-top: 60px !important;*/
            font-size: 18px;
        }

        .ui-dialog {
            font-size: 14px;
        }

        .header {
            position: fixed;
        }
    </style>
@endsection
@section('content')

@component('web.layouts.compatible')
@endcomponent



<!--<a href="javascript:void(0)" onclick="show_little_alert('show_login_div')">-->
<!--登录参与-->
<!--</a>-->
<style>
    #show_login_div .Validform_wrong {
        display: flex;
        align-items: center;
        padding: 5px 20px;
        font-size: 12px;
    }

    #show_login_div .Validform_wrong::before {
        content: '';
        background: url(/web/static/images/login_error_icon-2fdef50ff4540ce104cd74e7fcd05fb63bc863e243d4feebf77a5d7dec3f957a.png) no-repeat; /*兼容没测*/
        background-size: cover;
        display: inline-block;
        width: 16px;
        height: 16px;
        margin-right: 2px;
    }
</style>
<div id="show_login_div" style="display: none;">
    <div class="font20 little-alert" style="top: 80px;position: fixed;">
        <div class="alert-header">
            <span class="title">欢迎登录！</span>
            <i class="close-icon" onclick="polling_flag = false;$('#show_login_div').hide();"></i>
        </div>
        <div class="alert-content">
            <div class="bid_form_div" style="padding: 20px 20px 10px 20px;text-align:center;">
                <div class="publish-item login-type-select">
                    <div style="display: flex;margin-bottom: 20px;padding: 0 30px;">
                        <a class="font-link active" login_type="pwd" href="javascript:void(0);">密码登录</a>
                        <a class="font-link" login_type="wx" href="javascript:void(0);">微信登录</a>
                        <a class="font-link" login_type="valid" href="javascript:void(0);">验证码登录</a>
                    </div>

                    <div class="login-type">
                        <div class="pwd-login">
                            <form class="new_user" style="padding:0; margin:0;" id="new_user" action="/users/sign_in"
                                  accept-charset="UTF-8" method="post"><input name="utf8" type="hidden"
                                                                              value="&#x2713;"/><input type="hidden"
                                                                                                       name="authenticity_token"
                                                                                                       value="qsUNi7l44olPilwnlDGC9x2VauzHjIDu4OkAOMUBsPSaVvTQep3eMA1ACUFWDq9ubKZ7jHmS62Lk0xO0HfCnIA=="/>
                                <p><span class="font-red" style="font-size:14px;" id="err_msg"></span></p>
                                <table class="publish-project_info" style="width: 80%; margin: 0 auto;" cellspacing="0"
                                       cellpadding="0">
                                    <tr>
                                        <td>
                                            <input autofocus="autofocus" id="new_user_mobile" placeholder="请输入手机号"
                                                   datatype="*" class="ui-input" style="width:400px" nullmsg="不能为空"
                                                   type="text" value="" name="user[mobile]"/>
                                            <div class="Validform_checktip"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input autocomplete="off" id="user_pwd"
                                                   onkeydown="if(event.keyCode==13){document.getElementById(&#39;btn_login&#39;).click();return false};"
                                                   placeholder="请输入您的密码" datatype="*" nullmsg="不能为空" style="width:400px"
                                                   class="ui-input" type="password" name="user[password]"/>
                                            <div class="Validform_checktip"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="font14 left"
                                            style="padding-left:20px;display: flex;justify-content: space-between;">
                        <span>
                          <label style="margin: 0;" for="ck_rmbUser">记住密码</label>
                          <input type="checkbox" name="ck_rmbUser" id="ck_rmbUser" value="1"
                                 style="margin: 0 0 0 2px;"/>
                        </span>
                                            <span>
                          <a class="font14 font-green1 mr20" href="/users/password/new">忘记密码?</a>
                        </span>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="button" class="font16 ui-btn confirm-btn" style="width: 374px;"
                                                   onclick="$('#err_msg').text('');" id="btn_login" AUTOCOMPLETE="off"
                                                   value="登录">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font16" style="color: #337ab7;"
                                               href="/member_applies?from=nav_top">注册</a>

                                            <!--                        <span>-->
                                            <!--                        </span>-->
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="wx-login">
                            <img style="height: 160px;width: 160px;" id="wx_qr_img"
                                 src="/web/static/picture/default_qr_code-e370b7478685a8868ad8f637a4b82d704cdafdb953b8fc24cb47930ca4a964f5.jpg"
                                 alt="Default qr code e370b7478685a8868ad8f637a4b82d704cdafdb953b8fc24cb47930ca4a964f5"/>
                            <span class="font16" style="padding: 20px 0 0 0;">使用微信扫一扫登录</span>
                        </div>
                        <div class="valid-login">
                            <form id="login_by_mobile-for-login" action="/origins/login_by_mobile"
                                  accept-charset="UTF-8" method="post"><input name="utf8" type="hidden"
                                                                              value="&#x2713;"/><input type="hidden"
                                                                                                       name="authenticity_token"
                                                                                                       value="tZo4uru4kHbqTivUHfq1eE4dl9T4rhMmLA/WbRibDuiFCcHheF2sz6iEfrLfxZjhPy6GtEaweKooNcXhwGoZPA=="/>
                                <div><span style="font-size:14px;" id="tip-msg"></span></div>
                                <table class="publish-project_info" style="width: 80%; margin: 0 auto;" cellspacing="0"
                                       cellpadding="0">
                                    <tr>
                                        <td colspan="2">
                                            <input type="tel" name="mobile" id="mobile" datatype="m" class="ui-input"
                                                   style="width:400px;" placeHolder="请输入您的手机号码"/>
                                            <div class="Validform_checktip"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div style="width: 400px;margin: 0 auto;display: flex;"
                                                 id="validate_code_div">
                          <span style="flex: 1 1 auto;">
                            <input type="text" class="ui-input" name="validate_code" id="validate_code-for-login"
                                   style="width: 100%;" placeholder="请输入验证码" value="">
                            <div class="Validform_checktip"></div>
                          </span>
                                                <span style="padding: 0 10px;display: flex;flex-flow: column;justify-content: center;"
                                                      id="validate_code_tip">
                           <a href="#" id="yzm_btn_reg_box_for_login" onclick="yzm_reg_box();">获取短信验证码</a>
                          </span>
                                            </div>
                                        </td>
                                        <!--<input type="button" onclick="send_code()" id="yzm_btn_reg_box_for_login" class="validate-code-btn" value="获取验证码">-->
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <p style="display: none; text-align: left;" id="wait_tip">
                                                请您耐心等待…… <br>
                                                您将会接到12590开头的电话为您播报验证码。
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="button" class="font16 ui-btn confirm-btn" style="width: 374px;"
                                                   onclick="submit_by_ajax(this)" AUTOCOMPLETE="off" value="登录">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a class="font16" style="color: #337ab7;"
                                               href="/member_applies?from=nav_top">注册</a>

                                            <!--                        <span>-->
                                            <!--                        </span>-->
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shade-div"></div>
</div>


<form id="new_reg_validate_code" action="/validate_codes/create_reg" accept-charset="UTF-8" method="post"><input
            name="utf8" type="hidden" value="&#x2713;"/><input type="hidden" name="authenticity_token"
                                                               value="iSKcAEXjN+icVPoaKKTMZaxhgXaBB83zm70RW7Mdt4S5sWVbhgYLUd6er3zqm+H83VKQFj8Zpn+fhwLXa+ygUA=="/>
    <input type="hidden" name="validate_code[receiver]" id="reg_validate_code_receiver" value=""/>
    <input type="hidden" name="validate_code[send_type]" id="reg_validate_code_type" value=""/>
</form>
<script type="text/javascript">
    var polling_flag = false;
    $(function () {
        var form_login = $("#new_user").Validform({
            btnSubmit: "#btn_login",
            showAllError: true,
            tiptype: 4,
            ajaxPost: true,
            beforeSubmit: function (curform) {
                $('#btn_login').val('正在登录...');
                $('#btn_login').attr('disabled', true);
            },
            callback: function (data) {
                if (data.status == "200" || data.status == 302) {
                    save_login_info();
//                  手机密码登录成功弹出登录成功窗口

                    if (data.status == "200") {
                        var replace_href = top.location.href;
//                  点击意见反馈弹出框需登录 登录后弹出意见反馈窗口标志
                        var form_href = $("#new_user").attr("action");
                        if (form_href.match(/show_fb_dlg=true/)) {
                            replace_href += (replace_href.match(/\?/) ? "&show_fb_dlg=true" : "?show_fb_dlg=true");
                        }
                        top.location.replace(replace_href);
                    } else if (data.status == 302) {
                        top.location.reload();
                    }

                } else if (data.status == "422") {
                    $("#err_msg").text("页面已过期，请刷新页面后登陆！");
                    $('#btn_login').val('登录');
                    $('#btn_login').removeAttr('disabled');
                } else {
                    $("#err_msg").text("用户名或密码错误！");
                    $('#btn_login').val('登录');
                    $('#btn_login').removeAttr('disabled');
                }
                //$("#new_user_mobile").focus();
            }

        });
        form_login.tipmsg.r = " ";


        $('.font-link').on('click', function () {
            $('.font-link').removeClass('active');
            $(this).addClass('active');
            var login_type = $(this).attr('login_type');
            $('#tip-msg').text('');
            if (login_type == 'pwd') {
                $('.login-type').animate({
                    marginLeft: '0',
                    opacity: '0.5'
                }, 500);
                $('.login-type').animate({
                    marginLeft: '0',
                    opacity: '1'
                }, 300);
                polling_flag = false;
            }

            if (login_type == 'wx') {
                $('#wx_qr_img').css('filter', 'blur(4px)');
                $('.login-type').animate({
                    opacity: '0.5',
                    marginLeft: '-460px',
                    opacity: '1'
                }, 500, function () {
                    $.ajax({
                        type: 'get',
                        dataType: 'json',
                        url: "/home/get_qr_ticket",
                        success: function (result, status, o) {
                            polling_flag = true;
                            if ($('#wx_qr_img').attr('src') === 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' + result['login_qr_ticket']) {
                            } else {
                                $('#wx_qr_img').attr('src', 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' + result['login_qr_ticket']);
                            }
                            // $('#wx_qr_img').attr('src', 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' + 'gQG27zwAAAAAAAAAAS5odHRwOi8vd2VpeGluLnFxLmNvbS9xLzAyRE5xaE1hZGlkTDExN3hnVU5zMVoAAgRh-zZcAwSAUQEA');
                            $('#wx_qr_img').css('filter', '');
                            polling_find_user(0);
                        }
                    });
                });

            }


            if (login_type == 'valid') {
                $('#login_by_mobile-for-login').attr('action', $('#login_by_mobile-for-login').attr('action').replace(/scene_id=\d*/, '1=1'));
                $('.login-type').animate({
                    marginLeft: '-920px',
                    opacity: '0.5'
                }, 500);

                $('#validate_code_tip').html("<a href='#' id='yzm_btn_reg_box_for_login' onclick='yzm_reg_box();'>获取短信验证码</a>");

                $('.login-type').animate({
                    opacity: '1'
                }, 300);
                polling_flag = false;
            }

        });

        //记住密码
        if ($.cookie("rmbUser") == "true") {
            $("#ck_rmbUser").prop("checked", true);
            $("#new_user_mobile").val($.cookie("new_user_mobile"));
            $("#user_pwd").val($.cookie("user_pwd"));
        }
    });
    // }).call(this);

    //获取语音验证码
    function getVoiceCode_by_login(e) {
        var mobile = $('#mobile').val();
        if (!(/^1[0-9]{10}$/.test(mobile))) {
            // alert("请输入正确的手机号");
            $('#mobile').next('.Validform_checktip').addClass('Validform_wrong').text('请输入正确的手机号');
            return;
        } else {
            $('#mobile').next('.Validform_checktip').removeClass('Validform_wrong').text('');
        }
        $('#reg_validate_code_type').val('voice');
        $('#reg_validate_code_receiver').val(mobile);
        $("#new_reg_validate_code").ajaxSubmit({
            success: function (data) {
                $(e).parent().remove();
                $('#wait_tip').show();
            },
            error: function () {
                alert("异常错误");
            }
        });
    };

    function yzm_reg_box() {
        var mobile = $('#mobile').val();
        if (!(/^1[0-9]{10}$/.test(mobile))) {
            // alert("请输入正确的手机号");
            $('#mobile').next('.Validform_checktip').addClass('Validform_wrong').text('请输入正确的手机号');
            return;
        } else {
            $('#mobile').next('.Validform_checktip').removeClass('Validform_wrong').text('');
        }
        $('#reg_validate_code_receiver').val(mobile);
        $('#reg_validate_code_type').val('sms');
        $("#new_reg_validate_code").ajaxSubmit({
            dataType: 'script',
            success: function (data) {
                return timing($("#yzm_btn_reg_box_for_login"));
            },
            error: function () {
                return alert("异常错误");
            }
        });
    };

    function timing($e) {
        $p_node = $e.parent();
        var wait = 60;
        $p_node.html("未接到短信？(" + wait + ")秒后<br><a href='#'>点此获取语音验证码</a>");
        var stop_code = setInterval(function () {
            wait--;
            if (wait === 0) {
                $p_node.html("未接到短信？<br><a href='#' onclick='getVoiceCode_by_login(this)'>点此获取语音验证码</a>");
                wait = 60;
                return clearInterval(stop_code);
            } else {
                $p_node.html("未接到短信？(" + wait + ")秒后<br><a href='#'>点此获取语音验证码</a>");
            }
        }, 1000);
    };

    function submit_by_ajax(e) {
        var mobile = $('#mobile').val();
        var validate_code = $('#validate_code-for-login').val();
        if (!(/^1[0-9]{10}$/.test(mobile))) {
            // alert("请输入正确的手机号");
            $('#mobile').next('.Validform_checktip').addClass('Validform_wrong').text('请输入正确的手机号');
            return;
        } else {
            $('#mobile').next('.Validform_checktip').removeClass('Validform_wrong').text('');
        }
        $.ajax({
            sync: true,
            type: 'post',
            url: '/validate_codes/check_validate_code.json',
            data: {
                'mobile': mobile,
                'validate_code': validate_code,
                authenticity_token: $("#login_by_mobile-for-login input[name='authenticity_token']").val()
            },
            dataType: 'json',
            success: function (json) {
                if (json) {
                    $('#validate_code-for-login').next('.Validform_checktip').removeClass('Validform_wrong').text('');
                    $("#login_by_mobile-for-login").submit();
                } else {
                    // alert('验证码有误!');
                    $('#validate_code-for-login').next('.Validform_checktip').addClass('Validform_wrong').text('验证码有误!');
                    $(e).val('登录');
                    $(e).removeAttr('disabled');
                }
            },
            beforeSend: function () {

                $(e).val('正在登录...');
                $(e).attr('disabled', true);
            },
            error: function () {
                alert('网络繁忙，请稍候重试！');
            }
        })
    }

    //记住用户名密码
    function save_login_info() {
        if ($("#ck_rmbUser").prop("checked")) {
            var new_user_mobile = $("#new_user_mobile").val();
            var user_pwd = $("#user_pwd").val();
            $.cookie("rmbUser", "true", {expires: 7}); //存储一个带7天期限的cookie
            $.cookie("new_user_mobile", new_user_mobile, {expires: 7});
            $.cookie("user_pwd", user_pwd, {expires: 7});
        } else {
            $.cookie("rmbUser", "false", {expire: -1});
            $.cookie("new_user_mobile", "", {expires: -1});
            $.cookie("user_pwd", "", {expires: -1});
        }
    }

    function polling_find_user(recursion_deep) {
        if (polling_flag) {
            var num = recursion_deep;

            $.ajax({
                type: 'get',
                url: "/home/polling_find_user_from_qr",
                dataType: 'json',
                success: function (r) {
                    if (r.tf) {
                        window.location.reload();
                    } else {
                        console.log('polling_f_u' + '--' + num.toString());
                        if (r.scene_id && num > 0) {
                            var replace_href = $('#login_by_mobile-for-login').attr('action');
                            replace_href += (replace_href.match(/\?/) ? "&scene_id=" + r.scene_id : "?scene_id=" + r.scene_id);
                            $('#login_by_mobile-for-login').attr('action', replace_href);
                            // 滑动到手机号登录界面
                            $('#tip-msg').text('为了您的账户安全，请完成手机验证一键登录哦！');
                            $('.login-type').animate({
                                marginLeft: '-920px',
                                opacity: '0.5'
                            }, 500);
                            $('.login-type').animate({
                                opacity: '1'
                            }, 300);
                            polling_flag = false;
                        } else {
                            setTimeout(
                                function () {
                                    polling_find_user(++num)
                                }, 2000);
                        }
                    }
                }
            });
        }
    }
</script>


<style type="text/css">

    .nav-tabs > li {
        margin-left: 84px;
        margin-top: 48px;
        vertical-align: middle;
    }

    .nav-tabs li img {
        background: url(/web/static/images/home_value_icon-adc2ba539e3f22784c35132e3ed6356cc45af38f9f179bd55ea4b651c1ae05e2.png) -43px 0 no-repeat;
        width: 42px;
        height: 42px;
        margin-right: 5px;
    }

    .nav-tabs li.active img, .nav-tabs li:hover img {
        background-position-x: 0;
    }

    .nav-tabs > li > a, .nav-tabs a {
        height: 70px;
        line-height: 70px;
        border: none;
        display: inline-block;
        width: 155px;

        padding: 0;
    }

    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
        border: none;
        border-bottom: #f04a00 3px solid;
        color: #f06747;
        background-position-x: 0;

    }

    .nav-tabs > li.active > a, .nav-tabs > li > a:hover,
    .nav-tabs > li > a:focus, .nav-tabs > li > a:active, .nav-tabs > li > a:visited {
        border: none;
        background: white;
        height: 70px;
        line-height: 70px;
        border-bottom: #f04a00 3px solid;
    }

    .tab-content > .tab-pane {
        height: 400px;
    }

    .ys-ct {
        padding-left: 526px;
        height: 350px;
        background: url(/web/static/images/home_speed_pic-1d29789c15a79057c82c606ec118e84ffbbfeb1aa5d0aa8dbbbbc04e4ed91e3b.png) 0 0 no-repeat;
        text-align: left;
        margin-top: 44px;
        margin-left: 130px;
    }

    .ys-ct h4 {
        color: #333;
        font-size: 16px;
        margin-top: 30px;
    }

    .ys-ct p {
        color: #999;
        font-size: 14px;
    }

    .pub_b a {
        width: 240px;
        height: 52px;
        line-height: 52px;
        display: inline-block;
        background: #f06747;
        font-size: 18px;
        color: white;
        border-radius: 4px;
        box-shadow: 0px 3px 4px rgba(170, 45, 5, 0.3);
        margin-top: 40px;
        margin-bottom: 56px;
    }

    .pub_b a:hover {
        background: #f57d60;
    }

    .font28 {
        font-size: 28px;
    }

    .home_tj {
        background-color: #f5f5f5;
        margin: -50px auto 0 auto;
        width: 100%;
    }

    .home_tj .border_top {
        width: 1054px;
        height: 138px;
        background: white;
        z-index: 12;
        font-size: 40px;
        position: relative;
        border-radius: 8px;
        margin: 0 auto;
        box-shadow: 0 50px 31px -52px #b2ababe6;
    }

    .swiper-container-horizontal > .swiper-pagination-bullets, .swiper-pagination-custom, .swiper-pagination-fraction {
        bottom: 70px;
    }

    .ct .item {
        margin-top: 44px;
        margin-bottom: 38px;
        line-height: 100%;
    }

    .fa .item {
        width: 240px;
        height: 280px;
        margin-right: 30px;
        background: #ffffff;
        border-radius: 4px;
        margin-bottom: 50px;
    }

    .item h5 {
        font-size: 28px;
        color: #333333;
        margin-bottom: 8px;
    }

    h2 {
        font-size: 24px;
    }

    .w {
        width: 1054px;
    }

    .nav-tabs {
        border-bottom: 1px solid #e7e7e7;
    }

    .swiper-button-next, .swiper-button-prev {
        height: 32px !important;
    }
</style>

<div class="slideBox">
    <div class="swiper-container">
        <div class="swiper-wrapper">


            <div class="swiper-slide">
                <img style="background:url('/web/static/images/home_banner_bg-ab7bd04a6cf9778ae68e3a187e4452c3f79520a8b17cfd5c5614959e4b3a92a9.jpg') center;"
                     src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif"
                     alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef"/>
                <div class="banner_text">
                    <!--          <h1>工程行业技术服务众包平台</h1>-->

                    <!--          <p>快速可靠，让工程计量更简单!</p>-->
                    <h1>工程咨询服务众包平台</h1>

                    <p>您的云端造价部，让工程咨询更简单!</p>


                    <div>
                        <a href="/projects/release">免费发布项目</a>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <a target="_blank" href="http://www.3kgc.com/apply_companies/vip?from=shouye"><img
                            style="background:url('/web/static/images/3066431509_____.jpg') center;"
                            src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif"
                            alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef"/></a>
            </div>
            <div class="swiper-slide">
                <a target="_blank" href="http://www.3kgc.com/articles/1827"><img
                            style="background:url('/web/static/images/2902961071____.jpg') center;"
                            src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif"
                            alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef"/></a>
            </div>
            <div class="swiper-slide">
                <a target="_blank" href="http://www.3kgc.com/home/y2018"><img
                            style="background:url('/web/static/images/402464767_____banner2018.jpg') center;"
                            src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif"
                            alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef"/></a>
            </div>

        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</div>

<script type="text/javascript">
    var mySwiper = new Swiper('.swiper-container', {
        loop: true,
        autoplay: 4000,
        speed: 500,
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
    });
    //        $(function(){
    //            $('.tabs-panel a').hover(function (e) {
    //                e.preventDefault();
    //                $(this).tab('show');
    //            })
    //        })
</script>
<style type="text/css">

</style>
<div class="home_tj">
    <div class="border_top">
        <div class="w ct text_center content clearfix">
            <div class="item">
                <h5>
                    67,120,933</h5>
                <h4>项目累计金额</h4>
            </div>
            <div class="item item_center">
                <h5>19470</h5>
                <h4>项目数量</h4>
            </div>
            <div class="item">
                <h5>44863</h5>
                <h4>已加入航哥</h4>
            </div>
        </div>
    </div>
</div>
<div class="bg_gray fa">
    <div class="w text_center content clearfix">
        <h2 class="mt60">项目解决方案</h2>

        <div class="item">
            <p class="kp"></p>

            <h3>常规计量计价项目</h3>
            <h4>平台推荐合适航哥<br/>航哥自检成果<br/>平台检查成果完整性</h4>
        </div>
        <div class="item item_center">
            <p class="sx"></p>

            <h3>紧急项目</h3>
            <h4>
                拆分多个项目<br/>
                多名航哥多任务同时工作<br/>
                调整、复核、交付
            </h4>
        </div>
        <div class="item">
            <p class="sq"></p>

            <h3>大体量项目</h3>
            <h4>平台拆分多标段同步实施<br/>配备项目经理、复核专家<br/>
                全程管控进度质量 100%交付</h4>
        </div>
        <div class="item" style="margin-right: 0;">
            <p class="xc"></p>

            <h3>现场服务项目</h3>
            <h4>航哥覆盖全国各专业<br/>授权城市工作中心快速响应<br/>本地化服务更贴心</h4>
        </div>
    </div>

</div>
<div class="w text_center content clearfix">
    <h2 class="mt60">专业高效，为您创造价值</h2>

    <div class="tabs-panel">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                    <img src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif"
                         alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef"/>速度快
                </a>
            </li>
            <li role="presentation">
                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">
                    <img style="background-position-y:-44px;"
                         src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif"
                         alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef"/>航哥好
                </a>
            </li>
            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">
                    <img style="background-position-y:-88px;"
                         src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif"
                         alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef"/>保障全
                </a>
            </li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">
                    <img style="background-position-y:-130px;"
                         src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif"
                         alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef"/>成本低
                </a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content yous">
            <div role="tabpanel" class="tab-pane active" id="profile">
                <div class="ys-ct">
                    <h4>发布快</h4>

                    <p>1分钟将项目需求提交至平台

                    </p>

                    <p>平台审核项目需求，立即对外发布</p>
                    <h4>响应快</h4>

                    <p>1秒微信通知全国航哥

                    </p>

                    <p>最快5分钟就有航哥投标</p>

                    <p>
                        50%以上的项目2小时内进入工作

                    </p>
                    <h4>干活快</h4>

                    <p>诚信航哥使命必达保障交付
                    </p>

                    <p>标准化作业效率提升50%以上
                    </p></div>
            </div>


            <div role="tabpanel" class="tab-pane" id="home">
                <div class="ys-ct"
                     style="background-image: url('/web/static/images/home_sk_pic-c52ecf1d8c4617a1670b790c3d29c2195c901051a7fe832c324a81c7347749c9.png')">


                    <h4>数量多</h4>

                    <p>目前平台拥有航哥：44000+名
                    </p>

                    <p>5年工作经验以上占比48%</p>
                    <h4>覆盖广</h4>

                    <p>全国23个省，5个自治区，4个直辖市
                    </p>

                    <p>涵盖市政、电力、水利等行业</p>

                    <p>

                    </p>
                    <h4>资料全</h4>

                    <p>航哥均通过身份实名认证
                    </p>

                    <p>通过平台专业认证考试
                    </p>

                    <p>航哥资料、项目经验、雇主评价公开展示</p>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="messages">
                <div class="ys-ct"
                     style="background-image: url('/web/static/images/home_protect_pic-14936cfa42dee9242868f6a456f13e2b2048054cc4c3886b761c0c13575d0dee.png')">
                    <h4>进度保障</h4>

                    <p>航哥每2天更新一次进度
                    </p>

                    <p>通过网站、微信，随时随地掌控</p>

                    <p>90%的项目准时交付</p>
                    <h4>质量保障</h4>

                    <p>平台提供1个月质保，有问题立即修改
                    </p>

                    <p>航哥托管保证金担保，造成损失可维权</p>

                    <h4>服务保障</h4>

                    <p>专业顾问梳理需求、大数据算法推荐航哥
                    </p>
                    <p>
                        雇主将费用托管到平台，满意后再付款
                    </p>
                    <p>委托项目100%交付保障
                    </p></div>
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">
                <div class="ys-ct"
                     style="background-image: url('/web/static/images/home_cost_pic-2ee128ee379fd914454d08950138c415f2f8a1655447cbde46ededc32e128b68.png')">
                    <h4>免费</h4>

                    <p>雇主发布项目不收取费用
                    </p>

                    <p>为项目推荐航哥不收取费用</p>
                    <h4>省钱</h4>

                    <p>比传统找人方式节省30%费用
                    </p>
                    <h4>定价透明、合理</h4>

                    <p>项目定价可以参考平台定价规则
                    </p>

                    <p><a href="http://www.3kgc.com/articles/317">查看定价规则</a></p>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="bg_gray h500" style="height: 600px;">
    <div class="w text_center content clearfix">
        <table width="100%">
            <tr>
                <td width="650" align="right">
                    <div style="width:700px;height:600px;">
                        <iframe id="iframe_content" frameborder="no" border="0"
                                src="/home/work_center"
                                scrolling="no" style="width:700px;height:600px;">

                        </iframe>
                    </div>
                </td>
                <td align="left">
                    <p style="font-size:24px;">授权工作中心</p>
                    <p style="font-size:24px;">本地化服务更贴心</p>
                </td>
            </tr>
        </table>
    </div>
</div>


<div class="w text_center content clearfix company-publicity">
    <div class="publicity-title">
        企业/团队服务商
    </div>
    <div class="flex-div">
        <div class="publicity-item item-left">
            <div class="join-count">
                139
            </div>
            <div class="join-list">
                <div class="com-list">
                    <div style="height: 276px; overflow-y: hidden;">
                        <div class="dynamic-list">
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/39516?from=home_page">湖南筑龙工程项目管理有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/1413?from=home_page">河南云瓴工程管理有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/79585?from=home_page">深圳群伦项目管理有限公司三河分公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/111404?from=home_page">江苏绿巢工程咨询有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/66900?from=home_page">泰诚造价管理咨询服务团队</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/111384?from=home_page">聚星工程造价咨询工作室</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/108114?from=home_page">甘肃盛宏工程造价咨询有限责任公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/110533?from=home_page">北京求臻工程管理有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/18915?from=home_page">嘉鹏工作室</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/72675?from=home_page">精诚造价咨询工作室</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/110366?from=home_page">北京数字智诚科技发展有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/25199?from=home_page">北京利安欣达工程造价咨询有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/62731?from=home_page">亿沐团队</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/34192?from=home_page">北京中兴恒工程咨询有限公司潍坊分公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/408?from=home_page">诚信造价工作室</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/98929?from=home_page">新疆中咨建设项目管理有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/109019?from=home_page">四川省信达年华建设管理有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/109374?from=home_page">佳业工程造价咨询工作室</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/109350?from=home_page">华晟建筑工程咨询</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/17675?from=home_page">河北佳时工程项目管理咨询有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/108968?from=home_page">天津宏诚工程造价咨询有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/44038?from=home_page">京圆造价咨询工作室</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/63955?from=home_page">上上造价工作室</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/108744?from=home_page">宁波欣达建设项目管理有限公司绍兴分公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/106676?from=home_page">北京中城垣工程咨询有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/106903?from=home_page">河北信雅工程项目管理有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/37824?from=home_page">徐州春鸣工程项目管理有限公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/108271?from=home_page">娅旗工作室</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/105337?from=home_page">敬业先锋团队</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                            <div class="dynamic-item">
                                <div>
                                    <a target="_blank" href="/c/21033?from=home_page">北京兴鹏建筑工程有限责任公司</a>
                                </div>
                                <div>
                                    入驻
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="publicity-item item-right">
            <div class="see-com">
                <img src="/web/static/picture/home_enterprise_words_pc-0133843352fb6475f1b6a913d6ba16552cfa2cc35e22f69bed014c2225f2f410.png"
                     alt="Home enterprise words pc 0133843352fb6475f1b6a913d6ba16552cfa2cc35e22f69bed014c2225f2f410"/>
                <a class="buy-com-btn" href="/companies/vip">了解企业</a>
            </div>
            <div class="pioneer-com">
                <div>
                    <span class="cooperate-tip">这些先锋企业/团队也选择与航哥工场合作</span>
                    <a class="link-more" href="/companies">查看更多</a>
                </div>
                <table class="com-img-grid">
                    <tr>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/111404?from=home_page">江苏绿巢工程咨询有限公司</a>
                            <div class="logo
                    gold
 ">
                                <img src="/web/static/picture/3803048588_____.png" alt="3803048588     " width="83"
                                     height="83"/>
                            </div>
                        </td>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/66900?from=home_page">泰诚造价管理咨询服务团队</a>
                            <div class="logo
                      copper
                   ">
                                <img src="/web/static/picture/2069636631_e1cf4f9b3b80b6f1bf4c98718c41ae6d.jpg"
                                     alt="2069636631 e1cf4f9b3b80b6f1bf4c98718c41ae6d" width="83" height="83"/>
                            </div>
                        </td>
                        <td>
                            <a class="com-name-show" target="_blank"
                               href="/c/108114?from=home_page">甘肃盛宏工程造价咨询有限责任公司</a>
                            <div class="logo
                      copper
                   ">
                                <img src="/web/static/picture/2513812320_qq__20190318175913.png"
                                     alt="2513812320 qq  20190318175913" width="83" height="83"/>
                            </div>
                        </td>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/72675?from=home_page">精诚造价咨询工作室</a>
                            <div class="logo
                      copper
                   ">
                                <img src="/web/static/picture/412401079_______.jpg" alt="412401079       " width="83"
                                     height="83"/>
                            </div>
                        </td>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/17675?from=home_page">河北佳时工程项目管理咨询有限公司</a>
                            <div class="logo
                    gold
 ">
                                <img src="/web/static/picture/2457783837_qq__20180920135648_-___.png"
                                     alt="2457783837 qq  20180920135648     " width="83" height="83"/>
                            </div>
                        </td>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/106903?from=home_page">河北信雅工程项目管理有限公司</a>
                            <div class="logo
                      copper
                   ">
                                <img src="/web/static/picture/1607937403______20190403155151.jpg"
                                     alt="1607937403      20190403155151" width="83" height="83"/>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/108271?from=home_page">娅旗工作室</a>
                            <div class="logo
                      copper
                   ">
                                <img src="/web/static/picture/1943176601______20190402173956.jpg"
                                     alt="1943176601      20190402173956" width="83" height="83"/>
                            </div>
                        </td>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/21033?from=home_page">北京兴鹏建筑工程有限责任公司</a>
                            <div class="logo
                      copper
                   ">
                                <img src="/web/static/picture/140888175______20190328115041.jpg"
                                     alt="140888175      20190328115041" width="83" height="83"/>
                            </div>
                        </td>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/64?from=home_page">泸州坤伦工程咨询有限公司</a>
                            <div class="logo
                      copper
                   ">
                                <img src="/web/static/picture/2422327618_3e7837b0ffa330fb98a2171cac2a7d94252443c3.jpg"
                                     alt="2422327618 3e7837b0ffa330fb98a2171cac2a7d94252443c3" width="83" height="83"/>
                            </div>
                        </td>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/103939?from=home_page">大鹏工程造价咨询工作室</a>
                            <div class="logo
                      copper
                   ">
                                <img src="/web/static/picture/1684798044______.jpg" alt="1684798044      " width="83"
                                     height="83"/>
                            </div>
                        </td>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/46235?from=home_page">阳光造价咨询工作室</a>
                            <div class="logo
                      copper
                   ">
                                <img src="/web/static/picture/3523332047_261dd4dfef4fc9028484b5396f8f4d7.jpg"
                                     alt="3523332047 261dd4dfef4fc9028484b5396f8f4d7" width="83" height="83"/>
                            </div>
                        </td>
                        <td>
                            <a class="com-name-show" target="_blank" href="/c/2316?from=home_page">河北算佳项目管理有限公司</a>
                            <div class="logo
                      copper
                   ">
                                <img src="/web/static/picture/100243636_1551356330_1_.png" alt="100243636 1551356330 1 "
                                     width="83" height="83"/>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <script type="text/javascript" charset="utf-8">
            auto_scroll($(".dynamic-list").eq(0), 1000);
        </script>
    </div>
</div>

<div class="w text_center content clearfix bg_gray" style="width: 100%;">
    <h2 class="mt60 font28">航哥工场为您的业务保驾护航!</h2>

    <div class="pub_b">
        <a href="/projects/release">免费发布项目</a>

    </div>
</div>

<div class="profession-member">
    <div class="sy_hzhb">

        <div class="hz_logo">
            <ul>
                <li><a target="_blank" href="http://www.3kgc.com/articles/116"><img
                                src="/web/static/picture/logo_gld-927bec57c9890d60ce361b1af345f150d3cdc9dcab23d5fc5affc02ab0aa5c9a.png"
                                alt="Logo gld 927bec57c9890d60ce361b1af345f150d3cdc9dcab23d5fc5affc02ab0aa5c9a"/></a>
                </li>
                <li><a target="_blank" href="http://mp.weixin.qq.com/s/daSJVcKNtCl2V0jqE8Avng"><img
                                src="/web/static/picture/logo_st-361d9bd75b02f027791bd182c7ce05032d11f4e3c1b348017c3ece39de1a9da7.jpg"
                                alt="Logo st 361d9bd75b02f027791bd182c7ce05032d11f4e3c1b348017c3ece39de1a9da7"/></a>
                </li>
                <li><a target="_blank" href="https://mp.weixin.qq.com/s/3AO5E0y1loPnya1k8uFjbg"><img
                                src="/web/static/picture/logo_yzyw-43473670eb2bcec917a58a122db6211f5fcbea980ad6ee0a7e133906b0364d9e.png"
                                alt="Logo yzyw 43473670eb2bcec917a58a122db6211f5fcbea980ad6ee0a7e133906b0364d9e"/></a>
                </li>
                <li><a target="_blank" href="http://www.cwcc.net.cn"><img
                                src="/web/static/picture/logo_zs-b2c054b673c7ed2539e67c68f901e6e4c924b11c446b1011d33eebe4f94dbdf7.png"
                                alt="Logo zs b2c054b673c7ed2539e67c68f901e6e4c924b11c446b1011d33eebe4f94dbdf7"/></a>
                </li>
                <li><a target="_blank" href="http://helixin.cn"><img
                                src="/web/static/picture/logo_hlx-27d8b79e2b1d221841b659c329ca008c08074e1d6573ac50d4202256d772fed9.png"
                                alt="Logo hlx 27d8b79e2b1d221841b659c329ca008c08074e1d6573ac50d4202256d772fed9"/></a>
                </li>
                <li><a target="_blank" href="http://hbjl1998.com.cn"><img
                                src="/web/static/picture/logo_jl-63d3c30d09df421f0f8b3a08abddba3147df4149503c832bc31496dca2da6933.jpg"
                                alt="Logo jl 63d3c30d09df421f0f8b3a08abddba3147df4149503c832bc31496dca2da6933"/></a>
                </li>
            </ul>
        </div>
    </div>

</div>

@endsection

