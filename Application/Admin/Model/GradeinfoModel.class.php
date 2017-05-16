<?php
namespace Admin\Model;
use Think\Model;
class GradeinfoModel extends Model 
{
	protected $insertFields = array('stuno','periodno','gradeinfo');
	protected $updateFields = array('stuno','periodno','gradeinfo');
	protected $_validate = array(
		array('stuno', 'number', '学期编号必须是一个整数！', 2, 'regex', 3),
		array('periodno', 'number', '学期编号必须是一个整数！', 2, 'regex', 3),
		array('gradeinfo', '1,300', '学生成绩信息的值最长不能超过 300 个字符！', 2, 'length', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($stuno = I('get.stuno'))
			$where['stuno'] = array('eq', $stuno);
		if($periodno = I('get.periodno'))
			$where['periodno'] = array('eq', $periodno);
		/************************************* 翻页 ****************************************/
		$count = $this->
		alias('a')
		->where($where)
		->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this
		->field('a.*,g.periodname')
		->alias('a')
		->join('LEFT JOIN __GRADEPERIOD__ g ON a.periodno=g.id')
		->where($where)
		->group('a.stuno')
		->limit($page->firstRow.','.$page->listRows)
		->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{    
	    $ret=array();
	    $cModel=D('Courseinfo');
	    header('Content-Type:text/html;charset=utf8');
	    foreach($data['gradeinfo']['course']  as $k=>$v)
	    {  
	        $ret[]=$v;
	    }
	    
	    foreach($data['gradeinfo']['grade'] as $k=>$v)
	    {
	        $ret[$k].=':'.$v.'分';
	    }
	    $gradeinfo=implode(',', $ret);
	     
	    $data['gradeinfo']=$gradeinfo;
	     
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{
	}
	// 删除前
	protected function _before_delete($option)
	{
		if(is_array($option['where']['stuno']))
		{
			$this->error = '不支持批量删除';
			return FALSE;
		}
	}
	/************************************ 其他方法 ********************************************/
}