<?php
namespace Admin\Model;
use Think\Model;
class WifisignsucModel extends Model 
{
	protected $insertFields = array('username','nickname','macaddr','signtime');
	protected $updateFields = array('id','username','nickname','macaddr','signtime');
	protected $_validate = array(
		array('username', '1,11', '用户名的值最长不能超过 11 个字符！', 2, 'length', 3),
		array('nickname', '1,20', '姓名的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('macaddr', '1,17', 'mac地址的值最长不能超过 17 个字符！', 2, 'length', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($username = I('get.username'))
			$where['username'] = array('like', "%$username%");
		if($nickname = I('get.nickname'))
			$where['nickname'] = array('like', "%$nickname%");
		$signtimefrom = I('get.signtimefrom');
		$signtimeto = I('get.signtimeto');
		if($signtimefrom && $signtimeto)
			$where['signtime'] = array('between', array(strtotime("$signtimefrom 00:00:00"), strtotime("$signtimeto 23:59:59")));
		elseif($signtimefrom)
			$where['signtime'] = array('egt', strtotime("$signtimefrom 00:00:00"));
		elseif($signtimeto)
			$where['signtime'] = array('elt', strtotime("$signtimeto 23:59:59"));
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