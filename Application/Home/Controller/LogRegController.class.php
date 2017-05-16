<?php
namespace Home\Controller;
use Think\Controller;
class LogRegController extends Controller {
  
    
    public function index()
    {   
        $phonenum=$_GET['mobilephone'];
        if($phonenum)
        {    
        $this->getCode($phonenum);
        }
        if(IS_POST)
        {  
            $uModel=D('User');
             
            $info=$uModel->where("username='$_POST[mobilephone]'")->find();
           
            if($info['username']==$_POST['mobilephone'] && $info['yancode']==$_POST['yancode'])
            {
                $this->redirect('LogReg/reg',array('phone'=>$_POST['mobilephone']));
            }else{
                $this->error('验证码错误','index');
            } 
        }
        $this->display();
        
    } 
    
    
    //得到验证码
    public function getCode($phonenum){
        if($phonenum)
        {
            $uModel=D('User');
        
            $exists=$uModel->where("username=$phonenum AND password!=''")->find();
            if($exists)
            {
                echo '您已经注册';
                exit;
            }else{
                $rand=rand(1000,9999);
                //处理数据库 
                $ret=$this->handler($phonenum, $rand);
                //发送短信
                $state=$this->message($phonenum, $rand);
                
                if($ret)
                {
                    if($state==0 )
                    {
                    
                        echo '发送成功';
                        exit;
                    }else{
                        echo '短信服务器繁忙,代码1001';
                        exit;
                    } 
                }else{
                    echo '系统服务器繁忙,代码1002';
                    exit;
                }
        
            }
        
        
        }else{
            echo '系统繁忙,代码1003';
        }
        
        
    }
    
    
    //把信息存到数据库中
    public function handler($phone,$rand){
        $uModel=D('user');
        
        $data=array(
            'username'=>$phone,
            'yancode'=>$rand,
        );
        
        $re=$uModel->where("username=$phone")->find();
       
        if($re)
        { 
          $ret=$uModel
          ->where(array(
              'username'=>array('eq',$phone),
          ))
          ->data($data)->save();  
        }else{
          $ret=$uModel->add($data);
        }
        
        return $ret;
    }
    
    public function message($phone,$rand){
        require_once 'curl.func.php';
        
        $appkey = 'e322803774d1ff79';//你的appkey
        $content = '注册验证码:'.$rand.',尊敬的用户,请尽快注册.如非本人操作,请忽略本短信.【校园行APP】';//utf8
        $url = "http://api.jisuapi.com/sms/send?appkey=$appkey&mobile=$phone&content=$content";
        $result = curlOpen($url);
        $jsonarr = json_decode($result, true);
        //exit(var_dump($jsonarr));
        
        return $jsonarr['status']; 
    }
    
    public function login()
    {   
        if(IS_POST){
            $username=$_POST['username'];
            $password=md5($_POST['password']);
            $uModel=D('user');
            $ret=$uModel->where(array(
                'username'=>array('eq',$username),
                'password'=>array('eq',$password),
            ))->find();
            if($ret)
            {
                  session('roleid',$ret['roleid']);
                  session('username',$ret['username']);
                  $this->success('登陆成功',U('Index/index'));
                  exit;
            }else{
                $this->error('用户名或者密码错误',U('LogReg/login'));
                exit;
            }
         
           exit;  
        }
        
        
        $this->display();
    
    }
    
 
    public function reg()
    {   $phone=I('get.phone');
         
        if(IS_POST)
        {   
            $data['password']=md5($_POST['password']);
            $uModel=D('User');
            $info=$uModel->where("username='$phone'")->save($data);
            if($info)
            {   session('roleid',$info['roleid']);
                session('username',$phone);
                $this->success('成功',U('Index/index'));
                exit;
            }else{
                $this->error('注册失败',U('LogReg/index'));
                exit;
            }
        }
        
        $this->display();
    }
    
    public function logout()
    {
        session(null);
        $this->success('退出成功',U('Index/index'));
        
    }
    
    //忘记密码
    public  function forget(){
        $uModel=D('User');
        if($_GET['mobilephone'])
        {
            $phone=$_GET['mobilephone'];
            if($phone)
            {
                
                $re=$uModel->where("username=$phone")->find();
                if($re)
                {   
                    $this->getYan($phone);
                    exit;
                }else{
                    echo '对不起,您没有注册,请自行注册.';
                    exit;
                }
                
            }else{
               echo '系统繁忙,代码1201'; 
               exit; 
            }
           
        }
        if(IS_POST)
        {
            
             
            $info=$uModel->where("username='$_POST[mobilephone]'")->find();
             
            if($info['username']==$_POST['mobilephone'] && $info['yancode']==$_POST['yancode'])
            {
                $this->redirect('LogReg/reg',array('phone'=>$_POST['mobilephone']));
            }else{
                $this->error('验证码错误','index');
            }
        }
        
        $this->display();
        
    }
    //是否存在此手机号码
    public function isExitst(){
        $uModel=D('User');
        if($_GET['mobilephone'])
        {
            $phone=$_GET['mobilephone'];
            if($phone)
            {
        
                $re=$uModel->where("username=$phone")->find();
                if(!$re)
                {
                    echo '对不起,您没有注册,请自行注册.';
                    exit;
                }else{
                    echo '';
                    exit;
                }
        
            }else{
                echo '系统繁忙,代码1201';
                exit;
        }
        
        
      }
    
    }
    //得到忘记密码的验证码
     function getYan($phonenum){
        if($phonenum)
        {
            $uModel=D('User');
    
             
                $rand=rand(1000,9999);
                //处理数据库
                $ret=$this->handler($phonenum, $rand);
                //发送短信
                $state=$this->message($phonenum, $rand);
    
                if($ret)
                {
                    if($state==0 )
                    {
    
                        echo '发送成功';
                        exit;
                    }else{
                        echo '短信服务器繁忙,代码1001';
                        exit;
                    }
                }else{
                    echo '系统服务器繁忙,代码1002';
                    exit;
                }
    
           }
        
    
    }
    
}