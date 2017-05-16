<?php
namespace Admin\Controller;
use Think\Controller;
class SecondthingController extends  BaseController 
{
    public function add()
    {
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
    	    
    	    
    		$model = D('Secondthing');
    		if($model->create(I('post.'), 1))
    		{
    			if($id = $model->add())
    			{
    				$this->success('添加成功！', U('lst?p='.I('get.p')));
    				exit;
    			}
    		}
    		$this->error($model->getError());
    	}
        $catModel=D('Secondcat');
    	$cData=$catModel->select();
    	
		// 设置页面中的信息
		$this->assign(array(
		    'cData'=>$cData,
			'_page_title' => '添加二手交易信息',
			'_page_btn_name' => '二手交易信息列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('Secondthing');
    		if($model->create(I('post.'), 2))
    		{
    			if($model->save() !== FALSE)
    			{
    				$this->success('修改成功！', U('lst', array('p' => I('get.p', 1))));
    				exit;
    			}
    		}
    		$this->error($model->getError());
    	}
    	$model = M('Secondthing');
    	$data = $model->find($id);
    	$this->assign('data', $data);
        //二手货种类
    	$catModel=D('Secondcat');
    	$cData=$catModel->select();
    	 
		// 设置页面中的信息
		$this->assign(array(
		    'cData'=>$cData,
			'_page_title' => '修改二手交易信息',
			'_page_btn_name' => '二手交易信息列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function delete()
    {
    	$model = D('Secondthing');
    	if($model->delete(I('get.id', 0)) !== FALSE)
    	{
    		$this->success('删除成功！', U('lst', array('p' => I('get.p', 1))));
    		exit;
    	}
    	else 
    	{
    		$this->error($model->getError());
    	}
    }
    public function lst()
    {
    	$model = D('Secondthing');
    	$data = $model->search();
    	$this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
    	));

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '二手交易信息列表',
			'_page_btn_name' => '添加二手交易信息',
			'_page_btn_link' => U('add'),
		));
    	$this->display();
    }
}