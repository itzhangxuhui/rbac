<?php
namespace Admin\Controller;
use Think\Controller;

class ManagerController extends PublicController{
    //管理员添加页面
    public function Add(){
        //获取角色列表
        $arr = M('Role')->field('role_id,role_name')->select();
        $this->assign('arr',$arr);
        $this->display();
    }
    //管理员添加处理页面
    public function addAction(){
        $mg_name = I('post.mg_name');
        $mg_pwd = I('post.mg_pwd');
        $mg_time = time();
        $mg_role_id = I('post.mg_role_id');
        $data = compact('mg_name','mg_time','mg_role_id','mg_pwd');
        $id = M('Manager')->add($data);
        if($id){
            $this->success('添加管理员成功','managerList');
        }else{
            $this->error('管理员添加失败');
        }
    }
    //管理员列表页面
    public function managerList(){
       // $rows = M('Manager')->order('mg_id desc')->select();
      $rows =   M('Manager')->field('think_manager.*,think_role.role_name')->join('left join think_role on think_manager.mg_role_id = think_role.role_id')->order('think_manager.mg_id desc')->select();
        $this->assign('rows',$rows);
        $this->display();
    }
}