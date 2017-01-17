
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="icon" href="">
    <title>APP端登录日志管理</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="http://localhost/onechicken/public/public/Css/admin/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="http://localhost/onechicken/public/public/Css/jquery-ui.min.css" />
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="http://localhost/onechicken/public/public/Css/admin/admin.css" />
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="http://localhost/onechicken/public/public/Js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="http://localhost/onechicken/public/public/Js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="http://localhost/onechicken/public/public/Js/jquery.min.js"></script>
    <script type="text/javascript" src="http://localhost/onechicken/public/public/Js/jquery.validate.js"></script>
    <script type="text/javascript" src="http://localhost/onechicken/public/public/Js/jquery-impromptu.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://localhost/onechicken/public/public/Js/html5shiv.js"></script>
    <script src="http://localhost/onechicken/public/public/Js/respond.min.js"></script>
    <![endif]-->
    <style>
        #Tags .navArea .userInfo {
            z-index: 6;
        }

        #city-block {
            position: relative;
            display: inline;
        }

        #city-show {
            background: #D4D4D4;
            padding: 0 5px;
        }

        #city-data {
            width: 500px;
            background: #fff;
            padding: 10px;
            position: absolute;
            left: 0;
            top: 15px;
            display: block;
            display: none;
        }

    </style>
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation" style="position:relative;">
    <div class="container" style="margin-left:0; width:100%;">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="/dashboard/index/welcome.html">DashBoard管理平台</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="">
                    <a href="#" class="dropdown-toggle" >后台首页</a>
                </li>
                <li class="">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">后台管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/dashboard/admin/index.html">用户信息</a></li>
                        <li><a href="/dashboard/admin/addadmin.html">提现管理</a></li>
                    </ul>
                </li>
<!--                <li class="">-->
<!--                    <a href="" class="dropdown-toggle" data-toggle="dropdown">系统日志<span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="/dashboard/login_log/chiefLog.html">工长日志管理</a></li>-->
<!--                        <li><a href="/dashboard/login_log/ownerLog.html">用户日志管理</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="">-->
<!--                    <a href="" class="dropdown-toggle" data-toggle="dropdown">工长端推送<span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="/dashboard/b_push/index.html">推送管理</a></li>-->
<!--                        <li><a href="/dashboard/b_push/add.html">添加推送</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="">-->
<!--                    <a href="/dashboard/lottery/index.html" class="dropdown-toggle" >抽奖管理</a>-->
<!--                </li>-->
<!--                <li class="">-->
<!--                    <a href="#" class="dropdown-toggle" >聊天记录</a>-->
<!--                </li>-->
<!--                <li class="">-->
<!--                    <a href="" class="dropdown-toggle" data-toggle="dropdown">后台控制<span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="/dashboard/contro/add.html">新增焦点图</a></li>-->
<!--                        <li><a href="/dashboard/contro/index.html">焦点图首页</a></li>-->
<!--                        <li><a href="/dashboard/icon/index.html">标签控制</a></li>-->
<!--                        <li><a href="/dashboard/icon/add.html">新增标签</a></li>-->
<!--                        <li><a href="/dashboard/activity/add.html">新建签到活动</a></li>-->
<!--                        <li><a href="/dashboard/activity/index.html">签到活动管理</a></li>-->
<!--                        <li><a href="/dashboard/consult/index.html">工地参谋</a></li>-->
<!--                        <li><a href="/dashboard/suggest_complain/index.html">投诉建议</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--                <li class="">-->
<!--                    <a href="" class="dropdown-toggle" data-toggle="dropdown">业主端推送<span class="caret"></span></a>-->
<!--                    <ul class="dropdown-menu" role="menu">-->
<!--                        <li><a href="/dashboard/c_push/index.html">推送管理</a></li>-->
<!--                        <li><a href="/dashboard/c_push/add.html">添加推送</a></li>-->
<!--                    </ul>-->
<!--                </li>-->
            </ul>
            <ul class="nav navbar-nav" style="float:right;">
                <li class="">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">凹凸曼<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu" style="right:0; left:auto;">
                        <li><a>凹凸曼</a></li>
                        <!--<li><a href="#">上次登录时间：</a></li>--->
                        <li class="divider"></li>
                        <!--<li><a href="/dashboard/system/updateAdminPwd.html">修改我的密码</a></li>-->
                        <li><a href="/dashboard/index/logout.html">退出登录</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.navbar-collapse -->
