<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  <title></title>-->
  <title>航哥工场--工程行业技术服务众包平台</title>
  <meta name="description" content=""/>
  <meta name="keywords" content=""/>

  <link rel="stylesheet" media="all"
        href="/web/static/css/application-f742c9f4d291b8a5e98f7948d3ab74777a2b906c7081c9c6a7b3a231883543f5.css"
        data-turbolinks-track="true"/>

  <script src="/web/static/js/application-a53f0e0a6a61a86e6cb8f94a2fb64a861d3f1c5f341a2ae992c4adf325a4ea38.js"
          data-turbolinks-track="true"></script>
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
</head>
<body>

<!--[if lt IE 10]>

<p class="ui-tip ui-tip-yellow font-center ie-update">
  您正在使用IE低版本浏览器，为了您的账号安全和更好的产品体验，<br/>强烈建议您立即 <a class="font-blue"
                                                href="http://windows.microsoft.com/zh-cn/internet-explorer/download-ie"
                                                target="_blank">升级IE浏览器</a> 或者用更快更安全的 <a class="font-blue"
                                                                                         href="http://www.baidu.com/s?wd=chrome"
                                                                                         target="_blank">谷歌浏览器Chrome</a>
  。
  <br/>
  <br/>
  <br/>
  <span class="font16">您也可以关注我们的微信公众号，随时随地使用算客工场</span><br/>
  <img class="mt10 mb10" src="/web/static/picture/wx-ie-ad7b5613fee33b52167aee1634394882650e400a1fe28d66f6c42a9d8639d4a4.jpg" alt="Wx ie ad7b5613fee33b52167aee1634394882650e400a1fe28d66f6c42a9d8639d4a4" width="780" height="375" />
</p>
<![endif]-->

<div class="header" style="z-index: 999;">
  <div class="w rel">
    <a href="/" class="fl">
      <img src="/web/static/picture/logo-b-7dc7909fd0c649f0c33ead53590ba017abe9398b2493a0a86bff0fdbd0093c5e.png" alt="Logo b 7dc7909fd0c649f0c33ead53590ba017abe9398b2493a0a86bff0fdbd0093c5e" width="147" height="38" />
    </a>
    <ul class="mnav fl">
      <li>
        <a href="/home/pub_index">发布项目</a>
      </li>
      <li>
        <a href="/projects/pub">项目</a>
      </li>
      <li>
        <a href="/companies">企业/团队</a>
      </li>
      <li>
        <a href="/members">算客</a>
      </li>
      <!--      <li>-->
      <!--      </li>-->

      <li>
        <a href="/qas">帮助</a>
      </li>
    </ul>

    <div class="login mr">
  <div class="loginLater">
    <a class="userTitle new" href="javascript:void(0);">
      发现
      <img src="/web/static/picture/nav_dropdown-8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2.png" alt="Nav dropdown 8b682a5122f5ec43ead40fb80dd8293a4e0db544b05ede7efecbffaac19024a2" />
    </a>

    <div class="umenu" style="position: absolute; left:0;">
      <ul style="display: block;">
        <li>
          <a href="/recruits">招聘</a>
        </li>
        <li>
          <a href="/share_softwares">工具箱</a>
        </li>
        <li>
          <a href="/articles">最新动态</a>
        </li>
        <li>
          <a target="_blank" href="/vip_members/new">算客会员</a>
        </li>
<!--        <li>-->
<!--        </li>-->
        <li>
          <a target="_blank" href="/origins">算客经纪人</a>
        </li>
        <li>
          <a href="/coupons">算客大礼包</a>
        </li>
        <li>
          <a href="/my/perm">我的权限</a>
        </li>

      </ul>
    </div>
  </div>
</div>

    <div class="login fr">


        <a class="loginButton" onclick="$('#show_login_div').show()" href="javascript:;">登录</a>

        <a class="regButton" href="/member_applies?from=nav_top">注册</a>

    </div>
  </div>
</div>
<div class="clearfix"></div>
  <!--<a href="javascript:void(0)" onclick="show_little_alert('show_login_div')">-->
