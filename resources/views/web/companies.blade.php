@extends('web.layouts.home')
@section('title','工程行业技术服务众包平台')
@section('css')
    <style>
        .header {
            position: relative;
            z-index: 0;
        }

        /*时间控件*/
        .ui-datepicker-title {
            display: flex !important;
            justify-content: center !important;
        }

        .ui-datepicker-year, .ui-datepicker-month {
            background: #ffffff !important;
            color: #f66626 !important;
        }
    </style>
@endsection

@section('content')


    @component('web.layouts.compatible')
    @endcomponent
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
                                <form class="new_user" style="padding:0; margin:0;" id="new_user"
                                      action="/users/sign_in" accept-charset="UTF-8" method="post"><input name="utf8"
                                                                                                          type="hidden"
                                                                                                          value="&#x2713;"/><input
                                            type="hidden" name="authenticity_token"
                                            value="BOch3X8SXxwh843AmODVDMxXvzhI2fI4dsO4+F2/lJgWc8wlo3fulymnF+rwbsjnCfjl9PaD3LX2ysae9XqkpA=="/>
                                    <p><span class="font-red" style="font-size:14px;" id="err_msg"></span></p>
                                    <table class="publish-project_info" style="width: 80%; margin: 0 auto;"
                                           cellspacing="0" cellpadding="0">
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
                                                       placeholder="请输入您的密码" datatype="*" nullmsg="不能为空"
                                                       style="width:400px" class="ui-input" type="password"
                                                       name="user[password]"/>
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
                                                <input type="button" class="font16 ui-btn confirm-btn"
                                                       style="width: 374px;" onclick="$('#err_msg').text('');"
                                                       id="btn_login" AUTOCOMPLETE="off" value="登录">
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
                                                                                                           value="funqrWtEx+EQb0U/RLRcdFw3TRdFE6QlO/0Ouk8f+xtsfQdVtyF2ahg73xUsOkGfmZgX2/tJiqi79HDc59rLJw=="/>
                                    <div><span style="font-size:14px;" id="tip-msg"></span></div>
                                    <table class="publish-project_info" style="width: 80%; margin: 0 auto;"
                                           cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td colspan="2">
                                                <input type="tel" name="mobile" id="mobile" datatype="m"
                                                       class="ui-input" style="width:400px;" placeHolder="请输入您的手机号码"/>
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
                                                <input type="button" class="font16 ui-btn confirm-btn"
                                                       style="width: 374px;" onclick="submit_by_ajax(this)"
                                                       AUTOCOMPLETE="off" value="登录">
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
                                                                   value="/RkL1bScLUkc9253j83K9bAyn1nj1tuBzTpn6LCjq2rvjeYtaPmcwhSj9F3nQ9cedZ3FlV2M9QxNMxmOGGabVg=="/>
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

    <div class="bg_gray">
        <style>
            .page-zj {
                background: white;
                margin-bottom: 10px;
                border-radius: 4px;
                padding: 0;
                margin-left: auto;
                margin-right: auto;
                width: 1100px;
            }

            .person-list img {
                width: 80px;
                height: 80px;
            }

            .hire-div {
                margin: 14px 0 10px 30px;
            }

            .hire-div .employ-btn {
                background-color: #f06746;
                border-radius: 4px;
                color: #fff;
                font-size: 14px;
                padding: 6px 30px;
                text-align: center;
                width: 100px;
                white-space: nowrap;
                position:static;
            }

            .work-center-list .info-div .logo-div {
                width: 200px;
            }

            .person-list .person-item .person-item_box {
                font-size: 14px;
                margin-left: 180px;
                color: #333;
            }

            .person-list .person-describe {
                padding-right: 20px;
            }

            .person-list .person-describe p {
                width: 100%;
                color: #666666;
                margin: 15px 0;
                line-height: 22px;
            }

            .work-center-list .info-div .grade-div {
                display: inline-block;
                padding-left: 50px;
            }

            .join-company {
                position: absolute;
                left: 850px;
                width: 100px;
            }

            .join-work_center {
                position: absolute;
                left: 800px;
                width: 100px;
            }

            .person-list td {
                padding: 20px 10px;
                min-height: 200px;
                position: relative;
            }

            .head-img a > img {
                width: 66px;
                height: 66px;
                border-radius: 4px;
            }

            .filter-tab {
                border-bottom: 1px solid #f5f5f5;
            }

            .filter-tab th {
                font-weight: normal;
                padding-bottom: 18px;
            }

            .filter-tab td {
                padding-right: 20px;
                padding-bottom: 18px;
            }

            /*.company-item > div{*/
            /*display: inline-block;*/
            /*}*/
            .company-item .row .title {
                text-align: right;
                margin: 0;
                font-size: 12px;
                color: #999999;
                display: inline-block;
            }

            .company-item .modeltype_list {
                display: inline-block;
            }

            .company-item .modeltype_list div {
                height: 22px;
                background: rgb(253, 240, 236);
                font-size: 12px;
                color: #f06746;
                border-radius: 14px;
                padding: 2px 6px;
                border: none;
                margin: 4px 0;
            }

            .company-item .row .content {
                text-align: left;
                margin: 0;
            }

            .person-info .person-name {
                margin-right: 10px;
            }

            .person-info .region-path {
                font-size: 12px;
                color: #999999;
            }

            .join-company {
                display: inline-flex;
                justify-content: center;
                align-items: center;
                border-radius: 60px;
                color: #f06746;
                font-size: 12px;
                height: 36px;
                left: 522px;
                position: absolute;
                text-align: center;
                width: 200px;
                background-color: #fdf0ec;
                top: -4px;
            }

            .join-work_center {
                display: inline-flex;
                justify-content: center;
                align-items: center;
                border-radius: 60px;
                color: #f06746;
                font-size: 12px;
                height: 36px;
                left: 742px;
                position: absolute;
                text-align: center;
                width: 200px;
                background-color: #fdf0ec;
                top: -4px;
            }

            .join-company:hover {
                cursor: pointer;
                background: #f66626;
                color: #ffffff;
            }

            .join-work_center:hover {
                cursor: pointer;
                background: #f66626;
                color: #ffffff;
            }

            .zj-filter .search-category {
                position: relative;
                width: auto;
                padding-bottom: 0px;
                border: 0px;
                margin-top: 4px;
            }

            select {
                border: solid 1px #d2d2d2;
                color: #777777;
                padding: 4px 5px;
                border-radius: 4px;
                appearance: none;
                -moz-appearance: none;
                -webkit-appearance: none;
                padding-right: 20px;
                background: url(/web/static/images/select_arrow-6873ee9b6a7bbb60626922cdf0168903310531526b61ad16be3eec1938dbf49c.png) no-repeat scroll right center transparent;

            }

            select::-ms-expand {
                display: none;
            }


        </style>
        <div class="find-member-main">
            <div class="page-zj">
                <div class="clear">
                    <form id="form_filter" action="" accept-charset="UTF-8" method="get"><input name="utf8"
                                                                                                type="hidden"
                                                                                                value="&#x2713;"/>
                        <dl class="zj-filter filter-dq">
                            <dt class="ico dq">地区:</dt>
                            <dd>
                                <div
                                        class="m-findlist-now"
                                        onclick="set_form_value('#p_region_id','')">全国
                                </div>
                                <input type="hidden" name="p_region_id" id="p_region_id"/>
                                <input type="hidden" name="s_region_id" id="s_region_id"/>
                                <div onclick="s_region_show(this, 11)"
                                >北京
                                </div>
                                <span id="region_11" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',1101)"
                        >北京</div>
                        <div onclick="set_form_value('#s_region_id',1102)"
                        >东城区</div>
                        <div onclick="set_form_value('#s_region_id',1103)"
                        >西城区</div>
                        <div onclick="set_form_value('#s_region_id',1104)"
                        >崇文区</div>
                        <div onclick="set_form_value('#s_region_id',1105)"
                        >朝阳区</div>
                        <div onclick="set_form_value('#s_region_id',1106)"
                        >海淀区</div>
                        <div onclick="set_form_value('#s_region_id',1107)"
                        >丰台区</div>
                        <div onclick="set_form_value('#s_region_id',1108)"
                        >石景山区</div>
                        <div onclick="set_form_value('#s_region_id',1109)"
                        >房山区</div>
                        <div onclick="set_form_value('#s_region_id',1110)"
                        >通州区</div>
                        <div onclick="set_form_value('#s_region_id',1111)"
                        >顺义区</div>
                        <div onclick="set_form_value('#s_region_id',1112)"
                        >大兴区</div>
                        <div onclick="set_form_value('#s_region_id',1113)"
                        >昌平区</div>
                        <div onclick="set_form_value('#s_region_id',1114)"
                        >平谷区</div>
                        <div onclick="set_form_value('#s_region_id',1115)"
                        >怀柔区</div>
                        <div onclick="set_form_value('#s_region_id',1116)"
                        >门头沟区</div>
                        <div onclick="set_form_value('#s_region_id',1117)"
                        >密云县</div>
                        <div onclick="set_form_value('#s_region_id',1118)"
                        >延庆县</div>
                  </span>
                                <div onclick="s_region_show(this, 12)"
                                >天津
                                </div>
                                <span id="region_12" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',1201)"
                        >天津</div>
                        <div onclick="set_form_value('#s_region_id',1202)"
                        >河西区</div>
                        <div onclick="set_form_value('#s_region_id',1203)"
                        >河东区</div>
                        <div onclick="set_form_value('#s_region_id',1204)"
                        >河北区</div>
                        <div onclick="set_form_value('#s_region_id',1205)"
                        >南开区</div>
                        <div onclick="set_form_value('#s_region_id',1206)"
                        >和平区</div>
                        <div onclick="set_form_value('#s_region_id',1207)"
                        >红桥区</div>
                        <div onclick="set_form_value('#s_region_id',1208)"
                        >西青区</div>
                        <div onclick="set_form_value('#s_region_id',1209)"
                        >东丽区</div>
                        <div onclick="set_form_value('#s_region_id',1210)"
                        >津南区</div>
                        <div onclick="set_form_value('#s_region_id',1211)"
                        >北辰区</div>
                        <div onclick="set_form_value('#s_region_id',1212)"
                        >滨海新区</div>
                        <div onclick="set_form_value('#s_region_id',1213)"
                        >宝坻区</div>
                        <div onclick="set_form_value('#s_region_id',1214)"
                        >武清区</div>
                        <div onclick="set_form_value('#s_region_id',1215)"
                        >蓟县</div>
                        <div onclick="set_form_value('#s_region_id',1216)"
                        >静海县</div>
                        <div onclick="set_form_value('#s_region_id',1217)"
                        >宁河县</div>
                  </span>
                                <div onclick="s_region_show(this, 13)"
                                >河北
                                </div>
                                <span id="region_13" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',1301)"
                        >保定</div>
                        <div onclick="set_form_value('#s_region_id',1302)"
                        >石家庄</div>
                        <div onclick="set_form_value('#s_region_id',1303)"
                        >唐山</div>
                        <div onclick="set_form_value('#s_region_id',1304)"
                        >秦皇岛</div>
                        <div onclick="set_form_value('#s_region_id',1305)"
                        >邯郸</div>
                        <div onclick="set_form_value('#s_region_id',1306)"
                        >邢台</div>
                        <div onclick="set_form_value('#s_region_id',1307)"
                        >张家口</div>
                        <div onclick="set_form_value('#s_region_id',1308)"
                        >承德</div>
                        <div onclick="set_form_value('#s_region_id',1309)"
                        >沧州</div>
                        <div onclick="set_form_value('#s_region_id',1310)"
                        >廊坊</div>
                        <div onclick="set_form_value('#s_region_id',1311)"
                        >衡水</div>
                  </span>
                                <div onclick="s_region_show(this, 14)"
                                >山西
                                </div>
                                <span id="region_14" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',1401)"
                        >长治</div>
                        <div onclick="set_form_value('#s_region_id',1402)"
                        >大同</div>
                        <div onclick="set_form_value('#s_region_id',1403)"
                        >晋城</div>
                        <div onclick="set_form_value('#s_region_id',1404)"
                        >晋中</div>
                        <div onclick="set_form_value('#s_region_id',1405)"
                        >临汾</div>
                        <div onclick="set_form_value('#s_region_id',1406)"
                        >吕梁</div>
                        <div onclick="set_form_value('#s_region_id',1407)"
                        >朔州</div>
                        <div onclick="set_form_value('#s_region_id',1408)"
                        >太原</div>
                        <div onclick="set_form_value('#s_region_id',1409)"
                        >忻州</div>
                        <div onclick="set_form_value('#s_region_id',1410)"
                        >阳泉</div>
                        <div onclick="set_form_value('#s_region_id',1411)"
                        >运城</div>
                  </span>
                                <div onclick="s_region_show(this, 15)"
                                >内蒙古
                                </div>
                                <span id="region_15" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',1501)"
                        >呼和浩特</div>
                        <div onclick="set_form_value('#s_region_id',1502)"
                        >包头</div>
                        <div onclick="set_form_value('#s_region_id',1503)"
                        >鄂尔多斯</div>
                        <div onclick="set_form_value('#s_region_id',1504)"
                        >乌兰察布</div>
                        <div onclick="set_form_value('#s_region_id',1506)"
                        >锡林郭勒盟</div>
                        <div onclick="set_form_value('#s_region_id',1507)"
                        >通辽</div>
                        <div onclick="set_form_value('#s_region_id',1508)"
                        >巴彦淖尔</div>
                        <div onclick="set_form_value('#s_region_id',1509)"
                        >乌海</div>
                        <div onclick="set_form_value('#s_region_id',1510)"
                        >呼伦贝尔</div>
                        <div onclick="set_form_value('#s_region_id',1511)"
                        >赤峰</div>
                        <div onclick="set_form_value('#s_region_id',1512)"
                        >兴安盟</div>
                        <div onclick="set_form_value('#s_region_id',1513)"
                        >阿拉善盟</div>
                  </span>
                                <div onclick="s_region_show(this, 21)"
                                >辽宁
                                </div>
                                <span id="region_21" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',2100)"
                        >沈阳</div>
                        <div onclick="set_form_value('#s_region_id',2101)"
                        >鞍山</div>
                        <div onclick="set_form_value('#s_region_id',2103)"
                        >本溪</div>
                        <div onclick="set_form_value('#s_region_id',2105)"
                        >朝阳</div>
                        <div onclick="set_form_value('#s_region_id',2106)"
                        >大连</div>
                        <div onclick="set_form_value('#s_region_id',2110)"
                        >丹东</div>
                        <div onclick="set_form_value('#s_region_id',2113)"
                        >抚顺</div>
                        <div onclick="set_form_value('#s_region_id',2114)"
                        >阜新</div>
                        <div onclick="set_form_value('#s_region_id',2118)"
                        >葫芦岛</div>
                        <div onclick="set_form_value('#s_region_id',2120)"
                        >锦州</div>
                        <div onclick="set_form_value('#s_region_id',2123)"
                        >辽阳</div>
                        <div onclick="set_form_value('#s_region_id',2129)"
                        >铁岭</div>
                        <div onclick="set_form_value('#s_region_id',2134)"
                        >营口</div>
                        <div onclick="set_form_value('#s_region_id',2135)"
                        >盘锦</div>
                  </span>
                                <div onclick="s_region_show(this, 22)"
                                >吉林
                                </div>
                                <span id="region_22" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',2201)"
                        >白城</div>
                        <div onclick="set_form_value('#s_region_id',2202)"
                        >白山</div>
                        <div onclick="set_form_value('#s_region_id',2203)"
                        >长春</div>
                        <div onclick="set_form_value('#s_region_id',2204)"
                        >辽源</div>
                        <div onclick="set_form_value('#s_region_id',2205)"
                        >四平</div>
                        <div onclick="set_form_value('#s_region_id',2206)"
                        >松原</div>
                        <div onclick="set_form_value('#s_region_id',2207)"
                        >通化</div>
                        <div onclick="set_form_value('#s_region_id',2208)"
                        >延边</div>
                        <div onclick="set_form_value('#s_region_id',2209)"
                        >吉林</div>
                  </span>
                                <div onclick="s_region_show(this, 23)"
                                >黑龙江
                                </div>
                                <span id="region_23" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',2301)"
                        >哈尔滨</div>
                        <div onclick="set_form_value('#s_region_id',2302)"
                        >齐齐哈尔</div>
                        <div onclick="set_form_value('#s_region_id',2303)"
                        >大庆</div>
                        <div onclick="set_form_value('#s_region_id',2304)"
                        >牡丹江</div>
                        <div onclick="set_form_value('#s_region_id',2305)"
                        >佳木斯</div>
                        <div onclick="set_form_value('#s_region_id',2306)"
                        >双鸭山</div>
                        <div onclick="set_form_value('#s_region_id',2307)"
                        >鸡西</div>
                        <div onclick="set_form_value('#s_region_id',2308)"
                        >绥化</div>
                        <div onclick="set_form_value('#s_region_id',2309)"
                        >黑河</div>
                        <div onclick="set_form_value('#s_region_id',2310)"
                        >伊春</div>
                        <div onclick="set_form_value('#s_region_id',2311)"
                        >鹤岗</div>
                        <div onclick="set_form_value('#s_region_id',2312)"
                        >七台河</div>
                  </span>
                                <div onclick="s_region_show(this, 31)"
                                >上海
                                </div>
                                <span id="region_31" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',3101)"
                        >上海</div>
                        <div onclick="set_form_value('#s_region_id',3102)"
                        >黄浦区</div>
                        <div onclick="set_form_value('#s_region_id',3103)"
                        >卢湾区</div>
                        <div onclick="set_form_value('#s_region_id',3104)"
                        >徐汇区</div>
                        <div onclick="set_form_value('#s_region_id',3105)"
                        >长宁区</div>
                        <div onclick="set_form_value('#s_region_id',3106)"
                        >静安区</div>
                        <div onclick="set_form_value('#s_region_id',3107)"
                        >普陀区</div>
                        <div onclick="set_form_value('#s_region_id',3108)"
                        >闸北区</div>
                        <div onclick="set_form_value('#s_region_id',3109)"
                        >虹口区</div>
                        <div onclick="set_form_value('#s_region_id',3110)"
                        >杨浦区</div>
                        <div onclick="set_form_value('#s_region_id',3111)"
                        >宝山区</div>
                        <div onclick="set_form_value('#s_region_id',3112)"
                        >闵行区</div>
                        <div onclick="set_form_value('#s_region_id',3113)"
                        >嘉定区</div>
                        <div onclick="set_form_value('#s_region_id',3114)"
                        >松江区</div>
                        <div onclick="set_form_value('#s_region_id',3115)"
                        >青浦区</div>
                        <div onclick="set_form_value('#s_region_id',3116)"
                        >奉贤区</div>
                        <div onclick="set_form_value('#s_region_id',3117)"
                        >金山区</div>
                        <div onclick="set_form_value('#s_region_id',3118)"
                        >浦东新区</div>
                        <div onclick="set_form_value('#s_region_id',3119)"
                        >崇明县</div>
                  </span>
                                <div onclick="s_region_show(this, 32)"
                                >江苏
                                </div>
                                <span id="region_32" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',3201)"
                        >南京</div>
                        <div onclick="set_form_value('#s_region_id',3202)"
                        >苏州</div>
                        <div onclick="set_form_value('#s_region_id',3203)"
                        >徐州</div>
                        <div onclick="set_form_value('#s_region_id',3204)"
                        >扬州</div>
                        <div onclick="set_form_value('#s_region_id',3205)"
                        >镇江</div>
                        <div onclick="set_form_value('#s_region_id',3206)"
                        >无锡</div>
                        <div onclick="set_form_value('#s_region_id',3207)"
                        >常州</div>
                        <div onclick="set_form_value('#s_region_id',3208)"
                        >南通</div>
                        <div onclick="set_form_value('#s_region_id',3209)"
                        >泰州</div>
                        <div onclick="set_form_value('#s_region_id',3210)"
                        >盐城</div>
                        <div onclick="set_form_value('#s_region_id',3211)"
                        >淮安</div>
                        <div onclick="set_form_value('#s_region_id',3212)"
                        >宿迁</div>
                        <div onclick="set_form_value('#s_region_id',3213)"
                        >连云港</div>
                  </span>
                                <div onclick="s_region_show(this, 33)"
                                >浙江
                                </div>
                                <span id="region_33" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',3301)"
                        >杭州</div>
                        <div onclick="set_form_value('#s_region_id',3302)"
                        >宁波</div>
                        <div onclick="set_form_value('#s_region_id',3303)"
                        >湖州</div>
                        <div onclick="set_form_value('#s_region_id',3304)"
                        >金华</div>
                        <div onclick="set_form_value('#s_region_id',3305)"
                        >嘉兴</div>
                        <div onclick="set_form_value('#s_region_id',3306)"
                        >绍兴</div>
                        <div onclick="set_form_value('#s_region_id',3309)"
                        >温州</div>
                        <div onclick="set_form_value('#s_region_id',3310)"
                        >台州</div>
                        <div onclick="set_form_value('#s_region_id',3311)"
                        >丽水</div>
                        <div onclick="set_form_value('#s_region_id',3312)"
                        >舟山</div>
                        <div onclick="set_form_value('#s_region_id',3313)"
                        >衢州</div>
                  </span>
                                <div onclick="s_region_show(this, 34)"
                                >安徽
                                </div>
                                <span id="region_34" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',3401)"
                        >蚌埠</div>
                        <div onclick="set_form_value('#s_region_id',3402)"
                        >合肥</div>
                        <div onclick="set_form_value('#s_region_id',3403)"
                        >六安</div>
                        <div onclick="set_form_value('#s_region_id',3404)"
                        >巢湖</div>
                        <div onclick="set_form_value('#s_region_id',3405)"
                        >马鞍山</div>
                        <div onclick="set_form_value('#s_region_id',3406)"
                        >芜湖</div>
                        <div onclick="set_form_value('#s_region_id',3407)"
                        >安庆</div>
                        <div onclick="set_form_value('#s_region_id',3408)"
                        >铜陵</div>
                        <div onclick="set_form_value('#s_region_id',3409)"
                        >池州</div>
                        <div onclick="set_form_value('#s_region_id',3410)"
                        >宣城</div>
                        <div onclick="set_form_value('#s_region_id',3411)"
                        >黄山</div>
                        <div onclick="set_form_value('#s_region_id',3412)"
                        >滁州</div>
                        <div onclick="set_form_value('#s_region_id',3413)"
                        >淮南</div>
                        <div onclick="set_form_value('#s_region_id',3414)"
                        >阜阳</div>
                        <div onclick="set_form_value('#s_region_id',3415)"
                        >宿州</div>
                        <div onclick="set_form_value('#s_region_id',3416)"
                        >淮北</div>
                        <div onclick="set_form_value('#s_region_id',3417)"
                        >毫州</div>
                  </span>
                                <div onclick="s_region_show(this, 35)"
                                >福建
                                </div>
                                <span id="region_35" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',3501)"
                        >福州</div>
                        <div onclick="set_form_value('#s_region_id',3502)"
                        >厦门</div>
                        <div onclick="set_form_value('#s_region_id',3503)"
                        >龙岩</div>
                        <div onclick="set_form_value('#s_region_id',3504)"
                        >南平</div>
                        <div onclick="set_form_value('#s_region_id',3505)"
                        >宁德</div>
                        <div onclick="set_form_value('#s_region_id',3506)"
                        >莆田</div>
                        <div onclick="set_form_value('#s_region_id',3507)"
                        >泉州</div>
                        <div onclick="set_form_value('#s_region_id',3508)"
                        >三明</div>
                        <div onclick="set_form_value('#s_region_id',3509)"
                        >漳州</div>
                  </span>
                                <div onclick="s_region_show(this, 36)"
                                >江西
                                </div>
                                <span id="region_36" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',3601)"
                        >南昌</div>
                        <div onclick="set_form_value('#s_region_id',3605)"
                        >赣州</div>
                        <div onclick="set_form_value('#s_region_id',3606)"
                        >吉安</div>
                        <div onclick="set_form_value('#s_region_id',3607)"
                        >宜春</div>
                        <div onclick="set_form_value('#s_region_id',3608)"
                        >上饶</div>
                        <div onclick="set_form_value('#s_region_id',3609)"
                        >鹰潭</div>
                        <div onclick="set_form_value('#s_region_id',3610)"
                        >九江</div>
                        <div onclick="set_form_value('#s_region_id',3611)"
                        >景德镇</div>
                        <div onclick="set_form_value('#s_region_id',3612)"
                        >萍乡</div>
                        <div onclick="set_form_value('#s_region_id',3613)"
                        >抚州</div>
                        <div onclick="set_form_value('#s_region_id',3614)"
                        >新余</div>
                  </span>
                                <div onclick="s_region_show(this, 37)"
                                >山东
                                </div>
                                <span id="region_37" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',3701)"
                        >济南</div>
                        <div onclick="set_form_value('#s_region_id',3702)"
                        >青岛</div>
                        <div onclick="set_form_value('#s_region_id',3703)"
                        >泰安</div>
                        <div onclick="set_form_value('#s_region_id',3704)"
                        >烟台</div>
                        <div onclick="set_form_value('#s_region_id',3705)"
                        >淄博</div>
                        <div onclick="set_form_value('#s_region_id',3706)"
                        >日照</div>
                        <div onclick="set_form_value('#s_region_id',3707)"
                        >德州</div>
                        <div onclick="set_form_value('#s_region_id',3708)"
                        >济宁</div>
                        <div onclick="set_form_value('#s_region_id',3709)"
                        >威海</div>
                        <div onclick="set_form_value('#s_region_id',3710)"
                        >莱芜</div>
                        <div onclick="set_form_value('#s_region_id',3711)"
                        >潍坊</div>
                        <div onclick="set_form_value('#s_region_id',3712)"
                        >东营</div>
                        <div onclick="set_form_value('#s_region_id',3713)"
                        >菏泽</div>
                        <div onclick="set_form_value('#s_region_id',3714)"
                        >枣庄</div>
                        <div onclick="set_form_value('#s_region_id',3715)"
                        >临沂</div>
                        <div onclick="set_form_value('#s_region_id',3716)"
                        >滨州</div>
                        <div onclick="set_form_value('#s_region_id',3717)"
                        >聊城</div>
                  </span>
                                <div onclick="s_region_show(this, 41)"
                                >河南
                                </div>
                                <span id="region_41" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',4101)"
                        >南阳</div>
                        <div onclick="set_form_value('#s_region_id',4102)"
                        >平顶山</div>
                        <div onclick="set_form_value('#s_region_id',4103)"
                        >濮阳</div>
                        <div onclick="set_form_value('#s_region_id',4104)"
                        >三门峡</div>
                        <div onclick="set_form_value('#s_region_id',4106)"
                        >新乡</div>
                        <div onclick="set_form_value('#s_region_id',4107)"
                        >郑州</div>
                        <div onclick="set_form_value('#s_region_id',4108)"
                        >洛阳</div>
                        <div onclick="set_form_value('#s_region_id',4109)"
                        >安阳</div>
                        <div onclick="set_form_value('#s_region_id',4110)"
                        >周口</div>
                        <div onclick="set_form_value('#s_region_id',4111)"
                        >信阳</div>
                        <div onclick="set_form_value('#s_region_id',4112)"
                        >驻马店</div>
                        <div onclick="set_form_value('#s_region_id',4113)"
                        >漯河</div>
                        <div onclick="set_form_value('#s_region_id',4115)"
                        >焦作</div>
                        <div onclick="set_form_value('#s_region_id',4116)"
                        >许昌</div>
                        <div onclick="set_form_value('#s_region_id',4117)"
                        >鹤壁</div>
                        <div onclick="set_form_value('#s_region_id',4119)"
                        >济源</div>
                        <div onclick="set_form_value('#s_region_id',4120)"
                        >商丘</div>
                        <div onclick="set_form_value('#s_region_id',4121)"
                        >开封</div>
                  </span>
                                <div onclick="s_region_show(this, 42)"
                                >湖北
                                </div>
                                <span id="region_42" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',4201)"
                        >鄂州</div>
                        <div onclick="set_form_value('#s_region_id',4202)"
                        >恩施</div>
                        <div onclick="set_form_value('#s_region_id',4203)"
                        >黄冈</div>
                        <div onclick="set_form_value('#s_region_id',4204)"
                        >黄石</div>
                        <div onclick="set_form_value('#s_region_id',4205)"
                        >荆门</div>
                        <div onclick="set_form_value('#s_region_id',4206)"
                        >荆州</div>
                        <div onclick="set_form_value('#s_region_id',4207)"
                        >十堰</div>
                        <div onclick="set_form_value('#s_region_id',4208)"
                        >武汉</div>
                        <div onclick="set_form_value('#s_region_id',4209)"
                        >咸宁</div>
                        <div onclick="set_form_value('#s_region_id',4210)"
                        >襄阳</div>
                        <div onclick="set_form_value('#s_region_id',4211)"
                        >孝感</div>
                        <div onclick="set_form_value('#s_region_id',4212)"
                        >宜昌</div>
                        <div onclick="set_form_value('#s_region_id',4213)"
                        >神农架</div>
                        <div onclick="set_form_value('#s_region_id',4214)"
                        >随州</div>
                        <div onclick="set_form_value('#s_region_id',4215)"
                        >天门</div>
                        <div onclick="set_form_value('#s_region_id',4216)"
                        >潜江</div>
                        <div onclick="set_form_value('#s_region_id',4217)"
                        >仙桃</div>
                  </span>
                                <div onclick="s_region_show(this, 43)"
                                >湖南
                                </div>
                                <span id="region_43" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',4301)"
                        >长沙</div>
                        <div onclick="set_form_value('#s_region_id',4302)"
                        >岳阳</div>
                        <div onclick="set_form_value('#s_region_id',4303)"
                        >株洲</div>
                        <div onclick="set_form_value('#s_region_id',4307)"
                        >湘潭</div>
                        <div onclick="set_form_value('#s_region_id',4308)"
                        >衡阳</div>
                        <div onclick="set_form_value('#s_region_id',4309)"
                        >邵阳</div>
                        <div onclick="set_form_value('#s_region_id',4310)"
                        >郴州</div>
                        <div onclick="set_form_value('#s_region_id',4311)"
                        >常德</div>
                        <div onclick="set_form_value('#s_region_id',4312)"
                        >益阳</div>
                        <div onclick="set_form_value('#s_region_id',4313)"
                        >张家界</div>
                        <div onclick="set_form_value('#s_region_id',4314)"
                        >湘西</div>
                        <div onclick="set_form_value('#s_region_id',4315)"
                        >永州</div>
                        <div onclick="set_form_value('#s_region_id',4316)"
                        >娄底</div>
                        <div onclick="set_form_value('#s_region_id',4317)"
                        >怀化</div>
                  </span>
                                <div onclick="s_region_show(this, 44)"
                                >广东
                                </div>
                                <span id="region_44" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',4400)"
                        >广州</div>
                        <div onclick="set_form_value('#s_region_id',4401)"
                        >潮州</div>
                        <div onclick="set_form_value('#s_region_id',4402)"
                        >东莞</div>
                        <div onclick="set_form_value('#s_region_id',4404)"
                        >佛山</div>
                        <div onclick="set_form_value('#s_region_id',4406)"
                        >河源</div>
                        <div onclick="set_form_value('#s_region_id',4408)"
                        >惠州</div>
                        <div onclick="set_form_value('#s_region_id',4413)"
                        >江门</div>
                        <div onclick="set_form_value('#s_region_id',4414)"
                        >茂名</div>
                        <div onclick="set_form_value('#s_region_id',4416)"
                        >汕头</div>
                        <div onclick="set_form_value('#s_region_id',4417)"
                        >汕尾</div>
                        <div onclick="set_form_value('#s_region_id',4418)"
                        >韶关</div>
                        <div onclick="set_form_value('#s_region_id',4421)"
                        >阳江</div>
                        <div onclick="set_form_value('#s_region_id',4422)"
                        >云浮</div>
                        <div onclick="set_form_value('#s_region_id',4423)"
                        >湛江</div>
                        <div onclick="set_form_value('#s_region_id',4424)"
                        >肇庆</div>
                        <div onclick="set_form_value('#s_region_id',4425)"
                        >中山</div>
                        <div onclick="set_form_value('#s_region_id',4426)"
                        >珠海</div>
                        <div onclick="set_form_value('#s_region_id',4427)"
                        >揭阳</div>
                        <div onclick="set_form_value('#s_region_id',4428)"
                        >梅州</div>
                        <div onclick="set_form_value('#s_region_id',4429)"
                        >清远</div>
                  </span>
                                <div onclick="s_region_show(this, 45)"
                                >广西
                                </div>
                                <span id="region_45" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',4501)"
                        >南宁</div>
                        <div onclick="set_form_value('#s_region_id',4502)"
                        >柳州</div>
                        <div onclick="set_form_value('#s_region_id',4503)"
                        >桂林</div>
                        <div onclick="set_form_value('#s_region_id',4504)"
                        >北海</div>
                        <div onclick="set_form_value('#s_region_id',4505)"
                        >玉林</div>
                        <div onclick="set_form_value('#s_region_id',4506)"
                        >梧州</div>
                        <div onclick="set_form_value('#s_region_id',4507)"
                        >钦州</div>
                        <div onclick="set_form_value('#s_region_id',4508)"
                        >贵港</div>
                        <div onclick="set_form_value('#s_region_id',4509)"
                        >河池</div>
                        <div onclick="set_form_value('#s_region_id',4510)"
                        >百色</div>
                        <div onclick="set_form_value('#s_region_id',4511)"
                        >防城港</div>
                        <div onclick="set_form_value('#s_region_id',4513)"
                        >来宾</div>
                        <div onclick="set_form_value('#s_region_id',4515)"
                        >贺州</div>
                        <div onclick="set_form_value('#s_region_id',4516)"
                        >崇左</div>
                  </span>
                                <div onclick="s_region_show(this, 46)"
                                >海南
                                </div>
                                <span id="region_46" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',4601)"
                        >海口</div>
                        <div onclick="set_form_value('#s_region_id',4602)"
                        >三亚</div>
                        <div onclick="set_form_value('#s_region_id',4609)"
                        >琼海</div>
                        <div onclick="set_form_value('#s_region_id',4613)"
                        >东方</div>
                        <div onclick="set_form_value('#s_region_id',4615)"
                        >儋州</div>
                  </span>
                                <div onclick="s_region_show(this, 47)"
                                >深圳
                                </div>
                                <span id="region_47" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',4711)"
                        >深圳</div>
                  </span>
                                <div onclick="s_region_show(this, 51)"
                                >四川
                                </div>
                                <span id="region_51" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',5101)"
                        >成都</div>
                        <div onclick="set_form_value('#s_region_id',5113)"
                        >资阳</div>
                        <div onclick="set_form_value('#s_region_id',5114)"
                        >凉山</div>
                        <div onclick="set_form_value('#s_region_id',5117)"
                        >德阳</div>
                        <div onclick="set_form_value('#s_region_id',5121)"
                        >绵阳</div>
                        <div onclick="set_form_value('#s_region_id',5122)"
                        >雅安</div>
                        <div onclick="set_form_value('#s_region_id',5123)"
                        >眉山</div>
                        <div onclick="set_form_value('#s_region_id',5124)"
                        >乐山</div>
                        <div onclick="set_form_value('#s_region_id',5125)"
                        >自贡</div>
                        <div onclick="set_form_value('#s_region_id',5126)"
                        >内江</div>
                        <div onclick="set_form_value('#s_region_id',5127)"
                        >宜宾</div>
                        <div onclick="set_form_value('#s_region_id',5128)"
                        >遂宁</div>
                        <div onclick="set_form_value('#s_region_id',5129)"
                        >南充</div>
                        <div onclick="set_form_value('#s_region_id',5130)"
                        >广安</div>
                        <div onclick="set_form_value('#s_region_id',5131)"
                        >达州</div>
                        <div onclick="set_form_value('#s_region_id',5132)"
                        >巴中</div>
                        <div onclick="set_form_value('#s_region_id',5133)"
                        >广元</div>
                        <div onclick="set_form_value('#s_region_id',5135)"
                        >阿坝</div>
                        <div onclick="set_form_value('#s_region_id',5136)"
                        >甘孜</div>
                        <div onclick="set_form_value('#s_region_id',5137)"
                        >攀枝花</div>
                        <div onclick="set_form_value('#s_region_id',5138)"
                        >泸州</div>
                  </span>
                                <div onclick="s_region_show(this, 52)"
                                >贵州
                                </div>
                                <span id="region_52" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',5201)"
                        >贵阳</div>
                        <div onclick="set_form_value('#s_region_id',5202)"
                        >六盘水</div>
                        <div onclick="set_form_value('#s_region_id',5203)"
                        >安顺</div>
                        <div onclick="set_form_value('#s_region_id',5204)"
                        >毕节</div>
                        <div onclick="set_form_value('#s_region_id',5205)"
                        >黔东南</div>
                        <div onclick="set_form_value('#s_region_id',5206)"
                        >黔南</div>
                        <div onclick="set_form_value('#s_region_id',5207)"
                        >黔西南</div>
                        <div onclick="set_form_value('#s_region_id',5208)"
                        >铜仁</div>
                        <div onclick="set_form_value('#s_region_id',5209)"
                        >遵义</div>
                        <div onclick="set_form_value('#s_region_id',5210)"
                        >金阳新区</div>
                  </span>
                                <div onclick="s_region_show(this, 53)"
                                >云南
                                </div>
                                <span id="region_53" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',5301)"
                        >版纳</div>
                        <div onclick="set_form_value('#s_region_id',5302)"
                        >保山</div>
                        <div onclick="set_form_value('#s_region_id',5303)"
                        >楚雄</div>
                        <div onclick="set_form_value('#s_region_id',5304)"
                        >大理</div>
                        <div onclick="set_form_value('#s_region_id',5305)"
                        >德宏</div>
                        <div onclick="set_form_value('#s_region_id',5306)"
                        >迪庆</div>
                        <div onclick="set_form_value('#s_region_id',5307)"
                        >红河</div>
                        <div onclick="set_form_value('#s_region_id',5308)"
                        >昆明</div>
                        <div onclick="set_form_value('#s_region_id',5309)"
                        >丽江</div>
                        <div onclick="set_form_value('#s_region_id',5310)"
                        >临沧</div>
                        <div onclick="set_form_value('#s_region_id',5311)"
                        >怒江</div>
                        <div onclick="set_form_value('#s_region_id',5312)"
                        >曲靖</div>
                        <div onclick="set_form_value('#s_region_id',5313)"
                        >普洱</div>
                        <div onclick="set_form_value('#s_region_id',5314)"
                        >文山</div>
                        <div onclick="set_form_value('#s_region_id',5315)"
                        >玉溪</div>
                        <div onclick="set_form_value('#s_region_id',5316)"
                        >昭通</div>
                  </span>
                                <div onclick="s_region_show(this, 54)"
                                >西藏
                                </div>
                                <span id="region_54" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',5411)"
                        >拉萨</div>
                        <div onclick="set_form_value('#s_region_id',5412)"
                        >其他</div>
                  </span>
                                <div onclick="s_region_show(this, 55)"
                                >重庆
                                </div>
                                <span id="region_55" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',5501)"
                        >重庆</div>
                        <div onclick="set_form_value('#s_region_id',5502)"
                        >渝中区</div>
                        <div onclick="set_form_value('#s_region_id',5503)"
                        >大渡口区</div>
                        <div onclick="set_form_value('#s_region_id',5504)"
                        >江北区</div>
                        <div onclick="set_form_value('#s_region_id',5505)"
                        >南岸区</div>
                        <div onclick="set_form_value('#s_region_id',5506)"
                        >沙坪坝区</div>
                        <div onclick="set_form_value('#s_region_id',5507)"
                        >九龙坡区</div>
                        <div onclick="set_form_value('#s_region_id',5508)"
                        >北碚区</div>
                        <div onclick="set_form_value('#s_region_id',5509)"
                        >万盛区</div>
                        <div onclick="set_form_value('#s_region_id',5510)"
                        >双桥区</div>
                        <div onclick="set_form_value('#s_region_id',5511)"
                        >渝北区</div>
                        <div onclick="set_form_value('#s_region_id',5512)"
                        >巴南区</div>
                        <div onclick="set_form_value('#s_region_id',5513)"
                        >万州区</div>
                        <div onclick="set_form_value('#s_region_id',5514)"
                        >涪陵区</div>
                        <div onclick="set_form_value('#s_region_id',5515)"
                        >黔江区 </div>
                        <div onclick="set_form_value('#s_region_id',5516)"
                        >长寿区</div>
                        <div onclick="set_form_value('#s_region_id',5517)"
                        >江津区</div>
                        <div onclick="set_form_value('#s_region_id',5518)"
                        >合川区</div>
                        <div onclick="set_form_value('#s_region_id',5519)"
                        >永川区</div>
                        <div onclick="set_form_value('#s_region_id',5520)"
                        >南川区</div>
                  </span>
                                <div onclick="s_region_show(this, 61)"
                                >陕西
                                </div>
                                <span id="region_61" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',6101)"
                        >西安</div>
                        <div onclick="set_form_value('#s_region_id',6102)"
                        >宝鸡</div>
                        <div onclick="set_form_value('#s_region_id',6103)"
                        >铜川</div>
                        <div onclick="set_form_value('#s_region_id',6104)"
                        >延安</div>
                        <div onclick="set_form_value('#s_region_id',6105)"
                        >榆林</div>
                        <div onclick="set_form_value('#s_region_id',6106)"
                        >汉中</div>
                        <div onclick="set_form_value('#s_region_id',6107)"
                        >安康</div>
                        <div onclick="set_form_value('#s_region_id',6108)"
                        >渭南</div>
                        <div onclick="set_form_value('#s_region_id',6109)"
                        >咸阳</div>
                        <div onclick="set_form_value('#s_region_id',6111)"
                        >商洛</div>
                  </span>
                                <div onclick="s_region_show(this, 62)"
                                >甘肃
                                </div>
                                <span id="region_62" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',6201)"
                        >兰州</div>
                        <div onclick="set_form_value('#s_region_id',6202)"
                        >定西</div>
                        <div onclick="set_form_value('#s_region_id',6203)"
                        >天水</div>
                        <div onclick="set_form_value('#s_region_id',6204)"
                        >平凉</div>
                        <div onclick="set_form_value('#s_region_id',6205)"
                        >庆阳</div>
                        <div onclick="set_form_value('#s_region_id',6206)"
                        >临夏</div>
                        <div onclick="set_form_value('#s_region_id',6207)"
                        >甘南州</div>
                        <div onclick="set_form_value('#s_region_id',6208)"
                        >陇南</div>
                        <div onclick="set_form_value('#s_region_id',6209)"
                        >武威</div>
                        <div onclick="set_form_value('#s_region_id',6210)"
                        >金昌</div>
                        <div onclick="set_form_value('#s_region_id',6211)"
                        >张掖</div>
                        <div onclick="set_form_value('#s_region_id',6212)"
                        >酒泉</div>
                        <div onclick="set_form_value('#s_region_id',6213)"
                        >嘉峪关</div>
                        <div onclick="set_form_value('#s_region_id',6214)"
                        >白银</div>
                  </span>
                                <div onclick="s_region_show(this, 63)"
                                >青海
                                </div>
                                <span id="region_63" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',6301)"
                        >西宁</div>
                        <div onclick="set_form_value('#s_region_id',6302)"
                        >果洛</div>
                        <div onclick="set_form_value('#s_region_id',6303)"
                        >海北</div>
                        <div onclick="set_form_value('#s_region_id',6304)"
                        >海东</div>
                        <div onclick="set_form_value('#s_region_id',6305)"
                        >海南</div>
                        <div onclick="set_form_value('#s_region_id',6306)"
                        >海西</div>
                        <div onclick="set_form_value('#s_region_id',6307)"
                        >黄南</div>
                        <div onclick="set_form_value('#s_region_id',6308)"
                        >玉树</div>
                  </span>
                                <div onclick="s_region_show(this, 64)"
                                >宁夏
                                </div>
                                <span id="region_64" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',6401)"
                        >银川市</div>
                        <div onclick="set_form_value('#s_region_id',6402)"
                        >吴忠市</div>
                        <div onclick="set_form_value('#s_region_id',6403)"
                        >中卫市</div>
                        <div onclick="set_form_value('#s_region_id',6404)"
                        >石嘴山市</div>
                        <div onclick="set_form_value('#s_region_id',6405)"
                        >固原</div>
                  </span>
                                <div onclick="s_region_show(this, 65)"
                                >新疆
                                </div>
                                <span id="region_65" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',6500)"
                        >乌鲁木齐</div>
                        <div onclick="set_form_value('#s_region_id',6501)"
                        >博州</div>
                        <div onclick="set_form_value('#s_region_id',6502)"
                        >昌吉</div>
                        <div onclick="set_form_value('#s_region_id',6504)"
                        >哈密</div>
                        <div onclick="set_form_value('#s_region_id',6505)"
                        >和田</div>
                        <div onclick="set_form_value('#s_region_id',6508)"
                        >喀什</div>
                        <div onclick="set_form_value('#s_region_id',6509)"
                        >克拉玛依</div>
                        <div onclick="set_form_value('#s_region_id',6510)"
                        >巴州</div>
                        <div onclick="set_form_value('#s_region_id',6514)"
                        >石河子</div>
                        <div onclick="set_form_value('#s_region_id',6515)"
                        >吐鲁番</div>
                        <div onclick="set_form_value('#s_region_id',6517)"
                        >伊犁</div>
                        <div onclick="set_form_value('#s_region_id',6518)"
                        >阿克苏</div>
                        <div onclick="set_form_value('#s_region_id',6519)"
                        >塔城</div>
                        <div onclick="set_form_value('#s_region_id',6521)"
                        >阿勒泰</div>
                        <div onclick="set_form_value('#s_region_id',6522)"
                        >克州</div>
                        <div onclick="set_form_value('#s_region_id',6532)"
                        >阿拉尔</div>
                        <div onclick="set_form_value('#s_region_id',6533)"
                        >图木舒克</div>
                        <div onclick="set_form_value('#s_region_id',6534)"
                        >五家渠</div>
                  </span>
                                <div onclick="s_region_show(this, 81)"
                                >其他
                                </div>
                                <span id="region_81" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                    >全部</div>
                        <div onclick="set_form_value('#s_region_id',8111)"
                        >其他</div>
                  </span>
                                <span>
                <div id="s_region_show" style="display: none;"></div>
              </span>

                            </dd>

                        </dl>

                        <dl class="zj-filter filter-fw">
                            <dt class="ico fw">类型:</dt>
                            <dd style="width: 920px;">

                                <div
                                        class="m-findlist-now"
                                        onclick="$('#org_type').val('');$('#form_filter').submit()">不限
                                </div>
                                <input type="hidden" name="org_type" id="org_type"/>
                                <div onclick="set_form_value('#org_type',2)"
                                >
                                    工作中心
                                </div>
                                <div onclick="set_form_value('#org_type',0)"
                                >
                                    企业
                                </div>
                                <div onclick="set_form_value('#org_type',1)"
                                >
                                    团队
                                </div>
                                <span>
                <div id="s_region_show" style="display: none;"></div>
              </span>
                            </dd>
                        </dl>
                        <dl class="zj-filter filter-fw">
                            <dt class="ico fw">
                                <table class="filter-tab">
                                    <tr>
                                        <th>按人数：</th>
                                        <td>
                                            <select name="persons_count_hash" id="persons_count_hash"
                                                    class="filter-select">
                                                <option value="">--请选择--</option>
                                                <option value="{&#39;min&#39;:3, &#39;max&#39;:5}">3~5人</option>
                                                <option value="{&#39;min&#39;:5, &#39;max&#39;:10}">5~10人</option>
                                                <option value="{&#39;min&#39;:10, &#39;max&#39;:20}">10~20人</option>
                                                <option value="{&#39;min&#39;:20, &#39;max&#39;: &#39;&#39;}">20人以上
                                                </option>
                                                <option value="{&#39;min&#39;:50, &#39;max&#39;: &#39;&#39;}">50人以上
                                                </option>
                                            </select>
                                        </td>
                                        <th>按公司类型：</th>
                                        <td>
                                            <select name="com_type" id="com_type" class="filter-select">
                                                <option value="">--请选择--</option>
                                                <option value="施工单位">施工单位</option>
                                                <option value="工程设计">工程设计</option>
                                                <option value="工程咨询">工程咨询</option>
                                                <option value="工程监理">工程监理</option>
                                                <option value="材料设备供应商">材料设备供应商</option>
                                                <option value="招标代理">招标代理</option>
                                                <option value="造价咨询">造价咨询</option>
                                                <option value="BIM咨询">BIM咨询</option>
                                                <option value="工程软件">工程软件</option>
                                                <option value="工程财务(审计)">工程财务(审计)</option>
                                            </select>
                                        </td>
                                        <th>按业务类型：</th>
                                        <td>
                                            <select name="business_type" id="business_type" class="filter-select">
                                                <option value="">--请选择--</option>
                                                <option value="可行性研究">可行性研究</option>
                                                <option value="设计方案">设计方案</option>
                                                <option value="估算、概算">估算、概算</option>
                                                <option value="预算">预算</option>
                                                <option value="经济评价分析">经济评价分析</option>
                                                <option value="优化设计对标">优化设计对标</option>
                                                <option value="招标代理">招标代理</option>
                                                <option value="模拟清单">模拟清单</option>
                                                <option value="招标控制价">招标控制价</option>
                                                <option value="清标">清标</option>
                                                <option value="竣工结算">竣工结算</option>
                                                <option value="审计">审计</option>
                                                <option value="BIM">BIM</option>
                                            </select>
                                        </td>
                                        <th>按专业范围：</th>
                                        <td>
                                            <select name="modeltype" id="modeltype" class="filter-select">
                                                <option value="">--请选择--</option>
                                                <option value="土建">土建</option>
                                                <option value="钢筋">钢筋</option>
                                                <option value="土建\钢筋">土建\钢筋</option>
                                                <option value="土建\钢构">土建\钢构</option>
                                                <option value="安装">安装</option>
                                                <option value="精装">精装</option>
                                                <option value="市政\园林\绿化">市政\园林\绿化</option>
                                                <option value="施组技术标">施组技术标</option>
                                                <option value="水利">水利</option>
                                                <option value="铁路\公路">铁路\公路</option>
                                                <option value="设计">设计</option>
                                                <option value="其他">其他</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </dt>
                        </dl>

                        <dl class="zj-filter">
                            <dt class="zj-bh">搜索:</dt>
                            <dd>
                                <div class="search-input search-category">
                                    <input type="text" name="com_name" value="" placeholder="输入企业名称"/>

                                    <div class="search-bg"></div>
                                    <div onclick="$('#form_filter').submit();" class="search-img"></div>
                                    <span class="join-work_center" id="join-work_center"
                                          onclick="window.open('https://www.wenjuan.com/s/fAZzMf/', '_blank')">
                <img src="/web/static/picture/icon_project_click-575a77278e86efd35f372768c38f9c689cdd0c8fb5ad6700b297201ccaa14c65.png"/>
                &nbsp;<span class="font14">加入工作中心</span>
              </span>
                                    <span class="join-company" id="join-company"
                                          onclick="location.href='/apply_companies/vip'">
                <img src="/web/static/picture/icon_project_click-575a77278e86efd35f372768c38f9c689cdd0c8fb5ad6700b297201ccaa14c65.png"/>
                &nbsp;<span class="font14">加入企业/团队</span>
              </span>
                                    <!--              <span class="ui-btn join-company" onclick="location.href='/apply_companies/vip'">加入企业/团队</span>-->
                                </div>
                            </dd>
                        </dl>
                    </form>
                </div>
            </div>


            <div class="page-zj">
                <div class="person-list">
                    <table>
                        <tr>
                            <td class="company-info" width="140px" align="center" valign="top"
                                style="padding-top: 24px;">
                                <div class="logo
        copper
