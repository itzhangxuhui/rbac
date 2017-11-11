<?php
return array(
	//'配置项'=>'配置值'
    //PDO连接方式
    'DB_TYPE'   => 'mysql',
// 数据库类型
    'DB_USER'   => 'root',
// 用户名
    'DB_PWD'    => 'root',
// 密码
    'DB_PREFIX' => 'think_',
    // 数据库表前缀
    'DB_DSN'    => 'mysql:host=localhost;dbname=rbactest',
    //'配置项'=>'配置值'
    'TMPL_PARSE_STRING'  =>array(
        '__CSS__'     => DIRROOT.'Admin/Css/',
        '__JS__'     => DIRROOT.'Admin/Js/',
        '__IMG__'     => DIRROOT.'Admin/Images/',
    )
);