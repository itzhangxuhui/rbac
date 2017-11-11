<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $this->display();
    }
    public function reg(){
        $this->display();
    }
    public function regAction(){
        $verify = I('post.verify');
        if($verify != 8888){
           $this->error('验证码不正确','',1);
        }else{
            $this->success('注册成功','index');
        }
    }
}