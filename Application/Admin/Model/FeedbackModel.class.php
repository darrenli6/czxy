<?php
namespace Admin\Model;
use Think\Model;
class FeedbackModel extends Model 
{
	protected $insertFields = array('link','info','adddate','itemid');
	protected $updateFields = array('id','link','info','adddate');
	protected $_validate = array(
		array('link', '1,30', '联系的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('info', '1,200', '描述信息的值最长不能超过 200 个字符！', 2, 'length', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($link = I('get.link'))
			$where['link'] = array('like', "%$link%");
		$adddatefrom = I('get.adddatefrom');
		$adddateto = I('get.adddateto');
		if($adddatefrom && $adddateto)
			$where['adddate'] = array('between', array(strtotime("$adddatefrom 00:00:00"), strtotime("$adddateto 23:59:59")));
		elseif($adddatefrom)
			$where['adddate'] = array('egt', strtotime("$adddatefrom 00:00:00"));
		elseif($adddateto)
			$where['adddate'] = array('elt', strtotime("$adddateto 23:59:59"));
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		
		$data['data'] = $this->alias('a')
		->field('a.*,b.itemname ')
		->join('LEFT JOIN __FEEDITEM__ b ON b.id=a.itemid')
		->where($where)
		->group('a.id')
		->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{
	    $data['adddate']=date('Y-m-d H:i:s');
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{
	}
	// 删除前
	protected function _before_delete($option)
	{
		if(is_array($option['where']['id']))
		{
			$this->error = '不支持批量删除';
			return FALSE;
		}
	}
	/************************************ 其他方法 ********************************************/
}