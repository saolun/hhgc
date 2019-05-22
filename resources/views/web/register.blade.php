@extends('web.layouts.home')
@section('title','工程行业技术服务众包平台')
@section('js')
  <script src="/web/static/js/highcharts.js" data-turbolinks-track="true"></script>
@endsection

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
              <form class="new_user" style="padding:0; margin:0;" id="new_user" action="/users/sign_in" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="9Ky+TX1xbjUV2nawloiyaIEvNjXfzLjW4ZkSrWRRDfk9hwfkzmwMIhLMeBiyjmCmeBvsTQRzYUZzT5pPPs7MGg==" />
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
              <form id="login_by_mobile-for-login" action="/origins/login_by_mobile" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="mNa4+MsfZZIb++niF2ipgOpFju/Cek7GQf+zyyty5gpR/QFReAIHhRzt50ozbntOE3FUlxnFl1bTKTspce0n6Q==" />
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


<form id="new_reg_validate_code" action="/validate_codes/create_reg" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="muM3l1T8EHXljEVXhsBl9NNclKgkMhe9DG8rik2R19VTyI4+5+FyYuKaS/+ixrc6KmhO0P+Nzi2euaNoFw4WNg==" />
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
  <style type="text/css">.apply_btn{color:#ffffff;font-size:14px;height:40px;width:140px;border-radius:4px;background:#f06746;box-shadow:0px 2px 6px rgba(241,103,70,0.63);border:none}.apply_btn:hover{background:#ec5d3a}</style><div class="g-wrap" style="text-align: center;color:rgba(51,51,51,1);font-family:SourceHanSansCN-Regular;"><div style="padding-top: 34px;font-size: 24px;font-family:SourceHanSansCN-Medium;">欢迎加入航辉工场！</div><div style="margin-top: 10px;font-size: 16px;">利用空闲时间贡献专业能力，轻松获取收入。</div><div style="font-size: 12px;margin: 0 60px 8px 60px;text-align:right;"></div><div style="font-size: 12px;margin: 10px 312px 8px 60px;text-align:right;">查看《<a target="_blank" style="color: #4b90e2;" href="/pages/fwxy">航辉工场服务协议</a>》</div><div style="display: flex; justify-content: space-between;margin: 0 60px;"><div style="width: 470px; height: 585px;"><div style="background-color: #ffffff;height: 585px;border-radius: 6px;"><div style="border-radius: 6px;"><img src="/web/static/picture/join_bg_demand-50207884d8e83c7b7f253ecb06f823d114a2ec8966ad9de2e90024dd5c81ad42.png" alt="Join bg demand 50207884d8e83c7b7f253ecb06f823d114a2ec8966ad9de2e90024dd5c81ad42" /></div><div style="margin: 16px 50px 30px 50px;"><div style="font-size: 20px;font-family:SourceHanSansCN-Bold;">我是需求方</div><div style="margin: 16px auto 26px auto;"><img src="/web/static/picture/join_icon_service-e02ce6f5eb8bbfc9424573881e4146d0e45f7d11467be6bcecce040dacfa23ce.png" alt="Join icon service e02ce6f5eb8bbfc9424573881e4146d0e45f7d11467be6bcecce040dacfa23ce" /></div><div style="text-align: left;font-size:14px;font-family:SourceHanSansCN-Regular;color:rgba(51,51,51,1);">如果您有工程技术需求希望找人，使用手机号验证登录，发布需求后，数万航辉为您服务～</div><div style="text-align: left;margin: 20px 0 18px 0;font-size:14px;font-family:SourceHanSansCN-Regular;color:rgba(51,51,51,1);cursor: default;">平台服务范围包括但不限于：</div><div style="font-size:12px;display: flex;flex-flow: row wrap;"><div style="width: 70px;display: inline;border-radius:4px;border: 1px solid #E7E7E7;padding-top: 6px;padding-bottom: 6px;margin-bottom: 6px;cursor: default;margin-left: 0;">造价/预算</div><div style="width: 70px;display: inline;border-radius:4px;border: 1px solid #E7E7E7;padding-top: 6px;padding-bottom: 6px;margin-bottom: 6px;cursor: default;margin-left: 5px;">技术标</div><div style="width: 70px;display: inline;border-radius:4px;border: 1px solid #E7E7E7;padding-top: 6px;padding-bottom: 6px;margin-bottom: 6px;cursor: default;margin-left: 5px;">图纸设计</div><div style="width: 70px;display: inline;border-radius:4px;border: 1px solid #E7E7E7;padding-top: 6px;padding-bottom: 6px;margin-bottom: 6px;cursor: default;margin-left: 5px;">软件协助</div><div style="width: 70px;display: inline;border-radius:4px;border: 1px solid #E7E7E7;padding-top: 6px;padding-bottom: 6px;margin-bottom: 6px;cursor: default;margin-left: 5px;">问题咨询</div><br /><div style="width: 70px;display: inline;border-radius:4px;border: 1px solid #E7E7E7;padding-top: 6px;padding-bottom: 6px;margin-bottom: 6px;cursor: default;margin-left: 0;">材料询价</div><div style="width: 70px;display: inline;border-radius:4px;border: 1px solid #E7E7E7;padding-top: 6px;padding-bottom: 6px;margin-bottom: 6px;cursor: default;margin-left: 5px;">找资料</div><div style="width: 70px;display: inline;border-radius:4px;border: 1px solid #E7E7E7;padding-top: 6px;padding-bottom: 6px;margin-bottom: 6px;cursor: default;margin-left: 5px;">人才招聘</div></div><div style="margin-top: 18px;"><a href="/projects/publish_way"><button class="apply_btn">立即发活</button></a></div></div></div></div><div style="width: 470px; height: 586px;"><div style="display: block; justify-content: space-between;text-align: center;"><div style="width: 470px; height: 586px; display: inline-block;"><div style="background-color: #ffffff;height: 586px;border-radius: 6px;"><div style="border-radius: 6px;"><img src="/web/static/picture/join_bg_service-67733b7634cdbf50dc2e38777bda4a944d2e34095444695611d70100115ba8bf.png" alt="Join bg service 67733b7634cdbf50dc2e38777bda4a944d2e34095444695611d70100115ba8bf" /></div><div style="margin: 16px 25px 30px 25px;"><div style="font-size: 20px;font-family:SourceHanSansCN-Bold;">我是服务方</div><div style="display: flex; justify-content: space-between;"><div style="width: 195px"><div style="margin: 16px auto 20px auto;"><img src="/web/static/picture/join_icon_personal-4dea60cf024032d64109c9ea7a3ad84f1e96be6f5ad69cdc7980ceb0e0620a12.png" alt="Join icon personal 4dea60cf024032d64109c9ea7a3ad84f1e96be6f5ad69cdc7980ceb0e0620a12" /></div><div style="font-size: 18px;font-family:SourceHanSansCN-Medium;color:rgba(51,51,51,1);">申请成为航辉</div><div style="margin:20px auto 28px auto;text-align: left;font-size: 14px;font-family:SourceHanSansCN-Regular;color:rgba(51,51,51,1);">只要您具备工程建设领域的相关技能，有1年以上工作经验，都可以申请成为航辉。<br />借助互联网的便捷，让更多的人能够发现您的特长，从而获得收入。</div><div style="margin-top: 18px;"><a href="/member_applies/new"><button class="apply_btn">立即申请</button></a></div></div><div style="width: 195px"><div style="margin: 16px auto 20px auto;"><img src="/web/static/picture/join_icon_company-d1a92e25f540417d0dd4615ea49db707cc4ea206e7404e9586ad5a11f076b795.png" alt="Join icon company d1a92e25f540417d0dd4615ea49db707cc4ea206e7404e9586ad5a11f076b795" /></div><div style="font-size: 18px;font-family:SourceHanSansCN-Medium;color:rgba(51,51,51,1);">申请企业认证</div><div style="margin:20px auto 28px auto;text-align: left;font-size: 14px;font-family:SourceHanSansCN-Regular;color:rgba(51,51,51,1);">平台项目中单价超过3万元的项目共计500余万，由于没有企业承接而流失。注册后可以开通企业主页，展示公司实力，推广企业直接获得客流量，让生意红火起来。</div><div style="margin-top: 18px;"><a href="/apply_companies/register_user"><button class="apply_btn">立即申请</button></a></div></div></div></div></div></div></div></div></div><div style="padding: 36px 0 42px 0;font-size:18px;color:#333333;cursor: default;">已有账号？ <span onclick="$(&#39;#show_login_div&#39;).show()" style="color: #4b90e2;cursor: pointer;">马上登录</span></div></div><script>$(function () {
    if ($('.g-wrap').height() < ($(window).height() - 70 - $('.tborder').outerHeight(true))) {
        $('.g-wrap').height(($(window).height() - 70 - $('.tborder').outerHeight(true)) + 'px');
    }
});

window.onresize(function () {
    if ($('.g-wrap').height() < ($(window).height() - 70 - $('.tborder').outerHeight(true))) {
        $('.g-wrap').height(($(window).height() - 70 - $('.tborder').outerHeight(true)) + 'px');
    }
});</script>
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
