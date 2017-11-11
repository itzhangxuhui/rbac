<?php
namespace Admin\Controller;
class AuthController extends PublicController {
    //权限添加
    public function add(){
       $arr =  M('Auth')->order('auth_path')->select();
       foreach ($arr as $k=>$v){
           $rows[$k] = $v;
           $rows[$k]['p'] = str_repeat('----',$v['auth_level']);
       }
       $this->assign('rows',$rows);
      $this->display();
    }
    //添加角色处理
    public function addAction(){
        $auth_name = I('post.auth_name');
        $cate = I('post.cate');
        if($cate){
            $auth_c = I('post.auth_c');
            $auth_a = I('post.auth_a');
            //不是根节点
            $da['auth_c'] = $auth_c;
            $da['auth_a'] = $auth_a;
            $da['auth_level'] = 1;
        }else{
            //是根节点
            $da['auth_level'] = 0;
        }
        $da['auth_pid'] = $cate;//0
        $da['auth_name'] = $auth_name;
        $id = M('Auth')->add($da);
        if($id){
             if($cate){
                 //是子节点
                 $data['auth_path'] = $cate.'-'.$id;
             }else{
                 //是根节点
                 $data['auth_path'] = $id;
             }
           $affect_rows =  M('Auth')->where(['auth_id'=>$id])->save($data);
           if($affect_rows){
               $this->success('权限添加成功','authList');
           }else{
               //插入成功 修改失败
               $affect_rows = M('Auth')->delete($id);
           }
        }else{
            $this->error('权限添加失败');
        }

    }
    //角色列表页面
    public function authList(){
        /**
         *
         */
        $sql = "select a2.auth_id,a2.auth_name as auth_name2 ,a1.auth_name as auth_name1,a2.auth_c,a2.auth_a,a2.auth_path,a2.auth_level from think_auth as a1 right join think_auth as a2 on a1.auth_id = a2.auth_pid";
        $model = new Model();
        $arr = $model->query($sql);
        foreach ($arr as $k=>$v){
            $rows[$k] = $v;
            $rows[$k]['p'] = str_repeat('----',$v['auth_level']);
        }
        $this->assign('rows',$rows);
        $this->display();
    }
}