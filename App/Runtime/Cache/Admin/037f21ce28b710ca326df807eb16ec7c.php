<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head runat="server">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理登录界面</title>
    <link href="http://localhost/rbactest/Public/Admin/Css/alogin.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form id="form1" runat="server" action="/rbactest/index.php/Admin/Index/loginAction" method="post">
    <div class="Main">
        <ul>
            <li class="top"></li>
            <li class="top2"></li>
            <li class="topA"></li>
            <li class="topB"><span><img src="http://localhost/rbactest/Public/Admin/Images/login/logo.gif" alt="" style="" /></span></li>
            <li class="topC"></li>
            <li class="topD">
                <ul class="login">
                    <li><span class="left login-text">用户名：</span> <span style="left">
                        <input id="Text1" type="text" class="txt" name="mg_name"/>

                    </span></li>
                    <li><span class="left login-text">密码：</span> <span style="left">
                       <input id="Text2" type="password" class="txt" name="mg_pwd" />
                    </span></li>

                </ul>
            </li>
            <li class="topE"></li>
            <li class="middle_A"></li>
            <li class="middle_B"></li>
            <li class="middle_C"><span class="btn"><input name="" type="image" src="http://localhost/rbactest/Public/Admin/Images/login/btnlogin.gif" /></span></li>
            <li class="middle_D"></li>
            <li class="bottom_A"></li>
            <li class="bottom_B">网站后台管理系统&nbsp;&nbsp;www.php.com</li>
        </ul>
    </div>
</form>
</body>
</html>