">
                                    <a target="_blank" href="/c/99037"><img alt="四川信永建设项目管理有限责任公司"
                                                                            src="/web/static/picture/87d1489a8ab9480cb8d1a8c90d353718.gif"
                                                                            width="80" height="80"/></a>
                                </div>
                                <div class="company-org-tag">
                                    <div class="vip-pro-show copper">
                                        先锋企业
                                    </div>
                                </div>

                            </td>
                            <td valign="top">
                                <div style="border-right: 1px solid #f5f5f5;">
                                    <div class="person-info">
        <span class="person-name font16">
          <a target="_blank" href="/c/99037">四川信永建设项目管理有限责任公司</a>
        </span>
                                        <span class="region-path">
          <img style="width: 12px;height: 16px;vertical-align: sub;"
               src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png"
               alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c"/>
          四川 成都
        </span>
                                    </div>
                                    <div class="person-describe">
                                        <p>
                                            四川省信永建设项目管理有限责任公司，于2004年07月06日在四川省工商行政管理局注册成立，注册资本为300万元，主要经营项目：工程造价咨询、招投标代理、工程咨询、工程监理。</p>
                                    </div>
                                    <div class="online-exp">
                                        <div class="company-item" style="text-align: left;">

                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6 content">
                                                        <div class="title">公司类型：</div>
                                                        <div class="modeltype_list">
                                                            <div>工程咨询</div>
                                                            <div>工程监理</div>
                                                            <div>招标代理</div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px" valign="top">
                                <div style="min-height: 120px;">
                                </div>
                                <div class="hire-div">
                                    <a class="employ-btn" target="_blank"
                                       href="/projects/publish_way?project%5Bhire%5D=99037&amp;project%5Bis_hire_com%5D=1">雇佣TA</a>
                                    <a class="blank-btn employ-btn" data-toggle="modal" data-target="#greet_pop"
                                       data-remote="true" href="/companies/104/tips/new_greet.js">打招呼</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="company-info" width="140px" align="center" valign="top"
                                style="padding-top: 24px;">
                                <div class="logo
        silver
