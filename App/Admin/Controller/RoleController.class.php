<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends PublicController {

    public function add(){
      $this->display();
    }
    //添加角色处理
    public function addAction(){
        $role_name = I('post.role_name');
        //插入数据
        $id = M('Role')->add(['role_name'=>$role_name]);
        if($id){
            //成功
            $this->success('角色添加成功','roleList');
        }else{
            $this->error('角色添加失败');
        }
    }
    //角色列表页面
    public function roleList(){
        $rows = M('Role')->order('role_id desc')->select();
        $this->assign('rows',$rows);
        $this->display();
    }
    //为角色分配权限
    public function roleAuth(){
        $role_id = I('get.role_id');
        //获取role_auth_ids
        $role_auth_ids = M('Role')->where(['role_id'=>$role_id])->getField('role_auth_ids');
        $role_auth_ids_arr = explode(',',$role_auth_ids);
        $this->assign('role_auth_ids_arr',$role_auth_ids_arr);


        $role_name = M('Role')->where(['role_id'=>$role_id])->getField('role_name');
        $this->assign('role_name',$role_name);
        //读取所有权限
        $arr =  M('Auth')->order('auth_path')->select();
        foreach ($arr as $k=>$v){
            $rows[$k] = $v;
            $rows[$k]['p'] = str_repeat('----',$v['auth_level']);
        }
        $this->assign('rows',$rows);
        $this->display();
    }
    //分配权限处理程序
    public function editAuth(){
        $ch = I('post.ch');
        $role_id = I('post.role_id');
        $str = '';
        foreach ($ch as $v){
            //根据权限id查询 权限里面的记录 取出auth_c 和auth_a
          $arr =  M('Auth')->find($v);
          //过滤掉没有auth_c 和 没有auth_a的数据
            if(!empty($arr['auth_c']) && !empty($arr['auth_a'])){
                $str.=  $arr['auth_c'].'-'.$arr['auth_a'].',';
            }
        }//合并权限id
        $role_auth_ids = implode(',',$ch);
        $data['role_auth_ids'] = $role_auth_ids;
        $data['role_auth_ac'] = $str;
        $affect = M('Role')->where(['role_id'=>$role_id])->save($data);
        if($affect){
            //成功
            $this->success('权限编辑成功',U('roleList'));
        }else{
            //失败
            $this->error('权限编辑失败');
        }
    }
}