<?php
namespace Admin\Model;
use Think\Model;
class WifisigninfoModel extends Model 
{
	protected $insertFields = array('mobilephone','phonemac');
	protected $updateFields = array('id','mobilephone','phonemac');
	protected $_validate = array(
		array('mobilephone', '1,11', 'MAC绑定手机号的值最长不能超过 11 个字符！', 2, 'length', 3),
		array('phonemac', '1,18', 'MAC地址的值最长不能超过 18 个字符！', 2, 'length', 3),
		array('phonemac', 'require', '必须录入该信息'),
		array('mobilephone', 'require', '必须录入该信息'),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($mobilephone = I('get.mobilephone'))
			$where['mobilephone'] = array('like', "%$mobilephone%");
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