">
                                    <a target="_blank" href="/c/45938"><img alt="中弘造价咨询工作室"
                                                                            src="/web/static/picture/bc9c5f9b39f64405990ea2cfbd5f938d.gif"
                                                                            width="80" height="80"/></a>
                                </div>
                                <div class="company-org-tag">
                                    <div class="vip-pro-show silver"
                                         style="background: linear-gradient(90deg,#d2d2d2,#f5f5f5); color: #333333">
                                        认证团队
                                    </div>
                                </div>

                            </td>
                            <td valign="top">
                                <div style="border-right: 1px solid #f5f5f5;">
                                    <div class="person-info">
        <span class="person-name font16">
          <a target="_blank" href="/c/45938">中弘造价咨询工作室</a>
        </span>
                                        <span class="region-path">
          <img style="width: 12px;height: 16px;vertical-align: sub;"
               src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png"
               alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c"/>
          湖北 武汉
        </span>
                                    </div>
                                    <div class="person-describe">
                                        <p>造价工作室成立于2016年，土建造价工程师7人，安装造价工程师5人，从事造价人员平均年限不低于5年，承做过多个大型房建类全过程项目。</p>
                                    </div>
                                    <div class="online-exp">
                                        <div class="company-item" style="text-align: left;">

                                            <div>
                                                <div class="row">


                                                    <div class="col-md-6 content">
                                                        <div class="title">专业范围：</div>
                                                        <div class="modeltype_list">
                                                            <div>土建</div>
                                                            <div>钢筋</div>
                                                            <div>土建\钢筋</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px" valign="top">
                                <div style="min-height: 120px;">
                                </div>
                                <div class="hire-div">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="company-info" width="140px" align="center" valign="top"
                                style="padding-top: 24px;">
                                <div class="logo
        silver
