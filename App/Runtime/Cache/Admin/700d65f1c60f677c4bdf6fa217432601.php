<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        li{
            list-style-type: none;
        }
    </style>
    <script type="text/javascript" src="http://localhost/rbactest/Public/Admin/Js//jquery-1.10.2.min.js"></script>
</head>
<body>
正在为 <b>"<?php echo ($role_name); ?>"</b> 来分配权限
<form action="/rbactest/index.php/Admin/Role/editAuth/" method="post">
<ul>
    <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            <input type="checkbox" value="<?php echo ($vo["auth_id"]); ?>" name="ch[]" id="ch_<?php echo ($vo["auth_id"]); ?>" class="ch" pid="<?php echo ($vo["auth_pid"]); ?>"
            <?php if(in_array($vo['auth_id'],$role_auth_ids_arr)){ echo 'checked'; } ?>
            >
            <label for="ch_<?php echo ($vo["auth_id"]); ?>"><?php echo ($vo["p"]); echo ($vo["auth_name"]); ?></label>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    <input type="hidden" value="<?php echo ($_GET['role_id']); ?>" name="role_id">
    <input type="submit" value="提交">
 <!--  <?php if(is_array($rows)): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
            {* if 意味着 根节点*}
            <?php if($vo["auth_pid"] == 0): ?>{*排除掉第一个根节点*}
                    <?php if($i > 1): ?><hr color="blue"><?php endif; ?>
                    <input type="checkbox">
                    <?php echo ($vo["p"]); echo ($vo["auth_name"]); ?>
                <?php else: ?>
                {*else 意味着 子节点*}
                <hr>
               <input type="checkbox">
                <?php echo ($vo["p"]); echo ($vo["auth_name"]); endif; ?>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>-->

</ul>
</form>
</body>
</html>
<script>
    $('.ch').click(function () {
        var auth_id = $(this).val();
        var thispid = Number($(this).attr('pid'));
        if(thispid ==0){ //当前点击的对象为根节点
            var all =  $(this).is(':checked');
            $('.ch').each(function () {
                var pid = $(this).attr('pid');
                //判断当前是否已经选中
                if(all){
                    $('[pid='+auth_id+']').prop('checked','checked');
                }else{
                    $('[pid='+auth_id+']').removeAttr('checked');
                }
            })
        }else{
            //当前点击的对象不是根节点
            var bool = true;
            $('.ch').each(function () {
                //判断pid名称跟我一样的子节点的状态
                //如果跟我同级的子节点只要有一个还是被选中的状态就让bool = false;
                if($('[pid = '+thispid+']').is(':checked')){
                    bool = false;
                }
            })
            //如果if不执行 表示 根我同级的子节点都是未被选中状态 那么我们的父节点就可以取消选中了
            if(bool){
                $('[value='+thispid+']').removeAttr('checked');
            }
            //如果不是根节点 判断当前是否已经被选中
            var all =  $(this).is(':checked');
            if(all){
                //如果当前已经被选中，让我的父节点也选中
                $('[value='+thispid+']').prop('checked','checked');
            }
        }

    })
</script>