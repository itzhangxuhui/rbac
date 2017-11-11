<?php
namespace Admin\Controller;
class IndexController extends PublicController {

    public function index(){

      $this->display();
    }
    public function top(){
       $this->display();
    }
    public function left(){
        $admin_id = session('admin_id');
        //查管理员名称，角色
        $row = M('Manager')->join('left join think_role as r on think_manager.mg_role_id = r.role_id')->where(['mg_id'=>$admin_id])->field('mg_name,role_name')->find();
        $this->assign('row',$row);
        //根据管理员id 获取对应的角色，根据角色 获取对应的权限，根据权限展示页面
        if($admin_id>1){
            //不是超级管理员
            //获取当前管理员的权限 根节点 子节点
           $role_auth_ids= M('Manager')->join('think_role on think_manager.mg_role_id = think_role.role_id')->where(['mg_id'=>$admin_id])->getField('role_auth_ids');
        //查询权限表
            $wh['auth_id'] = array('in',$role_auth_ids);
           $arr =  M('Auth')->where($wh)->select();
            foreach ($arr as $v){
                if($v['auth_pid'] > 0){
                    $auths[] = $v;
                }else{
                    $authp[] = $v;
                }
            }
        }else{
            //是超级管理员
            //查询根节点
            $authp = M('Auth')->where(['auth_pid'=>0])->select();
            //查询子节点
            $map['auth_pid'] = ['neq',0];
            $auths = M('Auth')->where($map)->select();
        }
        $this->assign('authp',$authp);
        $this->assign('auths',$auths);
        $this->display();
    }
    public function swich(){
        $this->display();
    }
    public function main(){
        $admin_id = session('admin_id');
        //查管理员名称，角色
        $row = M('Manager')->join('left join think_role as r on think_manager.mg_role_id = r.role_id')->where(['mg_id'=>$admin_id])->field('mg_name,role_name')->find();
        $this->assign('row',$row);
        $this->display();
    }
    //登录
    public function login(){
        $this->display();
    }
    //登录处理程序
    public function loginAction(){
        $mg_name = trim(I('post.mg_name'));
        $mg_pwd = md5(I('post.mg_pwd'));
        $wh = compact('mg_name','mg_pwd');
        $arr = M('Manager')->where($wh)->find();

        if($arr){
            //用户名密码正确
            session('admin_id',$arr['mg_id']);
            $this->success("登录成功,欢迎你,{$arr['mg_name']} orz",U('Index/index'));
        }else{
            //用户名或者密码不正确
            $this->error('登录失败，用户名或者密码不正确');
        }
    }
    //退出登录
    public function loginOut(){
        session('admin_id');
        redirect(U('Index/login'));
    }
    public function fourZeroFour(){
        $this->display('404');
    }
    public function bottom(){
        $this->display();
    }
}