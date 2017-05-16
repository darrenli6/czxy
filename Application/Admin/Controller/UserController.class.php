<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends  BaseController
{
    public function add()
    {
    	if(IS_POST)
    	{
    		$model = D('User');
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
    	//用户角色
        $urModel=D('Userrole');
        $urData=$urModel->select();
		// 设置页面中的信息
		$this->assign(array(
		    'urData'=>$urData,
			'_page_title' => '添加用户信息',
			'_page_btn_name' => '用户信息列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('User');
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
    	$model = M('User');
    	$data = $model->find($id);
    	$this->assign('data', $data);
        
    	//用户角色
    	$urModel=D('Userrole');
    	$urData=$urModel->select();
    	
		// 设置页面中的信息
		$this->assign(array(
		    'urData'=>$urData,
			'_page_title' => '修改用户信息',
			'_page_btn_name' => '用户信息列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function delete()
    {
    	$model = D('User');
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
    	$model = D('User');
    	$data = $model->search();
    	$this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
    	));

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '用户信息列表',
			'_page_btn_name' => '添加用户信息',
			'_page_btn_link' => U('add'),
		));
    	$this->display();
    }
}