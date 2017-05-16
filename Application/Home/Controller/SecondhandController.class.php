<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\SecondthingModel;
class SecondhandController extends Controller {
     public function index(){
         $tModel=D('Admin/Secondcat');
         $tData=$tModel->select();
         
         $sModel=D('Secondthing');
         $sData=$sModel->search();
          
         $this->assign($sData);
         $this->assign(array(
             'tData'=>$tData,
         ));
         $this->display();
     }
     public function detail(){
         $secondid=I('get.secondid');
         $sModel=D('Secondthing');
         $sData=$sModel->find($secondid);
         $this->assign('sData',$sData);
          
         $this->display();
     }
     public function write_second(){

     if(session('username')==null)
     {
         $this->redirect('LogReg/login');
     }    
     if(IS_POST)
    	{   
    	    
    	    $pics=array();
    	    foreach ($_FILES['title_pic']['name'] as $k=>$v){
    	        $pics[]=array(
    	            'name'=>$v,
    	            'type'=>$_FILES['title_pic']['type'][$k],
    	            'tmp_name'=>$_FILES['title_pic']['tmp_name'][$k],
    	            'error'=>$_FILES['title_pic']['error'][$k],
    	            'size'=>$_FILES['title_pic']['size'][$k],
    	        );
    	    
    	    } 
    	    
    	 
    		$model = new SecondthingModel();
    		if($model->create(I('post.'), 1))
    		{
    			if($id = $model->add())
    			{
    				$this->success('恭喜,您的货物走进二手街了！', U('index'));
    				exit;
    			}
    		}
    		$this->error($model->getError());
    	}
         
    	$tModel=D('Admin/Secondcat');
    	$tData=$tModel->select();
    	$this->assign(array(
    	    'tData'=>$tData,
    	));
        $this->display();
     }
     
     public function sendmsg(){
         $phone=I('get.phone');
         $username=I('get.username');
         $secondid=I('get.secondid');
         $rmsModel=D('recordmsgsecond');
         
         if($phone)
         {
            
                  $data['fromusername']=$phone;
                  $data['tousername']=$username;
                  $data['secondid']=$secondid;
                  $ret=$rmsModel
                  ->data($data)
                  ->add();
                  $state=$this->handler($phone,$username);
                  if($ret)
                  {   
                      if(state==0)
                      {
                          echo '发送成功';
                          exit;
                      }else{
                          echo '发送失败,代码1101';
                      }
        
                  }else{
                      echo '发送失败,代码1102';
                      exit;
                  }
                
             
         }else{
             echo '系统繁忙,代码1103';
             exit;
         }
         
     }
     
     //处理短信发送给卖家
     public function handler($phone,$username){
         require_once 'curl.func.php';
         
         $appkey = 'e322803774d1ff79';//你的appkey
         $content = '您好!用户'.$username.'想要购买您的二手物品,请拨打'.$username.'联系.【校园行APP】';//utf8
         $url = "http://api.jisuapi.com/sms/send?appkey=$appkey&mobile=$phone&content=$content";
         $result = curlOpen($url);
         $jsonarr = json_decode($result, true);
         //exit(var_dump($jsonarr));
         
         return $jsonarr['status'];
         
     }
     //检查是否发送过短信
     public function issend(){
         $phone=I('get.phone');
         $username=I('get.username');
         $secondid=I('get.secondid');
         $rmsModel=D('recordmsgsecond');
         if($phone)
         {
             $info=$rmsModel
             ->where(array(
                 'fromusername'=>array('eq',$phone),
                 'tousername'=>array('eq',$username),
                 'secondid'=>array('eq',$secondid),
             ))
             ->find();
             if($info)
             {
                 echo '1';
                 exit;
             }else{
                 echo '0';
                 exit;
             }
         }    
     }
     
     //东西卖完了 卖家可以自行取消
     public function cancelsecond(){
        
         if(I('get.sid'))
         {
           $sModel=D('Secondthing');  
           $id=$_GET['sid'];
           $data['state']='不显示';
           $ret=$sModel
           ->where(array(
               'id'=>array('eq',$id),
           ))
           ->save($data);
           if($ret)
           { 
                echo '取消成功';
                exit;
               
           }else{
               echo '系统繁忙,稍后再试';
               exit;
           }
             
         }else{
     
             echo  '取消二手货物失败';
             exit;
         }
          
     }
      
}