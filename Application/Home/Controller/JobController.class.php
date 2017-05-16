<?php
namespace Home\Controller;
use Think\Controller;
class JobController extends Controller {
    
    public function index()
    {   
        $foModel=D('Faoffer');
        $foData=$foModel
        ->where(array(
          'state'=>array('eq','是'),  
        ))->select();
         
        $this->assign(array(
            'foData'=>$foData,
        ));
        
        $this->display();
    }  
    public function apply_person()
    {   
        $ajModel=D('Applyjob');
        $ajData=$ajModel
        ->where(array(
            'state'=>array('eq','是'),
        ))->select();
         
        $this->assign(array(
            'ajData'=>$ajData,
        ));
        
        $this->display();
    }
     
    public function ajaxaddlike(){
        $jobid=I('get.jobid');
        $model = D('Admin/Faoffer');
        $model->where("id=$jobid")->setInc('com_like');
        $data=$model->field('com_like')->find($jobid);
        echo $data['com_like'];
    }
    
    public function job_write()
    {   
         
        if(IS_POST) 
         {
             $model = D('Admin/Faoffer');
             if($model->create(I('post.'), 1))
             {     
                 if($id = $model->add())
                 {
                 	 $this->success('招聘发布成功,请等待管理员核实！', U('index'));
                 	 exit;
                 }
             }
             $this->error($model->getError());
         }
        if(session('username')==null)
        {
            $this->redirect('LogReg/login',array(),0);
        }   
        $this->display();
    }
    
    public function apply_write(){
        if(IS_POST)
        {
            $model = D('Admin/Applyjob');
            if($model->create(I('post.'), 1))
            {
                if($id = $model->add())
                {
                    $this->success('您的申请信息提交成,请耐心等待管理员核实！', U('index'));
                    exit;
                }
            }
            $this->error($model->getError());
        }
        if(session('username')==null)
        {
            $this->redirect('LogReg/login',array(),0);
        }
        $this->display();
    }
    
    public function resume()
    {   
        
        if($_GET['positionid'])
        {
            $aModel=D('applyjob');
            $aData=$aModel->where(array(
                'id'=>array('eq',$_GET['positionid']),
            ))->find();
            
            $this->assign(array(
                'aData'=>$aData,
            ));
            
        } 
        
        
        $this->display();
        
    }
     
    public function enterprise()
    {
        if($_GET['jobid'])
        {
            $eModel=D('faoffer');
            $eData=$eModel->where(array(
                'id'=>array('eq',$_GET['jobid']),
            ))->find();
            
            $this->assign(array(
                'eData'=>$eData,
            ));
            
        } 
         
        
        $this->display();
    }
    
    public function enterappraise()
    {   if($_GET['enterpriseid'])
          {
              $fModel=D('faoffer');
              $fData=$fModel
              ->field('id,com_name')
              ->where(array(
                  'id'=>array('eq',$_GET['enterpriseid']),
              ))
              ->find();
              $this->assign(array(
                  'fData'=>$fData,
              ));
              
          }
          if(IS_POST)
          {   $_POST['username']=session('username');
              $eaModel=D('enterappraise');
              $ret=$eaModel->add($_POST);
              if($ret)
              {
                  $this->success('恭喜您,提交成功',U('index'));
                  exit;
              }else{
                   $this->error($eaModel->getError());
              }
              
          }
          
          if(session('username')==null)
          {
              $this->redirect('LogReg/login',array(),0);
          }
        $this->display();
    }
}