">
                                    <a target="_blank" href="/c/109374"><img alt="佳业工程造价咨询工作室"
                                                                             src="/web/static/picture/d79cdf4ec9084a77b6c966d47aeae4d2.gif"
                                                                             width="80" height="80"/></a>
                                </div>
                                <div class="company-org-tag">
                                    <div class="vip-pro-show silver"
                                         style="background: linear-gradient(90deg,#d2d2d2,#f5f5f5); color: #333333">
                                        认证团队
                                    </div>
                                </div>

                            </td>
                            <td valign="top">
                                <div style="border-right: 1px solid #f5f5f5;">
                                    <div class="person-info">
        <span class="person-name font16">
          <a target="_blank" href="/c/109374">佳业工程造价咨询工作室</a>
        </span>
                                        <span class="region-path">
          <img style="width: 12px;height: 16px;vertical-align: sub;"
               src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png"
               alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c"/>
          广东 广州
        </span>
                                    </div>
                                    <div class="person-describe">
                                        <p>
                                            佳业工程造价咨询工作室创办于2018年9月，本工作室全专业预结算人员，其中安装设备方面为主打业务，目前已和多家房地产单位达成合作关系，主要承接房地产、市政、园林绿化等多专业预结算服务，本工作室主要承接业务为：工程预结算、工程概算、工程估算、房地产全过程跟踪、工程造价审核、投标书制作、工程经济分析。工作室宗旨为：质量是企业的生命，诚信是企业的根本。</p>
                                    </div>
                                    <div class="online-exp">
                                        <div class="company-item" style="text-align: left;">

                                            <div>
                                                <div class="row">

                                                    <div class="col-md-6 content">
                                                        <div class="title">业务类型：</div>
                                                        <div class="modeltype_list">
                                                            <div>估算、概算</div>
                                                            <div>预算</div>
                                                            <div>经济评价分析</div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 content">
                                                        <div class="title">专业范围：</div>
                                                        <div class="modeltype_list">
                                                            <div>土建</div>
                                                            <div>安装</div>
                                                            <div>市政\园林\绿化</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px" valign="top">
                                <div style="min-height: 120px;">
                                </div>
                                <div class="hire-div">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="company-info" width="140px" align="center" valign="top"
                                style="padding-top: 24px;">
                                <div class="logo
        silver
