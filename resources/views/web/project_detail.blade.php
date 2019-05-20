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
    </style>
@endsection
@section('content')

    @component('web.layouts.compatible')
    @endcomponent

    <style>
        #show_login_div .Validform_wrong{
            display: flex;
            align-items: center;
            padding: 5px 20px;
            font-size: 12px;
        }

        #show_login_div .Validform_wrong::before{
            content: '';
            background: url(/assets/login/login_error_icon-2fdef50ff4540ce104cd74e7fcd05fb63bc863e243d4feebf77a5d7dec3f957a.png) no-repeat;/*兼容没测*/
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
                                <form class="new_user" style="padding:0; margin:0;" id="new_user" action="/users/sign_in" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="gorAmIUevk4h4jAukhJTz3bzTjI94Vz2NVvL2FPPtxjGO4cD2CzTOXx6C3MkPd/zSVKCGcDMkWXUOSueccyMQw==">
                                    <p><span class="font-red" style="font-size:14px;" id="err_msg"></span></p>
                                    <table class="publish-project_info" style="width: 80%; margin: 0 auto;" cellspacing="0" cellpadding="0">
                                        <tbody><tr>
                                            <td>
                                                <input autofocus="autofocus" id="new_user_mobile" placeholder="请输入手机号" datatype="*" class="ui-input" style="width:400px" nullmsg="不能为空" type="text" value="" name="user[mobile]">
                                                <div class="Validform_checktip"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input autocomplete="off" id="user_pwd" onkeydown="if(event.keyCode==13){document.getElementById('btn_login').click();return false};" placeholder="请输入您的密码" datatype="*" nullmsg="不能为空" style="width:400px" class="ui-input" type="password" name="user[password]">
                                                <div class="Validform_checktip"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="font14 left" style="padding-left:20px;display: flex;justify-content: space-between;">
                        <span>
                          <label style="margin: 0;" for="ck_rmbUser">记住密码</label>
                          <input type="checkbox" name="ck_rmbUser" id="ck_rmbUser" value="1" style="margin: 0 0 0 2px;">
                        </span>
                                                <span>
                          <a class="font14 font-green1 mr20" href="/users/password/new">忘记密码?</a>
                        </span>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="button" class="font16 ui-btn confirm-btn" style="width: 374px;" onclick="$('#err_msg').text('');" id="btn_login" autocomplete="off" value="登录">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="font16" style="color: #337ab7;" href="/member_applies?from=nav_top">注册</a>

                                                <!--                        <span>-->
                                                <!--                        </span>-->
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </form>            </div>
                            <div class="wx-login">
                                <img style="height: 160px;width: 160px;" id="wx_qr_img" src="/assets/login/default_qr_code-e370b7478685a8868ad8f637a4b82d704cdafdb953b8fc24cb47930ca4a964f5.jpg" alt="Default qr code e370b7478685a8868ad8f637a4b82d704cdafdb953b8fc24cb47930ca4a964f5">
                                <span class="font16" style="padding: 20px 0 0 0;">使用微信扫一扫登录</span>
                            </div>
                            <div class="valid-login">
                                <form id="login_by_mobile-for-login" action="/origins/login_by_mobile" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="gorAmIUevk4h4jAukhJTz3bzTjI94Vz2NVvL2FPPtxjGO4cD2CzTOXx6C3MkPd/zSVKCGcDMkWXUOSueccyMQw==">
                                    <div><span style="font-size:14px;" id="tip-msg"></span></div>
                                    <table class="publish-project_info" style="width: 80%; margin: 0 auto;" cellspacing="0" cellpadding="0">
                                        <tbody><tr>
                                            <td colspan="2">
                                                <input type="tel" name="mobile" id="mobile" datatype="m" class="ui-input" style="width:400px;" placeholder="请输入您的手机号码">
                                                <div class="Validform_checktip"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <div style="width: 400px;margin: 0 auto;display: flex;" id="validate_code_div">
                          <span style="flex: 1 1 auto;">
                            <input type="text" class="ui-input" name="validate_code" id="validate_code-for-login" style="width: 100%;" placeholder="请输入验证码" value="">
                            <div class="Validform_checktip"></div>
                          </span>
                                                    <span style="padding: 0 10px;display: flex;flex-flow: column;justify-content: center;" id="validate_code_tip">
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
                                                <input type="button" class="font16 ui-btn confirm-btn" style="width: 374px;" onclick="submit_by_ajax(this)" autocomplete="off" value="登录">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a class="font16" style="color: #337ab7;" href="/member_applies?from=nav_top">注册</a>

                                                <!--                        <span>-->
                                                <!--                        </span>-->
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </form>            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shade-div"></div>
    </div>


    <form id="new_reg_validate_code" action="/validate_codes/create_reg" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="gorAmIUevk4h4jAukhJTz3bzTjI94Vz2NVvL2FPPtxjGO4cD2CzTOXx6C3MkPd/zSVKCGcDMkWXUOSueccyMQw==">
        <input type="hidden" name="validate_code[receiver]" id="reg_validate_code_receiver" value="">
        <input type="hidden" name="validate_code[send_type]" id="reg_validate_code_type" value="">
    </form><script type="text/javascript">
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
                                if($('#wx_qr_img').attr('src') === 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=' + result['login_qr_ticket']){
                                }else{
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
                    $('#login_by_mobile-for-login').attr('action',$('#login_by_mobile-for-login').attr('action').replace(/scene_id=\d*/, '1=1'));
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
            }else{
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
            }else{
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
            }else{
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
            if(polling_flag){
                var num = recursion_deep;

                $.ajax({
                    type: 'get',
                    url: "/home/polling_find_user_from_qr",
                    dataType: 'json',
                    success: function (r) {
                        if(r.tf){
                            window.location.reload();
                        }else{
                            console.log('polling_f_u' + '--' + num.toString());
                            if(r.scene_id && num > 0){
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
                            }else{
                                setTimeout(
                                    function() {
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
        <div class="project-info-header"><div style="float: left; color:#999999;">项目详情<div style="float: right; color:#999999;">项目编号：19735</div></div></div><div class="project-info"><div class="project-info-item"><h3 class="project-info-title"><span class="font-red"></span>北京北京<span style="color:#d2d2d2;">|</span>自用办公楼<span style="color:#d2d2d2;">|</span>安装<span style="color:#d2d2d2;">|</span>算量<span style="color:#d2d2d2;">|</span>广联达（需要能够参与对量）</h3><div class="project-info-state"><i class="process-triangle" style="display: none"></i><b style="display: none">审核中</b><span class="ok"></span><span class="doing"></span><i class="process-triangle"></i><b style="font-size: 10px">投标中</b><span></span><i class="process-triangle" style="display: none"></i><b style="display: none">工作中</b><span></span><i class="process-triangle" style="display: none"></i><b style="display: none">待支付</b><span></span><i class="process-triangle" style="display: none"></i><b style="display: none">待评价</b><div class="ok"><i>1</i><dl><dt> 发布需求</dt><dd>2019-05-16</dd></dl></div><div class="ok"><i>2</i><dl class="ok"><dt> 算客投标</dt><dd>2019-05-16</dd></dl></div><div><i>3</i><dl><dt> 选算客，托管费用</dt><dd></dd></dl></div><div><i>4</i><dl><dt> 成果交付</dt><dd></dd></dl></div><div><i>5</i><dl><dt> 支付佣金</dt><dd></dd></dl></div><div><i>6</i><dl><dt> 雇主评价</dt><dd></dd></dl></div></div><div class="first-working-progress" style="width: 100%;padding: 20px 50px;font-size: 14px;word-break: keep-all;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"></div><script>$(function () {
                        var first_dynamic_time = $('#project_progress .working-progress-list .progress-item:first-child .progress-timestamp').html();
                        var first_dynamic_content = $('#project_progress .working-progress-list .progress-item:first-child .progress-content > p:first').html();
                        if(first_dynamic_time && first_dynamic_content){
                            $('.first-working-progress').html('最新动态：' + first_dynamic_time + first_dynamic_content);
                            $('.first-working-progress').attr('title', ('最新动态：' + first_dynamic_time + first_dynamic_content).replace(/\s/g, ''));
                        }
                    });</script><div class="project-btn-group"></div><div class="project-info-desc"><div><span><em> 项目用途：</em>施工图预算</span></div><div><span><em> 软件供应商：</em>广联达</span></div><div><span><em> 软件名称：</em>GQI2018</span></div><div><table><tbody><tr><td style="padding: 0;"><em> 项目类型：</em></td><td style="padding: 0;"><table class="project-type-show">
                                        <tbody><tr>
                                            <td>自用办公楼</td>
                                            <td>单体数量：</td>
                                            <td>1</td>
                                            <td>地上总建筑面积：</td>
                                            <td>5000</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        </tbody></table>
                                </td></tr></tbody></table></div><div><table><tbody><tr><td style="padding: 0;"><em> 项目专业：</em></td><td style="padding: 0;">    <table class="purpose-table" cellspacing="0" cellpadding="0">
                                        <tbody><tr>
                                            <td style="padding: 2px 10px; border: 1px solid #d2d2d2; vertical-align:middle;">给水排水</td>
                                            <td style="padding: 4px 10px; border: 1px solid #d2d2d2;">
                                                <p>
                                                    给水
                                                    （管线预留预埋、终端安装）
                                                </p>
                                                <p>
                                                    排水
                                                    （管线预留预埋、终端安装）
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 2px 10px; border: 1px solid #d2d2d2; vertical-align:middle;">暖通燃气</td>
                                            <td style="padding: 4px 10px; border: 1px solid #d2d2d2;">
                                                <p>
                                                    采暖系统
                                                    （管线预留预埋、终端安装）
                                                </p>
                                                <p>
                                                    通风系统
                                                    （管线预留预埋、终端安装）
                                                </p>
                                                <p>
                                                    空调水
                                                    （管线预留预埋、终端安装）
                                                </p>
                                                <p>
                                                    空调电
                                                    （管线预留预埋、终端安装）
                                                </p>
                                                <p>
                                                    燃气系统
                                                    （管线预留预埋、终端安装）
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 2px 10px; border: 1px solid #d2d2d2; vertical-align:middle;">电气消防</td>
                                            <td style="padding: 4px 10px; border: 1px solid #d2d2d2;">
                                                <p>
                                                    强电系统
                                                    （管线预留预埋、终端安装）
                                                </p>
                                                <p>
                                                    弱电系统
                                                    （管线预留预埋、终端安装）
                                                </p>
                                                <p>
                                                    消防水
                                                    （管线预留预埋、终端安装）
                                                </p>
                                                <p>
                                                    消防电
                                                    （管线预留预埋、终端安装）
                                                </p>
                                            </td>
                                        </tr>
                                        </tbody></table>
                                </td></tr></tbody></table></div><div><span><em> 项目进展：</em>投标中</span></div><div><span><em> 交付时间：</em>2019-05-23 18:22</span></div><div><span><em> 雇主报价：</em><f style="color: #f66626;">¥2000</f></span></div><div>
                    </div><div class="project-btn-group"><style>
                            .set_tag_btn {
                                color: #ffffff;
                                background-color: rgb(40, 156, 211);
                                padding: 0 10px;
                                line-height: 22px;
                                font-size: 14px;
                                border-radius: 3px;
                                display: inline-block;
                                word-wrap: break-word;
                            }

                            .tag_item {
                                color: #333333;
                                background-color: rgb(40, 203, 47);
                                padding: 0 2px;
                                line-height: 18px;
                                font-size: 12px;
                                border-radius: 3px;
                                display: inline-block;
                                margin: 2px;
                                word-wrap: break-word;
                            }
                        </style>
                    </div></div><form class="new_project_impress" id="new_project_impress" action="/project_impresses.json" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="gorAmIUevk4h4jAukhJTz3bzTjI94Vz2NVvL2FPPtxjGO4cD2CzTOXx6C3MkPd/zSVKCGcDMkWXUOSueccyMQw=="><input value="19735" type="hidden" name="project_impress[project_id]" id="project_impress_project_id"><input type="hidden" name="project_impress[user_id]" id="project_impress_user_id"></form></div><div class="project-info-item"><div class="project-content-item arrow-down"><span class="content-title">项目描述：</span><i id="project_content_arrow_down_id" onclick="show_project_content(this)" style="display: none;"></i></div><div id="project_content_div_id"><div class="project-content-item"><div style="font-size: 14px;text-indent: -5em; padding-left: 6em;"></div><div><p>一、工程项目<br>北京项目，办公楼改造，水暖电都有<br>二、工作内容<br>1、工程量计算；<br>2、根据计算工程量和然后进行填量；<br>3、能够配合对量<br>三、算客要求<br>必须能够参与对量，费用可以沟通。算量和对量费用可以沟通。</p></div></div>


                    <div class="project-content-item">
                        <div class="bidding-btn-div">
                            <input type="button" class="bid-ui-btn" value="参与投标" onclick="login('/projects/19735');">
                        </div>
                    </div><div class="project-content-item arrow-up"><div><i onclick="hide_project_content(this)"></i></div><div>点击收起</div></div></div></div><script>function hide_project_content(e) {
                    $("#project_content_div_id").slideUp(600);
                    $("#project_content_arrow_down_id").show();
                }
                function show_project_content(e) {
                    $("#project_content_div_id").slideDown(600);
                    $("#project_content_arrow_down_id").hide();
                }</script><div class="project-info-item"></div><div class="mt20 mb20">    <a target="_blank" href="http://www.3kgc.com/home/pub_index?from=xmxq"><img src="/web/static/picture/2661608331_____-_____.png" alt="2661608331           " width="1100" height="100"></a>
            </div><div class="project-info-item"><div class="bidding-members"><div class="content-title" id="bid_members">投标算客</div><div class="font-center clearfix"><div class="mt20"><img src="/web/static/picture/bids_img-ec0bafb93db0a19a23244e2d065248d1e2f38090738bb5acb7ba3906aa75aebd.png" alt="Bids img ec0bafb93db0a19a23244e2d065248d1e2f38090738bb5acb7ba3906aa75aebd"></div><div class="mb20 font16">已有4名算客报名，平台将筛选并推荐合适算客。</div></div></div></div></div><div class="dlg-hidden" id="edit_ex_detail" style="display:none;text-align: center;flex-direction: column;" title="算客完善需求"><form style="flex-grow: 1; display: flex; flex-direction: column;" class="edit_project" id="edit_project_19735" action="http://3kgc.com/projects/19735/update_ex_detail" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="_method" value="patch"><input type="hidden" name="authenticity_token" value="gorAmIUevk4h4jAukhJTz3bzTjI94Vz2NVvL2FPPtxjGO4cD2CzTOXx6C3MkPd/zSVKCGcDMkWXUOSueccyMQw=="><textarea rows="20" style="width:100%;margin-bottom: 5px;flex-grow: 1;" required="required" placeholder="建议描述：请算客针对雇主工作要求描述不清晰部分进行完善补充，以保障自身工作权益，避免不必要纠纷，如有疑问请及时联系平台工作人员。" name="project[ex_detail]" id="project_ex_detail"></textarea><input type="submit" name="commit" value="提交" class="ui-button" id="project_submit" data-disable-with="提交中..." style="flex-grow: 0;border: 1px solid #de1a0e;background: #f66626;border-radius: 3px;font-size: 14px;color: #FFF;width: 50%;margin: auto;"></form></div><script>function edit_ex_detail_dlg_show() {
                $('#edit_ex_detail').dialog({width: '600px'});
                $('#project_submit').focus();

            }
            function ex_detail_dlg_toggle() {
                $('#ex_detail_show').toggle(1000);
            }
            $(document).ready(function(){
                $('.bid-identity-btns a').on('click',function(){
                    $('.bid-identity-btns a').removeClass('active');
                    $(this).addClass('active');
                    var bid_identity = $(this).data('identity');
                    $('#bid_bid_identity').val(bid_identity);
                });
            });

            // <!--@project.fund_pre_paid > 0 &&--></script>

        <!-- 投标中 未选标 已推荐算客 非雇佣或者推荐算客非雇佣算客-->



        <!--  <a id="create_p_task" onclick="$('#little_dialog_new_p_task').dialog({width:'600px'})"-->
        <!--     class="ui-btn" href="javascript:;" >创建任务</a>-->
        <!--  <a id="submit_p_task" onclick="$('#little_dialog_submit_p_task').dialog({width:'600px'})"-->
        <!--     class="ui-btn" href="javascript:;" >提交任务</a>-->
        <!--  <a id="show_p_task" onclick="$('#little_dialog_show_p_task').dialog({width:'600px'})"-->
        <!--     class="ui-btn" href="javascript:;" >任务详情</a>-->
        <div id="little_dialog_new_p_task" title="创建任务" class="dlg-hidden">
            <link rel="stylesheet" media="all" href="/assets/web/select2.min-1100388fbf996eb7b0090bf027336657188a330191b295cc1a0b7b23a0008aab.css" data-turbolinks-track="true">
            <script src="/assets/web/select2.min-5d0bac991df7a23c072e3ee1f5461b05c6ea95fc5d9fc473e0af2da186f6cbcd.js" data-turbolinks-track="true"></script>
            <form class="simple_form new_p_task" id="new_p_task" action="/p_tasks" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="gorAmIUevk4h4jAukhJTz3bzTjI94Vz2NVvL2FPPtxjGO4cD2CzTOXx6C3MkPd/zSVKCGcDMkWXUOSueccyMQw==">
                <div class="input hidden p_task_from_userid"><input class="hidden" type="hidden" name="p_task[from_userid]" id="p_task_from_userid"></div>
                <div class="input hidden p_task_project_id"><input value="19735" class="hidden" type="hidden" name="p_task[project_id]" id="p_task_project_id"></div>
                <div class="input hidden p_task_project_state"><input value="bidding" class="hidden" type="hidden" name="p_task[project_state]" id="p_task_project_state"></div>
                <div class="new_p_task_form_div" style="padding: 30px 20px;">
                    <table width="100%" class="form-bd table-no-border">
                        <tbody>
                        <tr>
                            <!--            <th align="right"></th>-->
                            <th align="left" colspan="2">
                                <div class="input text optional p_task_title"><textarea class="text optional ui-input" datatype="*" placeholder="请输入任务展示" style="width: 100%;height: 80px;" name="p_task[title]" id="p_task_title"></textarea></div>
                                <p class="Validform_checktip"></p>
                            </th>
                        </tr>
                        <!--        <tr>-->
                        <!--          <th align="right">任务描述：</th>-->
                        <!--          <th align="left" colspan="2" style="width: 400px;">-->
                        <!--          </th>-->
                        <!--        </tr>-->
                        <tr>
                            <th align="right">附件：</th>
                            <th align="left" style="width: 400px;">

                                <div id="uploader_p_task_new" class="chunk-uploader-contains">

                                    <div class="btns">
                                        <div id="p_task_new" class="webuploader-container"><div class="webuploader-pick">
                                                选择文件
                                            </div><div id="rt_rt_1db9uc0d1nh71equ999a7h1leb1" style="position: absolute; top: 0px; left: 0px; width: 130px; height: 33px; overflow: hidden; bottom: auto; right: auto;"><input type="file" name="file" class="webuploader-element-invisible"><label style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);"></label></div></div>
                                    </div>
                                    <!--用来存放文件信息-->
                                    <div class="uploader-list">
                                    </div>
                                </div>

                                <div class="publish-upfile_box">

                                </div>

                                <script type="text/javascript" charset="utf-8">
                                    $(document).ready(function () {
                                        set_chunk_uploader('uploader_p_task_new', 'p_task_new', 'p_task_attachment_id', false, true);
                                    });
                                </script>
                                <input type="hidden" name="p_task[attachment_id]" id="p_task_attachment_id" class="upload-files-array" value="">
                            </th>
                        </tr>
                        <tr>
                            <th align="right">完成条件：</th>
                            <th align="left" style="padding-left: 25px;width: 400px;">

                                <label class="boolean optional checkbox" for="p_task_need_file" style="display: inline-flex;align-items: center;margin-right: 30px;margin-top: 0;">
                                    <input class="boolean optional" type="checkbox" value="1" name="p_task[need_file]" id="p_task_need_file" style="margin-top: 0;margin-left: -15px;" onclick="if($(this).prop('checked')){$('#p_task_attach_form').slideDown(500);}else{$('#p_task_attach_form').slideUp(500,function() {$('.p_task_p_task_file .fields').remove();});}">
                                    <span>附件</span>
                                </label>
                                <label class="boolean optional checkbox" for="p_task_need_kf" style="display: inline-flex;align-items: center;margin-right: 30px;margin-top: 0;">
                                    <input class="boolean optional" type="checkbox" value="1" name="p_task[need_kf]" id="p_task_need_kf" style="margin-top: 0;margin-left: -15px;" onclick="if($(this).prop('checked')){$('#p_task_kf_div').slideDown(500);}else{$('#p_task_kf_div').slideUp(500, function() {$('#p_task_credit_point').val('0');});}">
                                    <span>扣分</span>
                                </label>
                                <label class="boolean optional checkbox" for="p_task_need_comment" style="display: inline-flex;align-items: center;margin-right: 30px;margin-top: 0;">
                                    <input class="boolean optional" type="checkbox" value="1" name="p_task[need_comment]" id="p_task_need_comment" style="margin-top: 0;margin-left: -15px;">
                                    <span>文字说明</span>
                                </label>
                                <fieldset id="p_task_attach_form" style="display: none;width: 80%;">
                                    <legend><h1>附件</h1></legend>
                                    <div class="input string optional p_task_p_task_file">
                                        <a class="ui-btn add_nested_fields" style="color: #ffffff;" data-association="p_task_files" data-blueprint-id="p_task_files_fields_blueprint" href="javascript:void(0)">+添加</a>
                                    </div>            </fieldset>
                                <fieldset id="p_task_kf_div" style="display: none;width: 80%;">
                                    <legend><h1>扣分</h1></legend>
                                    <div class="input integer optional p_task_credit_point"><label class="integer optional" for="p_task_credit_point">扣分：</label><input class="numeric integer optional" type="number" step="1" value="0" name="p_task[credit_point]" id="p_task_credit_point"></div>
                                    <span style="color: red;">扣分使用负数，例如： -5</span>
                                </fieldset>

                            </th>
                        </tr>
                        <tr>
                            <th align="right">执行人：</th>
                            <th align="left" style="width: 400px;">
                                <style>
                                    .select2-container--open{
                                        z-index: 10000;
                                    }
                                    .select2-selection__rendered{
                                        text-align: center;
                                    }
                                </style>

                                <div class="input select required p_task_to_userid"><select style="width: 200px;text-align: center;" default_ids="27393,27047,58510,76629,36721,888,2,1,3,28350,78060,21033,25199,90364,103597" class="select required select2-hidden-accessible" required="required" aria-required="- -请选择- -" name="p_task[to_userid]" id="p_task_to_userid" data-select2-id="p_task_to_userid" tabindex="-1" aria-hidden="true"><option value="" data-select2-id="1">- -请选择- -</option>
                                        <option value="27393" data-select2-id="2">唐工(0027393)_13121652756</option></select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 200px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-p_task_to_userid-container"><span class="select2-selection__rendered" id="select2-p_task_to_userid-container" role="textbox" aria-readonly="true" title="- -请选择- -">- -请选择- -</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></div>
                                <script>
                                    $(function () {
                                        $("#p_task_to_userid").select2({
                                            tags: true,
                                            dropdownParent: $("#little_dialog_new_p_task"),
                                            language: {
                                                maximumSelected: function (params) {
                                                    return '最多只能选择' + params.maximum + '个';
                                                },
                                                noResults: function () {
                                                    return '未找到结果';
                                                },
                                                searching: function () {
                                                    return '获取数据中...';
                                                }
                                            },
                                            ajax: {
                                                url: "search_users_in_members",
                                                dataType: 'json',
                                                type: "GET",
                                                data: function (params) {
                                                    return {
                                                        'id_or_nick_or_mobile': params.term,// search term
                                                        'default_ids': $("#p_task_to_userid").attr('default_ids')
                                                    };
                                                },
                                                processResults: function (data) {
                                                    return {
                                                        results: data
                                                    };
                                                },
                                                templateResult: function (data) {
                                                    return data.text;
                                                }
                                            }
                                        });
                                    });
                                </script>
                            </th>
                        </tr>
                        <tr>
                            <th align="right">截止时间：</th>
                            <th align="left" style="width: 400px;">
                                <style>
                                    .xdsoft_datetimepicker{
                                        z-index: 10000;
                                    }
                                </style>
                                <div class="input string optional p_task_end_at"><input class="string optional date" value="2019-05-20 14:20" type="text" name="p_task[end_at]" id="p_task_end_at"></div>
                                <script>
                                    $(function () {
                                        $.datetimepicker.setLocale('zh');

                                        $('.date').datetimepicker({
                                            defaultTime: '14:20',
                                            defaultDate: '2019-05-20',
                                            minDate: new Date(),
                                            format:'Y-m-d H:i',
                                            formatDate:'Y-m-d ',
                                            formatTime:'H:i'
                                        });
                                    });

                                </script>
                            </th>
                        </tr>
                        <!--            COL_DES = {-->
                        <!--            id: 'ID',-->
                        <!--            project_id: '项目ID',-->
                        <!--            project_state: '项目状态',-->
                        <!--            title: '任务展示',-->
                        <!--            des: '任务描述',-->
                        <!--            attachment_id: '附件',-->
                        <!--            aasm_state: '任务进度状态',-->
                        <!--            from_user: '创建人',-->
                        <!--            to_user: '执行人',-->
                        <!--            end_at: '截止时间',-->
                        <!--            need_file: '是否需要附件',-->
                        <!--            need_comment: '需要回复',-->
                        <!--            comment: '记录',-->
                        <!--            finish_at: '完成时间',-->
                        <!--            status: '任务状态',-->
                        <!--            created_at: '创建时间'-->
                        <!--            }-->
                        <!--          <tr>-->
                        <!--            <th align="right">　扣分设置：</th>-->
                        <!--            <td align="left">-->
                        <!--              -->
                        <!--              <p class="Validform_checktip"></p>-->
                        <!--            </td>-->
                        <!--          </tr>-->
                        <tr>
                            <td></td>
                            <td>
                                <button class="ui-btn" style="margin-left: 60px;" onclick="p_task_submit();" data-disable-with="提交中...">提交</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div id="p_task_files_fields_blueprint" style="display: none" data-blueprint="<div class=&quot;fields&quot;>
                  <div style=&quot;display: flex;&quot;>
                    <div class=&quot;input select optional p_task_p_task_files_label_id&quot;><label class=&quot;select optional&quot; for=&quot;p_task_p_task_files_attributes_new_p_task_files_label_id&quot;>标签：</label><select class=&quot;select optional&quot; name=&quot;p_task[p_task_files_attributes][new_p_task_files][label_id]&quot; id=&quot;p_task_p_task_files_attributes_new_p_task_files_label_id&quot;><option value=&quot;&quot;>-请选择-</option>
<option value=&quot;1&quot;>图纸疑问</option>
<option value=&quot;2&quot;>成果文件</option>
<option value=&quot;3&quot;>编制说明</option>
<option value=&quot;4&quot;>指标分析</option></select></div>
                    <input type=&quot;hidden&quot; value=&quot;false&quot; name=&quot;p_task[p_task_files_attributes][new_p_task_files][_destroy]&quot; id=&quot;p_task_p_task_files_attributes_new_p_task_files__destroy&quot; /><a style=&quot;margin-left: 50px;background-color: red;color: #ffffff;&quot; class=&quot;ui-btn remove_nested_fields&quot; data-association=&quot;p_task_files&quot; href=&quot;javascript:void(0)&quot;>删除</a>
                  </div>
</div>"></div></form></div>
        <div id="little_dialog_submit_p_task" title="提交任务" class="dlg-hidden">

        </div>
        <div id="little_dialog_show_p_task" title="任务详情" class="dlg-hidden">
            <style>
                .show_p_task_form_div a.d-attach{
                    color: #337ab7;
                    text-decoration: underline;
                }
            </style>

        </div>

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


    <div class="xdsoft_datetimepicker xdsoft_noselect xdsoft_">
        <div class="xdsoft_datepicker active">
            <div class="xdsoft_mounthpicker">
                <button type="button" class="xdsoft_prev" style="visibility: visible;">

                </button>
                <button type="button" class="xdsoft_today_button" style="visibility: visible;">

                </button>
                <div class="xdsoft_label xdsoft_month">
                    <span>五月</span>
                    <div class="xdsoft_select xdsoft_monthselect xdsoft_scroller_box">
                        <div style="margin-top: 0px;">
                            <div class="xdsoft_option " data-value="0">一月</div>
                            <div class="xdsoft_option " data-value="1">二月</div>
                            <div class="xdsoft_option " data-value="2">三月</div><div class="xdsoft_option " data-value="3">四月</div><div class="xdsoft_option xdsoft_current" data-value="4">五月</div><div class="xdsoft_option " data-value="5">六月</div><div class="xdsoft_option " data-value="6">七月</div><div class="xdsoft_option " data-value="7">八月</div><div class="xdsoft_option " data-value="8">九月</div><div class="xdsoft_option " data-value="9">十月</div><div class="xdsoft_option " data-value="10">十一月</div><div class="xdsoft_option " data-value="11">十二月</div></div><div class="xdsoft_scrollbar"><div class="xdsoft_scroller" style="display: block; height: 10px; margin-top: 0px;"></div></div></div><i></i></div><div class="xdsoft_label xdsoft_year"><span>2019</span><div class="xdsoft_select xdsoft_yearselect xdsoft_scroller_box"><div style="margin-top: 0px;"><div class="xdsoft_option " data-value="1950">1950</div><div class="xdsoft_option " data-value="1951">1951</div><div class="xdsoft_option " data-value="1952">1952</div><div class="xdsoft_option " data-value="1953">1953</div><div class="xdsoft_option " data-value="1954">1954</div><div class="xdsoft_option " data-value="1955">1955</div><div class="xdsoft_option " data-value="1956">1956</div><div class="xdsoft_option " data-value="1957">1957</div><div class="xdsoft_option " data-value="1958">1958</div><div class="xdsoft_option " data-value="1959">1959</div><div class="xdsoft_option " data-value="1960">1960</div><div class="xdsoft_option " data-value="1961">1961</div><div class="xdsoft_option " data-value="1962">1962</div><div class="xdsoft_option " data-value="1963">1963</div><div class="xdsoft_option " data-value="1964">1964</div><div class="xdsoft_option " data-value="1965">1965</div><div class="xdsoft_option " data-value="1966">1966</div><div class="xdsoft_option " data-value="1967">1967</div><div class="xdsoft_option " data-value="1968">1968</div><div class="xdsoft_option " data-value="1969">1969</div><div class="xdsoft_option " data-value="1970">1970</div><div class="xdsoft_option " data-value="1971">1971</div><div class="xdsoft_option " data-value="1972">1972</div><div class="xdsoft_option " data-value="1973">1973</div><div class="xdsoft_option " data-value="1974">1974</div><div class="xdsoft_option " data-value="1975">1975</div><div class="xdsoft_option " data-value="1976">1976</div><div class="xdsoft_option " data-value="1977">1977</div><div class="xdsoft_option " data-value="1978">1978</div><div class="xdsoft_option " data-value="1979">1979</div><div class="xdsoft_option " data-value="1980">1980</div><div class="xdsoft_option " data-value="1981">1981</div><div class="xdsoft_option " data-value="1982">1982</div><div class="xdsoft_option " data-value="1983">1983</div><div class="xdsoft_option " data-value="1984">1984</div><div class="xdsoft_option " data-value="1985">1985</div><div class="xdsoft_option " data-value="1986">1986</div><div class="xdsoft_option " data-value="1987">1987</div><div class="xdsoft_option " data-value="1988">1988</div><div class="xdsoft_option " data-value="1989">1989</div><div class="xdsoft_option " data-value="1990">1990</div><div class="xdsoft_option " data-value="1991">1991</div><div class="xdsoft_option " data-value="1992">1992</div><div class="xdsoft_option " data-value="1993">1993</div><div class="xdsoft_option " data-value="1994">1994</div><div class="xdsoft_option " data-value="1995">1995</div><div class="xdsoft_option " data-value="1996">1996</div><div class="xdsoft_option " data-value="1997">1997</div><div class="xdsoft_option " data-value="1998">1998</div><div class="xdsoft_option " data-value="1999">1999</div><div class="xdsoft_option " data-value="2000">2000</div><div class="xdsoft_option " data-value="2001">2001</div><div class="xdsoft_option " data-value="2002">2002</div><div class="xdsoft_option " data-value="2003">2003</div><div class="xdsoft_option " data-value="2004">2004</div><div class="xdsoft_option " data-value="2005">2005</div><div class="xdsoft_option " data-value="2006">2006</div><div class="xdsoft_option " data-value="2007">2007</div><div class="xdsoft_option " data-value="2008">2008</div><div class="xdsoft_option " data-value="2009">2009</div><div class="xdsoft_option " data-value="2010">2010</div><div class="xdsoft_option " data-value="2011">2011</div><div class="xdsoft_option " data-value="2012">2012</div><div class="xdsoft_option " data-value="2013">2013</div><div class="xdsoft_option " data-value="2014">2014</div><div class="xdsoft_option " data-value="2015">2015</div><div class="xdsoft_option " data-value="2016">2016</div><div class="xdsoft_option " data-value="2017">2017</div><div class="xdsoft_option " data-value="2018">2018</div><div class="xdsoft_option xdsoft_current" data-value="2019">2019</div><div class="xdsoft_option " data-value="2020">2020</div><div class="xdsoft_option " data-value="2021">2021</div><div class="xdsoft_option " data-value="2022">2022</div><div class="xdsoft_option " data-value="2023">2023</div><div class="xdsoft_option " data-value="2024">2024</div><div class="xdsoft_option " data-value="2025">2025</div><div class="xdsoft_option " data-value="2026">2026</div><div class="xdsoft_option " data-value="2027">2027</div><div class="xdsoft_option " data-value="2028">2028</div><div class="xdsoft_option " data-value="2029">2029</div><div class="xdsoft_option " data-value="2030">2030</div><div class="xdsoft_option " data-value="2031">2031</div><div class="xdsoft_option " data-value="2032">2032</div><div class="xdsoft_option " data-value="2033">2033</div><div class="xdsoft_option " data-value="2034">2034</div><div class="xdsoft_option " data-value="2035">2035</div><div class="xdsoft_option " data-value="2036">2036</div><div class="xdsoft_option " data-value="2037">2037</div><div class="xdsoft_option " data-value="2038">2038</div><div class="xdsoft_option " data-value="2039">2039</div><div class="xdsoft_option " data-value="2040">2040</div><div class="xdsoft_option " data-value="2041">2041</div><div class="xdsoft_option " data-value="2042">2042</div><div class="xdsoft_option " data-value="2043">2043</div><div class="xdsoft_option " data-value="2044">2044</div><div class="xdsoft_option " data-value="2045">2045</div><div class="xdsoft_option " data-value="2046">2046</div><div class="xdsoft_option " data-value="2047">2047</div><div class="xdsoft_option " data-value="2048">2048</div><div class="xdsoft_option " data-value="2049">2049</div><div class="xdsoft_option " data-value="2050">2050</div></div><div class="xdsoft_scrollbar"><div class="xdsoft_scroller" style="display: block; height: 10px; margin-top: 0px;"></div></div></div><i></i></div><button type="button" class="xdsoft_next" style="visibility: visible;"></button></div><div class="xdsoft_calendar"><table><thead><tr><th>日</th><th>一</th><th>二</th><th>三</th><th>四</th><th>五</th><th>六</th></tr></thead><tbody><tr><td data-date="28" data-month="3" data-year="2019" class="xdsoft_date xdsoft_day_of_week0 xdsoft_date xdsoft_disabled xdsoft_other_month xdsoft_weekend" title=""><div>28</div></td><td data-date="29" data-month="3" data-year="2019" class="xdsoft_date xdsoft_day_of_week1 xdsoft_date xdsoft_disabled xdsoft_other_month" title=""><div>29</div></td><td data-date="30" data-month="3" data-year="2019" class="xdsoft_date xdsoft_day_of_week2 xdsoft_date xdsoft_disabled xdsoft_other_month" title=""><div>30</div></td><td data-date="1" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week3 xdsoft_date xdsoft_disabled" title=""><div>1</div></td><td data-date="2" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week4 xdsoft_date xdsoft_disabled" title=""><div>2</div></td><td data-date="3" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week5 xdsoft_date xdsoft_disabled" title=""><div>3</div></td><td data-date="4" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week6 xdsoft_date xdsoft_disabled xdsoft_weekend" title=""><div>4</div></td></tr><tr><td data-date="5" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week0 xdsoft_date xdsoft_disabled xdsoft_weekend" title=""><div>5</div></td><td data-date="6" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week1 xdsoft_date xdsoft_disabled" title=""><div>6</div></td><td data-date="7" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week2 xdsoft_date xdsoft_disabled" title=""><div>7</div></td><td data-date="8" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week3 xdsoft_date xdsoft_disabled" title=""><div>8</div></td><td data-date="9" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week4 xdsoft_date xdsoft_disabled" title=""><div>9</div></td><td data-date="10" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week5 xdsoft_date xdsoft_disabled" title=""><div>10</div></td><td data-date="11" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week6 xdsoft_date xdsoft_disabled xdsoft_weekend" title=""><div>11</div></td></tr><tr><td data-date="12" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week0 xdsoft_date xdsoft_disabled xdsoft_weekend" title=""><div>12</div></td><td data-date="13" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week1 xdsoft_date xdsoft_disabled" title=""><div>13</div></td><td data-date="14" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week2 xdsoft_date xdsoft_disabled" title=""><div>14</div></td><td data-date="15" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week3 xdsoft_date xdsoft_disabled" title=""><div>15</div></td><td data-date="16" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week4 xdsoft_date xdsoft_disabled" title=""><div>16</div></td><td data-date="17" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week5 xdsoft_date xdsoft_disabled" title=""><div>17</div></td><td data-date="18" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week6 xdsoft_date xdsoft_disabled xdsoft_weekend" title=""><div>18</div></td></tr><tr><td data-date="19" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week0 xdsoft_date xdsoft_disabled xdsoft_weekend" title=""><div>19</div></td><td data-date="20" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week1 xdsoft_date xdsoft_current xdsoft_today" title=""><div>20</div></td><td data-date="21" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week2 xdsoft_date" title=""><div>21</div></td><td data-date="22" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week3 xdsoft_date" title=""><div>22</div></td><td data-date="23" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week4 xdsoft_date" title=""><div>23</div></td><td data-date="24" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week5 xdsoft_date" title=""><div>24</div></td><td data-date="25" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week6 xdsoft_date xdsoft_weekend" title=""><div>25</div></td></tr><tr><td data-date="26" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week0 xdsoft_date xdsoft_weekend" title=""><div>26</div></td><td data-date="27" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week1 xdsoft_date" title=""><div>27</div></td><td data-date="28" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week2 xdsoft_date" title=""><div>28</div></td><td data-date="29" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week3 xdsoft_date" title=""><div>29</div></td><td data-date="30" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week4 xdsoft_date" title=""><div>30</div></td><td data-date="31" data-month="4" data-year="2019" class="xdsoft_date xdsoft_day_of_week5 xdsoft_date" title=""><div>31</div></td><td data-date="1" data-month="5" data-year="2019" class="xdsoft_date xdsoft_day_of_week6 xdsoft_date xdsoft_other_month xdsoft_weekend" title=""><div>1</div></td></tr></tbody></table></div><button type="button" class="xdsoft_save_selected blue-gradient-button" style="display: none;">Save Selected</button></div><div class="xdsoft_timepicker active"><button type="button" class="xdsoft_prev"></button><div class="xdsoft_time_box xdsoft_scroller_box"><div class="xdsoft_time_variant" style="margin-top: 0px;"><div class="xdsoft_time " data-hour="0" data-minute="0">00:00</div><div class="xdsoft_time " data-hour="1" data-minute="0">01:00</div><div class="xdsoft_time " data-hour="2" data-minute="0">02:00</div><div class="xdsoft_time " data-hour="3" data-minute="0">03:00</div><div class="xdsoft_time " data-hour="4" data-minute="0">04:00</div><div class="xdsoft_time " data-hour="5" data-minute="0">05:00</div><div class="xdsoft_time " data-hour="6" data-minute="0">06:00</div><div class="xdsoft_time " data-hour="7" data-minute="0">07:00</div><div class="xdsoft_time " data-hour="8" data-minute="0">08:00</div><div class="xdsoft_time " data-hour="9" data-minute="0">09:00</div><div class="xdsoft_time " data-hour="10" data-minute="0">10:00</div><div class="xdsoft_time " data-hour="11" data-minute="0">11:00</div><div class="xdsoft_time " data-hour="12" data-minute="0">12:00</div><div class="xdsoft_time " data-hour="13" data-minute="0">13:00</div><div class="xdsoft_time xdsoft_current" data-hour="14" data-minute="0">14:00</div><div class="xdsoft_time " data-hour="15" data-minute="0">15:00</div><div class="xdsoft_time " data-hour="16" data-minute="0">16:00</div><div class="xdsoft_time " data-hour="17" data-minute="0">17:00</div><div class="xdsoft_time " data-hour="18" data-minute="0">18:00</div><div class="xdsoft_time " data-hour="19" data-minute="0">19:00</div><div class="xdsoft_time " data-hour="20" data-minute="0">20:00</div><div class="xdsoft_time " data-hour="21" data-minute="0">21:00</div><div class="xdsoft_time " data-hour="22" data-minute="0">22:00</div><div class="xdsoft_time " data-hour="23" data-minute="0">23:00</div></div><div class="xdsoft_scrollbar"><div class="xdsoft_scroller" style="display: block; height: 10px; margin-top: 0px;"></div></div></div><button type="button" class="xdsoft_next"></button></div></div>
@endsection