<?php
namespace Admin\Controller;
use Think\Controller;
class CourseinfoController extends BaseController 
{
    public function add()
    {
    	if(IS_POST)
    	{
    		$model = D('Courseinfo');
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

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '添加学生课程信息',
			'_page_btn_name' => '学生课程信息列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function edit()
    {
    	$courseid = I('get.courseid');
    	if(IS_POST)
    	{
    		$model = D('Courseinfo');
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
    	$model = M('Courseinfo');
    	$data = $model->find($courseid);
    	$this->assign('data', $data);

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '修改学生课程信息',
			'_page_btn_name' => '学生课程信息列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function delete()
    {
    	$model = D('Courseinfo');
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
    	$model = D('Courseinfo');
    	$data = $model->search();
    	$this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
    	));

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '学生课程信息列表',
			'_page_btn_name' => '添加学生课程信息',
			'_page_btn_link' => U('add'),
		));
    	$this->display();
    }
}