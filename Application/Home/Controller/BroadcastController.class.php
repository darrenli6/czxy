<?php
namespace Home\Controller;
use Think\Controller;
class BroadcastController extends Controller {
    public function index(){
         $bModel=D('Broadcast');
         $bData=$bModel
         ->field('id,title,leader,adddate,visited')
         ->where(array(
             'state'=>array('eq','是'),
         ))
         ->select();
         $this->assign(array(
             'bData'=>$bData,
         ));
         
         $this->display();
    }
    
    public function detail(){
        if($_GET['bid'])
        {    
            
            $bid=$_GET['bid'];
            
            $bModel=D('Broadcast');
            $bData=$bModel
            ->where(array(
                'id'=>array('eq',$bid),
            ))->setInc('visited');
             
            $bData=$bModel
            ->where(array(
                'id'=>array('eq',$bid),
            ))
            ->find();
            $arr=C('AUDIO_PATH');
            $path=$arr['broadcast'];
             
            $realpath=$path.$bData['filepath'];
            $this->assign(array(
                'bData'=>$bData,
                'realpath'=>$realpath,
            ));
        }
        
        $this->display();
    }
    
    public function likebroadcast(){
       if($_GET['likeid']) 
       {
           $bid=$_GET['likeid'];
           
           $bModel=D('Broadcast');
           $bData=$bModel
           ->where(array(
               'id'=>array('eq',$bid),
           ))->setInc('likeit');
           
           $bData=$bModel
           ->field('likeit')
           ->where(array(
               'id'=>array('eq',$bid),
           ))->find();
           
           if($bData)
           {
               echo $bData['likeit'];
               exit;
           }else{
               echo '点赞失败';
               exit;    
           } 
           
       }
        
    }
    
   
}