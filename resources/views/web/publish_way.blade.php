@extends('web.layouts.home')
@section('title','航辉加盟')
@section('js')
  <script src="/web//web/static/js/highcharts.js" data-turbolinks-track="true"></script>
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
              <form class="new_user" style="padding:0; margin:0;" id="new_user" action="/users/sign_in" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="g84Ymk/CCeKkWZ1gdZ+bPM+/Fug7EnRuwMEa6kwtmFgogTSdjUX3D+0X+pBmYCdcaVdksDvKZsvhtCeIV42Gdg==" />
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
              <form id="login_by_mobile-for-login" action="/origins/login_by_mobile" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="FbqUfOvxmSOBKgzc6GIi+0zr+dwR7hoyzsO+YCoIyHy+9bh7KXZnzshkayz7nZ6b6gOLhBE2CJfvtoMCMajWUg==" />
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


<form id="new_reg_validate_code" action="/validate_codes/create_reg" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="&#x2713;" /><input type="hidden" name="authenticity_token" value="70oT6qHT1+iesGZ3hrZTLrXwBYG9WwQAs6tUSiEmOCREBT/tY1QpBdf+AYeVSe9OExh32b2DFqWS3mkoOoYmCg==" />
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
  <style>
  .service-types{
    padding-top: 100px;
    box-shadow: 0 2px 4px #e7e7e7;
    background: #ffffff;
    border-radius: 6px;
    margin-top: 12px;
    text-align: center;
    height: 384px;
  }
  .service-step{

    box-shadow: 0 2px 4px #e7e7e7;
    background: #ffffff;height:88px;line-height:88px;
    border-radius: 6px;text-align: center;
  }
  .service-types a{
    display: inline-block;
    font-size: 18px;
    color: #333333;
    padding: 19px 12px;
  }
  .service-types a:hover{
    box-shadow: 0 0 6px #e7e7e7;
    border-bottom: 3px solid #f66636;
  }
  .service-types img{
    width: 130px;
  }
    .right-div{
      width: 218px;
      height: 500px;
      display: inline-block;
    }
    .right-div > a, .right-div > div{
      width: 216px;
      background: #ffffff;
      display: block;
      font-size: 16px;
      color: #333333;
      float: right;
      text-align: center;
      border-radius: 6px;
    }

    .right-div > a.xmcs{
      height: 88px;
      line-height: 88px;
      box-shadow: 0 2px 4px #e7e7e7;
      margin-top: 12px;
    }
  .right-div > a.xmcs:hover{
    color: #f06746;
  }
  .right-div > a.xmcs .image-bak{
    margin-right: 4px;
    width: 34px;
    height: 44px;
    display: inline-block;
    vertical-align: middle;
    background: url(/web/static/images/fxm_pc_cs-e0f1947efa444a9d3f852663825fbd1ad86cc958a4404d589244cc7fa40ad0ab.png);
  }

  .right-div > a.xmcs:hover .image-bak{
    background: url(/web/static/images/fxm_pc_cspre-344a5481e19071616dc8678b387ccea068210c884fbea6129cf2da11c9defb27.png);
  }

  .right-div > a.lxkf{
    height: 88px;
    padding-top: 22px;
    box-shadow: 0 2px 4px #e7e7e7;
  }

  .right-div > a.lxkf:hover{
    color: #f06746;
  }

  .right-div > a.lxkf .image-bak{
    margin-right: 4px;
    width: 41px;
    height: 41px;
    display: inline-block;
    vertical-align: bottom;
    background: url(/web/static/images/seek_tabbar_nor-808496d0ca2b95cf7c9ccbf5dad5ef3317e1e049e4f0854442086e151b3fcf0f.png);
    background-size: 100% 100%;
  }

  .right-div > a.lxkf:hover .image-bak{
    background: url(/web/static/images/seek_tabbar_sel-800961818732a744ff0188c2094f419a4128b5707225e5564966b595f4d68997.png);
    background-size: 100% 100%;
  }

  .right-div > div.phone{
    height: 285px;
    margin-top: 12px;
    padding-top: 22px;
    border: 1px solid #e7e7e7;
  }
  .right-div > .phone img{
    vertical-align: sub;
  }
  .right-div > .phone > div{
    text-align: center;
    font-size: 16px;
  }
  .right-div > .phone > div img{
    vertical-align: top;
  }

  .right-div > .phone .contact{
    margin-top: 12px;
    text-align: left;
    padding-left: 26px;
  }

  .right-div > .phone .contact div{
    display: inline-block;
    line-height: 18px;
    text-align: center;
  }
  .right-div > .phone .contact span{
    color: #999999;
    font-size: 14px;
  }
</style>
<a id="_top"></a>
<div style="
        width: 1106px;
        padding: 24px 0;
        margin: 0 auto;">
  <div style="font-size: 24px; color: #333333; text-align: center;">免费发项目</div>
  <p style="font-size: 16px; color: #999999; text-align: center;">
    填写项目信息，全国<span><a target="_blank" style="color: #f06746;" href="/members">44863</a></span>名算客为您服务。
  </p>
  <div style="font-size: 16px; color: #999999; text-align: right;">
    <a target="_blank" href="/pages/fwgyxy">查看《服务雇佣协议》</a>
  </div>
