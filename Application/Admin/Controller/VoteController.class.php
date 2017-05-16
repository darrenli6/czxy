<?php
namespace Admin\Controller;

use Think\Controller;

class VoteController extends  BaseController
{

    public function lst()
    {
        $model = D('Vote');
        $nData = $model->search();
        $this->assign($nData);
        $this->assign(array(
            '_page_title' => '投票列表',
            '_page_btn_name' => '增加投票主题',
            '_page_btn_link' => U('add')
        ));
        $this->display();
    }
    function  itemlst(){
        $id=I('get.id');
        $model = D('Vote');
        $data = $model
        ->where(array(
            'vid'=>array('eq',$id),
        ))
        ->select();
         
        $this->assign(array(
            'id'=>$id,
            'data'=>$data,
            '_page_title' => '子项目列表',
           
        ));
        $this->display();
    }
    public function add()
    {
        if (IS_POST) {
            $model = D('Vote');
            if ($model->create(I('post.'), 1)) {
                if ($model->add()) {
                    $this->success('提交成功', U('lst'));
                    exit();
                }
            }
            $error = $model->getError();
            $this->error($error);
        }
        
        $this->assign(array(
            '_page_title' => '添加投票主题',
            '_page_btn_name' => '投票列表',
            '_page_btn_link' => U('lst')
        ));
        $this->display();
    }

    public function edit()
    {
        $id = I('get.id');
        $model = D('Vote');
        if (IS_POST) {
           
            if ($model->create(I('post.'), 2)) {
                 
                if ($model->save()) {
                    
                    
                    $this->success('提交成功', U('lst'));
                    exit();
                }
            }
            
            $error = $model->getError();
            
            $this->error($error);
        }
        
        $data = $model->find($id);
        
        $this->assign(array(
            'data' => $data,
            '_page_title' => '修改投票',
            '_page_btn_name' => '投票列表',
            '_page_btn_link' => U('lst')
        ));
        $this->display();
    }
    public function itemadd(){
        $id=I('get.id');
        if(IS_POST){
            $pics=array();
            foreach ($_FILES['pic']['name'] as $k=>$v){
                $pics[]=array(
                    'name'=>$v,
                    'type'=>$_FILES['pic']['type'][$k],
                    'tmp_name'=>$_FILES['pic']['tmp_name'][$k],
                    'error'=>$_FILES['pic']['error'][$k],
                    'size'=>$_FILES['pic']['size'][$k],
                );
        
            }
        
            $model=D('Vote');
             $_POST['vid']=$id;
            if($model->create(I('post.'),1)){
                if($model->add()){
                    $this->success('提交成功',U('itemlst','id='.$id));
                    exit;
                }
            }
            $error=$model->getError();
            $this->error($error);
        }
    
        
        
        $this->assign(array(
            '_page_title'=>'添加商品',
            '_page_btn_name'=>'商品列表',
            '_page_btn_link'=>U('lst'),
        ));
        $this->display();
        
      
        
    }
    function itemedit(){
        $id = I('get.id');
        $vid = I('get.vid');
        $model = D('Vote');
        if (IS_POST) {
            $_POST['vid']=$vid;
            if ($model->create(I('post.'), 2)) {
                if ($model->save()) {
                    $this->success('提交成功', U('lst'));
                    exit();
                }
            }
        
            $error = $model->getError();
        
            $this->error($error);
        }
        
        $data = $model->find($id);
        
        $this->assign(array(
            'data' => $data,
            '_page_title' => '修改投票',
            '_page_btn_name' => '投票列表',
            '_page_btn_link' => U('lst')
        ));
        $this->display();
      
    }
    
    function delete()
    {   $id=I('get.id');
        $model = D('Vote');
        if (false !== $model->where("id=$id OR vid=$id")->delete()) {
            $this->success('删除成功', U('lst'));
        } else {
            $this->error('删除失败,原因:' . $model->getError());
        }
    }
    
    function itemdelete()
    {   $id=I('get.id');
        $model = D('Vote');
    if (false !== $model->where("id=$id ")->delete()) {
        $this->success('删除成功', U('lst'));
    } else {
        $this->error('删除失败,原因:' . $model->getError());
    }
    }
}