">
                                    <a target="_blank" href="/c/58016"><img alt="北京明安建设项目管理有限公司"
                                                                            src="/web/static/picture/b5bcfcef4d804d539e256745f4711b48.gif"
                                                                            width="80" height="80"/></a>
                                </div>
                                <div class="company-org-tag">
                                    <div class="vip-pro-show silver"
                                         style="background: linear-gradient(90deg,#d2d2d2,#f5f5f5); color: #333333">
                                        认证企业
                                    </div>
                                </div>

                            </td>
                            <td valign="top">
                                <div style="border-right: 1px solid #f5f5f5;">
                                    <div class="person-info">
        <span class="person-name font16">
          <a target="_blank" href="/c/58016">北京明安建设项目管理有限公司</a>
        </span>
                                        <span class="region-path">
          <img style="width: 12px;height: 16px;vertical-align: sub;"
               src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png"
               alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c"/>
          北京 朝阳区
        </span>
                                    </div>
                                    <div class="person-describe">
                                        <p>企业经营范围：工程造价咨询；工程招标代理；工程咨询；工程勘察、设计；房地产开发信息咨询；环境影响评价；工程节能评估；节能技术服务。<br>（企业依法自主选择经营项目，开展经营活动；依法须经批准的项目，经相关部门批准后依批准的的内容开展经营活动；不得从事本市产业政策禁止和限制类项目的经营活动。）<br>地址：北京市东城区安定门外大街185号京宝大厦308室&nbsp;<br>电话010-64235338&nbsp;&nbsp;&nbsp;传真：010-63132047&nbsp;<br>邮箱：ming_an_zx@163.com<br>企业网站：http://www.bjmazx.com
                                        </p>
                                    </div>
                                    <div class="online-exp">
                                        <div class="company-item" style="text-align: left;">

                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6 content">
                                                        <div class="title">公司类型：</div>
                                                        <div class="modeltype_list">
                                                            <div>工程咨询</div>
                                                            <div>招标代理</div>
                                                            <div>造价咨询</div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px" valign="top">
                                <div style="min-height: 120px;">
                                </div>
                                <div class="hire-div">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="company-info" width="140px" align="center" valign="top"
                                style="padding-top: 24px;">
                                <div class="logo
        silver
