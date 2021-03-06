﻿@extends('web.layouts.home')
@section('title','工程行业技术服务众包平台')
@section('css')
  <style>
    .header {
      position: relative;
      z-index: 0;
    }
    /*时间控件*/
    .ui-datepicker-title{
      display: flex !important;
      justify-content: center !important;
    }
    .ui-datepicker-year, .ui-datepicker-month{
      background: #ffffff !important;
      color: #f66626 !important;
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
    background: url(/web/static/images/login_error_icon-2fdef50ff4540ce104cd74e7fcd05fb63bc863e243d4feebf77a5d7dec3f957a.png) no-repeat;/*兼容没测*/
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
              <form class="new_user" style="padding:0; margin:0;" id="new_user" action="/users/sign_in" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="a7I1bVS7m34gYIfVngP8J3U49VhHtCi7t6aim3jPYxhN5tPWehMddTVYrmjBVZLFgvbe58pMGYSuIMNFwv1M7w==" />
                  <p><span class="font-red" style="font-size:14px;" id="err_msg"></span></p>
                  <table class="publish-project_info" style="width: 80%; margin: 0 auto;" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>
                        <input autofocus="autofocus" id="new_user_mobile" placeholder="请输入手机号" datatype="*" class="ui-input" style="width:400px" nullmsg="不能为空" type="text" value="" name="user[mobile]" />
                        <div class="Validform_checktip"></div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <input autocomplete="off" id="user_pwd" onkeydown="if(event.keyCode==13){document.getElementById(&#39;btn_login&#39;).click();return false};" placeholder="请输入您的密码" datatype="*" nullmsg="不能为空" style="width:400px" class="ui-input" type="password" name="user[password]" />
                        <div class="Validform_checktip"></div>
                      </td>
                    </tr>
                    <tr>
                      <td align="font14 left" style="padding-left:20px;display: flex;justify-content: space-between;">
                        <span>
                          <label style="margin: 0;" for="ck_rmbUser">记住密码</label>
                          <input type="checkbox" name="ck_rmbUser" id="ck_rmbUser" value="1" style="margin: 0 0 0 2px;" />
                        </span>
                        <span>
                          <a class="font14 font-green1 mr20" href="/users/password/new">忘记密码?</a>
                        </span>

                      </td>
                    </tr>
                    <tr>
                      <td>
                        <input type="button" class="font16 ui-btn confirm-btn" style="width: 374px;" onclick="$('#err_msg').text('');" id="btn_login" AUTOCOMPLETE="off" value="登录">
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <a class="font16" style="color: #337ab7;" href="/member_applies?from=nav_top">注册</a>

<!--                        <span>-->
<!--                        </span>-->
                      </td>
                    </tr>
                  </table>
</form>            </div>
            <div class="wx-login">
              <img style="height: 160px;width: 160px;" id="wx_qr_img" src="/web/static/picture/default_qr_code-e370b7478685a8868ad8f637a4b82d704cdafdb953b8fc24cb47930ca4a964f5.jpg" alt="Default qr code e370b7478685a8868ad8f637a4b82d704cdafdb953b8fc24cb47930ca4a964f5" />
              <span class="font16" style="padding: 20px 0 0 0;">使用微信扫一扫登录</span>
            </div>
            <div class="valid-login">
              <form id="login_by_mobile-for-login" action="/origins/login_by_mobile" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="IJ5FXbv8Ntey+pnHxT+qb98IK6boatVt64o57qhLOCAGyqPmlVSw3KfCsHqaacSNKMYAGWWS5FLyDFgwEnkX1w==" />
                <div><span style="font-size:14px;" id="tip-msg"></span></div>
                <table class="publish-project_info" style="width: 80%; margin: 0 auto;" cellspacing="0" cellpadding="0">
                  <tr>
                    <td colspan="2">
                      <input type="tel" name="mobile" id="mobile" datatype="m" class="ui-input" style="width:400px;" placeHolder="请输入您的手机号码" />
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
                      <input type="button" class="font16 ui-btn confirm-btn" style="width: 374px;" onclick="submit_by_ajax(this)" AUTOCOMPLETE="off" value="登录">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a class="font16" style="color: #337ab7;" href="/member_applies?from=nav_top">注册</a>

                      <!--                        <span>-->
                      <!--                        </span>-->
                    </td>
                  </tr>
                </table>
</form>            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="shade-div"></div>
</div>


<form id="new_reg_validate_code" action="/validate_codes/create_reg" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="tOhdFAHcnKuTWAoGyyLALciE2SNOFX0t65wXLZBa3+eSvLuvL3QaoIZgI7uUdK7PP0rynMPtTBLyGnbzKmjwEA==" />
    <input type="hidden" name="validate_code[receiver]" id="reg_validate_code_receiver" value="" />
    <input type="hidden" name="validate_code[send_type]" id="reg_validate_code_type" value="" />
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
      <a target="_blank" href="http://www.3kgc.com/articles/1551"><img width="100%" height="60px" style="background:url(/web/static/images/1471533225_____190112.jpg) center;" src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif" alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef" /></a>
<div class="find-member-main">

  <div class="page-zj">
    <div class="clear">
      <form id="form_filter" action="" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden" value="&#x2713;" />

          <dl class="zj-filter filter-dq">
            <dt class="ico dq">地区: </dt>
            <dd>
              <div
               class="m-findlist-now"
               onclick="set_form_value('#p_region_id','')">全国</div>
              <input type="hidden" name="p_region_id" id="p_region_id" />
              <input type="hidden" name="s_region_id" id="s_region_id" />
                  <div onclick="s_region_show(this, 11)"
                                              >北京</div>
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
                                              >天津</div>
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
                                              >河北</div>
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
                                              >山西</div>
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
                                              >内蒙古</div>
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
                                              >辽宁</div>
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
                                              >吉林</div>
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
                                              >黑龙江</div>
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
                                              >上海</div>
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
                                              >江苏</div>
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
                                              >浙江</div>
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
                                              >安徽</div>
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
                                              >福建</div>
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
                                              >江西</div>
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
                                              >山东</div>
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
                                              >河南</div>
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
                                              >湖北</div>
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
                                              >湖南</div>
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
                                              >广东</div>
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
                                              >广西</div>
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
                                              >海南</div>
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
                                              >深圳</div>
                  <span id="region_47" style="display: none;">
                    <div onclick="set_form_value('#s_region_id','')"
                         class="m-findlist-now"
                         >全部</div>
                        <div onclick="set_form_value('#s_region_id',4711)"
                                                          >深圳</div>
                  </span>
                  <div onclick="s_region_show(this, 51)"
                                              >四川</div>
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
                                              >贵州</div>
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
                                              >云南</div>
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
                                              >西藏</div>
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
                                              >重庆</div>
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
                                              >陕西</div>
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
                                              >甘肃</div>
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
                                              >青海</div>
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
                                              >宁夏</div>
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
                                              >新疆</div>
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
                                              >其他</div>
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

          <div id="more_filter_div" style="display: none;">
            <dl class="zj-filter">
              <dt class="ico">类型: </dt>
              <dd>
                <input type="hidden" name="project_type" id="project_type" />
                <div onclick="set_form_value('#project_type','')"
                     class="m-findlist-now"
                     >不限
                </div>
                    <div onclick="set_form_value('#project_type',5)"
                                                  >办公/写字楼</div>
                    <div onclick="set_form_value('#project_type',0)"
                                                  >多层住宅</div>
                    <div onclick="set_form_value('#project_type',3)"
                                                  >高层住宅</div>
                    <div onclick="set_form_value('#project_type',8)"
                                                  >厂房/仓库</div>
                    <div onclick="set_form_value('#project_type',12)"
                                                  >市政</div>
                    <div onclick="set_form_value('#project_type',1)"
                                                  >宿舍/公寓</div>
                    <div onclick="set_form_value('#project_type',2)"
                                                  >公租房</div>
                    <div onclick="set_form_value('#project_type',4)"
                                                  >别墅/洋房</div>
                    <div onclick="set_form_value('#project_type',6)"
                                                  >三星以上酒店</div>
                    <div onclick="set_form_value('#project_type',7)"
                                                  >三星以下酒店</div>
                    <div onclick="set_form_value('#project_type',14)"
                                                  >学校</div>
                    <div onclick="set_form_value('#project_type',9)"
                                                  >幼儿园</div>
                    <div onclick="set_form_value('#project_type',10)"
                                                  >桥梁</div>
                    <div onclick="set_form_value('#project_type',11)"
                                                  >公路/铁路</div>
                    <div onclick="set_form_value('#project_type',13)"
                                                  >公厕</div>
                    <div onclick="set_form_value('#project_type',15)"
                                                  >医院</div>
                    <div onclick="set_form_value('#project_type',16)"
                                                  >影剧院</div>
                    <div onclick="set_form_value('#project_type',18)"
                                                  >水利水电石油</div>
                    <div onclick="set_form_value('#project_type',17)"
                                                  >其他</div>
              </dd>
            </dl>

            <dl class="zj-filter">
              <dt class="ico zy">专业: </dt>
              <dd>
                <input type="hidden" name="purpose" id="purpose" />
                <div onclick="set_form_value('#purpose','')"
                     class="m-findlist-now"
                     >不限
                </div>
                    <div onclick="set_form_value('#purpose',0)"
                                                  >土建</div>
                    <div onclick="set_form_value('#purpose',66)"
                                                  >钢构</div>
                    <div onclick="set_form_value('#purpose',2)"
                                                  >钢筋</div>
                    <div onclick="set_form_value('#purpose',3)"
                                                  >给水排水</div>
                    <div onclick="set_form_value('#purpose',4)"
                                                  >暖通燃气</div>
                    <div onclick="set_form_value('#purpose',5)"
                                                  >电气消防</div>
                    <div onclick="set_form_value('#purpose',6)"
                                                  >室内装修</div>
                    <div onclick="set_form_value('#purpose',7)"
                                                  >外墙装修</div>
                    <div onclick="set_form_value('#purpose',9)"
                                                  >其他</div>
              </dd>
            </dl>

            <dl class="zj-filter">
              <dt class="ico fw">服务: </dt>
              <dd>
                <input type="hidden" name="service_type" id="service_type" />
                <div onclick="set_form_value('#service_type','')"
                     class="m-findlist-now"
                     >不限
                </div>
                <div onclick="set_form_value('#service_type','0')"
                     >造价
                </div>
                <div onclick="set_form_value('#service_type','1')"
                     >施工
                </div>
              </dd>
            </dl>
            <dl class="zj-filter">
              <dt class="zj-bh">编号: </dt>
              <dd>
                <div class="search-input">
                  <input type="text" name="user_id" value="" placeholder="请输入算客编号"/>
                  <div class="search-bg"></div>
                  <div onclick="$('#form_filter').submit();" class="search-img"></div>
                </div>
              </dd>
            </dl>

          </div>
          <dl class="zj-filter">
            <dd>
              <div class="search-input">
                <span class="unwind-btn" id="more_filter_btn" onclick="">
                  更多筛选<img src="/web/static/picture/icon_zsk_sxh-8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2.png" alt="Icon zsk sxh 8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2" />
                </span>

                <span class="join-member" style="left: 894px;" onclick="location.href='/member_applies/new'"><加入航哥></加入航哥></span>
              </div>
            </dd>
          </dl>

</form>    </div>
  </div>

      <script type="text/javascript">

          function s_region_show(e, p_region_id){
              $(e).parent().find('.m-findlist-now').removeClass('m-findlist-now');
              $(e).addClass('m-findlist-now');
              $("#p_region_id").val(p_region_id);
              set_form_value('#s_region_id','');
              //$("#s_region_show").html($("#region_"+p_region_id).html()).show();
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

          $("#more_filter_btn").on('click', function(){
              if($('#more_filter_div').is(':hidden')){
                  $('#more_filter_div').show(600);
                  $(this).html('收起筛选<img src="/web/static/picture/icon_zsk_xs-d1f58e67c098809a8bb40dedc4f180daedb05f83310ca9c4ded3da9a0c94920b.png" alt="Icon zsk xs d1f58e67c098809a8bb40dedc4f180daedb05f83310ca9c4ded3da9a0c94920b" />')
              }else{
                  $('#more_filter_div').hide(600);
                  $(this).html('更多筛选<img src="/web/static/picture/icon_zsk_sxh-8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2.png" alt="Icon zsk sxh 8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2" />')
              }
          })

      </script>

  <div class="page-zj">
        <div class="person-list">
          <table>
                  <tr>
  <td width="120px" align="center" style="display: inline-flex; flex-direction: column;">
    <div class="head-img-vip" style="margin-left: 4px;margin-right: 4px;margin-bottom: -8px;margin-top: -12px;">
      <a title="7年经验，工程量计算, BIM建模" target="_blank" href="/work_centers/5"><img src="/web/static/picture/3100149846cb5388afd5cc35f5bb5ba2014fcd21.png" alt="3100149846cb5388afd5cc35f5bb5ba2014fcd21" width="66" height="66" /></a>
          <div class="member-level">v20</div>
    </div>

        <div class="vip-pro-show">
              金牌
              全职
        </div>
  </td>
  <td valign="top">
    <div style="border-right: 1px solid #f5f5f5;">
      <div class="person-info">
        <span class="person-name font16"><a target="_blank" href="/work_centers/5">李工(0006464)</a></span>
            <span class="earnest-price font14">保证金：¥5000元</span>
            <span><img title="官方授权工作中心" style="width:19px;height:auto;" src="/web/static/picture/icon_sq-62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533.png" alt="Icon sq 62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533" /></span>
            <span><a href="/vip_members/new"><img title="金牌会员" style="width:25px;height:20px;" src="/web/static/picture/vip_jp_mini-fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c.png" alt="Vip jp mini fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c" /></a></span>
            <span class="ico-m-zjy" title="造价员"> </span>
            <span class="ico-m-zb" title="使用正版广联达软件"> </span>
            <span class="icon-m-interviewer" title="面试官"> </span>
              <span class="icon-m-year icon-m-year-0" title="年度实力算客"> </span>
              <span class="icon-m-year icon-m-year-3" title="年度友善算客"> </span>
      </div>
      <div class="profession-tag">
        <span class="has-bg">
          土建
        </span>
        <span class="font14">
        <img style="width:15px; height: 20px; vertical-align: bottom;" src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png" alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c" />
          重庆 重庆
      </span>
      </div>
      <div class="online-exp mt20">
        <span class="tag-titie">平台经验：</span>
        <span class="doing" style="font-size:14px;">
              高层住宅×39
              、
              多层住宅×32
              、
              办公/写字楼×18
              
      </span>
      </div>
          <div class="online-exp">
            <span class="tag-titie">工作经历：</span>
            <span class="doing" style="font-size:12px;">

              <span>
                2012年03月
                -
                至今
              </span>
              <span>自由职业者</span>
              <span>造价师（造价员、预算员）</span>
            </span>
          </div>
    </div>
  </td>
  <td width="300" valign="top">
    <div style="width: 100%; margin-bottom: 11px;">
      <div class="pro-data-show">
        <h3>12</h3>
        <p>近期完成</p>
      </div>
          <div class="pro-data-show">
            <h3>93.83%</h3>
            <p>好评</p>
          </div>
    </div>

    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">近期3月收入：</span>
      <span class="doing">
          ¥303819
      </span>
    </div>
      <div class="online-exp" style="padding-left: 30px; padding-top:2px">
        <span class="tag-titie">成果按时交付率：</span>
        <span class="doing">
          80%
        </span>
      </div>
    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">信誉分：</span>
      <span class="doing">
            100（高）
          </span>
    </div>
  </td>
</tr>
                  <tr>
  <td width="120px" align="center" style="display: inline-flex; flex-direction: column;">
    <div class="head-img-vip" style="margin-left: 4px;margin-right: 4px;margin-bottom: -8px;margin-top: -12px;">
      <a title="7年经验，工程量计算, 工程量清单编制" target="_blank" href="/work_centers/6"><img src="/web/static/picture/4ff956fc4b2e08d291f2e8b43a19f5d12c8c1793.jpg" alt="4ff956fc4b2e08d291f2e8b43a19f5d12c8c1793" width="66" height="66" /></a>
          <div class="member-level">v26</div>
    </div>

        <div class="vip-pro-show">
              金牌
              全职
        </div>
  </td>
  <td valign="top">
    <div style="border-right: 1px solid #f5f5f5;">
      <div class="person-info">
        <span class="person-name font16"><a target="_blank" href="/work_centers/6">柯工(0015872)</a></span>
            <span class="earnest-price font14">保证金：¥20000元</span>
            <span><img title="官方授权工作中心" style="width:19px;height:auto;" src="/web/static/picture/icon_sq-62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533.png" alt="Icon sq 62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533" /></span>
            <span><a href="/vip_members/new"><img title="金牌会员" style="width:25px;height:20px;" src="/web/static/picture/vip_jp_mini-fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c.png" alt="Vip jp mini fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c" /></a></span>
            <span class="ico-m-zb" title="使用正版广联达软件"> </span>
            <span class="icon-m-interviewer" title="面试官"> </span>
              <span class="icon-m-year icon-m-year-0" title="年度实力算客"> </span>
              <span class="icon-m-year icon-m-year-1" title="年度匠心算客"> </span>
              <span class="icon-m-year icon-m-year-3" title="年度友善算客"> </span>
              <span class="icon-m-year icon-m-year-4" title="年度人气算客"> </span>
      </div>
      <div class="profession-tag">
        <span class="has-bg">
          土建
        </span>
        <span class="font14">
        <img style="width:15px; height: 20px; vertical-align: bottom;" src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png" alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c" />
          湖北 武汉
      </span>
      </div>
      <div class="online-exp mt20">
        <span class="tag-titie">平台经验：</span>
        <span class="doing" style="font-size:14px;">
              高层住宅×84
              、
              多层住宅×45
              、
              办公/写字楼×34
              
      </span>
      </div>
          <div class="online-exp">
            <span class="tag-titie">工作经历：</span>
            <span class="doing" style="font-size:12px;">

              <span>
                2016年04月
                -
                至今
              </span>
              <span>其他</span>
              <span>造价师（造价员、预算员）</span>
                <span class="pull-down-btn"><img src="/web/static/picture/icon_zsk_sxh-8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2.png" alt="Icon zsk sxh 8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2" /></span>
                <div class="exps-pop">
                      <div class="exp-item">
                      <span>
                        2012年04月
                        -
                        2016年08月
                      </span>
                      <span>施工单位</span>
                      <span>造价师（造价员、预算员）</span>
                    </div>
                </div>
            </span>
          </div>
    </div>
  </td>
  <td width="300" valign="top">
    <div style="width: 100%; margin-bottom: 11px;">
      <div class="pro-data-show">
        <h3>7</h3>
        <p>近期完成</p>
      </div>
          <div class="pro-data-show">
            <h3>99.25%</h3>
            <p>好评</p>
          </div>
    </div>

    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">近期3月收入：</span>
      <span class="doing">
          ¥132360
      </span>
    </div>
      <div class="online-exp" style="padding-left: 30px; padding-top:2px">
        <span class="tag-titie">成果按时交付率：</span>
        <span class="doing">
          80%
        </span>
      </div>
    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">信誉分：</span>
      <span class="doing">
            100（高）
          </span>
    </div>
  </td>
</tr>
                  <tr>
  <td width="120px" align="center" style="display: inline-flex; flex-direction: column;">
    <div class="head-img-vip" style="margin-left: 4px;margin-right: 4px;margin-bottom: -8px;margin-top: -12px;">
      <a title="6年经验，工程量计算, 工程量清单编制" target="_blank" href="/work_centers/25"><img src="/web/static/picture/76854eb7b832c14357a91862ed6921b58ec41318.png" alt="76854eb7b832c14357a91862ed6921b58ec41318" width="66" height="66" /></a>
          <div class="member-level">v14</div>
    </div>

        <div class="vip-pro-show">
              金牌
        </div>
  </td>
  <td valign="top">
    <div style="border-right: 1px solid #f5f5f5;">
      <div class="person-info">
        <span class="person-name font16"><a target="_blank" href="/work_centers/25">张工(0017675)</a></span>
            <span class="earnest-price font14">保证金：¥5000元</span>
            <span><img title="官方授权工作中心" style="width:19px;height:auto;" src="/web/static/picture/icon_sq-62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533.png" alt="Icon sq 62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533" /></span>
            <span><a href="/vip_members/new"><img title="金牌会员" style="width:25px;height:20px;" src="/web/static/picture/vip_jp_mini-fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c.png" alt="Vip jp mini fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c" /></a></span>
            <span class="ico-m-zjy" title="专业水平证书"> </span>
            <span class="ico-m-zb" title="使用正版广联达软件"> </span>
      </div>
      <div class="profession-tag">
        <span class="has-bg">
          土建
        </span>
        <span class="font14">
        <img style="width:15px; height: 20px; vertical-align: bottom;" src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png" alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c" />
          河北 保定
      </span>
      </div>
      <div class="online-exp mt20">
        <span class="tag-titie">平台经验：</span>
        <span class="doing" style="font-size:14px;">
              厂房/仓库×15
              、
              办公/写字楼×12
              、
              多层住宅×8
              
      </span>
      </div>
          <div class="online-exp">
            <span class="tag-titie">工作经历：</span>
            <span class="doing" style="font-size:12px;">

              <span>
                2018年09月
                -
                至今
              </span>
              <span>个人工作室</span>
              <span>商务经理（经营管理，成本管理）</span>
                <span class="pull-down-btn"><img src="/web/static/picture/icon_zsk_sxh-8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2.png" alt="Icon zsk sxh 8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2" /></span>
                <div class="exps-pop">
                      <div class="exp-item">
                      <span>
                        2015年03月
                        -
                        2017年01月
                      </span>
                      <span>建设单位</span>
                      <span>造价师（造价员、预算员）</span>
                    </div>
                      <div class="exp-item">
                      <span>
                        2012年06月
                        -
                        2015年02月
                      </span>
                      <span>咨询单位</span>
                      <span>造价师（造价员、预算员）</span>
                    </div>
                </div>
            </span>
          </div>
    </div>
  </td>
  <td width="300" valign="top">
    <div style="width: 100%; margin-bottom: 11px;">
      <div class="pro-data-show">
        <h3>15</h3>
        <p>近期完成</p>
      </div>
          <div class="pro-data-show">
            <h3>98.67%</h3>
            <p>好评</p>
          </div>
    </div>

    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">近期3月收入：</span>
      <span class="doing">
          ¥82641
      </span>
    </div>
      <div class="online-exp" style="padding-left: 30px; padding-top:2px">
        <span class="tag-titie">成果按时交付率：</span>
        <span class="doing">
          100%
        </span>
      </div>
    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">信誉分：</span>
      <span class="doing">
            100（高）
          </span>
    </div>
  </td>
</tr>
                  <tr>
  <td width="120px" align="center" style="display: inline-flex; flex-direction: column;">
    <div class="head-img-vip" style="margin-left: 4px;margin-right: 4px;margin-bottom: -8px;margin-top: -12px;">
      <a title="0年经验，" target="_blank" href="/m/79380"><img src="/web/static/picture/a2b82f74e2985b4e67b16ac57ff7e8fa7fdb2c69.jpg" alt="A2b82f74e2985b4e67b16ac57ff7e8fa7fdb2c69" width="66" height="66" /></a>
          <div class="member-level">v15</div>
    </div>

        <div class="vip-pro-show">
              金牌
        </div>
  </td>
  <td valign="top">
    <div style="border-right: 1px solid #f5f5f5;">
      <div class="person-info">
        <span class="person-name font16"><a target="_blank" href="/m/79380">邵工(0079380)</a></span>
            <span class="earnest-price font14">保证金：¥3000元</span>
            <span><a href="/vip_members/new"><img title="金牌会员" style="width:25px;height:20px;" src="/web/static/picture/vip_jp_mini-fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c.png" alt="Vip jp mini fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c" /></a></span>
            <span class="ico-m-zjy" title="专业水平证书"> </span>
              <span class="icon-m-year icon-m-year-0" title="年度实力算客"> </span>
              <span class="icon-m-year icon-m-year-1" title="年度匠心算客"> </span>
              <span class="icon-m-year icon-m-year-2" title="年度诚信算客"> </span>
              <span class="icon-m-year icon-m-year-3" title="年度友善算客"> </span>
      </div>
      <div class="profession-tag">
        <span class="has-bg">
          安装
        </span>
        <span class="font14">
        <img style="width:15px; height: 20px; vertical-align: bottom;" src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png" alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c" />
          河北 石家庄
      </span>
      </div>
      <div class="online-exp mt20">
        <span class="tag-titie">平台经验：</span>
        <span class="doing" style="font-size:14px;">
              办公/写字楼×17
              、
              高层住宅×12
              、
              其他×5
              
      </span>
      </div>
    </div>
  </td>
  <td width="300" valign="top">
    <div style="width: 100%; margin-bottom: 11px;">
      <div class="pro-data-show">
        <h3>9</h3>
        <p>近期完成</p>
      </div>
          <div class="pro-data-show">
            <h3>100%</h3>
            <p>好评</p>
          </div>
    </div>

    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">近期3月收入：</span>
      <span class="doing">
          ¥75510
      </span>
    </div>
      <div class="online-exp" style="padding-left: 30px; padding-top:2px">
        <span class="tag-titie">成果按时交付率：</span>
        <span class="doing">
          100%
        </span>
      </div>
    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">信誉分：</span>
      <span class="doing">
            100（高）
          </span>
    </div>
  </td>
</tr>
                  <tr>
  <td width="120px" align="center" style="display: inline-flex; flex-direction: column;">
    <div class="head-img-vip" style="margin-left: 4px;margin-right: 4px;margin-bottom: -8px;margin-top: -12px;">
      <a title="20年经验，工程量计算, 清单预算编制" target="_blank" href="/work_centers/10"><img src="/web/static/picture/a100742b0a3363f9c8fa2f20992d835f82601ec4.png" alt="A100742b0a3363f9c8fa2f20992d835f82601ec4" width="66" height="66" /></a>
          <div class="member-level">v17</div>
    </div>

        <div class="vip-pro-show">
              金牌
              全职
        </div>
  </td>
  <td valign="top">
    <div style="border-right: 1px solid #f5f5f5;">
      <div class="person-info">
        <span class="person-name font16"><a target="_blank" href="/work_centers/10">李工(0017379)</a></span>
            <span class="earnest-price font14">保证金：¥7000元</span>
            <span><img title="官方授权工作中心" style="width:19px;height:auto;" src="/web/static/picture/icon_sq-62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533.png" alt="Icon sq 62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533" /></span>
            <span><a href="/vip_members/new"><img title="金牌会员" style="width:25px;height:20px;" src="/web/static/picture/vip_jp_mini-fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c.png" alt="Vip jp mini fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c" /></a></span>
            <span class="ico-ds-xz" title="算量大赛获奖选手"> </span>
            <span class="ico-m-zb" title="使用正版广联达软件"> </span>
            <span class="icon-m-interviewer" title="面试官"> </span>
              <span class="icon-m-year icon-m-year-0" title="年度实力算客"> </span>
              <span class="icon-m-year icon-m-year-3" title="年度友善算客"> </span>
              <span class="icon-m-year icon-m-year-4" title="年度人气算客"> </span>
      </div>
      <div class="profession-tag">
        <span class="has-bg">
          土建
        </span>
        <span class="font14">
        <img style="width:15px; height: 20px; vertical-align: bottom;" src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png" alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c" />
          河北 石家庄
      </span>
      </div>
      <div class="online-exp mt20">
        <span class="tag-titie">平台经验：</span>
        <span class="doing" style="font-size:14px;">
              高层住宅×23
              、
              多层住宅×19
              、
              厂房/仓库×15
              
      </span>
      </div>
          <div class="online-exp">
            <span class="tag-titie">工作经历：</span>
            <span class="doing" style="font-size:12px;">

              <span>
                1999年03月
                -
                至今
              </span>
              <span>个人工作室</span>
              <span>造价师（造价员、预算员）</span>
            </span>
          </div>
    </div>
  </td>
  <td width="300" valign="top">
    <div style="width: 100%; margin-bottom: 11px;">
      <div class="pro-data-show">
        <h3>10</h3>
        <p>近期完成</p>
      </div>
          <div class="pro-data-show">
            <h3>100%</h3>
            <p>好评</p>
          </div>
    </div>

    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">近期3月收入：</span>
      <span class="doing">
          ¥55113
      </span>
    </div>
      <div class="online-exp" style="padding-left: 30px; padding-top:2px">
        <span class="tag-titie">成果按时交付率：</span>
        <span class="doing">
          90%
        </span>
      </div>
    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">信誉分：</span>
      <span class="doing">
            100（高）
          </span>
    </div>
  </td>
</tr>
                  <tr>
  <td width="120px" align="center" style="display: inline-flex; flex-direction: column;">
    <div class="head-img-vip" style="margin-left: 4px;margin-right: 4px;margin-bottom: -8px;margin-top: -12px;">
      <a title="10年经验，工程量计算, BIM建模" target="_blank" href="/work_centers/4"><img src="/web/static/picture/9e789bf7f44327a521078d5d5892713e15477f91.png" alt="9e789bf7f44327a521078d5d5892713e15477f91" width="66" height="66" /></a>
          <div class="member-level">v18</div>
    </div>

        <div class="vip-pro-show">
              金牌
              全职
        </div>
  </td>
  <td valign="top">
    <div style="border-right: 1px solid #f5f5f5;">
      <div class="person-info">
        <span class="person-name font16"><a target="_blank" href="/work_centers/4">沈工(0000901)</a></span>
            <span class="earnest-price font14">保证金：¥20000元</span>
            <span><img title="官方授权工作中心" style="width:19px;height:auto;" src="/web/static/picture/icon_sq-62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533.png" alt="Icon sq 62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533" /></span>
            <span><a href="/vip_members/new"><img title="金牌会员" style="width:25px;height:20px;" src="/web/static/picture/vip_jp_mini-fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c.png" alt="Vip jp mini fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c" /></a></span>
            <span class="ico-m-zjy" title="造价员"> </span>
            <span class="ico-m-zb" title="使用正版广联达软件"> </span>
            <span class="icon-m-interviewer" title="面试官"> </span>
              <span class="icon-m-year icon-m-year-0" title="年度实力算客"> </span>
              <span class="icon-m-year icon-m-year-3" title="年度友善算客"> </span>
              <span class="icon-m-year icon-m-year-4" title="年度人气算客"> </span>
      </div>
      <div class="profession-tag">
        <span class="has-bg">
          土建
        </span>
        <span class="font14">
        <img style="width:15px; height: 20px; vertical-align: bottom;" src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png" alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c" />
          江苏 淮安
      </span>
      </div>
      <div class="online-exp mt20">
        <span class="tag-titie">平台经验：</span>
        <span class="doing" style="font-size:14px;">
              高层住宅×28
              、
              多层住宅×21
              、
              办公/写字楼×8
              
      </span>
      </div>
          <div class="online-exp">
            <span class="tag-titie">工作经历：</span>
            <span class="doing" style="font-size:12px;">

              <span>
                2017年10月
                -
                至今
              </span>
              <span>自由职业者</span>
              <span>造价师（造价员、预算员）</span>
                <span class="pull-down-btn"><img src="/web/static/picture/icon_zsk_sxh-8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2.png" alt="Icon zsk sxh 8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2" /></span>
                <div class="exps-pop">
                      <div class="exp-item">
                      <span>
                        2016年06月
                        -
                        2017年10月
                      </span>
                      <span>监理</span>
                      <span>监理工程师</span>
                    </div>
                      <div class="exp-item">
                      <span>
                        2014年04月
                        -
                        2015年06月
                      </span>
                      <span>咨询单位</span>
                      <span>造价师（造价员、预算员）</span>
                    </div>
                      <div class="exp-item">
                      <span>
                        2013年03月
                        -
                        2014年04月
                      </span>
                      <span>施工单位</span>
                      <span>造价师（造价员、预算员）</span>
                    </div>
                      <div class="exp-item">
                      <span>
                        2009年02月
                        -
                        2012年08月
                      </span>
                      <span>其他</span>
                      <span>其他</span>
                    </div>
                </div>
            </span>
          </div>
    </div>
  </td>
  <td width="300" valign="top">
    <div style="width: 100%; margin-bottom: 11px;">
      <div class="pro-data-show">
        <h3>17</h3>
        <p>近期完成</p>
      </div>
          <div class="pro-data-show">
            <h3>100%</h3>
            <p>好评</p>
          </div>
    </div>

    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">近期3月收入：</span>
      <span class="doing">
          ¥51616
      </span>
    </div>
      <div class="online-exp" style="padding-left: 30px; padding-top:2px">
        <span class="tag-titie">成果按时交付率：</span>
        <span class="doing">
          70%
        </span>
      </div>
    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">信誉分：</span>
      <span class="doing">
            100（高）
          </span>
    </div>
  </td>
</tr>
                  <tr>
  <td width="120px" align="center" style="display: inline-flex; flex-direction: column;">
    <div class="head-img" style="width: 100px">
      <a title="0年经验，" target="_blank" href="/m/98632"><img src="/web/static/picture/56cf7e10d367fe85c219598ee4fa82b96e2f15b2.jpg" alt="56cf7e10d367fe85c219598ee4fa82b96e2f15b2" width="66" height="66" /></a>
          <div class="member-level">v9</div>
    </div>

        <div style="height: 24px; margin: 4px auto;"></div>
  </td>
  <td valign="top">
    <div style="border-right: 1px solid #f5f5f5;">
      <div class="person-info">
        <span class="person-name font16"><a target="_blank" href="/m/98632">许工(0098632)</a></span>
            <span class="ico-m-zjy" title="专业水平证书"> </span>
      </div>
      <div class="profession-tag">
        <span class="has-bg">
          安装
        </span>
        <span class="font14">
        <img style="width:15px; height: 20px; vertical-align: bottom;" src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png" alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c" />
          上海 上海
      </span>
      </div>
      <div class="online-exp mt20">
        <span class="tag-titie">平台经验：</span>
        <span class="doing" style="font-size:14px;">
      </span>
      </div>
    </div>
  </td>
  <td width="300" valign="top">
    <div style="width: 100%; margin-bottom: 11px;">
      <div class="pro-data-show">
        <h3>2</h3>
        <p>近期完成</p>
      </div>
    </div>

    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">近期3月收入：</span>
      <span class="doing">
          ¥60700
      </span>
    </div>
      <div class="online-exp" style="padding-left: 30px; padding-top:2px">
        <span class="tag-titie">成果按时交付率：</span>
        <span class="doing">
          100%
        </span>
      </div>
    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">信誉分：</span>
      <span class="doing">
            80（正常）
          </span>
    </div>
  </td>
</tr>
                  <tr>
  <td width="120px" align="center" style="display: inline-flex; flex-direction: column;">
    <div class="head-img-vip" style="margin-left: 4px;margin-right: 4px;margin-bottom: -8px;margin-top: -12px;">
      <a title="12年经验，" target="_blank" href="/work_centers/24"><img src="/web/static/picture/936d61d57cd473bdba4e7dea472becb380bcb280.jpg" alt="936d61d57cd473bdba4e7dea472becb380bcb280" width="66" height="66" /></a>
          <div class="member-level">v13</div>
    </div>

        <div class="vip-pro-show">
              金牌
        </div>
  </td>
  <td valign="top">
    <div style="border-right: 1px solid #f5f5f5;">
      <div class="person-info">
        <span class="person-name font16"><a target="_blank" href="/work_centers/24">乔工(0022104)</a></span>
            <span class="earnest-price font14">保证金：¥8000元</span>
            <span><img title="官方授权工作中心" style="width:19px;height:auto;" src="/web/static/picture/icon_sq-62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533.png" alt="Icon sq 62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533" /></span>
            <span><a href="/vip_members/new"><img title="金牌会员" style="width:25px;height:20px;" src="/web/static/picture/vip_jp_mini-fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c.png" alt="Vip jp mini fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c" /></a></span>
            <span class="ico-m-zjs" title=造价师"></span>
            <span class="ico-m-zb" title="使用正版广联达软件"> </span>
              <span class="icon-m-year icon-m-year-4" title="年度人气算客"> </span>
      </div>
      <div class="profession-tag">
        <span class="has-bg">
          土建
        </span>
        <span class="font14">
        <img style="width:15px; height: 20px; vertical-align: bottom;" src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png" alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c" />
          广东 广州
      </span>
      </div>
      <div class="online-exp mt20">
        <span class="tag-titie">平台经验：</span>
        <span class="doing" style="font-size:14px;">
              办公/写字楼×8
              、
              多层住宅×6
              、
              厂房/仓库×5
              
      </span>
      </div>
          <div class="online-exp">
            <span class="tag-titie">工作经历：</span>
            <span class="doing" style="font-size:12px;">

              <span>
                2011年08月
                -
                至今
              </span>
              <span>建设单位</span>
              <span>商务经理（经营管理，成本管理）</span>
                <span class="pull-down-btn"><img src="/web/static/picture/icon_zsk_sxh-8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2.png" alt="Icon zsk sxh 8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2" /></span>
                <div class="exps-pop">
                      <div class="exp-item">
                      <span>
                        2006年08月
                        -
                        2011年08月
                      </span>
                      <span>建设单位</span>
                      <span>造价师（造价员、预算员）</span>
                    </div>
                </div>
            </span>
          </div>
    </div>
  </td>
  <td width="300" valign="top">
    <div style="width: 100%; margin-bottom: 11px;">
      <div class="pro-data-show">
        <h3>4</h3>
        <p>近期完成</p>
      </div>
          <div class="pro-data-show">
            <h3>97.22%</h3>
            <p>好评</p>
          </div>
    </div>

    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">近期3月收入：</span>
      <span class="doing">
          ¥47938
      </span>
    </div>
      <div class="online-exp" style="padding-left: 30px; padding-top:2px">
        <span class="tag-titie">成果按时交付率：</span>
        <span class="doing">
          100%
        </span>
      </div>
    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">信誉分：</span>
      <span class="doing">
            100（高）
          </span>
    </div>
  </td>
</tr>
                  <tr>
  <td width="120px" align="center" style="display: inline-flex; flex-direction: column;">
    <div class="head-img-vip" style="margin-left: 4px;margin-right: 4px;margin-bottom: -8px;margin-top: -12px;">
      <a title="9年经验，工程量计算, 清单预算编制" target="_blank" href="/work_centers/20"><img src="/web/static/picture/e9f091b1a2af12e2d461bdc968dc3d29cb4f71f0.gif" alt="E9f091b1a2af12e2d461bdc968dc3d29cb4f71f0" width="66" height="66" /></a>
          <div class="member-level">v13</div>
    </div>

        <div class="vip-pro-show">
              金牌
        </div>
  </td>
  <td valign="top">
    <div style="border-right: 1px solid #f5f5f5;">
      <div class="person-info">
        <span class="person-name font16"><a target="_blank" href="/work_centers/20">宋工(0034192)</a></span>
            <span class="earnest-price font14">保证金：¥5000元</span>
            <span><img title="官方授权工作中心" style="width:19px;height:auto;" src="/web/static/picture/icon_sq-62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533.png" alt="Icon sq 62bd924cf8925d1ba03c1177fbebaf23b75fb339f328fc36e7535702e6459533" /></span>
            <span><a href="/vip_members/new"><img title="金牌会员" style="width:25px;height:20px;" src="/web/static/picture/vip_jp_mini-fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c.png" alt="Vip jp mini fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c" /></a></span>
            <span class="ico-m-zjy" title="专业水平证书"> </span>
            <span class="ico-m-zb" title="使用正版广联达软件"> </span>
      </div>
      <div class="profession-tag">
        <span class="has-bg">
          土建
        </span>
        <span class="font14">
        <img style="width:15px; height: 20px; vertical-align: bottom;" src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png" alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c" />
          山东 济南
      </span>
      </div>
      <div class="online-exp mt20">
        <span class="tag-titie">平台经验：</span>
        <span class="doing" style="font-size:14px;">
              多层住宅×19
              、
              高层住宅×10
              、
              办公/写字楼×8
              
      </span>
      </div>
          <div class="online-exp">
            <span class="tag-titie">工作经历：</span>
            <span class="doing" style="font-size:12px;">

              <span>
                2009年09月
                -
                至今
              </span>
              <span>施工单位</span>
              <span>造价师（造价员、预算员）</span>
            </span>
          </div>
    </div>
  </td>
  <td width="300" valign="top">
    <div style="width: 100%; margin-bottom: 11px;">
      <div class="pro-data-show">
        <h3>8</h3>
        <p>近期完成</p>
      </div>
          <div class="pro-data-show">
            <h3>100%</h3>
            <p>好评</p>
          </div>
    </div>

    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">近期3月收入：</span>
      <span class="doing">
          ¥40444
      </span>
    </div>
      <div class="online-exp" style="padding-left: 30px; padding-top:2px">
        <span class="tag-titie">成果按时交付率：</span>
        <span class="doing">
          90%
        </span>
      </div>
    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">信誉分：</span>
      <span class="doing">
            100（高）
          </span>
    </div>
  </td>
</tr>
                  <tr>
  <td width="120px" align="center" style="display: inline-flex; flex-direction: column;">
    <div class="head-img-vip" style="margin-left: 4px;margin-right: 4px;margin-bottom: -8px;margin-top: -12px;">
      <a title="7年经验，工程量计算, 工程量清单编制, 清单预算编制" target="_blank" href="/m/24785"><img src="/web/static/picture/e6e0dac588797aae76adaefead2d9987815b178f.jpg" alt="E6e0dac588797aae76adaefead2d9987815b178f" width="66" height="66" /></a>
          <div class="member-level">v11</div>
    </div>

        <div class="vip-pro-show">
              金牌
        </div>
  </td>
  <td valign="top">
    <div style="border-right: 1px solid #f5f5f5;">
      <div class="person-info">
        <span class="person-name font16"><a target="_blank" href="/m/24785">许工(0024785)</a></span>
            <span class="earnest-price font14">保证金：¥2100元</span>
            <span><a href="/vip_members/new"><img title="金牌会员" style="width:25px;height:20px;" src="/web/static/picture/vip_jp_mini-fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c.png" alt="Vip jp mini fd0d5d7f1515d64941aef7b22d92c2b1cea51aaafbd1edccfd8403b60712597c" /></a></span>
            <span class="ico-m-zjy" title="专业水平证书"> </span>
            <span class="ico-m-zb" title="使用正版广联达软件"> </span>
      </div>
      <div class="profession-tag">
        <span class="has-bg">
          土建
        </span>
        <span class="font14">
        <img style="width:15px; height: 20px; vertical-align: bottom;" src="/web/static/picture/icon_xdiqu-082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c.png" alt="Icon xdiqu 082392fe4781b10bf665e8a65d2fc9ea38e77cfb541a6d3b2b70447c31e4470c" />
          内蒙古 呼和浩特
      </span>
      </div>
      <div class="online-exp mt20">
        <span class="tag-titie">平台经验：</span>
        <span class="doing" style="font-size:14px;">
              办公/写字楼×9
              、
              厂房/仓库×4
              、
              其他×3
              
      </span>
      </div>
          <div class="online-exp">
            <span class="tag-titie">工作经历：</span>
            <span class="doing" style="font-size:12px;">

              <span>
                2017年03月
                -
                至今
              </span>
              <span>设计</span>
              <span>造价师（造价员、预算员）</span>
                <span class="pull-down-btn"><img src="/web/static/picture/icon_zsk_sxh-8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2.png" alt="Icon zsk sxh 8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2" /></span>
                <div class="exps-pop">
                      <div class="exp-item">
                      <span>
                        2014年05月
                        -
                        2017年03月
                      </span>
                      <span>审计公司</span>
                      <span>造价师（造价员、预算员）</span>
                    </div>
                      <div class="exp-item">
                      <span>
                        2012年05月
                        -
                        2014年05月
                      </span>
                      <span>施工单位</span>
                      <span>造价师（造价员、预算员）</span>
                    </div>
                </div>
            </span>
          </div>
    </div>
  </td>
  <td width="300" valign="top">
    <div style="width: 100%; margin-bottom: 11px;">
      <div class="pro-data-show">
        <h3>4</h3>
        <p>近期完成</p>
      </div>
          <div class="pro-data-show">
            <h3>95.83%</h3>
            <p>好评</p>
          </div>
    </div>

    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">近期3月收入：</span>
      <span class="doing">
          ¥38709
      </span>
    </div>
      <div class="online-exp" style="padding-left: 30px; padding-top:2px">
        <span class="tag-titie">成果按时交付率：</span>
        <span class="doing">
          90%
        </span>
      </div>
    <div class="online-exp" style="padding-left: 30px; padding-top:2px">
      <span class="tag-titie">信誉分：</span>
      <span class="doing">
            100（高）
          </span>
    </div>
  </td>
</tr>
          </table>

        </div>
    <div class="page-nav">
      <div class="pagination"><span class="previous_page disabled"><<上一页</span> <em class="current">1</em> <a rel="next" href="/members?page=2">2</a> <a href="/members?page=3">3</a> <a href="/members?page=4">4</a> <a href="/members?page=5">5</a> <a href="/members?page=6">6</a> <a href="/members?page=7">7</a> <a href="/members?page=8">8</a> <a href="/members?page=9">9</a> <span class="gap">&hellip;</span> <a href="/members?page=4074">4074</a> <a href="/members?page=4075">4075</a> <a class="next_page" rel="next" href="/members?page=2">下一页>></a></div>
    </div>
    <div class="clear"></div>
  </div>

  <div class="page-zj p0">
  </div>
</div>
<script type="text/javascript" charset="utf-8">
    function set_form_value(sel, val) {
        $(sel).val(val);
        $("#form_filter").submit();
    }
    $('img').error(function(){
        $(this).attr('src',"http://www.3kgc.com/assets/avatar-b049fdf65622eaacddd537e45072b28b413672c09b466573427358fb8967a038.png");
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
