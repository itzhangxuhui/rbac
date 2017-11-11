<?php
namespace Admin\Controller;
class GoodsController extends PublicController {
    //商品添加
    public function add(){
      $this->display();
    }
    //商品的列表
    public function goodsList(){
        $this->display();
    }
}