<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\SigninModel;
class TeachingController extends Controller {
     
     //find classroom
     public function classroomdev()
     {   
         $devModel=D('Classroombinddev');
         $devInfo=$devModel->select();    
     
        
         $macinfo=$this->getmacinfo('classroom');
         
          
         $this->assign(array(
             'macinfo'=>$macinfo,
             'devInfo'=>$devInfo,
         ));
         $this->display();
     }
    
    
    public function wifisign_success()
    {   $signsuc=D('Admin/Wifisignsuc');
        $time=$signsuc->field('signtime')
        ->where(
            array(
                'username'=>array('eq',session('username')),
                
      ))->order('signtime desc')
        ->find();
        $old=strtotime($time['signtime']);
        
        if(time()-$old<2*50*60)
        {
            $this->redirect('wifisign_failed',array('reason'=>'请勿重复签到,下课了再签退'));
            die;
        }
        
        //$info['']
        $signmac=D('Admin/Wifisigninfo');
        $info=$signmac->field('a.mobilephone username,a.phonemac macaddr,b.nickname,NOW() signtime')
        ->alias('a')
        ->join('LEFT JOIN __USER__ b ON b.username=a.mobilephone')
        ->where(array(
            'mobilephone'=>array('eq',session('username')),
        ))->find();
        
        //print_r($info);
        
        
        $ret=$signsuc->add($info);
        if(!ret)
        {   
            $this->redirect('wifisign_failed',array('reason'=>'异常错误'));
            die;
        }
         
        $this->assign(array(
            'username'=>$info['username'],
            'nickname'=>$info['nickname'],
            'signtime'=>$info['signtime'],
        ));
        
        $this->display();
        
    }
    
    
    //check mac if it has mac in file.txt
    public function wificheckmac()
    {
     $mobile= I('get.phone');
     $info=D('Admin/Wifisigninfo');
     $mac=$info->where(array(
         'mobilephone'=>array('eq',$mobile),
     ))->find();
     $macinfo=$this->getmacinfo('macinfo');
     $exists=in_array(strtolower($mac['phonemac']), $macinfo);
     if($exists)
     {
         echo 'ok';
         die;
     }else{
         echo '请仔细阅读注意事项';
         die;
     }
    }
    
    //wifi signin user interface
    public function wifisignin()
   {    
        if(session('username')==null)  
        {
           $this->redirect('LogReg/login'); 
        }
    
            $this->display();
      
       
   }
   //acquire data from device
   public function wifiinput()
   {    header('Content-Type:text/html;charset=utf-8');
       //http://127.0.0.1/Test4/czxy/index.php/Home/Teaching/wifiinput
       
       $inputfile='file.txt';
        
       $input = file_get_contents("php://input");
       
       $bool=file_put_contents($inputfile, $input);
       if($bool)
       {
           echo '设备运行正常';
       }else{
           echo '设备运行异常';
       }
   }
   /*
    classroom  返回对应设备id 终端macinfo array
    macinfo  返回终端的mac地址数组
    
    
    * @param unknown $order*/
   
   public function getmacinfo($order=null)
   {   
       $classroom=array();
       $macinfo=array();
       $info=$this->getwifiinfo();
       
       foreach($info as $k=>$v)
       {  
           foreach($v as $k1=>$v1)
           {   
               if($k1=='id' )
               {
                   $classroom[$v[$k1]]=$v['data'];
               } 
               if($k1=='data')
               {
                   foreach($v1 as $k2=>$v2)
                   {
                       $macinfo[]=$v2['mac'];
                       $macinfo=array_unique($macinfo);
                   }
                   
               }    
           }
        
       }
        
       if($order=='macinfo')
       {
           return $macinfo;
       }else if($order=='classroom')
       {
           return $classroom;
       }
       
   }
   