</nav>



<div class="container-fluid">
<!--    <ol class="breadcrumb">-->
<!--        <li >城市：</li>-->
<!--        <li>北京</li>-->
<!--        <li>-->
<!--                <span id="city-block"><a id="city-show" href="javascript:;">请选择城市</a>-->
<!--                    <p id="city-data">-->
<!--                        | <a href="/dashboard/index/getUserInfo/city/ha.html">哈尔滨</a>| <a href="/dashboard/index/getUserInfo/city/cc.html">长春</a>| <a href="/dashboard/index/getUserInfo/city/jl.html">吉林</a>| <a href="/dashboard/index/getUserInfo/city/sy.html">沈阳</a>| <a href="/dashboard/index/getUserInfo/city/dl.html">大连</a>| <a href="/dashboard/index/getUserInfo/city/bj.html">北京</a>| <a href="/dashboard/index/getUserInfo/city/tj.html">天津</a>| <a href="/dashboard/index/getUserInfo/city/sj.html">石家庄</a>| <a href="/dashboard/index/getUserInfo/city/bd.html">保定</a>| <a href="/dashboard/index/getUserInfo/city/qi.html">秦皇岛</a>| <a href="/dashboard/index/getUserInfo/city/ty.html">太原</a>| <a href="/dashboard/index/getUserInfo/city/jc.html">晋城</a>| <a href="/dashboard/index/getUserInfo/city/hu.html">呼和浩特</a>| <a href="/dashboard/index/getUserInfo/city/sh.html">上海</a>| <a href="/dashboard/index/getUserInfo/city/nj.html">南京</a>| <a href="/dashboard/index/getUserInfo/city/cz.html">常州</a>| <a href="/dashboard/index/getUserInfo/city/su.html">苏州</a>| <a href="/dashboard/index/getUserInfo/city/wx.html">无锡</a>| <a href="/dashboard/index/getUserInfo/city/yd.html">扬州</a>| <a href="/dashboard/index/getUserInfo/city/xz.html">徐州</a>| <a href="/dashboard/index/getUserInfo/city/nt.html">南通</a>| <a href="/dashboard/index/getUserInfo/city/hz.html">杭州</a>| <a href="/dashboard/index/getUserInfo/city/nb.html">宁波</a>| <a href="/dashboard/index/getUserInfo/city/so.html">绍兴</a>| <a href="/dashboard/index/getUserInfo/city/hf.html">合肥</a>| <a href="/dashboard/index/getUserInfo/city/xm.html">厦门</a>| <a href="/dashboard/index/getUserInfo/city/qz.html">泉州</a>| <a href="/dashboard/index/getUserInfo/city/nc.html">南昌</a>| <a href="/dashboard/index/getUserInfo/city/sd.html">济南</a>| <a href="/dashboard/index/getUserInfo/city/qd.html">青岛</a>| <a href="/dashboard/index/getUserInfo/city/zb.html">淄博</a>| <a href="/dashboard/index/getUserInfo/city/yt.html">烟台</a>| <a href="/dashboard/index/getUserInfo/city/hn.html">郑州</a>| <a href="/dashboard/index/getUserInfo/city/ly.html">洛阳</a>| <a href="/dashboard/index/getUserInfo/city/wh.html">武汉</a>| <a href="/dashboard/index/getUserInfo/city/cs.html">长沙</a>| <a href="/dashboard/index/getUserInfo/city/gz.html">广州</a>| <a href="/dashboard/index/getUserInfo/city/sz.html">深圳</a>| <a href="/dashboard/index/getUserInfo/city/dg.html">东莞</a>| <a href="/dashboard/index/getUserInfo/city/zs.html">中山</a>| <a href="/dashboard/index/getUserInfo/city/fs.html">佛山</a>| <a href="/dashboard/index/getUserInfo/city/zh.html">珠海</a>| <a href="/dashboard/index/getUserInfo/city/nn.html">南宁</a>| <a href="/dashboard/index/getUserInfo/city/la.html">柳州</a>| <a href="/dashboard/index/getUserInfo/city/hk.html">海口</a>| <a href="/dashboard/index/getUserInfo/city/cq.html">重庆</a>| <a href="/dashboard/index/getUserInfo/city/cd.html">成都</a>| <a href="/dashboard/index/getUserInfo/city/gy.html">贵阳</a>| <a href="/dashboard/index/getUserInfo/city/yn.html">昆明</a>| <a href="/dashboard/index/getUserInfo/city/sx.html">西安</a>| <a href="/dashboard/index/getUserInfo/city/xy.html">咸阳</a>| <a href="/dashboard/index/getUserInfo/city/xj.html">乌鲁木齐</a>| <a href="/dashboard/index/getUserInfo/city/dyd.html">钓鱼岛</a>| <a href="/dashboard/index/getUserInfo/city/jy.html">江阴</a>| <a href="/dashboard/index/getUserInfo/city/tb.html">泰州</a>| <a href="/dashboard/index/getUserInfo/city/dy.html">东营</a>| <a href="/dashboard/index/getUserInfo/city/my.html">绵阳</a>| <a href="/dashboard/index/getUserInfo/city/ny.html">南阳</a>| <a href="/dashboard/index/getUserInfo/city/jn.html">济宁</a>| <a href="/dashboard/index/getUserInfo/city/hp.html">衡水</a>| <a href="/dashboard/index/getUserInfo/city/fy.html">阜阳</a>| <a href="/dashboard/index/getUserInfo/city/ks.html">昆山</a>| <a href="/dashboard/index/getUserInfo/city/ji.html">焦作</a>| <a href="/dashboard/index/getUserInfo/city/hj.html">淮安</a>| <a href="/dashboard/index/getUserInfo/city/zk.html">周口</a>| <a href="/dashboard/index/getUserInfo/city/co.html">沧州</a>| <a href="/dashboard/index/getUserInfo/city/hv.html">惠州</a>| <a href="/dashboard/index/getUserInfo/city/jh.html">金华</a>| <a href="/dashboard/index/getUserInfo/city/we.html">威海</a>| <a href="/dashboard/index/getUserInfo/city/xa.html">邢台</a>| <a href="/dashboard/index/getUserInfo/city/si.html">十堰</a>| <a href="/dashboard/index/getUserInfo/city/zy.html">遵义</a>| <a href="/dashboard/index/getUserInfo/city/yv.html">岳阳</a>| <a href="/dashboard/index/getUserInfo/city/kl.html">凯里</a>| <a href="/dashboard/index/getUserInfo/city/ln.html">临汾</a>| <a href="/dashboard/index/getUserInfo/city/ho.html">湖州</a>| <a href="/dashboard/index/getUserInfo/city/ce.html">承德</a>| <a href="/dashboard/index/getUserInfo/city/zo.html">漳州</a>| <a href="/dashboard/index/getUserInfo/city/na.html">南充</a>| <a href="/dashboard/index/getUserInfo/city/zg.html">自贡</a>| <a href="/dashboard/index/getUserInfo/city/rx.html">任县</a>| <a href="/dashboard/index/getUserInfo/city/gu.html">固始</a>| <a href="/dashboard/index/getUserInfo/city/yl.html">玉林</a>| <a href="/dashboard/index/getUserInfo/city/qg.html">庆阳</a>| <a href="/dashboard/index/getUserInfo/city/yb.html">宜宾</a>                    </p>-->
<!--                </span>-->
<!--        </li>        </ol>-->
<!--    <ol class="breadcrumb">-->
<!--        <li>当前路径：</li>-->
<!--        <li> <a href="/dashboard/login_log/ownerLog.html" title="用户登录日志管理">用户登录日志管理</a></li>-->
<!--    </ol>-->
</div>

