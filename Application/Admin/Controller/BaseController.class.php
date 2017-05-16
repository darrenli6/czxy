<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    
      public function __construct(){
          //必须先调用父类的构造函数 
          parent::__construct();
           //判断登陆
          if(!session('adminid'))
          {
              $this->error('必须先登陆',U('Login/login'));
          } 
      }
}