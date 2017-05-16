<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    
     public function chkcode()
     {
         $Verify=new \Think\Verify(array(
             'fontSize'=>20,  //验证字体的大小
             'length'=>4,     //验证码位数
             'userNoise'=>true,
             'imageH'=>40,
             'imageW'=>140,
         ));
         $Verify->entry();
     }
    
     public function login()
     {  
         $model=D('Admin');
         if($model->validate($model->_login_validate)->create())
         {
             if($model->login())
             {
                 $this->success('登陆成功',U('index/index'));
                 exit;
             }
             $this->error($model->getError());
         }
         
         $this->display();
     }
     
     public function logout()
     {
         
         session(null);
         $this->redirect('Login/login');
     }
     
}