   //acquire data
   public function getwifiinfo()
   {
       header('Content-Type:text/html;charset=utf-8');
       $output=C('WIFI_INPUT');
       
       $content= file_get_contents($output['rootPath']);
     
       /**
                    实现取出最近的几个数据
                    有多少台设备
        array_column  取出指定键值
        array_unqie
       
       */
    
       $con=explode('data=', $content);
       $con=array_reverse($con);
       
       
       //print_r($con[1]);
       
       $deviceinfo=array();
       for($i=0;$i<count($con)-1;$i++)
       { 
       //$arr=json_decode($con[$i],true);
       $deviceinfo[]=json_decode($con[$i],true);
       
//        foreach($arr as $k=>$v)
//        {
// //            if($k=='id')
// //            {
// //                echo "device id is $v<br />";
// //            }
// //            if($k=='time')
// //            {
// //                echo "time is $v<br />";
// //            }
//            print_r($v);  
//            if($k=='data')
//            {
//                //过滤相同的mac地址
                
//                $ret=array();
//                $mac=array();
//                foreach($v as $k1=>$v1)
//                {
                    
//                    $ret[]=$v1;
//                }
//                //取出最后几组
//                //        for($i=count($ret);$i>count($ret)-20;$i--)
//                    //        {   echo '<br />';
//                    //            print_r($ret[$i]);
//                    //        }
       
                
//                foreach ($ret as $kk=>$vv)
//                {
                    
//                    // $vv=array_unique($vv);
//                    $mac[]=$vv[mac];
                    
//                }
//                $mac_unqi=array_unique($mac);
               
               
// //                echo "<br />";
// //                print_r($mac_unqi);
// //                $num=count($mac_unqi);
// //                echo "<br />周围设备数：$num";
// //                echo '<br />';
//                //print_r($mac_unqi);
//                return $mac_unqi;
//            }
//        }
       
       }

     //  print_r($deviceinfo);
       
       return $deviceinfo;
       
       
   }
   
   
   
   
   
   //界面
   public function sendmessage()
   {   
       
       $this->display();
   }
   //发送祝福短信
   public function congratulation()
   { 
       if(!empty($_GET['who']) && !empty($_GET['con']) &&  !empty($_GET['phone']) && !empty($_GET['where']))
       {
           require_once 'curl.func.php';
           $phone=$_GET['phone'];
           $appkey = 'e322803774d1ff79';//你的appkey
           $content = '祝'.$_GET['who'].'在'.$_GET['where'].'能够取得成功.祝福语:'.$_GET['con'].'【校园行APP】';//utf8
           $url = "http://api.jisuapi.com/sms/send?appkey=$appkey&mobile=$phone&content=$content";
           $result = curlOpen($url);
           $jsonarr = json_decode($result, true);
           //exit(var_dump($jsonarr));
           if($jsonarr['msg']=='ok' && $jsonarr['status']=='0')
           {
                 echo 'ok'; 
                 exit;           
           }else{
                 echo '发送失败';
                 exit;
           }
  
       }else{
          echo '请认真填写信息'; 
       } 
   }
   //查询成绩
    public function gradeinfo()
    {
        $pModel=D('gradeperiod');
        $pData=$pModel->select();
        $this->assign(
            array(
                'pData'=>$pData,
            ));
        
        $this->display();
    }
    //得到成绩
    public function getgradeinfo()
    { 
        if(!empty($_GET['stuno']) && !empty($_GET['periodno']) )
        {
            $gModel=D('gradeinfo');
            $data=$gModel
            ->field('gradeinfo')
            ->where(array(
                'stuno'=>array('eq',$_GET['stuno']),
                'periodno'=>array('eq',$_GET['periodno']),
            ))
            ->find();
            if(!empty($data['gradeinfo'])) 
            {   echo "<table><tr><th>课程</th><th>分数</th></tr>";
                $ret=explode(',', $data['gradeinfo']);
                
                foreach($ret as $k=>$v)
                {  echo "<tr>";
                   $gi=explode(':', $v);
                   echo "<td>$gi[0]</td><td>$gi[1]</td>";
                   echo "</tr>";
                }
                echo "</table>";
                exit;
            }else{
                echo '没有您的成绩信息';
            }           
            
        }else{
            echo '没有您的数据';
        }    
        
    }
    
    public function teach(){
         
       
        $cModel=D('Coursetable');
        $data=$cModel->search();
       
        if(empty($data))
        {
            $data=null;
        }
        
        $this->assign(
            array(
                'data'=>$data,
            )
            ); 
         
        $this->display();
    }
 
