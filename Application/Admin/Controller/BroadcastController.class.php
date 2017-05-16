<?php
namespace Admin\Controller;
use Think\Controller;
class BroadcastController extends BaseController 
{
    public function add()
    {
    	if(IS_POST)
    	{
    		$model = D('Broadcast');
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
			'_page_title' => '添加校园行广播',
			'_page_btn_name' => '校园行广播列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('Broadcast');
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
    	$model = M('Broadcast');
    	$data = $model->find($id);
    	$this->assign('data', $data);

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '修改校园行广播',
			'_page_btn_name' => '校园行广播列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function delete()
    {
    	$model = D('Broadcast');
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
    public function uploadaudio()
    {
        if($_FILES['file']['error']>0)
        {
            switch ($_FILES['file']['error'])
            {
                case 1: echo '上传失败,大小超出配置限制';break;
                case 2: echo '上传失败,大小超过表单限制';break;
                case 3: echo '上传失败,附件上传了一部分';break;
                case 4: echo '上传失败,没有上传附件';break;
                default: echo '默认上传失败'; break;
            }
        }
        $arr=C('AUDIO_PATH');
        $path =$arr['rootPath'];
        $name=date('YmdHis').'-'.mt_rand(1000,9999);
        //附件的名字
         
        $name_arr=explode('.',$_FILES['file']['name']);
        
        $ext='.'.$name_arr[count($name_arr)-1];
        //echo $ext;
        $pathname=$path.$name.$ext;  //附件的真实路径名
         
        $ret=move_uploaded_file($_FILES['file']['tmp_name'],$pathname);
        
        $realpath=$name.$ext;
        if($ret){
            echo $realpath;
            exit;
        }else{
            echo "上传失败";
            exit;
        }
        
        
    }
    
    public function lst()
    {
    	$model = D('Broadcast');
    	$data = $model->search();
    	$this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
    	));

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '校园行广播列表',
			'_page_btn_name' => '添加校园行广播',
			'_page_btn_link' => U('add'),
		));
    	$this->display();
    }
}