<?php
namespace Admin\Controller;
use Think\Controller;
class CoursetableController extends BaseController 
{
    public function add()
    {
    	if(IS_POST)
    	{
    		$model = D('Coursetable');
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
        $cModel=D('Cla'); 
    	$cData=$cModel
    	->field('id,nameid,name')
    	->select();
    	
		// 设置页面中的信息
		$this->assign(array(
		    'cData'=>$cData,
			'_page_title' => '添加课程表',
			'_page_btn_name' => '课程表列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('Coursetable');
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
    	$model = M('Coursetable');
    	$data = $model->find($id);
    	$this->assign('data', $data);

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '修改课程表',
			'_page_btn_name' => '课程表列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function delete()
    {
    	$model = D('Coursetable');
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
    	$model = D('Coursetable');
    	$data = $model->search();
    	
    	$cModel=D('Cla');
    	$cData=$cModel
    	->field('id,nameid,name')
    	->select();
    	
    	$this->assign(array(
    	    'cData'=>$cData,
    		'data' => $data['data'],
    		'page' => $data['page'],
    	));

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '课程表列表',
			'_page_btn_name' => '添加课程表',
			'_page_btn_link' => U('add'),
		));
    	$this->display();
    }
}