<script>
    $(document).ready(function () {
        $('#city-show').mouseenter(function () {
            $('#city-data').show();
        })
        $('#city-data').mouseleave(function () {
            $('#city-data').hide();
        })
    })
</script>


<div class="container-fluid">
<!--    <form method="get" action="" class="search">&nbsp;-->
<!--        时间：  <input type="text" name="start_time" value="" placeholder="登录时间开始" id="datepicker7" class="form-control w200"/>&nbsp;&nbsp;到&nbsp;&nbsp;-->
<!--        <input type="text" name="end_time"   id="datepicker8" value="" placeholder="登录时间结束" class="form-control w200"/>&nbsp;&nbsp;-->
<!---->
<!--        用户id查找: <input type="text" name="uid" placeholder ="用户id"  value="1976161" class="form-control w100"/>&nbsp;-->
<!--        城市 ：<select name="city_code" class="inputs">-->
<!--            <option value=""> -全部- </option>-->
<!--            <option value="ha"  >哈尔滨</option><option value="dq"  >大庆</option><option value="cc"  >长春</option><option value="jl"  >吉林</option><option value="sy"  >沈阳</option><option value="dl"  >大连</option><option value="bj"  >北京</option><option value="tj"  >天津</option><option value="sj"  >石家庄</option><option value="ts"  >唐山</option><option value="lf"  >廊坊</option><option value="hd"  >邯郸</option><option value="bd"  >保定</option><option value="qi"  >秦皇岛</option><option value="ty"  >太原</option><option value="jc"  >晋城</option><option value="dt"  >大同</option><option value="hu"  >呼和浩特</option><option value="bt"  >包头</option><option value="sh"  >上海</option><option value="nj"  >南京</option><option value="cz"  >常州</option><option value="su"  >苏州</option><option value="wx"  >无锡</option><option value="yd"  >扬州</option><option value="xz"  >徐州</option><option value="nt"  >南通</option><option value="hz"  >杭州</option><option value="nb"  >宁波</option><option value="wz"  >温州</option><option value="so"  >绍兴</option><option value="tz"  >台州</option><option value="hf"  >合肥</option><option value="fz"  >福州</option><option value="xm"  >厦门</option><option value="qz"  >泉州</option><option value="nc"  >南昌</option><option value="sd"  >济南</option><option value="qd"  >青岛</option><option value="zb"  >淄博</option><option value="wf"  >潍坊</option><option value="yt"  >烟台</option><option value="ta"  >泰安</option><option value="lb"  >临沂</option><option value="hn"  >郑州</option><option value="ly"  >洛阳</option><option value="kf"  >开封</option><option value="wh"  >武汉</option><option value="cs"  >长沙</option><option value="gz"  >广州</option><option value="sz"  >深圳</option><option value="dg"  >东莞</option><option value="zs"  >中山</option><option value="fs"  >佛山</option><option value="zh"  >珠海</option><option value="st"  >汕头</option><option value="nn"  >南宁</option><option value="la"  >柳州</option><option value="hk"  >海口</option><option value="cq"  >重庆</option><option value="cd"  >成都</option><option value="gy"  >贵阳</option><option value="yn"  >昆明</option><option value="ls"  >拉萨</option><option value="sx"  >西安</option><option value="xy"  >咸阳</option><option value="lz"  >兰州</option><option value="xn"  >西宁</option><option value="yi"  >银川</option><option value="xj"  >乌鲁木齐</option><option value="cj"  >昌吉</option><option value="ak"  >阿克苏</option><option value="dyd"  >钓鱼岛</option><option value="jy"  >江阴</option><option value="ya"  >盐城</option><option value="tb"  >泰州</option><option value="dy"  >东营</option><option value="my"  >绵阳</option><option value="ny"  >南阳</option><option value="jn"  >济宁</option><option value="hp"  >衡水</option><option value="fy"  >阜阳</option><option value="ks"  >昆山</option><option value="ji"  >焦作</option><option value="cb"  >常熟</option><option value="gl"  >桂林</option><option value="hj"  >淮安</option><option value="tn"  >通辽</option><option value="sa"  >三亚</option><option value="zk"  >周口</option><option value="aj"  >宝鸡</option><option value="co"  >沧州</option><option value="hv"  >惠州</option><option value="jh"  >金华</option><option value="we"  >威海</option><option value="xa"  >邢台</option><option value="si"  >十堰</option><option value="zy"  >遵义</option><option value="jg"  >张家港</option><option value="yv"  >岳阳</option><option value="kl"  >凯里</option><option value="ln"  >临汾</option><option value="ho"  >湖州</option><option value="ce"  >承德</option><option value="zo"  >漳州</option><option value="na"  >南充</option><option value="zg"  >自贡</option><option value="rx"  >任县</option><option value="rz"  >日照</option><option value="gu"  >固始</option><option value="yl"  >玉林</option><option value="jr"  >晋江</option><option value="he"  >淮北</option><option value="jx"  >嘉兴</option><option value="qg"  >庆阳</option><option value="yb"  >宜宾</option><option value="city"  >无城市</option>        </select>&nbsp;-->
<!---->
<!--        用户姓名查找: <input type="text" name="user_name" placeholder ="用户姓名"  value="" class="form-control w100"/>&nbsp;-->
<!---->
<!--        操作行为 ：<select name="type" class="inputs">-->
<!--            <option value=""> -全部- </option>-->
<!--            <option value="1"  >登录</option><option value="2"  >注册</option>        </select>&nbsp;&nbsp;-->
<!--        渠道： <select name="channel" class="inputs">-->
<!--            <option value=""> -全部- </option>-->
<!--            <option value="360" >360</option><option value="91anzhuo" >91anzhuo</option><option value="anzhi" >anzhi</option><option value="appstore" >appstore</option><option value="baidushoujizhushou" >baidushoujizhushou</option><option value="DEV" >DEV</option><option value="hiapk" >hiapk</option><option value="huawei" >huawei</option><option value="huodong360" >huodong360</option><option value="jinli" >jinli</option><option value="lianxiang" >lianxiang</option><option value="meizu" >meizu</option><option value="official" >official</option><option value="oppo" >oppo</option><option value="vivo" >vivo</option><option value="wandoujia" >wandoujia</option><option value="xiaomi" >xiaomi</option><option value="yingyongbao" >yingyongbao</option><option value="yingyonghui" >yingyonghui</option>        </select>-->
<!--        <button type="submit" class="btn btn-primary mb10" >搜索</button>-->
<!--        <button class="btn btn-primary mb10" name="export" value="1" >导出</button>-->
<!--    </form>-->
    <div class="container-fluid">
        <table class="table table-hover">
            <tr class="info">
                <th>用户昵称</th>
                <th>充值金额</th>
                <th>性别</th>
                <th>省份</th>
                <th>城市</th>
                <th>母鸡数量</th>
                <th>开地数量</th>
                <th>金蛋总数</th>
                <th>邀请成功人数</th>
                <th>提现金额</th>
            </tr>
            <tr>
                <td>2017-01-16 17:31:41</td>
                <td>登录</td>
                <td>1976161</td>
                <td>无锡</td>
                <td>176****0809</td>
                <td>用户</td>
                <td>Android</td>
                <td>DEV</td>
            </tr>                </table>
    </div>
    <div class="container-fluid text-center">
        <nav>
            <ul class="pagination">
                1 条记录 1/1 页                  </ul>
        </nav>
    </div>
    <div class="container-fluid text-center">
    </div>

    <script src="http://localhost/onechicken/public/public/Js/html5shiv.js"></script>
    <script type="text/javascript" src="http://localhost/onechicken/public/public/Js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://localhost/onechicken/public/public/Js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="http://localhost/onechicken/public/public/Js/admin.js"></script>
    <script type="text/javascript" src="http://localhost/onechicken/public/public/Js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="http://localhost/onechicken/public/public/Js/jquery.ui.datepicker-zh-CN.js.js" charset="gb2312" ></script>
    <script type="text/javascript" src="http://localhost/onechicken/public/public/Js/jquery-ui-timepicker-zh-CN.js"></script>
</body>
</html>