</div>
<div style="
    width: 1106px;
    margin: 0 auto;
    padding-bottom: 20px;">
  <div style="
      width: 858px;
          margin-right:20px;
      display: inline-block;
      float: left;">
    <div class="service-step">

      <img src="/web/static/picture/fxm_pc_step-ea76c1d579d9996637d9d9c693cc652a7bf3de5bb107738abd0ebfd68c34d43d.png" alt="Fxm pc step ea76c1d579d9996637d9d9c693cc652a7bf3de5bb107738abd0ebfd68c34d43d" width="858" height="80" />

    </div>
    <div class="service-types">
          <a href="
                    /projects/new?project[service_type]=0
          ">
            <div>
              <img src="/web/static/picture/service_type_0-a15f1377d6693a4564c5d60c284a0497c2795545dd6e76544d7eb2ae6f00d5fa.png" alt="Service type 0 a15f1377d6693a4564c5d60c284a0497c2795545dd6e76544d7eb2ae6f00d5fa" />
            </div>
            <div>造价/预算</div>
          </a>
          <a href="
                    /projects/new_technical_bid
          ">
            <div>
              <img src="/web/static/picture/service_type_5-84a11b25b24dfb1218a8934eb1ba94eed7c00520b888fcc9dae2d2602d0767e7.png" alt="Service type 5 84a11b25b24dfb1218a8934eb1ba94eed7c00520b888fcc9dae2d2602d0767e7" />
            </div>
            <div>技术标</div>
          </a>
          <a href="
                    /projects/new?project[service_type]=3
          ">
            <div>
              <img src="/web/static/picture/service_type_3-f6dd4660f466490c70cfd2abca8aa41d4287b863b6aa33afec08df9bd80e7a64.png" alt="Service type 3 f6dd4660f466490c70cfd2abca8aa41d4287b863b6aa33afec08df9bd80e7a64" />
            </div>
            <div>图纸设计</div>
          </a>
          <a href="
                    /projects/new?project[service_type]=4
          ">
            <div>
              <img src="/web/static/picture/service_type_4-b864012629f0beda4e85951e4e9149b55fcc36d350482416176f196ff607a4a3.png" alt="Service type 4 b864012629f0beda4e85951e4e9149b55fcc36d350482416176f196ff607a4a3" />
            </div>
            <div>问题咨询</div>
          </a>
          <a href="
                    /projects/new?project[service_type]=2
          ">
            <div>
              <img src="/web/static/picture/service_type_2-b05014215e04b258bd1b458e7a9658d0a8a6e9215dff28806ff7f2e4bc3dbc10.png" alt="Service type 2 b05014215e04b258bd1b458e7a9658d0a8a6e9215dff28806ff7f2e4bc3dbc10" />
            </div>
            <div>其它</div>
          </a>
    </div>
  </div>
  <div class="right-div">
    <a class="lxkf" href="/project_advisers/new">
      <div class="image-bak"></div>
      <div style="display: inline-block;line-height: 18px;text-align: left;">快速发布项目<br>
                <p style="color: #999999;font-size:12px;">客服帮您梳理需求</p>
      </div>
</a>    <a class="xmcs" href="/projects/calc">
      <div class="image-bak"></div>
      项目费用测算
    </a>

    <div class="phone">
      <div style="color: #666666;">自己填写嫌麻烦？</div>
      <div style="color: #999999;font-size:12px;">联系客服发项目</div>
      <div class="contact">
        <img src="/web/static/picture/mail-box-4045b906b517f12ff3f5c64e993468d71d3108cbafe88fd58ce70fc2193ff24f.png" alt="Mail box 4045b906b517f12ff3f5c64e993468d71d3108cbafe88fd58ce70fc2193ff24f" width="24" height="24" />
        <div>
          <a href="mailto:skgc400@qq.com">邮件发送项目资料</a><br>
          <span>
            <a href="mailto:skgc400@qq.com">至skgc400@qq.com</a><br/>
            客服评估后与您联系
          </span>
        </div>
      </div>
      <div class="contact">
        <img src="/web/static/picture/fxm_pc_telephone-ec75546f480d8847bab09b8fce4612ec281cdfb9bb63d402da4fec39bfdb8ab3.png" alt="Fxm pc telephone ec75546f480d8847bab09b8fce4612ec281cdfb9bb63d402da4fec39bfdb8ab3" width="20" height="19" />
        <div>
          4009938200 <br>
          <span>(8:30~17:30)</span>
        </div>
      </div>
      <div class="contact">
        <img src="/web/static/picture/fxm_pc_iphone-26472c2c2817cf0b00413e408ffcde564a60b0ebbd7758ced8160e362b09d240.png" alt="Fxm pc iphone 26472c2c2817cf0b00413e408ffcde564a60b0ebbd7758ced8160e362b09d240" width="14" height="20" />
        <div>
          15321980075 <br>
          <span>(8:00~20:00)</span>
        </div>
      </div>
      <div class="contact">
        <img src="/web/static/picture/fxm_pc_qq-f9653344c5db583c292503eeb5091424495915ce85d92bead12bcc0d54259049.png" alt="Fxm pc qq f9653344c5db583c292503eeb5091424495915ce85d92bead12bcc0d54259049" width="20" height="20" />
        <div>
          <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=2726153751&amp;site=qq&amp;menu=yes">3214423261</a>
        </div>
      </div>
    </div>

  </div>
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
@endsection
