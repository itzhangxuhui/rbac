<?php
namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller{
    public function __construct()
    {
        parent::__construct();
        //判断用户是否已经登录
        //判断用户是否登录 不要在登录页面判断
        if(ACTION_NAME !='login' &&  ACTION_NAME !='loginAction' ){
            if(!session('admin_id')){
                redirect(U('Index/login'));
            }
        }
        $ca =  CONTROLLER_NAME."-".ACTION_NAME;
        //获取session
        $admin_id = session('admin_id');
        if($admin_id>1){
            //非超级管理员
            $role_auth_ac = M('Manager')->join('left join think_role as r on think_manager.mg_role_id = r.role_id')->where(['mg_id'=>$admin_id])->getField('role_auth_ac');
            $temp_arr = explode(',',$role_auth_ac);
            $temp_arr[] = 'Index-fourZeroFour';
            $temp_arr[] = 'Index-index';
            $temp_arr[] = 'Index-left';
            $temp_arr[] = 'Index-swich';
            $temp_arr[] = 'Index-main';
            $temp_arr[] = 'Index-top';
            $temp_arr[] = 'Index-bottom';
            $temp_arr[] = 'Index-login';
            $temp_arr[] = 'Index-loginAction';
            $temp_arr[] = 'Index-loginOut';
            //如果不在这个数组就说明没有权限
            if(!in_array($ca,$temp_arr)){
                redirect(U('Index/fourZeroFour'));
            }
        }

    }
}