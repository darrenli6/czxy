<?php
namespace Admin\Model;
use Think\Model;
class SignsuggestionModel extends Model 
{
	protected $insertFields = array('remark','suggestiondate','suggestion');
	protected $updateFields = array('id','remark','suggestiondate','suggestion');
	protected $_validate = array(
		array('remark', '1,20', '姓名的值最长不能超过 20 个字符！', 2, 'length', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($remark = I('get.remark'))
			$where['remark'] = array('like', "%$remark%");
		$suggestiondatefrom = I('get.suggestiondatefrom');
		$suggestiondateto = I('get.suggestiondateto');
		if($suggestiondatefrom && $suggestiondateto)
			$where['suggestiondate'] = array('between', array(strtotime("$suggestiondatefrom 00:00:00"), strtotime("$suggestiondateto 23:59:59")));
		elseif($suggestiondatefrom)
			$where['suggestiondate'] = array('egt', strtotime("$suggestiondatefrom 00:00:00"));
		elseif($suggestiondateto)
			$where['suggestiondate'] = array('elt', strtotime("$suggestiondateto 23:59:59"));
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