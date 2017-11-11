<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左侧导航menu</title>
<link href="http://localhost/rbactest/Public/Admin/Css/css.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="http://localhost/rbactest/Public/Admin/Js/sdmenu.js"></script>
<script type="text/javascript">
	// <![CDATA[
	var myMenu;
	window.onload = function() {
		myMenu = new SDMenu("my_menu");
		myMenu.init();
	};
	// ]]>
</script>
<style type=text/css>
html{ SCROLLBAR-FACE-COLOR: #538ec6; SCROLLBAR-HIGHLIGHT-COLOR: #dce5f0; SCROLLBAR-SHADOW-COLOR: #2c6daa; SCROLLBAR-3DLIGHT-COLOR: #dce5f0; SCROLLBAR-ARROW-COLOR: #2c6daa;  SCROLLBAR-TRACK-COLOR: #dce5f0;  SCROLLBAR-DARKSHADOW-COLOR: #dce5f0; overflow-x:hidden;}
body{overflow-x:hidden; background:url(http://localhost/rbactest/Public/Admin/Images/main/leftbg.jpg) left top repeat-y #f2f0f5; width:194px;}
</style>
</head>
<body onselectstart="return false;" ondragstart="return false;" oncontextmenu="return false;">
<div id="left-top">
	<div><img src="http://localhost/rbactest/Public/Admin/Images/main/member.gif" width="44" height="44" /></div>
    <span>用户：<?php echo ($row["mg_name"]); ?><br>角色：
    <?php if(empty($row["role_name"])): ?>超级管理员
        <?php else: ?>
        <?php echo ($row["role_name"]); endif; ?>
    </span>
</div>
    <div style="float: left" id="my_menu" class="sdmenu">
        <?php if(is_array($authp)): $i = 0; $__LIST__ = $authp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vop): $mod = ($i % 2 );++$i;?><div class="collapsed">
        <span><?php echo ($vop["auth_name"]); ?></span>
          <?php if(is_array($auths)): $i = 0; $__LIST__ = $auths;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i; if($vop['auth_id'] == $vos['auth_pid']): ?><a href="/rbactest/index.php/Admin/<?php echo ($vos["auth_c"]); ?>/<?php echo ($vos["auth_a"]); ?>" target="mainFrame" onFocus="this.blur()"><?php echo ($vos["auth_name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</body>
</html>