">
                                    <a target="_blank" href="/c/102090"><img alt="信发造价"
                                                                             src="/web/static/picture/708019aa05194360b203de1aa8dbe3c7.gif"
                                                                             width="80" height="80"/></a>
                                </div>
                                <div class="company-org-tag">
                                    <div class="vip-pro-show silver"
                                         style="background: linear-gradient(90deg,#d2d2d2,#f5f5f5); color: #333333">
                                        认证团队
                                    </div>
                                </div>

                            </td>
                            <td valign="top">
                                <div style="border-right: 1px solid #f5f5f5;">
                                    <div class="person-info">
        <span class="person-name font16">
          <a target="_blank" href="/c/102090">信发造价</a>
        </span>
                                        <span class="region-path">
          <img style="width: 12px;height: 16px;vertical-align: sub;"
               src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png"
               alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c"/>
          山东 东营
        </span>
                                    </div>
                                    <div class="person-describe">
                                        <p>
                                            信发造价是由国家注册一级造价工程师牵头创立的，目前稳定成员为5人，团队成员均为7年以上工作经验人员且皆具有施工、审计、政府采购等多角度造价管理经验，多年为施工单位、审计事务所、政府投资部门提供服务工作。专业范围包括不限于房屋土建、钢结构、水电安装、电力工程、民用消防、市政绿化、水利水电、土地整理、BIM全过程控制、PPP全过程控制、装配式绿色建筑</p>
                                    </div>
                                    <div class="online-exp">
                                        <div class="company-item" style="text-align: left;">

                                            <div>
                                                <div class="row">


                                                    <div class="col-md-6 content">
                                                        <div class="title">专业范围：</div>
                                                        <div class="modeltype_list">
                                                            <div>土建</div>
                                                            <div>钢筋</div>
                                                            <div>土建\钢筋</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px" valign="top">
                                <div style="min-height: 120px;">
                                </div>
                                <div class="hire-div">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="company-info" width="140px" align="center" valign="top"
                                style="padding-top: 24px;">
                                <div class="logo
        silver