    public function index(){
         $this->display();
    }
    
    public function signin(){
      
         if($_GET['code']){
           
             $qd=new \Tools\Qd();
            $user_info=$qd->getUserInfo($_GET['code']);
            $openid=$qd->getOpenId();
            if(empty($user_info['remark'])){
                
                $this->redirect('sign_failed',array('reason'=>'您好!请联系管理员录入信息.'));
                exit;
            }
            // 807815495817
            $sModel=new SigninModel();
            if($sModel->isOpenNULL($openid))
            {
                $ret=$sModel->saveData($user_info);
                 //第一次签到
                $this->redirect('sign_success',array('openid'=>$openid));
                exit;
            }
            
                if($sModel->isOverDate($openid))
                {    
                    if($sModel->saveData($user_info))
                    {
                    
                    //过期
                    $this->redirect('sign_success',array('openid'=>$openid));
                    exit;
                    }else{
                         
                        $this->redirect('sign_failed',array('reason'=>'您好,系统繁忙.'));
                        exit;
                    }
                }else{
                    
                    //没有过期
                   
                   $this->redirect('sign_failed',array('reason'=>'请勿重复签到签退'));
                   exit;
                   
                }  
           
              
            /*
            1第一次的时候插入到数据库中 . 
            2再次访问的时候访问数据库中是否过期了  过期了 就出现签到
            没有过期出现签退  
                                  
            签到签退失败   1没有在ibeacon前   
            */
//             if($id){
//                 $this->redirect('sign_success',array('openid'=>$openid));
//             }else{
//                 $this->assign('reason','unknow error, please inform admin! ');
//                 $this->redirect('sign_failed');
//             }
        } 
        if(empty($_GET['ticket'])){
        
            $this->redirect('sign_failed',array('reason'=>'您好!请到基站附近签到.'));
            exit;
        }else{
        $this->display();
        }
    }
    
   
    
    
    public function sign_success(){
        if(IS_POST)
        {   
            $_POST['suggestiondate']=date('Y-m-d H:i:s');
            $ssModel=D('signsuggestion');
            $ret=$ssModel->add($_POST);
            if($ret)
            {
               echo  '提交成功';
               exit;
            }else{
                echo '提交失败';
                exit;
            }
        }
        
        $openid=$_GET['openid'];
        $info=D('signin')->where("openid='$openid'")->find();
        $this->assign('info',$info);
        
        $this->display();
    }
    public function sign_failed(){
        
        $this->display();
    }
    public function signstate()
    {    
        $sModel=new SigninModel();
        $nowtime=time();
        $data=$sModel
        ->field('DISTINCT *')
        ->where(
            "UNIX_TIMESTAMP(signdate) BETWEEN  $nowtime-60*15 AND $nowtime+60*15 "
            )
        ->select(); 
        
        //签到人数
        $num=$sModel
        ->field('count(DISTINCT openid) num')
        ->where( 
            "UNIX_TIMESTAMP(signdate) BETWEEN  $nowtime-60*15 AND $nowtime+60*15 "
            )
        ->find(); 
       
        $this->assign(array(
            'data'=>$data,
            'num'=>$num,
        ));
        $this->display();
        
    }
    public function signstatebanji()
    {   
        $urModel=D('userrole');
        $urData=$urModel
        ->field('rolename')
        ->where(array(
           'id'=>array('eq',session('roleid')),
        ))
        ->find();
        
        $banji=explode('@', $urData['rolename']);
         
        $uModel=D('user');
        $uData=$uModel
        ->alias('u')
        ->field('nickname,sex')
        ->where(array(
            'classid'=>array('eq',$banji[1]),
            'roleid'=>array('eq',1),
        ))
        ->select();
        
         
       // dump($uData); die;
        $sModel=new SigninModel();
        $nowtime=time();
        $data=$sModel
        ->field('DISTINCT remark')
        ->where(
            "UNIX_TIMESTAMP(signdate) BETWEEN  $nowtime-60*15 AND $nowtime+60*15 "
        )
        ->select();
         
      
         
        $this->assign(array(
            'uData'=>$uData,
            'data'=>$data,
        ));
       
        
        
        $this->display();
        
    }
  
}