<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends  BaseController {
    public function lst(){
        $model=D('news');
        $nData=$model->search();
        $this->assign($nData);
        $ntModel=D('news_type');
        $ntData=$ntModel->select();
        $this->assign(array(
        'ntData'=>$ntData,    
        '_page_title'=>'新闻列表',
        '_page_btn_name'=>'发布新闻',
        '_page_btn_link'=>U('add'),
        ));
        $this->display();
    }
    public function add(){
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
        
            $model=D('news');
        
            if($model->create(I('post.'),1)){
                if($model->add()){
                    $this->success('提交成功',U('lst'));
                    exit;
                }
            }
        
            $error=$model->getError();
        
            $this->error($error);
        }
       
        
        //取出所有的品牌
        $news_typeModel=D('news_type');
        $ntData=$news_typeModel->select();
        
        
        $this->assign(array(
            'ntData'=>$ntData,
            '_page_title'=>'添加新闻',
            '_page_btn_name'=>'新闻列表',
            '_page_btn_link'=>U('lst'),
        ));
        $this->display();
    }
    public function edit(){
        $id=I('get.id');
        $model=D('news');
        if(IS_POST){
            
            //var_dump($_POST['goods_attr_id']); die;
            if($model->create(I('post.'),2)){
                if($model->save()){
                    $this->success('提交成功',U('lst'));
                    exit;
                }
            }
             
            $error=$model->getError();
        
            $this->error($error);
        }
        
        $data=$model->find($id);
        $this->assign('data',$data);
        //取出所有的类型
        $ntModel=D('news_type');
        $ntData=$ntModel->select();
        
        
        $this->assign(array(
            'ntData'=>$ntData,
            '_page_title'=>'修改新闻',
            '_page_btn_name'=>'新闻列表',
            '_page_btn_link'=>U('lst'),
        ));
      
        
        $this->display();
    }
    public function delete(){
        $model=D('news');
        if(false!==$model->delete(I('get.id'))){
            $this->success('删除成功',U('lst'));
        }else{
            $this->error('删除失败,原因:'.$model->getError());
        }
    }
    
    
   
}