<?php
namespace Home\Controller;
use Think\Controller;
class PersonCenterController extends Controller {
      public function personCenter()
      {   
          if(session('username')!=null)
          {  
              $uModel=D('User');
              //个人信息
              $uData=$uModel
              ->alias('u')
              ->field('u.*,ur.rolename')
              ->join('LEFT JOIN __USERROLE__ ur ON ur.id=u.roleid')
              ->where(array(
                  'username'=>array('eq',session('username')),
              ))->find();
              
              //系
              $dModel=D('Department');
              $dData=$dModel->select();
              //班级
              $cModel=D('Cla');
              $cData=$cModel->select();
              //课程是否提醒
              //提醒信息
              $tModel=D('recordcoursetip');
              $tData=$tModel->field('id')->where(array(
                  'username'=>array('eq',session('username')),
              ))->find();
              $tData!=NULL?$tip='是':$tip='否';
              
              $this->assign(array(
                  'tip'=>$tip,
                  'cData'=>$cData,
                  'dData'=>$dData,
                  'mobile'=>session('username'),
                  'uData'=>$uData,
              ));
              $this->display();
          }else{
              
              $this->redirect('LogReg/login');
          }   
          
      }
      
      public function edit(){

       if(IS_POST)
       {
           $model = D('User');
           
           if($model->create(I('post.'),2))
           {
               $ret=$model
               ->where(array(
                   'username'=>array('eq',session('username'))
               ))
               ->save(I('post.'));
               if($ret)
               {
                   $this->success('修改成功','personCenter');
                   exit;
               }
           } 
           
           $this->error($model->getError());
            
         
       }  
          
       if(session('username')!=null)
          {  
              $uModel=D('User');
              $uData=$uModel->where(array(
                  'username'=>array('eq',session('username')),
              ))->find();
              //系
              $dModel=D('Department');
              $dData=$dModel->select();
              //班级
              $cModel=D('Cla');
              $cData=$cModel->select();
              
              $this->assign(array(
                  'cData'=>$cData,
                  'dData'=>$dData,
                  'mobile'=>session('username'),
                  'uData'=>$uData,
              ));
              $this->display();
          }else{
              
              $this->redirect('LogReg/login');
          } 
      }
      
      public function saveCourseTip(){
          if(IS_POST)
          {
            
           $rModel=D('recordcoursetip');
           $data['username']=$_POST['username'];
           $data['email']=$_POST['email'];
           $data['classid']=$_POST['classid'];
           if($_POST['state']=='否')
           {
              $ret=$rModel->add($data);
              if($ret)
              {
                  echo '提醒成功,提醒时间将在19点左右.';
                  exit;
              }else{
                  echo '系统繁忙,提醒失败';
                  exit;
              }
               
           }elseif($_POST['state']=='是')
           {
               $ret=$rModel
               ->where(array(
                   'username'=>array('eq',$data['username']),
               ))
               ->delete();
            if($ret)
              {
                  echo '提醒取消成功';
                  exit;
              }else{
                  echo '系统繁忙,提醒取消失败';
                  exit;
              }
               
           }
           
          }
      }
      function message()
      {
         
          
      }
      
