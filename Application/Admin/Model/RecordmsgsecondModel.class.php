<?php
namespace Admin\Model;
use Think\Model;
class RecordmsgsecondModel extends Model 
{
	protected $insertFields = array('fromusername','secondid','tousername','msgdate');
	protected $updateFields = array('id','fromusername','secondid','tousername','msgdate');
	protected $_validate = array(
		array('fromusername', '1,12', '你的卖家的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('secondid', 'number', '购买二手物品的id必须是一个整数！', 2, 'regex', 3),
		array('tousername', '1,12', '记录买家的值最长不能超过 12 个字符！', 2, 'length', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($fromusername = I('get.fromusername'))
			$where['fromusername'] = array('like', "%$fromusername%");
		if($tousername = I('get.tousername'))
			$where['tousername'] = array('like', "%$tousername%");
		$msgdatefrom = I('get.msgdatefrom');
		$msgdateto = I('get.msgdateto');
		if($msgdatefrom && $msgdateto)
			$where['msgdate'] = array('between', array(strtotime("$msgdatefrom 00:00:00"), strtotime("$msgdateto 23:59:59")));
		elseif($msgdatefrom)
			$where['msgdate'] = array('egt', strtotime("$msgdatefrom 00:00:00"));
		elseif($msgdateto)
			$where['msgdate'] = array('elt', strtotime("$msgdateto 23:59:59"));
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$data['data'] = $this->alias('a')->where($where)->group('a.id')->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{
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