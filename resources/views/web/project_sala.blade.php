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

<div class="bg_gray">
    <a href="" target="_blank" class="show-price-rules">
        <span>查看价格规则</span>
        <i></i>
    </a>

    <div class="find-member-main">

        <div class="page-zj" style="margin-bottom: 0px;">
            <div class="clear">
                <form id="form_filter" action="" accept-charset="UTF-8" method="get"><input name="utf8" type="hidden"
                                                                                            value="&#x2713;"/>
                    <input type="hidden" name="projects_category" id="projects_category"/>
                    <dl class="zj-filter">
                        <dt class="ico zy">专业:</dt>
                        <dd>
                            <input type="hidden" name="purpose" id="purpose"/>
                            <div onclick="set_purpose_value('#purpose','')"
                                 class="m-findlist-now"
                            >不限
                            </div>
                            <div onclick="set_purpose_value('#purpose',0)"
                            >土建
                            </div>
                            <div onclick="set_purpose_value('#purpose',66)"
                            >钢构
                            </div>
                            <div onclick="set_purpose_value('#purpose',2)"
                            >钢筋
                            </div>
                            <div onclick="set_purpose_value('#purpose',3)"
                            >给水排水
                            </div>
                            <div onclick="set_purpose_value('#purpose',4)"
                            >暖通燃气
                            </div>
                            <div onclick="set_purpose_value('#purpose',5)"
                            >电气消防
                            </div>
                            <div onclick="set_purpose_value('#purpose',6)"
                            >室内装修
                            </div>
                            <div onclick="set_purpose_value('#purpose',7)"
                            >外墙装修
                            </div>
                            <div onclick="set_purpose_value('#purpose',9)"
                            >其他
                            </div>
                        </dd>
                    </dl>

                    <dl class="zj-filter filter-dq">
                        <dt class="ico dq">地区:</dt>
                        <dd>
                            <div
                                    class="m-findlist-now"
                                    onclick="set_form_value('#region_id','')">全国
                            </div>
                            <input type="hidden" name="region_id" id="region_id"/>
                            <div onclick="set_form_value('#region_id','11')"
                            >北京
                            </div>

                            <div onclick="set_form_value('#region_id','12')"
                            >天津
                            </div>

                            <div onclick="set_form_value('#region_id','13')"
                            >河北
                            </div>

                            <div onclick="set_form_value('#region_id','14')"
                            >山西
                            </div>

                            <div onclick="set_form_value('#region_id','15')"
                            >内蒙古
                            </div>

                            <div onclick="set_form_value('#region_id','21')"
                            >辽宁
                            </div>

                            <div onclick="set_form_value('#region_id','22')"
                            >吉林
                            </div>

                            <div onclick="set_form_value('#region_id','23')"
                            >黑龙江
                            </div>

                            <div onclick="set_form_value('#region_id','31')"
                            >上海
                            </div>

                            <div onclick="set_form_value('#region_id','32')"
                            >江苏
                            </div>

                            <div onclick="set_form_value('#region_id','33')"
                            >浙江
                            </div>

                            <div onclick="set_form_value('#region_id','34')"
                            >安徽
                            </div>

                            <div onclick="set_form_value('#region_id','35')"
                            >福建
                            </div>

                            <div onclick="set_form_value('#region_id','36')"
                            >江西
                            </div>

                            <div onclick="set_form_value('#region_id','37')"
                            >山东
                            </div>

                            <div onclick="set_form_value('#region_id','41')"
                            >河南
                            </div>

                            <div onclick="set_form_value('#region_id','42')"
                            >湖北
                            </div>

                            <div onclick="set_form_value('#region_id','43')"
                            >湖南
                            </div>

                            <div onclick="set_form_value('#region_id','44')"
                            >广东
                            </div>

                            <div onclick="set_form_value('#region_id','45')"
                            >广西
                            </div>

                            <div onclick="set_form_value('#region_id','46')"
                            >海南
                            </div>

                            <div onclick="set_form_value('#region_id','47')"
                            >深圳
                            </div>

                            <div onclick="set_form_value('#region_id','51')"
                            >四川
                            </div>

                            <div onclick="set_form_value('#region_id','52')"
                            >贵州
                            </div>

                            <div onclick="set_form_value('#region_id','53')"
                            >云南
                            </div>

                            <div onclick="set_form_value('#region_id','54')"
                            >西藏
                            </div>

                            <div onclick="set_form_value('#region_id','55')"
                            >重庆
                            </div>

                            <div onclick="set_form_value('#region_id','61')"
                            >陕西
                            </div>

                            <div onclick="set_form_value('#region_id','62')"
                            >甘肃
                            </div>

                            <div onclick="set_form_value('#region_id','63')"
                            >青海
                            </div>

                            <div onclick="set_form_value('#region_id','64')"
                            >宁夏
                            </div>

                            <div onclick="set_form_value('#region_id','65')"
                            >新疆
                            </div>

                            <div onclick="set_form_value('#region_id','81')"
                            >其他
                            </div>

                        </dd>

                    </dl>


                    <dl class="zj-filter">
                        <dt class="zj-pr margin-tb">
                            <a class="show-project-category" href="javascript:void(0);"
                               onclick="show_little_alert('show_direction_div');"><img style="margin-right: 0.1em;"
                                                                                       src="/web/static/picture/icon_project_problem-f8434c7fb8143d880b7c5d6f72218597772031e6ccd92f5c082a7510dce82361.png"
                                                                                       alt="Icon project problem f8434c7fb8143d880b7c5d6f72218597772031e6ccd92f5c082a7510dce82361"/><span>项目类型：</span></a>
                            <script type="text/javascript">
                                $(function () {
                                    init_little_alert({
                                        container_id: 'show_direction_div',
                                        title: '提示消息',
                                        content_html: $("#show_direction_content").html(),
                                        content_html_id: 'show_direction_content',
                                        confirm_text: '了解会员权限',
                                        confirm_width: '200px',
                                        confirm_click: function () {
                                            location.href = '/vip_members/new';
                                        }
                                    });
                                });
                            </script>
                        </dt>
                        <dd class="margin-tb search-category">
              <span style="margin-left:0px;">
                <!--<= radio_button_tag(:projects_category_radio, 'all', params[:projects_category].eql?('all')) %>-->
                  <!--<= label_tag(:projects_category_radio_all, '全部项目', class: 'category-pd') %>-->
                <span class="category-pd m-findlist-now" value="all">全部项目</span>
              </span>

                            <span style="margin-left:10px;">
                <!--<= radio_button_tag(:projects_category_radio, 'pd', params[:projects_category].eql?('pd')) %>-->
                                <!--<= label_tag(:projects_category_radio_pd, '派单项目', class: 'category-pd') %>-->
                <span class="category-pd " value="pd">派单项目</span>
              </span>
                            <span style="margin-left:10px;">
                <span class="category-pd " value="bm">公开报名</span>
              </span>
                            <span style="margin-left:10px;">
                  <span class="category-pd " value="wt">委托项目</span>
              </span>
                            <span class="search-span">
                  <input style="border-right: 0px;min-height: 36px;" type="text" name="topic" value=""
                         placeholder="请输入关键字"/>
                                <!--<div class="search-bg"></div>-->
                  <div onclick="$('#form_filter').submit();" class="search-img"></div>
              </span>


                            <span class="join-member" id="join-member" onclick="location.href='/member_applies'">
                <span>
                  <img id='icon_project_click'
                       src="/web/static/picture/icon_project_click-575a77278e86efd35f372768c38f9c689cdd0c8fb5ad6700b297201ccaa14c65.png"/>
                  <span class="font14">点击注册，接单吧！</span>
                </span>
              </span>
                        </dd>


                        <div id="show_direction_content" style="display: none;">
                            <div style="text-align: center;">
                                <h2 style="line-height: 60px;">项目类型说明</h2>
                                <img src="/web/static/picture/jp_dirction-75ad21b2c11c42a87801aa2793cc1d8383e9c237ccba6aaf4311d80e13c08095.png"
                                     alt="Jp dirction 75ad21b2c11c42a87801aa2793cc1d8383e9c237ccba6aaf4311d80e13c08095"/>
                                <div style="padding: 20px 0 0 30px; font-size: 13px; text-align: left; color: #333333">
                                    派单航辉：由平台筛选考核，目前名额已满。
                                    <span style="color: #999999">（不定期招收派单航辉）</span>
                                </div>
                            </div>
                        </div>

                        <!--</div>-->


                    </dl>
                </form>
            </div>
        </div>
    </div>
    <div class="find-project">
        <div class="wrap">
            <div class="find-project_l">
                <div class="project-list">

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="贵州贵阳|公路||编清单+组价|中期结算" href="/projects/18631">贵州贵阳|公路||编清单+组价|中期结算</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">

              <em class="red-font-color">14人报名中...</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
              ¥300
    </span>
                            <span class="project-tags">
          <i class="project-tag-price"></i><span>可议价</span>
          <i class="project-tag-views"></i><span>351</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.20 12:00</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="四川雅安|多层住宅（7层及以下）|安装|算量+编清单+组价|广联达算量，宏业组价" href="/projects/18608">四川雅安|多层住宅（7层及以下）|安装|算量+编清单+组价|广联达算量，宏业组价</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">

              <em class="red-font-color">7人报名中...</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
              ¥800
    </span>
                            <span class="project-tags">
          <i class="project-tag-cad"></i><span>有图纸</span>
          <i class="project-tag-views"></i><span>469</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.19 22:33</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
            <em class="normal-pd-block"
                style="border: 0; color: #63430e;background-image: linear-gradient(#ffeaaa, #b0894e);" title="仅限平台会员报名">派单项目</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="江苏淮安|中高层住宅（18层及以下）|钢筋|算量|广联达" href="/projects/18602">江苏淮安|中高层住宅（18层及以下）|钢筋|算量|广联达</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">

              <em class="red-font-color">45人报名中...</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
              ¥9500
    </span>
                            <span class="project-tags">
          <i class="project-tag-views"></i><span>1794</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.30 18:35</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="上海宝山区|图纸设计（园林绿化）" href="/projects/18599">上海宝山区|图纸设计（园林绿化）</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">

              <em class="red-font-color">1人报名中...</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
              ¥1000
    </span>
                            <span class="project-tags">
          <i class="project-tag-price"></i><span>可议价</span>
          <i class="project-tag-views"></i><span>363</span>
    </span>
                            <span style="font-size: 14px; color: #5390df;">奖励算珠：+10个
            </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.19 20:00</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="广东韶关|公路|其他|编清单+组价（广州市公路造价工程师）"
           href="/projects/18597">广东韶关|公路|其他|编清单+组价（广州市公路造价工程师）</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">

              <em class="red-font-color">6人报名中...</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
              ¥600
    </span>
                            <span class="project-tags">
          <i class="project-tag-views"></i><span>408</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.19 16:16</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="浙江杭州|办公楼|土建|算量+组价|品茗算量，擎洲广达组价"
           href="/projects/18582">浙江杭州|办公楼|土建|算量+组价|品茗算量，擎洲广达组价</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">

              <em class="red-font-color">4人报名中...</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
              ¥3000
    </span>
                            <span class="project-tags">
          <i class="project-tag-price"></i><span>可议价</span>
          <i class="project-tag-views"></i><span>712</span>
    </span>
                            <span style="font-size: 14px; color: #5390df;">奖励算珠：+10个
            </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.21 17:50</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="宁夏银川市|市政管网||组价|广联达（本地航辉优先考虑）" href="/projects/18576">宁夏银川市|市政管网||组价|广联达（本地航辉优先考虑）</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">

              <em class="red-font-color">13人报名中...</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
              ¥500
    </span>
                            <span class="project-tags">
          <i class="project-tag-views"></i><span>642</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.19 23:00</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
          <em class="normal-pd-block"
              style="border: 0; color: #63430e;background-image: linear-gradient(#ffeaaa, #b0894e);" title="仅限平台会员报名">派单项目</em>
        <a target="_blank" title="[标段2幕墙工程工程量复核]机场外幕墙算量+编清单+组价|广联达" href="/projects/18543">[标段2幕墙工程工程量复核]机场外幕墙算量+编清单+组价|广联达</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">
              <em class="red-font-color">4人报名中...</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
              ¥400
    </span>
                            <span class="project-tags">
          <i class="project-tag-views"></i><span>770</span>
    </span>
                            <span class="project-date" style="font-size: 12px;">2019.03.13 11:19</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
            <em class="normal-pd-block"
                style="border: 0; color: #63430e;background-image: linear-gradient(#ffeaaa, #b0894e);" title="仅限平台会员报名">派单项目</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="河南鹤壁|高层住宅|其他|按图算量组价|广联达（价格可议）"
           href="/projects/18542">河南鹤壁|高层住宅|其他|按图算量组价|广联达（价格可议）</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">

              <em class="red-font-color">2人报名中...</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
              ¥2000
    </span>
                            <span class="project-tags">
          <i class="project-tag-price"></i><span>可议价</span>
          <i class="project-tag-views"></i><span>567</span>
    </span>
                            <span style="font-size: 14px; color: #5390df;">奖励算珠：+10个
            </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.21 22:00</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="上海 浦东新区|技术标|工程施工 | 建筑工程 | 幕墙工程施工|普通版" href="/projects/18625">上海 浦东新区|技术标|工程施工 | 建筑工程 | 幕墙工程施工|普通版</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">
            <em class="green-font-color">航辉工作中</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
          ¥1000
    </span>
                            <span class="project-tags">
          <i class="project-tag-views"></i><span>278</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.23 16:14</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
            <em class="normal-pd-block"
                style="border: 0; color: #63430e;background-image: linear-gradient(#ffeaaa, #b0894e);" title="仅限平台会员报名">派单项目</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="广东东莞|车库|土建|建模|广联达（GTJ2018）" href="/projects/18623">广东东莞|车库|土建|建模|广联达（GTJ2018）</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">
            <em class="green-font-color">航辉工作中</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
          ¥5000
    </span>
                            <span class="project-tags">
          <i class="project-tag-views"></i><span>860</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.26 17:00</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="河北 保定|技术标|采购类其他 | 采购办公设备|基础版" href="/projects/18615">河北 保定|技术标|采购类其他 | 采购办公设备|基础版</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">
            <em class="green-font-color">航辉工作中</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
          ¥600
    </span>
                            <span class="project-tags">
          <i class="project-tag-price"></i><span>可议价</span>
          <i class="project-tag-views"></i><span>306</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.20 12:12</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="贵州 贵阳|技术标|工程施工 | 建筑工程 | 钢结构施工|简化版" href="/projects/18607">贵州 贵阳|技术标|工程施工 | 建筑工程 | 钢结构施工|简化版</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">
            <em class="">成果交付</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
          ¥400
    </span>
                            <span class="project-tags">
          <i class="project-tag-views"></i><span>333</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.18 20:00</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="河北石家庄|其他|安装|组价" href="/projects/18605">河北石家庄|其他|安装|组价</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">
            <em class="">成果交付</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
          ¥300
    </span>
                            <span class="project-tags">
          <i class="project-tag-price"></i><span>可议价</span>
          <i class="project-tag-views"></i><span>179</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.17 23:00</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
            <em class="normal-pd-block"
                style="border: 0; color: #63430e;background-image: linear-gradient(#ffeaaa, #b0894e);" title="仅限平台会员报名">派单项目</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="广西北海|高层住宅|土建|算量|广联达" href="/projects/18600">广西北海|高层住宅|土建|算量|广联达</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">
            <em class="green-font-color">航辉工作中</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
          ¥3500
    </span>
                            <span class="project-tags">
          <i class="project-tag-views"></i><span>571</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.24 17:17</span>
                        </dd>
                    </dl>

                    <dl>
                        <dt>
    <span class="project-name">
      <div class="project-name-topic">
           <em class="normal-pd-block">公开报名</em>
          <!--<= link_to(raw("<span style='color: #f66626'>#{pro.self_business_txt}</span>" + topic), pro, :target => '_blank', title: pro.self_business_txt.to_s + topic ) %>-->
        <a target="_blank" title="北京北京|多层住宅（7层及以下）|土建|调价|广联达" href="/projects/18596">北京北京|多层住宅（7层及以下）|土建|调价|广联达</a>
      </div>
    </span>
                            <span class="project-num">
          <div class="project-num-div">
            <em class="">成果交付</em>
          </div>
    </span>
                        </dt>
                        <dd>
    <span class="project-price">
          ¥500
    </span>
                            <span class="project-tags">
          <i class="project-tag-price"></i><span>可议价</span>
          <i class="project-tag-views"></i><span>556</span>
    </span>
                            <!--<span class="project-date" style="font-size: 12px;" ><= (pro.pub_at || pro.created_at).strftime('%Y.%m.%d %H:%M') %></span>-->
                            <span class="project-date" style="font-size: 12px;">交付时间：2019.03.18 09:00</span>
                        </dd>
                    </dl>
                    <div class="page-nav">
                        <div class="pagination"><span class="previous_page disabled"><<上一页</span> <em
                                    class="current">1</em> <a rel="next" href="/projects/pub?page=2">2</a> <a
                                    href="/projects/pub?page=3">3</a> <a href="/projects/pub?page=4">4</a> <a
                                    href="/projects/pub?page=5">5</a> <a href="/projects/pub?page=6">6</a> <a
                                    href="/projects/pub?page=7">7</a> <a href="/projects/pub?page=8">8</a> <a
                                    href="/projects/pub?page=9">9</a> <span class="gap">&hellip;</span> <a
                                    href="/projects/pub?page=581">581</a> <a href="/projects/pub?page=582">582</a> <a
                                    class="next_page" rel="next" href="/projects/pub?page=2">下一页>></a></div>

                    </div>
                </div>
            </div>
            <div class="find-project_r">
                <div class="mt10 font-center">
                    <a target="_blank" href="http://www.3kgc.com/articles/1550"><img src="" alt="" width="300"
                                                                                     height="100"/></a>

                </div>
                <div class="title">
                    <h2>航辉收入榜</h2>
                </div>
                <div class="income-list">
                    <table width="100%" cellspacing="0" cellpadding="0">
                        <tbody>
                        <tr>
                            <td class="font-center" width="50"><img
                                        src="/web/static/picture/icon_project_one-a128267048a691f9d6cfd3dffbc80de4ac3087aec07482a61146a6399c5d5c6e.png"
                                        style="border-radius: 0px;"/></td>

                            <td>
                                <a class="f-left" href="/work_centers/5"><img alt="李工(0006464)"
                                                                              src="/web/static/picture/3100149846cb5388afd5cc35f5bb5ba2014fcd21.png"
                                                                              width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/work_centers/5">李工(0006464)</a>
                                </em>
                                <span>重庆 重庆</span>
                                <span>近3月收入：<i>¥203600</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center" width="50"><img
                                        src="/web/static/picture/icon_project_two-9f3775125e63c56cc5fc766c9d4d59a8767d20afc3d66010723afaf237e8d81f.png"/>
                            </td>

                            <td>
                                <a class="f-left" href="/work_centers/6"><img alt="柯工(0015872)"
                                                                              src="/web/static/picture/4ff956fc4b2e08d291f2e8b43a19f5d12c8c1793.jpg"
                                                                              width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/work_centers/6">柯工(0015872)</a>
                                </em>
                                <span>湖北 武汉</span>
                                <span>近3月收入：<i>¥158778</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center" width="50"><img
                                        src="/web/static/picture/icon_project_three-080fedec3c7933f99835e04cc3b1fe0466b4fa328384ddd038186d99680d87a9.png"/>
                            </td>

                            <td>
                                <a class="f-left" href="/work_centers/4"><img alt="沈工(0000901)"
                                                                              src="/web/static/picture/5977c426fcdd300e337f31a668c8f2f448fe1967.png"
                                                                              width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/work_centers/4">沈工(0000901)</a>
                                </em>
                                <span>江苏 淮安</span>
                                <span>近3月收入：<i>¥94858</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no4" style="color: #999999;" width="50">4</td>

                            <td>
                                <a class="f-left" href="/m/79380"><img alt="邵工(0079380)"
                                                                       src="/web/static/picture/a2b82f74e2985b4e67b16ac57ff7e8fa7fdb2c69.jpg"
                                                                       width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/m/79380">邵工(0079380)</a>
                                </em>
                                <span>河北 石家庄</span>
                                <span>近3月收入：<i>¥89025</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no5" style="color: #999999;" width="50">5</td>

                            <td>
                                <a class="f-left" href="/m/71238"><img alt="刘工(0071238)"
                                                                       src="/web/static/picture/52c588e45c1f5369ece628c53bfd417ddeaf7e89.jpg"
                                                                       width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/m/71238">刘工(0071238)</a>
                                </em>
                                <span>辽宁 沈阳</span>
                                <span>近3月收入：<i>¥66620</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no6" style="color: #999999;" width="50">6</td>

                            <td>
                                <a class="f-left" href="/m/52370"><img alt="张工(0052370)"
                                                                       src="/web/static/picture/79465b0b327f986c2f329c152534b600edb8f985.png"
                                                                       width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/m/52370">张工(0052370)</a>
                                </em>
                                <span>河北 石家庄</span>
                                <span>近3月收入：<i>¥60714</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no7" style="color: #999999;" width="50">7</td>

                            <td>
                                <a class="f-left" href="/work_centers/26"><img alt="孟工(0060448)"
                                                                               src="/web/static/picture/84899f331ec3feeb1c77823706472dcaa9085ae0.jpg"
                                                                               width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/work_centers/26">孟工(0060448)</a>
                                </em>
                                <span>河北 唐山</span>
                                <span>近3月收入：<i>¥46641</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no8" style="color: #999999;" width="50">8</td>

                            <td>
                                <a class="f-left" href="/m/24785"><img alt="许工(0024785)"
                                                                       src="/web/static/picture/e6e0dac588797aae76adaefead2d9987815b178f.jpg"
                                                                       width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/m/24785">许工(0024785)</a>
                                </em>
                                <span>内蒙古 呼和浩特</span>
                                <span>近3月收入：<i>¥42528</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no9" style="color: #999999;" width="50">9</td>

                            <td>
                                <a class="f-left" href="/m/17866"><img alt="王工(0017866)"
                                                                       src="/web/static/picture/697fca265cc55c7e88f678b2f46149bdea94bcda.jpg"
                                                                       width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/m/17866">王工(0017866)</a>
                                </em>
                                <span>陕西 西安</span>
                                <span>近3月收入：<i>¥40273</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no10" style="color: #999999;" width="50">10</td>

                            <td>
                                <a class="f-left" href="/work_centers/28"><img alt="蒋工(0023103)"
                                                                               src="/web/static/picture/f5d943729b4a680e59b7f4c2723114c73c361223.png"
                                                                               width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/work_centers/28">蒋工(0023103)</a>
                                </em>
                                <span>江苏 南京</span>
                                <span>近3月收入：<i>¥39800</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no11" style="color: #999999;" width="50">11</td>

                            <td>
                                <a class="f-left" href="/work_centers/11"><img alt="皇工(0019104)"
                                                                               src="/web/static/picture/47c8e929dd71f640c6135dee3e1ad4d1197a0492.jpg"
                                                                               width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/work_centers/11">皇工(0019104)</a>
                                </em>
                                <span>陕西 西安</span>
                                <span>近3月收入：<i>¥35004</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no12" style="color: #999999;" width="50">12</td>

                            <td>
                                <a class="f-left" href="/m/87686"><img alt="董工(0087686)"
                                                                       src="/web/static/picture/0ddb7f3f8f9b47d334767cd8c44a4f9d97cd8546.jpg"
                                                                       width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/m/87686">董工(0087686)</a>
                                </em>
                                <span>河南 郑州</span>
                                <span>近3月收入：<i>¥33600</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no13" style="color: #999999;" width="50">13</td>

                            <td>
                                <a class="f-left" href="/m/22713"><img alt="刘工(0022713)"
                                                                       src="/web/static/picture/6aaec1b407d83f7f2541e0353a134c7e1b2267a8.png"
                                                                       width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/m/22713">刘工(0022713)</a>
                                </em>
                                <span>山东 潍坊</span>
                                <span>近3月收入：<i>¥33300</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no14" style="color: #999999;" width="50">14</td>

                            <td>
                                <a class="f-left" href="/m/39572"><img alt="张工(0039572)"
                                                                       src="/web/static/picture/594bf94fae37eed6ad9f3c43edd990db2a0926a9.png"
                                                                       width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/m/39572">张工(0039572)</a>
                                </em>
                                <span>陕西 西安</span>
                                <span>近3月收入：<i>¥32989</i></span>
                            </td>
                        </tr>
                        <tr>
                            <td class="font-center font24 no15" style="color: #999999;" width="50">15</td>

                            <td>
                                <a class="f-left" href="/work_centers/25"><img alt="张工(0017675)"
                                                                               src="/web/static/picture/78b00ab05b43ee96cfc1ec7fb8348777f9a524ce.png"
                                                                               width="82" height="82"/></a>
                            </td>
                            <td>
                                <em>
                                    <a href="/work_centers/25">张工(0017675)</a>
                                </em>
                                <span>河北 保定</span>
                                <span>近3月收入：<i>¥32774</i></span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="find-project">
        <div class="page-zj p0 mb20">
        </div>
    </div>
    <div class="clearfix"></div>
    <script type="text/javascript">
        $('#check_pd_projects').attr('checked', false);

        $(".category-pd").on('click', function () {
            set_form_value('#projects_category', this.getAttribute('value'))
        });

        function set_form_value(sel, val) {
            $(sel).val(val);
            $("#form_filter").submit();
        }

        function set_service_type_value(sel, val) {
            $(sel).val(val);
            $("#form_filter").submit();
        }

        function set_purpose_value(sel, val) {
            $(sel).val(val);
            $("#form_filter").submit();
        }

        function set_iden_type() {
            idens = [];
            if ($("#qy-service").attr("checked") == "checked")
                idens.push(1);
            if ($("#gr-service").attr("checked") == "checked")
                idens.push(0);
            $("#iden_type").val(idens.join(","));
            $("#form_filter").submit();
        }

        jQuery(document).ready(function ($) {

            $(".ui-help").hover(function () {
                $($(this).attr("for")).show();
            }, function () {
                $($(this).attr("for")).hide();
            });
        });

        $("#join-member").hover(function () {
            $("#icon_project_click").attr('src', "/assets/icon_project_click_hover-07b4642e2441c4065f8607b81f8bdc03f9376ab575d080afd020a82fe151b8f7.png");
        });

        $("#join-member").mouseleave(function () {
            $("#icon_project_click").attr('src', "/assets/icon_project_click-575a77278e86efd35f372768c38f9c689cdd0c8fb5ad6700b297201ccaa14c65.png");
        });

        $(".search-span > input").on('focus', function () {
            $(this).parent().find('.search-img').css({
                background: 'url(/web/static/images/nav_search_1-e042f443e023c14121293890883dac8694740810a703b345037c98c7f718d190.png) no-repeat 9px -23px',
                'background-color': '#f66626'
            });
        });
        $(".search-span > input").on('blur', function () {
            $(this).parent().find('.search-img').css({
                background: 'url(/web/static/images/nav_search_1-e042f443e023c14121293890883dac8694740810a703b345037c98c7f718d190.png) no-repeat 9px 5px',
            });
        });
    </script>
</div>
<div class="clearfix"></div>

@endsection