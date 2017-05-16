<?php
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\ClaModel;
class ClaController extends BaseController 
{
    public function add()
    {
    	if(IS_POST)
    	{
    		$model = D('Cla');
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
        $dModel=D('Department');  
    	$dData=$dModel->field('id,name')->select();
		// 设置页面中的信息
		$this->assign(array(
		    'dData'=>$dData,
			'_page_title' => '添加班级信息',
			'_page_btn_name' => '班级信息列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function edit()
    {
    	$id = I('get.id');
    	if(IS_POST)
    	{
    		$model = D('Cla');
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
    	$model = M('Cla');
    	$data = $model->find($id);
    	$this->assign('data', $data);
        
        $dModel=D('Department');
    	$dData=$dModel->select();
    	 
		// 设置页面中的信息
		$this->assign(array(
		    'dData'=>$dData,
			'_page_title' => '修改班级信息',
			'_page_btn_name' => '班级信息列表',
			'_page_btn_link' => U('lst'),
		));
		$this->display();
    }
    public function delete()
    {
    	$model = D('Cla');
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
    	$model = D('Cla');
    	$data = $model->search();
    	$this->assign(array(
    		'data' => $data['data'],
    		'page' => $data['page'],
    	));

		// 设置页面中的信息
		$this->assign(array(
			'_page_title' => '班级信息列表',
			'_page_btn_name' => '添加班级信息',
			'_page_btn_link' => U('add'),
		));
    	$this->display();
    }
    //生成前台所有要xml
    public function setTableXml()
    {     
          $cModel=new ClaModel();
          $cData=$cModel->getClaData();
          $object=$cModel->getDepData();
          
          
          $_xml .= '<?xml version="1.0" encoding="utf-8" ?>' . "\r\n";
          $_xml .= '<school School="czxy">'. "\r\n";
          if ($object) {
                foreach ($object as $k=>$v) {
                    $_xml .= '<department  departmentID="'.$v['id'].'" department="'.$v['name'].'" >' . "\r\n";
                    foreach ($cData as $k1=>$v1)
                    { 
                      if($v1['departmentid']==$v['id'])
                      {
                          $_xml .= '<clas id="'.$v1['id'].'" clasID="'.$v1['nameid'].'" clas="'.$v1['name'].'" />' . "\r\n";
                          
                      }  
                    }
                    $_xml .=' </department> ';
                }
            }
            $_xml .= '</school>' . "\r\n";
           
            try {
                $_sxe = new \SimpleXMLElement($_xml);
                $re=$_sxe->asXML($_SERVER['DOCUMENT_ROOT']."/Test4/czxy/xi.xml");
                if($re)
                {
                    $this->redirect('Index/index',array(),2,'生成xml成功'); 
                    
                }else{
                    throw_exception('生成xml失败');
                }
                
            } catch (\Exception $e) {
                
                die($_xml);
            }
            
          /*
          $dom = new \DOMDocument('1.0','utf-8'); //创建XML对象
          $data = $dom->createElement('school');
          $data->setAttribute('School','czxy');
          $dom->appendChild($data);
          foreach ($object as $k=>$v){
              $department = $dom->createElement('department');
              $department->setAttribute('departmentID', $v['id']);
              $department->setAttribute('department', $v['name']);
              $data->appendChild($department);
              foreach ($cData as $k1=>$v1){
                  $cla = $dom->createElement('clas');
                  $cla->setAttribute('id', $v1['id']);
                  $cla->setAttribute('clasID', $v1['nameid']);
                  $cla->setAttribute('clas', $v1['name']);
                  $department->appendChild($cla);
              }
          }
          
        $ret=$dom->save($_SERVER['DOCUMENT_ROOT']."/Test4/czxy/xi.xml");
        if($ret)
        {
            $this->success('生成xml成功','Cla/lst');
            exit;
        }else{
            $this->error('生成失败','Cla/lst');
            exit;
        }
        */
        
        
    }
    
 
    
    
    
}