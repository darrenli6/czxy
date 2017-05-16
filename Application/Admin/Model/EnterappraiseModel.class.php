<?php
namespace Admin\Model;
use Think\Model;
class EnterappraiseModel extends Model 
{
	protected $insertFields = array('appraisenum','tucao','username','enterpriseid');
	protected $updateFields = array('id','appraisenum','tucao','username','enterpriseid');
	protected $_validate = array(
		array('appraisenum', 'number', '星级数总体评级必须是一个整数！', 2, 'regex', 3),
		array('tucao', '1,100', '吐槽内容的值最长不能超过 100 个字符！', 2, 'length', 3),
		array('username', '1,12', '用户的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('enterpriseid', 'number', '企业id必须是一个整数！', 2, 'regex', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($appraisenum = I('get.appraisenum'))
			$where['appraisenum'] = array('eq', $appraisenum);
		if($enterpriseid = I('get.enterpriseid'))
			$where['enterpriseid'] = array('eq', $enterpriseid);
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