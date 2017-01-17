
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>辅料商城管理-</title>
    <base href=""/>

    <link rel="stylesheet" type="text/css" href="http://localhost/onechicken/public/Admin/base.css" />
    <link rel="stylesheet" type="text/css" href="http://localhost/onechicken/public/Admin/layout.css" />
    <link rel="stylesheet" type="text/css" href="http://localhost/onechicken/public/Js/asyncbox/skins/default.css" />

    <script src="http://localhost/onechicken/public/Js/jquery-1.7.2.min.js"></script>
    <script language="javascript" src="http://localhost/onechicken/public/Js/functions.js" ></script>
    <script language="javascript" src="http://localhost/onechicken/public/Js/jquery.form.js" ></script>
    <script language="javascript" src="http://localhost/onechicken/public/Js/asyncbox/asyncbox.js" ></script>
    <script language="javascript" src="http://localhost/onechicken/public/Js/Admin/base.js" ></script>
    <script language="javascript" src="http://localhost/onechicken/public/Js/Admin/tab.js" ></script>
    <script src="http://localhost/onechicken/public/Js/jquery.validate.min.js"></script>
    <!--兼容 ie8 placeholder  s-->
    <script language="javascript" type="text/javascript" src="http://localhost/onechicken/public/Js/Admin/jquery.placeholder.js"></script>
    <script type="text/javascript">
        $(function(){
            $(".input").placeholder();
        })
    </script>
    <!--兼容 ie8 placeholder  e-->

    <script language="javascript" type="text/javascript" src="http://localhost/onechicken/public/Js/Admin/calender.js"></script>
</head>
<body>
<div class="wrap">
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
    <div class="clear"></div>
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
    <div class="menu">
        <ul> <li class="fisrt_current"><span><a href="/Admin/Index/index.html">用户信息</a></span></li><li class=""><span><a href="/Admin/Community/index.html">提现管理</a></span></li></ul>
    </div>
</div>
    <div class="mainBody">
        <div id="Right">
            <div class="Item hr">
                <div class="current">用户汇总信息</div>
            </div>
<!--            <form action="" method="get" id="submit-order">-->
<!--                <b>清单状态: </b>-->
<!--                <select name="status">-->
<!--                    <option value="">全部 </option>-->
<!--                    <option value="1" selected = "selected" >未处理</option></if><option value="2"  >已处理</option></if><option value="-1"  >删除</option></if>                </select>-->
<!--                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--                <input name="submit" type="submit" id="check_btn" value="搜索"  class="btn quickSubmit">-->
<!--            </form>-->

            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tab">
                <thead>
                <tr>
                    <td>用户昵称</td>
                    <td>充值金额</td>
                    <td>性别</td>
                    <td>省份</td>
                    <td>城市</td>
                    <td>母鸡数量</td>
                    <td>开地数量</td>
                    <td>金蛋总数</td>
                    <td>邀请成功人数</td>
                    <td>提现金额</td>
                </tr>
                </thead>
                <tr align="center" >
                    <td>89</td>
                    <td>张泽浓</td>
                    <td>18911595752</td>
                    <td><a href="http://bjcache.leju.com/gongzhang/chiefGoodsBss/9f/f1/eb4eda405b023e7a46c8b359677a.jpg"><img src="http://bjcache.leju.com/gongzhang/chiefGoodsBss/9f/f1/eb4eda405b023e7a46c8b359677a.jpg" height="50px"/></a></td>
                    <td>未处理</td>
                    <td>2016-08-26 12:50</td>
                    <td>
                        [<a href="/Admin/ChiefGoodsBss/change.html?id=89&type=2" class="up" id="89">处理</a> ]
                        [<a href="/Admin/ChiefGoodsBss/change.html?id=89&type=-1" class="del" id="89">删除</a> ]
                    </td>
                </tr>
                <tr align="center" >
                    <td>171</td>
                    <td>王树涛</td>
                    <td>13581755389</td>
                    <td><a href="http://bjcache.leju.com/gongzhang/chiefGoodsBss/ee/10/3240f1da3e42fa656298fd9c1244.jpg"><img src="http://bjcache.leju.com/gongzhang/chiefGoodsBss/ee/10/3240f1da3e42fa656298fd9c1244.jpg" height="50px"/></a></td>
                    <td>未处理</td>
                    <td>2016-11-16 08:09</td>
                    <td>
                        [<a href="/Admin/ChiefGoodsBss/change.html?id=171&type=2" class="up" id="171">处理</a> ]
                        [<a href="/Admin/ChiefGoodsBss/change.html?id=171&type=-1" class="del" id="171">删除</a> ]
                    </td>
                </tr>                <tfoot>
                <tr>
                    <td class="fy" colspan="15"> 22 条记录 1/2 页  <li><a rel='nofollow' href='/Admin/ChiefGoodsBss/index/status/1/p/2.html'>下一页</a></li>     <li class='thisclass'>1</li><li><a rel='nofollow' href='/Admin/ChiefGoodsBss/index/status/1/p/2.html'>2</a></li>   </td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
</div>
<div class="clear"></div>
<script type="text/javascript">
    $(window).resize(autoSize);
    $(function(){
        autoSize();
        $(".loginOut").click(function(){
            var url=$(this).attr("href");
            popup.confirm('你确定要退出吗？','你确定要退出吗',function(action){
                if(action == 'ok'){ window.location=url; }
            });
            return false;
        });

        var time=self.setInterval(function(){$("#today").html(date("Y-m-d H:i:s"));},1000);


    });

</script>
<script>
    $(function(){
        $(".del").click(function(){
            var delLink=$(this).attr("href");
            popup.confirm('你真的打算删除订单【<b><font color="red">'+$(this).attr("id")+'</font></b>】的状态吗?','温馨提示',function(action){
                if(action == 'ok'){
                    top.window.location.href=delLink;
                }
            });
            return false;
        });
        $(".up").click(function(){
            var delLink=$(this).attr("href");
            popup.confirm('你确定更新订单【<b><font color="red">'+$(this).attr("id")+'</font></b>】的状态吗?','温馨提示',function(action){
                if(action == 'ok'){
                    top.window.location.href=delLink;
                }
            });
            return false;
        });
    });
</script>
</body>
</html>