">
                                    <a target="_blank" href="/c/25199"><img alt="北京利安欣达工程造价咨询有限公司"
                                                                            src="/web/static/picture/b17d8235df004638b025a0059635eeb7.gif"
                                                                            width="80" height="80"/></a>
                                </div>
                                <div class="company-org-tag">
                                    <div class="vip-pro-show silver"
                                         style="background: linear-gradient(90deg,#d2d2d2,#f5f5f5); color: #333333">
                                        认证企业
                                    </div>
                                </div>

                            </td>
                            <td valign="top">
                                <div style="border-right: 1px solid #f5f5f5;">
                                    <div class="person-info">
        <span class="person-name font16">
          <a target="_blank" href="/c/25199">北京利安欣达工程造价咨询有限公司</a>
        </span>
                                        <span class="region-path">
          <img style="width: 12px;height: 16px;vertical-align: sub;"
               src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png"
               alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c"/>
          北京 丰台区
        </span>
                                    </div>
                                    <div class="person-describe">
                                        <p>北京利安欣达成立于2003年5月，“诚信为金，业精为利，共创心安”<br>2011年10月，经国家建设部批准，公司晋升为工程造价咨询企业甲级资质，2016年10月，公司通过了ISO9001:2008质量管理体系认证<br>2016年12月，中国建设工程造价管理协会评价企业信用等级为AAA-<br>2017年4月，北京建设工程造价管理协会评价的信用评价等级为AAA。<br>业务范围：<br>1.投资估算的编制与审核；<br>2.经济评价的编制与审核；<br>3.设计概算的编制、审核与调整；<br>4.施工图预算的编制与审核；<br>5.工程量清单的编制与审核；<br>6.最高投标限价的编制与审核；<br>7.工程结算的编制与审核；<br>8.工程竣工决算的编制与审核；<br>9.全过程工程造价管理咨询；<br>10.工程造价鉴定；<br>11.方案比选、限额设计、优化设计的造价咨询；<br>12.合同管理咨询；<br>13.建设项目后评价；<br>14.工程造价信息咨询服务；<br>15.其他工程造价咨询工作。<br>
                                        </p>
                                    </div>
                                    <div class="online-exp">
                                        <div class="company-item" style="text-align: left;">

                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6 content">
                                                        <div class="title">公司类型：</div>
                                                        <div class="modeltype_list">
                                                            <div>造价咨询</div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 content">
                                                        <div class="title">业务类型：</div>
                                                        <div class="modeltype_list">
                                                            <div>估算、概算</div>
                                                            <div>预算</div>
                                                            <div>经济评价分析</div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 content">
                                                        <div class="title">专业范围：</div>
                                                        <div class="modeltype_list">
                                                            <div>土建</div>
                                                            <div>安装</div>
                                                            <div>市政\园林\绿化</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px" valign="top">
                                <div style="min-height: 120px;">
                                </div>
                                <div class="hire-div">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="company-info" width="140px" align="center" valign="top"
                                style="padding-top: 24px;">
                                <div class="logo
        silver
">
                                    <a target="_blank" href="/c/20065"><img alt="郁金香工作室"
                                                                            src="/web/static/picture/43d1e66ea3f34ac2b8e35b96b2e64d12.gif"
                                                                            width="80" height="80"/></a>
                                </div>
                                <div class="company-org-tag">
                                    <div class="vip-pro-show silver"
                                         style="background: linear-gradient(90deg,#d2d2d2,#f5f5f5); color: #333333">
                                        认证团队
                                    </div>
                                </div>

                            </td>
                            <td valign="top">
                                <div style="border-right: 1px solid #f5f5f5;">
                                    <div class="person-info">
        <span class="person-name font16">
          <a target="_blank" href="/c/20065">郁金香工作室</a>
        </span>
                                        <span class="region-path">
          <img style="width: 12px;height: 16px;vertical-align: sub;"
               src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png"
               alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c"/>
          宁夏 银川市
        </span>
                                    </div>
                                    <div class="person-describe">
                                        <p>
                                            本团队目前有土建及钢构2人、安装2人组成（其中建筑一级建造师1人、安装造价工程师1人），均有多年施工现场全过程造价跟踪管理经验；主要负责工程概、预、结算等的编制与审核，招标控价或者投标报价的编制及组价，合同价款的变更处理以及索赔费用的计算等方面。<br>已在平台承接多个项目<br>熟悉广联达软件！
                                        </p>
                                    </div>
                                    <div class="online-exp">
                                        <div class="company-item" style="text-align: left;">

                                            <div>
                                                <div class="row">


                                                    <div class="col-md-6 content">
                                                        <div class="title">专业范围：</div>
                                                        <div class="modeltype_list">
                                                            <div>土建</div>
                                                            <div>钢筋</div>
                                                            <div>土建\钢筋</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px" valign="top">
                                <div style="min-height: 120px;">
                                    <div style="width: 100%; margin-bottom: 11px;">
                                        <div class="pro-data-show">
                                            <h3>17</h3>
                                            <p>近期完成</p>
                                        </div>
                                        <div class="pro-data-show">
                                            <h3>93.33%</h3>
                                            <p>好评</p>
                                        </div>
                                    </div>
                                    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
                                        <span class="tag-titie">近期收入：</span>
                                        <span class="doing">
          ¥31980
      </span>
                                    </div>
                                    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
                                        <span class="tag-titie">成果按时交付率：</span>
                                        <span class="doing">
          90%
        </span>
                                    </div>
                                </div>
                                <div class="hire-div">
                                    <a class="employ-btn" target="_blank"
                                       href="/projects/publish_way?project%5Bhire%5D=59213&amp;project%5Bis_hire_com%5D=1">雇佣TA</a>
                                    <a class="blank-btn employ-btn" data-toggle="modal" data-target="#greet_pop"
                                       data-remote="true" href="/companies/48/tips/new_greet.js">打招呼</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="company-info" width="140px" align="center" valign="top"
                                style="padding-top: 24px;">
                                <div class="logo
        silver
">
                                    <a target="_blank" href="/c/101048"><img alt="郎羊"
                                                                             src="/web/static/picture/508906590cca4f42a590b3139c3e1129.gif"
                                                                             width="80" height="80"/></a>
                                </div>
                                <div class="company-org-tag">
                                    <div class="vip-pro-show silver"
                                         style="background: linear-gradient(90deg,#d2d2d2,#f5f5f5); color: #333333">
                                        认证团队
                                    </div>
                                </div>

                            </td>
                            <td valign="top">
                                <div style="border-right: 1px solid #f5f5f5;">
                                    <div class="person-info">
        <span class="person-name font16">
          <a target="_blank" href="/c/101048">郎羊</a>
        </span>
                                        <span class="region-path">
          <img style="width: 12px;height: 16px;vertical-align: sub;"
               src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png"
               alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c"/>
          重庆 南岸区
        </span>
                                    </div>
                                    <div class="person-describe">
                                        <p>
                                            郎羊工程咨询承接全国投资测算、概算、施工单位投标预算、预（结）算编制与审核、工程全过程控制咨询、合同咨询等内容。团队成员由来自大型施工单位、房开企业、造价咨询单位组成，团队拥有严格的内部质量复核管理制度（三级复核制），保障每一份成果文件的准确性，拥有全国各省市正版广联达全套软件。团队规模：10-20人（土建、安装、市政、公路、园林绿化等工程）。</p>
                                    </div>
                                    <div class="online-exp">
                                        <div class="company-item" style="text-align: left;">

                                            <div>
                                                <div class="row">


                                                    <div class="col-md-6 content">
                                                        <div class="title">专业范围：</div>
                                                        <div class="modeltype_list">
                                                            <div>土建\钢筋</div>
                                                            <div>土建\钢构</div>
                                                            <div>安装</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px" valign="top">
                                <div style="min-height: 120px;">
                                </div>
                                <div class="hire-div">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="company-info" width="140px" align="center" valign="top"
                                style="padding-top: 24px;">
                                <div class="logo
        silver
