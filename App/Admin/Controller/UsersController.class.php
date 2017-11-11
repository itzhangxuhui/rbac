<?php
namespace Admin\Controller;
use Think\Controller;
class UsersController extends PublicController {
    //商品添加
    public function add(){
      $this->display();
    }
    //商品的列表
    public function usersList(){
        $this->display();
    }
}