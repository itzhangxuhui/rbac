<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>主要内容区main</title>
    <link href="http://localhost/rbactest/Public/Admin/Css/css.css" type="text/css" rel="stylesheet" />
    <link href="http://localhost/rbactest/Public/Admin/Css/main.css" type="text/css" rel="stylesheet" />
    <link rel="shortcut icon" href="http://localhost/rbactest/Public/Admin/Images/main/favicon.ico" />
    <style>
        body{overflow-x:hidden; background:#f2f0f5; padding:15px 0px 10px 5px;}
        #searchmain{ font-size:12px;}
        #search{ font-size:12px; background:#548fc9; margin:10px 10px 0 0; display:inline; width:100%; color:#FFF; float:left}
        #search form span{height:40px; line-height:40px; padding:0 0px 0 10px; float:left;}
        #search form input.text-word{height:24px; line-height:24px; width:180px; margin:8px 0 6px 0; padding:0 0px 0 10px; float:left; border:1px solid #FFF;}
        #search form input.text-but{height:24px; line-height:24px; width:55px; background:url(http://localhost/rbactest/Public/Admin/Images/main/list_input.jpg) no-repeat left top; border:none; cursor:pointer; font-family:"Microsoft YaHei","Tahoma","Arial",'宋体'; color:#666; float:left; margin:8px 0 0 6px; display:inline;}
        #search a.add{ background:url(http://localhost/rbactest/Public/Admin/Images/main/add.jpg) no-repeat -3px 7px #548fc9; padding:0 10px 0 26px; height:40px; line-height:40px; font-size:14px; font-weight:bold; color:#FFF; float:right}
        #search a:hover.add{ text-decoration:underline; color:#d2e9ff;}
        #main-tab{ border:1px solid #eaeaea; background:#FFF; font-size:12px;}
        #main-tab th{ font-size:12px; background:url(http://localhost/rbactest/Public/Admin/Images/main/list_bg.jpg) repeat-x; height:32px; line-height:32px;}
        #main-tab td{ font-size:12px; line-height:40px;}
        #main-tab td a{ font-size:12px; color:#548fc9;}
        #main-tab td a:hover{color:#565656; text-decoration:underline;}
        .bordertop{ border-top:1px solid #ebebeb}
        .borderright{ border-right:1px solid #ebebeb}
        .borderbottom{ border-bottom:1px solid #ebebeb}
        .borderleft{ border-left:1px solid #ebebeb}
        .gray{ color:#dbdbdb;}
        td.fenye{ padding:10px 0 0 0; text-align:right;}
        .bggray{ background:#f9f9f9}
    </style>
</head>
<body>
<!--main_top-->
<table width="99%" border="0" cellspacing="0" cellpadding="0" id="searchmain">
    <tr>
        <td width="99%" align="left" valign="top">您的位置：用户管理</td>
    </tr>
    <tr>
        <td align="left" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="search">
                <tr>
                    <td width="90%" align="left" valign="middle">
                        <form method="post" action="">
                            <span>管理员：</span>
                            <input type="text" name="" value="" class="text-word">
                            <input name="" type="button" value="查询" class="text-but">
                        </form>
                    </td>

                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td align="left" valign="top">

            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="main-tab">
                <tr>
                    <th align="center" valign="middle" class="borderright">编号</th>
                    <th align="center" valign="middle" class="borderright">管理员名称</th>
                    <th align="center" valign="middle" class="borderright">添加时间</th>
                    <th align="center" valign="middle" class="borderright">所属角色</th>
                    <th align="center" valign="middle">操作</th>
                </tr>
                <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr onMouseOut="this.style.backgroundColor='#ffffff'" onMouseOver="this.style.backgroundColor='#edf5ff'">
                            <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($vo["mg_id"]); ?></td>
                            <td align="center" valign="middle" class="borderright borderbottom"><?php echo ($vo["mg_name"]); ?></td>
                            <td align="center" valign="middle" class="borderright borderbottom"><?php echo (date("Y-m-d H:i:s",$vo["mg_time"])); ?></td>
                            <td align="center" valign="middle" class="borderright borderbottom">
                                <?php if(($vo["mg_role_id"]) == "0"): ?><b>超级管理员</b>
                                    <?php else: ?>
                                    <?php echo ($vo["role_name"]); endif; ?>
                            </td>
                            <td align="center" valign="middle" class="borderbottom"><a href="/rbactest/index.php/Admin/Manager/roleAuth/role_id/<?php echo ($vo["role_id"]); ?>" target="mainFrame" onFocus="this.blur()" class="add">编辑</a><span class="gray">&nbsp;|&nbsp;</span><a href="add.html" target="mainFrame" onFocus="this.blur()" class="add">删除</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>

            </table></td>
    </tr>

</table>
</body>
</html>