">
                                    <a target="_blank" href="/c/101781"><img alt="昆明众恒招投标信息咨询有限公司"
                                                                             src="/web/static/picture/9ae88098fa66471e80b00a8e5e33a57e.gif"
                                                                             width="80" height="80"/></a>
                                </div>
                                <div class="company-org-tag">
                                    <div class="vip-pro-show silver"
                                         style="background: linear-gradient(90deg,#d2d2d2,#f5f5f5); color: #333333">
                                        认证企业
                                    </div>
                                </div>

                            </td>
                            <td valign="top">
                                <div style="border-right: 1px solid #f5f5f5;">
                                    <div class="person-info">
        <span class="person-name font16">
          <a target="_blank" href="/c/101781">昆明众恒招投标信息咨询有限公司</a>
        </span>
                                        <span class="region-path">
          <img style="width: 12px;height: 16px;vertical-align: sub;"
               src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png"
               alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c"/>
          云南 昆明
        </span>
                                    </div>
                                    <div class="person-describe">
                                        <p>
                                            昆明众恒招投标信息咨询有限公司主要承接各类建设项目（含建筑、安装、装饰、市政、园林、公路、水利、土地平整等工程）的估算、概算、预算、拦标价、特别擅长投标报价、竣工结算、项目过程成本控制、施工方案编制。众恒咨询期待与您合作！共创辉煌。</p>
                                    </div>
                                    <div class="online-exp">
                                        <div class="company-item" style="text-align: left;">

                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6 content">
                                                        <div class="title">公司类型：</div>
                                                        <div class="modeltype_list">
                                                            <div>造价咨询</div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px" valign="top">
                                <div style="min-height: 120px;">
                                </div>
                                <div class="hire-div">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="company-info" width="140px" align="center" valign="top"
                                style="padding-top: 24px;">
                                <div class="logo
        copper
">
                                    <a target="_blank" href="/c/59213"><img alt="上海中世建设咨询有限公司"
                                                                            src="/web/static/picture/28a784663904499abc6e32f786c03b1d.gif"
                                                                            width="80" height="80"/></a>
                                </div>
                                <div class="company-org-tag">
                                    <div class="vip-pro-show copper">
                                        先锋企业
                                    </div>
                                </div>

                            </td>
                            <td valign="top">
                                <div style="border-right: 1px solid #f5f5f5;">
                                    <div class="person-info">
        <span class="person-name font16">
          <a target="_blank" href="/c/59213">上海中世建设咨询有限公司</a>
        </span>
                                        <span class="region-path">
          <img style="width: 12px;height: 16px;vertical-align: sub;"
               src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png"
               alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c"/>
          上海 普陀区
        </span>
                                    </div>
                                    <div class="person-describe">
                                        <p>
                                            欢迎加入中世，给你看得见的未来。上海中世建设咨询有限公司，创办于2002年，是中国专业的建设工程造价咨询服务提供商。请访问官网了解更多。2013年度入选中国工程造价咨询中介服务企业前16名。<br>目前，我们拥有员工350余人，已在中国上海、北京、深圳、成都、武汉、天津主要城市设立分公司或办事处。我们获得了业内的一致认同和社会的广泛认可，是您最合适的选择。<br>2014年，国内最优秀的民营设计集团公司悉地国际和上海中世战略合作，在建筑行业优势互补，跨界合作。<br>企业资质和资格<br>工程造价咨询甲级资质——住建部颁发<br>工程招标代理甲级资质——住建部颁发<br>政府采购代理甲级资格和确认资格——财政部颁发<br>中央投资项目招标代理预备级资格——国家发改委颁发<br>建筑工程司法鉴定许可——司法系统颁发<br>上海市高级人民法院定点工程造价鉴定机构——上海市高院<br>军工涉密业务咨询服务安全保密资格——国家国防科技工业局<br>通过ISO9001-2008质量管理和质量体系认证<br>&nbsp;上海中世，利用创新优势引领行业发展<br>我们有效地解决了造价咨询的两大核心任务--计量和计价，一是研制开发了《中世算量软件》；二是公司拥有了上海乃至全国最丰富的建材价格信息库--《易材网》。我们还自主研发“中世工作流”办公系统，由总部统一管理实施全国服务项目，保证项目品质。<br>我们为员工提供广阔的发展空间以及具有竞争力的福利待遇，包括法定社会保险、法定假日及带薪休假、&nbsp;节日福利费、员工年度旅游、年度健康体检等。
                                        </p>
                                    </div>
                                    <div class="online-exp">
                                        <div class="company-item" style="text-align: left;">

                                            <div>
                                                <div class="row">
                                                    <div class="col-md-6 content">
                                                        <div class="title">公司类型：</div>
                                                        <div class="modeltype_list">
                                                            <div>招标代理</div>
                                                            <div>造价咨询</div>
                                                            <div>BIM咨询</div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td width="300px" valign="top">
                                <div style="min-height: 120px;">
                                </div>
                                <div class="hire-div">
                                    <a class="employ-btn" target="_blank"
                                       href="/projects/publish_way?project%5Bhire%5D=59213&amp;project%5Bis_hire_com%5D=1">雇佣TA</a>
                                    <a class="blank-btn employ-btn" data-toggle="modal" data-target="#greet_pop"
                                       data-remote="true" href="/companies/48/tips/new_greet.js">打招呼</a>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="page-nav">
                    <div class="pagination"><span class="previous_page disabled"><<上一页</span> <em class="current">1</em>
                        <a rel="next" href="/companies?page=2">2</a> <a href="/companies?page=3">3</a> <a
                                href="/companies?page=4">4</a> <a href="/companies?page=5">5</a> <a
                                href="/companies?page=6">6</a> <a href="/companies?page=7">7</a> <a
                                href="/companies?page=8">8</a> <a href="/companies?page=9">9</a> <span class="gap">&hellip;</span>
                        <a href="/companies?page=19">19</a> <a href="/companies?page=20">20</a> <a class="next_page"
                                                                                                   rel="next"
                                                                                                   href="/companies?page=2">下一页>></a>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <style>
            .greet-create-success .modal-content {
                padding: 30px 20px;
                text-align: center;
            }

            .greet-create-success .success-msg {
                font-size: 18px;
                color: #666666;
                text-align: left;
                margin-bottom: 20px;
            }

            .greet-create-success .success-msg img {
                width: 20px;
                vertical-align: sub;
            }
        </style>
        <div class="modal fade greet-pop" id="greet_pop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">企业咨询</h4>
                    </div>
                    <div id="greet_form_content">
                        <div style="text-align: center; padding: 20px; font-size: 16px; color: #999999;">正在加载...</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade greet-create-success" id="greet_create_success" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="success-msg">
                        提示信息：消息发送成功，企业收到后，会第一时间与您联系，请您耐心等待。
                    </div>
                    <button type="button" class="ui-btn blank-btn" style="padding: 0 30px;" data-dismiss="modal">好的
                    </button>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function set_form_value(sel, val) {
                $(sel).val(val);
                $("#form_filter").submit();
            }

            function s_region_show(e, p_region_id) {
                $(e).parent().find('.m-findlist-now').removeClass('m-findlist-now');
                $(e).addClass('m-findlist-now');
                $("#p_region_id").val(p_region_id);
                set_form_value('#s_region_id', '');
            }

            $(".search-input > input").on('focus', function () {
                $(this).parent().find('.search-bg').css({
                    'background-color': '#f66626'
                });
                $(this).parent().find('.search-img').css({
                    background: 'url(/web/static/images/nav_search-d5a034c290faf03b63711c2c580c3a9fc4cb76011309c1c9fde935b21215fd1d.png) no-repeat 15px -22px'
                });
            });
            $(".search-input > input").on('blur', function () {
                $(this).parent().find('.search-bg').css({
                    'background-color': '#ffffff'
                });
                $(this).parent().find('.search-img').css({
                    background: 'url(/web/static/images/nav_search-d5a034c290faf03b63711c2c580c3a9fc4cb76011309c1c9fde935b21215fd1d.png) no-repeat 15px 3px',
                    border: '1px solid #c1c1c1'
                });
            });

            $(".filter-select").on("change", function () {
                $("#form_filter").submit();
            });

            $(".join-company").hover(function () {
                $(this).find('img').attr('src', "/assets/icon_project_click_hover-07b4642e2441c4065f8607b81f8bdc03f9376ab575d080afd020a82fe151b8f7.png");
            });

            $(".join-company").mouseleave(function () {
                $(this).find('img').attr('src', "/assets/icon_project_click-575a77278e86efd35f372768c38f9c689cdd0c8fb5ad6700b297201ccaa14c65.png");
            });

            $(".join-work_center").hover(function () {
                $(this).find('img').attr('src', "/assets/icon_project_click_hover-07b4642e2441c4065f8607b81f8bdc03f9376ab575d080afd020a82fe151b8f7.png");
            });

            $(".join-work_center").mouseleave(function () {
                $(this).find('img').attr('src', "/assets/icon_project_click-575a77278e86efd35f372768c38f9c689cdd0c8fb5ad6700b297201ccaa14c65.png");
            });
        </script>
    </div>
    <div class="clearfix"></div>

    <script>
        $(function () {
            reset_window();
        });

        $(window).resize(function () {
            reset_window();
        });
    </script>
@endsection