      //短信提醒操作 
      public function messagetip()
      {   header('Content-Type:text/html;charset=utf-8');
          $week=array('一','二','三','四','五','六','日');
          $num=date("w");
           
          $weekvalue='星期'.$week["$num"];
           
          $success=array('只有经历过地狱般的折磨，才有征服天堂的力量，只有流过血的手指，才能弹出世间的绝唱。','穷则思变，差则思勤','带着感恩的心启程，学会爱，爱父母，爱自己，爱朋友，爱他人。','流过泪的眼睛更明亮，滴过血的心灵更坚强!', '当世界给草籽重压时，它总会用自己的方法破土而出。','自己选择的路，跪着也要把它走完', '我们可以失望，但不能盲目.','原以为“得不到”和“已失去”是最珍贵的，可原来把握眼前才是最重要的。','我不去想是否能够成功，既然选择了远方，便只顾风雨兼程!','这个社会是存在不公平的，不要抱怨，因为没有用!人总是在反省中进步的!', '不要轻易用过去来衡量生活的幸与不幸!','生活不是等待风暴过去，而是学会在雨中翩翩起舞');
          $r=rand(0, 11);
          
          //获取手机号码
          $rModel=D('recordcoursetip');
           
          $mData=$rModel
          ->field('username,classid')
          ->select();
           
          //获取班级信息
          $cModel=D('Cla');
          $cData=$cModel
          ->field('id,name,zixiarea')
          ->select();
          
          $cModel=D('coursetable');
          
          $dataarr=array();
          
          foreach ($mData as $k=>$v)
          {   
               
              foreach($cData as $k1=>$v1)
              {    
                  if($v1['id']==$v['classid'])
                      {    
                          $dataarr[$v1['id']]['mobile'][]=$v[username];
                          //获取课程
                          $claData=$cModel
                          ->field('diyi,dier,disan,disi,diwu')
                          ->where(array(
                              'xingqi'=>array('eq',$weekvalue),
                              'classid'=>array('eq',$v1['id']),
                          ))
                          ->find();
                          
                          $couseInfo="";
                          $i=0;
                          foreach($claData as $k=>$v)
                          {
                          if($v==''){$v='无课程';}    
                          $couseInfo.='第'.($i+1).'节课:'.$v.',';
                          $i++;
                          }
                          $couseInfo=rtrim($couseInfo,',');
                           
                      // $str.=$v['username'].',';
                         
                     
                      $dataarr[$v1['id']]['success']=$success[$r];
                      $dataarr[$v1['id']]['course']=$couseInfo;
                      $dataarr[$v1['id']]['claname']=$v1['name'];
                      $dataarr[$v1['id']]['zixiarea']=$v1['zixiarea'];
                      $dataarr[$v1['id']]['week']=$weekvalue;
                      
                      } 
               }    
              
          }
          
         $ret=$this->handler($dataarr);
         dump($ret);
         echo  date('Y-m-d H:i:s');
         //地址    http://127.0.0.1/Test4/czxy/index.php/Home/PersonCenter/messagetip
      }

      //处理短信发送
      public function handler($dataarr){
          require_once 'curl.func.php';
          $ret=array(); 
          
          
          $appkey = 'e322803774d1ff79';//你的appkey
          foreach($dataarr as $k=>$v)
          { 
          $str="";       
          foreach($v['mobile'] as $k1=>$v1){
              $str.=$v1.',';
          }
           
          $phones=rtrim($str,',');  
          
          $content = '温馨提示:明天'.$v['week'].',您的课程是:'.$v['course'].',请准时上课!'.$v['claname'].',自习室为'.$v['zixiarea'].';格言:'.$v['success'].'【校园行APP】';//utf8
           
           
          $url = "http://api.jisuapi.com/sms/send?appkey=$appkey&mobile=$phones&content=$content";
           
          $result = curlOpen($url);
          $jsonarr = json_decode($result, true);
          $ret[]=$jsonarr;
          }
          //exit(var_dump($jsonarr));
           
          return $ret;
           
      }
      
      //修改密码
      public function modifypwd()
      {   
          $uModel=D('User');
          if(IS_POST)
          {  
              $username=session('username');  
              $old=md5($_POST['oldpassword']);
              $new1=$_POST['newpassword1'];
              $new2=$_POST['newpassword2'];
              if($new1==$new2)
              {
                  $data['password']=md5($new2);
                  $ret=$uModel
                  ->where(array(
                      'username'=>array('eq',$username),
                      'password'=>array('eq',$old),
                  ))
                  ->save($data);
                  if($ret)
                  {   session(null);
                      $this->success('修改密码成功','personCenter');
                      exit;
                  }else{
                      $this->redirect('修改密码失败',array(),2,'personCenter');
                      exit;
                  }
                  
              }else{
                  
                  $this->error('密码不一致');
                  
              }
              
              
          } 
          
          
          $this->display();
          
      }
      
      //验证旧密码
      public function checkoldpwd()
      {
          $old=md5($_POST['oldpassword']);
          if(session('username')!=null)
          {
             $uModel=D('User');
             $id=$uModel->
             field('id')
             ->where(array(
                 'password'=>array('eq',$old),
             ))->find();
             if($id)
             {
                 echo '密码正确';
                 exit;
             }else{
                 echo '密码错误';
                 exit;
             }
             
          }else{
              
              $this->redirect('LogReg/login');
          }
      }
      
   
}