<!--登录参与-->
<!--</a>-->
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
              <form class="new_user" style="padding:0; margin:0;" id="new_user" action="/users/sign_in" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="zFcyySwpDvzhz782CSRQ+RNwZiKzPVM1grJ51xR0f9ZMKWLyd/i+9TDw1BNNqptAhZjBgitSQILUHYvkMA34Mw==" />
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
              <form id="login_by_mobile-for-login" action="/origins/login_by_mobile" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="z5gY09LsOctsEoDHAlcRx9R688ecsFlAzlO7DJkawBVP5kjoiT2Jwr0t6+JG2dp+QpJUZwTfSveY/Ek/vWNH8A==" />
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


<form id="new_reg_validate_code" action="/validate_codes/create_reg" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="Rkd5yB14RRe7xrB5GdNd0VGVtRTa+Sefn7UAxyuCvPzGOSnzRqn1Hmr521xdXZZox30StEKWNCjJGvL0D/s7GQ==" />
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
  <style type="text/css">.pub-index{margin:0 auto;height:4760px;background-size:cover;display:flex;flex-flow:column nowrap;justify-content:flex-start;align-items:center;background:#ffffff}.pub-index .pub-index-top{margin:0 auto;height:660px;width:100%}.pub-index .pub-index-top .pub-index-top-main{margin:auto;height:660px;width:1099px;position:relative}.pub-index .pub-index-top .pub-index-top-main .top-publish-btn{position:absolute;color:#c51a1a;background:#ffe2db;font-size:18px;top:260px;left:120px;font-weight:bold;border:none;line-height:44px;height:44px;width:180px;box-shadow:0px 3px 4px rgba(170,45,5,0.3)}.pub-index .pub-index-top .pub-index-top-main .top-publish-btn:hover{background:#ffcabd}.pub-index .pub-index-middle{margin:0 auto;height:4100px;width:100%;text-align:center}.pub-index .pub-index-middle .pub-index-middle-main{margin:auto;height:4100px;width:1100px;position:relative}.pub-index .pub-index-middle .pub-index-middle-main .service-desc{position:absolute;font-size:16px;top:2304px;width:100%;left:-48px}.pub-index .pub-index-middle .pub-index-middle-main .service-desc .hl-color{color:#f06746}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-desc{position:absolute;font-size:16px;bottom:678px;left:310px}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-desc .hirer-num,.pub-index .pub-index-middle .pub-index-middle-main .dynamic-desc .project-num{color:#f06746}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-div{position:absolute;font-size:18px;bottom:280px;left:158px;height:350px;width:728px;overflow-y:hidden;transform-origin:0px 0px;transform:rotate(0.12deg);text-align:left}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-div .dynamic-list{font-size:14px}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-div .dynamic-list .dynamic-item{height:35px;line-height:35px;padding:0 20px}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-div .dynamic-list span{display:inline-block;height:35px;line-height:35px}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-div .dynamic-list span:first-child{color:#333333;width:140px}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-div .dynamic-list span:nth-child(2){display:inline-flex;width:350px}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-div .dynamic-list span:nth-child(2) a{font-weight:bold;font-size:16px;width:350px;overflow:hidden;word-break:keep-all;white-space:nowrap;text-overflow:ellipsis;display:inline-block;margin-right:20px}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-div .dynamic-list span:nth-child(3){font-weight:bold;font-size:16px;width:80px;margin-right:20px}.pub-index .pub-index-middle .pub-index-middle-main .dynamic-div .dynamic-list span:nth-child(4){font-size:16px;width:82px}.pub-index .pub-index-middle .pub-index-middle-main .bottom-publish-btn{position:absolute;color:#c51a1a;background:#ffe2db;box-shadow:0px 3px 4px rgba(170,45,5,0.3);font-size:18px;bottom:110px;left:390px;font-weight:bold;border:none;line-height:52px;height:52px;width:240px}.pub-index .pub-index-middle .pub-index-middle-main .bottom-publish-btn:hover{background:#ffcabd}.pub-index .pub-index-middle .pub-index-middle-main .project-div{position:absolute;top:1350px;left:180px;text-align:left}.pub-index .pub-index-middle .pub-index-middle-main .project-div .project-price{color:#5692DC;font-size:16px;text-decoration:underline;margin-right:20px}.pub-index .pub-index-middle .pub-index-middle-main .project-div .project-calc-price{color:#5692DC;font-size:16px;text-decoration:underline}.pub-index .pub-index-middle .pub-index-middle-main .project-div .middle-publish-btn{background:#f06746;color:#ffffff;font-size:16px;margin-top:20px;border:none;line-height:44px;height:44px;width:180px}.pub-index .pub-index-middle .pub-index-middle-main .project-div .middle-publish-btn:hover{background:#f57d60}</style><div class="pub-index"><div class="pub-index-top" style="background: url(/web/static/images/home_index_top_bg-18fbb2bc90ee5ca7f462ac91b5c6c7f22c26316c6994d540310c4b447a47084c.png) no-repeat center;"><div class="pub-index-top-main" style="background: url(/web/static/images/home_index_top_main-fbe140f61a26aa6684cd9c2bfda59b4ccab27e16aec7a1f1d2ab201ed4a1edd0.png) no-repeat center;"><a class="ui-btn top-publish-btn" href="/project_advisers/new">免费发项目</a></div></div><div class="pub-index-middle" style="background: url(/web/static/images/home_index_middle_bg-03a7a6a3a42e04181ef533acb6025a00b1d2ab6d6df086a854b69186571d99d2.png) no-repeat center;"><div class="pub-index-middle-main" style="background: url(/web/static/images/home_index_middle_main-0b7f8059501c52720739abfbfb18d8163063afc717b9d5e17eacc9bddaaa1aa7.png) no-repeat center;"><div class="service-desc">最快<span class="hl-color">5分钟响应、2小时开始接单、</span>单项目<span class="hl-color">平均10人投标，<a class="hl-color" target="_blank" href="/members">44863名</a>认证算客</span>，<br />涵盖全国各地区、各专业、各类软件装配式团队，高效多人协作造价</div><div class="project-div"><a class="project-price" target="_blank" href="/articles/1552">了解价格详情</a><a class="project-calc-price" target="_blank" href="/projects/calc">预估项目费用</a><br /><a class="ui-btn middle-publish-btn" href="/project_advisers/new">免费发项目</a></div><div class="dynamic-desc"><span class="hirer-num">2558名</span><span>项目负责人使用算客工场服务，圆满完成</span><a class="project-num" target="_blank" href="/projects/pub">19470个</a>项目</div><div class="dynamic-div"><div class="dynamic-list"><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主于工发布项目</span><span><a target="_blank" href="/projects/19604">标段三</a></span><span>1000元</span><span>算客工作中</span></div><div class="dynamic-item" style=""><span> 雇主于工发布项目</span><span><a target="_blank" href="/projects/19603">标段二</a></span><span>1000元</span><span>算客工作中</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主于工发布项目</span><span><a target="_blank" href="/projects/19602">标段一</a></span><span>1200元</span><span>算客工作中</span></div><div class="dynamic-item" style=""><span> 雇主赵工发布项目</span><span><a target="_blank" href="/projects/19601">山东菏泽|多层住宅（7层及以下）|土建|算量+编清单+组价|广联达</a></span><span>8000元</span><span>算客工作中</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主寻...发布项目</span><span><a target="_blank" href="/projects/19600">四川甘孜|垃圾站|土建|算量+组价|宏业</a></span><span>2000元</span><span>算客工作中</span></div><div class="dynamic-item" style=""><span> 雇主李工发布项目</span><span><a target="_blank" href="/projects/19598">河北保定|厂房|土建|算量+组价|广联达</a></span><span>1200元</span><span>成果交付</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主用户发布项目</span><span><a target="_blank" href="/projects/19597">广东广州|厂房|土建|算量+编清单+组价|广联达</a></span><span>5000元</span><span>算客工作中</span></div><div class="dynamic-item" style=""><span> 雇主sky发布项目</span><span><a target="_blank" href="/projects/19592">广东韶关|土建|算量|广联达</a></span><span>12000元</span><span>算客工作中</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主李工发布项目</span><span><a target="_blank" href="/projects/19587">深圳深|土建|算量+编清单+组价|广联达</a></span><span>300元</span><span>成果交付</span></div><div class="dynamic-item" style=""><span> 雇主郭工发布项目</span><span><a target="_blank" href="/projects/19584">山西吕梁|自用办公楼|室内装修|编清单+组价|广联达</a></span><span>300元</span><span>成果交付</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主A...发布项目</span><span><a target="_blank" href="/projects/19582">山东威海|自用办公楼|土建|组价|广联达</a></span><span>500元</span><span>算客工作中</span></div><div class="dynamic-item" style=""><span> 雇主唐工发布项目</span><span><a target="_blank" href="/projects/19577">标段5：6个单体工程量部分电气计算和填量</a></span><span>2000元</span><span>算客工作中</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主唐工发布项目</span><span><a target="_blank" href="/projects/19576">标段5：6个单体工程量水暖计算和填量</a></span><span>3000元</span><span>成果交付</span></div><div class="dynamic-item" style=""><span> 雇主李工发布项目</span><span><a target="_blank" href="/projects/19574">陕西宝鸡|其他|算量+编清单+组价|广联达</a></span><span>900元</span><span>成果交付</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主欧工发布项目</span><span><a target="_blank" href="/projects/19572">广东广州|厂房|土建|算量+编清单+组价|广联达</a></span><span>600元</span><span>成果交付</span></div><div class="dynamic-item" style=""><span> 雇主用户发布项目</span><span><a target="_blank" href="/projects/19566">贵州铜仁|厂房|钢构|算量|广联达</a></span><span>3000元</span><span>算客工作中</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主用户发布项目</span><span><a target="_blank" href="/projects/19563">上海上海|其他|安装|算量+定额组价|其他</a></span><span>300元</span><span>成果交付</span></div><div class="dynamic-item" style=""><span> 雇主刘工发布项目</span><span><a target="_blank" href="/projects/19561">河北 石家庄|技术标|工程施工 | 石油天然气工程施工|普通版</a></span><span>1500元</span><span>算客工作中</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主周工发布项目</span><span><a target="_blank" href="/projects/19558">广东东莞|其他|算量+编清单+组价|广联达</a></span><span>400元</span><span>算客工作中</span></div><div class="dynamic-item" style=""><span> 雇主用户发布项目</span><span><a target="_blank" href="/projects/19555">北京北京|景观绿化|土建|算量+编清单+组价|广联达</a></span><span>2000元</span><span>算客工作中</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主唐工发布项目</span><span><a target="_blank" href="/projects/19552">标段14:8#配合填量</a></span><span>500元</span><span>成果交付</span></div><div class="dynamic-item" style=""><span> 雇主唐工发布项目</span><span><a target="_blank" href="/projects/19551">标段13：安装部分主材价格录入和配合调整费用</a></span><span>300元</span><span>成果交付</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主唐工发布项目</span><span><a target="_blank" href="/projects/19549">北京北京|甲级办公楼|室内装修|算量+编清单+组价|广联达</a></span><span>1500元</span><span>算客工作中</span></div><div class="dynamic-item" style=""><span> 雇主用户发布项目</span><span><a target="_blank" href="/projects/19547">北京东城区|自用办公楼|安装|算量+编清单+组价|广联达</a></span><span>500元</span><span>圆满结束</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主用户发布项目</span><span><a target="_blank" href="/projects/19543">浙江杭州|自用办公楼|安装|算量|广联达</a></span><span>500元</span><span>成果交付</span></div><div class="dynamic-item" style=""><span> 雇主用户发布项目</span><span><a target="_blank" href="/projects/19542">广东 广州|技术标|工程施工 | 建筑工程 | 其他建筑工程施工|高级版</a></span><span>2000元</span><span>算客工作中</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主于工发布项目</span><span><a target="_blank" href="/projects/19540">河北 承德|技术标|工程施工 | 建筑工程 | 室内装饰装修施工|基础版</a></span><span>600元</span><span>算客工作中</span></div><div class="dynamic-item" style=""><span> 雇主唐工发布项目</span><span><a target="_blank" href="/projects/19537">标段12：安装部分清单组价+审核</a></span><span>4200元</span><span>算客工作中</span></div><div class="dynamic-item" style="background: #f0f0f0;"><span> 雇主唐工发布项目</span><span><a target="_blank" href="/projects/19536">标段11:5#工程量计算+填量</a></span><span>2000元</span><span>成果交付</span></div><div class="dynamic-item" style=""><span> 雇主唐工发布项目</span><span><a target="_blank" href="/projects/19535">标段10：8#工程量计算+填量</a></span><span>3200元</span><span>算客工作中</span></div></div></div><a class="ui-btn bottom-publish-btn" href="/project_advisers/new">免费发项目</a></div></div></div><script>function auto_scroll($p_e, speed){
    var $e = $p_e.find('.dynamic-item:last');
    var init_marginTop = 0-($p_e[0].scrollHeight-$p_e.parent().height());
    $p_e.css({
        marginTop: init_marginTop
    });
    $p_e.animate({
        marginTop: init_marginTop+$e.height()
    },speed-200, function(){
        $p_e.prepend(
            $e.remove()
        );
        $p_e.css({
            marginTop: init_marginTop
        });
    });
    setTimeout(function(){
        auto_scroll($p_e, speed);
    }, speed);
}
auto_scroll($(".dynamic-list"), 800);</script>
</div>
<div class="clearfix"></div>
<div class="tborder">
  <div class="footer">
  <div id='show_dlgs' show_fb_dlg=""></div><!--点击意见反馈弹出框需登录 登录后弹出意见反馈窗口标志-->
  <div class="w">
    <div>
      <ul class="tel">
        <li style="margin-bottom: 12px;">
          <img src="/web/static/picture/footer_logo-93a287937d6cfc0545b5193c491578c201a4bb5c47c1ff3193bcea0a5b204292.png" alt="Footer logo 93a287937d6cfc0545b5193c491578c201a4bb5c47c1ff3193bcea0a5b204292" />
        </li>
        <li><img src="/web/static/picture/footer_position_icon-135dea1e0065c84db485aa9a0167983bcf9c72cf46e5e6e62095583096992ce2.png" alt="Footer position icon 135dea1e0065c84db485aa9a0167983bcf9c72cf46e5e6e62095583096992ce2" width="14" height="14" />
          北京市昌平区龙域东二路龙域中心东塔五层K13区
        </li>
        <li><img src="/web/static/picture/footer_phone_icon-8043e8e9c266263ea8e8ec67c5fa7cdee61ce9c8133513726ef73ae2c8843161.png" alt="Footer phone icon 8043e8e9c266263ea8e8ec67c5fa7cdee61ce9c8133513726ef73ae2c8843161" width="14" height="14" />
          4009938200
          15321980075
        </li>
        <li><img src="/web/static/picture/footer_qq_icon-d2a806a6465988b99f4e56cd1f5c8205d1485a51a9af48d2388da1a65b7765d9.png" alt="Footer qq icon d2a806a6465988b99f4e56cd1f5c8205d1485a51a9af48d2388da1a65b7765d9" width="14" height="14" />
          3283170039
          工作日8:30-17:30
        </li>
      </ul>
      <ul>
        <li>
          <a target="_blank" href="http://www.3kgc.com/articles/4">关于我们</a>
          |
          <a target="_blank" href="/articles?assort=2">平台规则</a>
          |
          <a target="_blank" href="/articles">最新动态</a>
          |
          <a target="_blank" href="http://www.3kgc.com/articles/13">手机版</a>
        </li>
        <li>
          Copyright 2015-2019 北京小栗科技有限公司 版权所有 京ICP备15032803号
        </li>
        <li>
          <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
          document.write(unescape("%3Cspan id='cnzz_stat_icon_1255094452'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/stat.php%3Fid%3D1255094452%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
          <script type='text/javascript'>
              var _hmt = _hmt || [];
              (function () {
                  var hm = document.createElement("script");
                  hm.src = "https://hm.baidu.com/hm.js?455ff2b31e6e616c3896cdec23d94f4e";
                  var s = document.getElementsByTagName("script")[0];
                  s.parentNode.insertBefore(hm, s);
              })();
          </script>
          <a class="bdxy" target="_blank" href="http://www.baidu.com/s?wd=www.3kgc.com@v"></a>
          <a class="zfb" target="_blank" href="javascript:void(0)"></a>
          <a class="aly" target="_blank" href="javascript:void(0)"></a>
          <a class="smyz" target="_blank" href="http://www.anquan.org/authenticate/cert/?site=www.3kgc.com&at=business"></a>

        </li>

      </ul>

    </div>
    <div class="clearfix mb10"></div>
  </div>

</div>
<div class="dialog noflash-dialog" style="margin-left: -100px;width:250px;height:200px;">

  <div class="dialog-head">提示<a class="close" href="javascript:;"><b>&#8855;</b>关闭</a></div>
  <div class="dialog-body">
    我们的产品需要安装flashplayer 10或更高版本 <br/>
    请
    <a target="_blank" href="http://get.adobe.com/flashplayer">点击此处</a>  免费下载
  </div>
</div>
<div class="dialog-bg"></div>

<div class="m-right-tool-bar">
  <ul>
    <li class="m-right-tool-list" style="border-top:none;">
      <span class="hbtn" intext="QQ客服">
        <img class="bg" src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif" alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef" width="40" height="28" />
        <span>QQ客服</span>

        <div class="bg-poptip">
          <div class="ui-poptip ui-poptip-r ui-poptip-white">
            <div class="ui-poptip-arrow ui-poptip-arrow-border"></div>
            <div class=" ui-poptip-arrow ui-poptip-arrow-bg"></div>
            <div class="m-tool-box clear" style="width:132px;text-align: center;">
              <p class="clear mt20 mb10" style="font-size:14px;font-weight:400;color:rgba(153,153,153,1);">
                <img style="  background: url(/web/static/images/service_icon_pc-b31bf3f0171d000dca0362e92e884e0bd3ff6fcef95fd512719b507d0eb7ba72.png) no-repeat -435px -30px;" src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif" alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef" width="30" height="26" />QQ客服
              </p>

              <p class="clear">
                <a target="_blank" title="点击聊天" href="http://wpa.qq.com/msgrd?v=3&uin=3214423261&site=qq&menu=yes">
                  项目问题咨询
                </a></p>

              <p class="clear mt10 mb10">

                <a target="_blank" title="点击聊天" href="http://wpa.qq.com/msgrd?v=3&uin=2726153751&site=qq&menu=yes">
                  算客注册咨询
                </a></p>

              <p class="clear mb10">
                <a target="_blank" title="点击聊天" href="http://wpa.qq.com/msgrd?v=3&uin=2726153751&site=qq&menu=yes">
                  团队企业合作
                </a></p>
            </div>
          </div>
        </div>
      </span>

    </li>
    <li class="m-right-tool-list">
      <span class="hbtn m-right-tool1" intext="联系我们">
        <img class="bg" src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif" alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef" width="40" height="28" />
        <span>联系我们</span>

        <div class="bg-poptip" style="width: 446px;">
          <div class="ui-poptip ui-poptip-r ui-poptip-white">
            <div class="ui-poptip-arrow ui-poptip-arrow-border"></div>
            <div class=" ui-poptip-arrow ui-poptip-arrow-bg"></div>
            <div class="m-tool-box clear lxwm">
              <p class="clear">
                <span class="bg_phone"></span>电话：4009938200
                15321980075
              </p>

              <p class="clear">
                <span class="bg_address"></span>北京市昌平区龙域东二路龙域中心东塔五层
              </p>
            </div>
          </div>
        </div>
      </span>

    </li>
    <li class="m-right-tool-list">
      <span class="hbtn m-right-tool2" intext="二维码">
        <img class="bg" src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif" alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef" width="40" height="28" />
        <span>二维码</span>

        <div class="bg-poptip" style="width: 275px;height:267px;top:-100px;">
          <div class="ui-poptip ui-poptip-r ui-poptip-white">
            <div class="ui-poptip-arrow ui-poptip-arrow-border" style="top:115px"></div>
            <div class=" ui-poptip-arrow ui-poptip-arrow-bg" style="top:115px"></div>
            <div class="m-tool-box clear all-center" style="width:228px;">
              <div class="clear">
                <img class="mt10 mb10" src="/web/static/picture/app_service_content-951302c48746fabaa5d925a0d48f332c22d5bf1a7bd47d60081b0249105143be.png" alt="App service content 951302c48746fabaa5d925a0d48f332c22d5bf1a7bd47d60081b0249105143be" /><br>
              </div>
            </div>
          </div>
        </div>
      </span>

    </li>
      <li class="m-right-tool-list">
      <span class="hbtn m-right-tool3_no_login" intext="意见反馈">
        <img class="bg" src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif" alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef" width="40" height="28" />
        <span>意见反馈</span></span>
      </li>

    <li class="m-right-tool-list gototop" id="gototop">
      <a title="返回顶部" href="#"><span class="hbtn m-right-tool4" intext="TOP">
        <img class="bg" src="/web/static/picture/blank-2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef.gif" alt="Blank 2f561b02a49376e3679acd5975e3790abdff09ecbadfa1e1858c7ba26e3ffcef" width="40" height="28" />
        <span style="padding-left: 5px;">TOP</span></span></a>
    </li>
  </ul>
</div>
<div class="dlg-hidden" id="user-fb">
  <form class="form-bd plr20" id="new_feedback" action="/feedbacks" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="h+Ybmi8iU9tLkAI0vJ74cDrSr8Fo3Qbg2lAq/5xUQucHmEuhdPPj0pqvaRH4EDPJrDoIYfCyFVeM/9jMuC3FAg==" />
    <p>
      <textarea cols="50" rows="5" datatype="*" placeholder="如果您在使用平台时遇到些问题,或者有个人建议,请告知我们,我们会尽快解决." name="feedback[content]" id="feedback_content">
</textarea>

    </p>

    <!--<p>-->
    <!--手机号(选填):-->
    <!--<= f.text_field :mobile, class: "w300", placeholder: "请输入手机号" >-->

    <!--</p>-->

    <p class="font-gray">
      感谢您的参与,高质量的反馈或建议,一经采纳,将给您增加200经验值
    </p>

    <div class="mt10">
      <input type="submit" name="commit" value="提交反馈" class="ui-btn" data-disable-with="提交中..." />
    </div>
</form></div>
<script type="text/javascript" charset="utf-8">
    $(function () {
        $(".m-right-tool3").click(function () {
            $("#user-fb").dialog({width: "500px", title: "意见反馈"})
        });

//      点击意见反馈弹出框需登录 登录后弹出意见反馈窗口标志
        $(".m-right-tool3_no_login").click(function () {
            var new_user_form = document.getElementById("new_user");
            var login_form = document.getElementById("login_by_mobile-for-login");
            new_user_form.action += "?show_fb_dlg=true";
            login_form.action += "?show_fb_dlg=true";
            $('#show_login_div').show();
        });
    });
</script>
<img src="/web/static/picture/track_ua.gif" width="0" height="0" style="line-height: 0;display: none;"/>
</div>

<script>
    $(function () {
        reset_window();
    });

    $(window).resize(function () {
        reset_window();
    });
</script>
</body>
</html>
