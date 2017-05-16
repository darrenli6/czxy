<?php
namespace Admin\Controller;
use Think\Controller;
class GradeinfoController extends BaseController 
{
    public function add()
    {
    	if(IS_POST)
    	{    
    		$model = D('Gradeinfo');
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
        //学期信息
    	$gpModel=D('Gradeperiod');
    	$gpData=$gpModel->select();
    	
    	//学科信息
    	$cModel=D('Courseinfo');
    	$cData=$cModel->select();
    	
    	
    	$this->assign(array(
    	    'gpData'=>$gpData,
    	    'cData'=>$cData,
    	));
    	
		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '添加成绩信息',
			'_page_btn_name' => '成绩信息列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function edit()
    {
    	$stuno = I('get.stuno');
    	if(IS_POST)
    	{
    		$model = D('Gradeinfo');
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
    	//学期信息
    	$gpModel=D('Gradeperiod');
    	$gpData=$gpModel->select();
    	 
    	//学科信息
    	$cModel=D('Courseinfo');
    	$cData=$cModel->select();
    	 
    	 
    	$this->assign(array(
    	    'gpData'=>$gpData,
    	    'cData'=>$cData,
    	));
    	
    	$model = M('Gradeinfo');
    	$data = $model->find($stuno);
    	$this->assign('data', $data);

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '修改成绩信息',
			'_page_btn_name' => '成绩信息列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function delete()
    {
    	$model = D('Gradeinfo');
    	if($model->delete(I('get.stuno', 0)) !== FALSE)
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
    	$model = D('Gradeinfo');
    	$data = $model->search();
    	 
    	 
    	$this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
    	));
        
    	//学期信息
    	$gpModel=D('Gradeperiod');
    	$gpData=$gpModel->select();
    	
    	
		// 设置页面中的信息
		$this->assign(array(
		    'gpData'=>$gpData,
			'_page_title' => '成绩信息列表',
			'_page_btn_name' => '添加成绩信息',
			'_page_btn_link' => U('add'),
		));
    	$this->display();
    }
}