<?php
namespace Home\Controller;
use Think\Controller;
class VoteController extends Controller {
    public function index(){
        $model=D('Vote');
        if(IS_POST)
        {    
           if(session('username')==null)
           {   
               $this->redirect('LogReg/login');
               exit;
           } 
           $id=$_POST['vote']; 
           $info=$model
           ->where("id=$id")
           ->setInc('count');
           if($info){
               $this->success('投票成功!',U('voteshow','id='.$_POST['id']));
               exit;
           }
           $error=$model->getError(); 
           $this->error($error);
        }
        if($_GET['voteid'])
        {
        $data=$model
        ->where(array(
            'id'=>array('eq',$_GET['voteid']),
        ))
        ->find();    
        $info=$model
        ->where(array(
            'vid'=>array('eq',$_GET['voteid']),
        ))
        ->select();
        $this->assign(array(
            'info'=>$info,
            'data'=>$data,
        ));
        $this->display();
        }
        
    }
    public function votelst(){
        $vModel=D('Vote');
        $vData=$vModel
        ->where(array(
            'state'=>array('eq','是'),
            'vid'=>array('eq',0),
        ))
        ->select();
        $this->assign(array(
            'vData'=>$vData,
        ));
        $this->display();
    }
    
    
    public function voteshow()
    {    
        
        
        $vote=D('Vote');
        
        $info=$vote->field('id,title,info')->where(
            array(
                'state'=>array('eq','是'),
                'id'=>array('eq',$_GET['id']),
            )
            )->find();
        //等到总的投票数
        $sum=$vote
        ->field('SUM(count) total')
        ->where("vid={$info[id]}")
        ->find();
        
        //得到全部投票的项目信息
        $voteinfo=$vote->where(array(
            'vid'=>array('eq',$_GET['id']),
        ))->select();
        
        $width=400;
        //发生字符串转化问题
         
         
        $this->assign('info',$info);
        $this->assign('sum',$sum['total']);
        $this->assign('width',$width);
        $this->assign('voteinfo',$voteinfo);
       
        $this->display();
    }
    
   
}