<?php
namespace Admin\Model;
use Think\Model;
class BroadcastModel extends Model 
{
	protected $insertFields = array('title','filepath','filecontent','leader','author','adddate','state');
	protected $updateFields = array('id','title','filepath','filecontent','leader','author','adddate','state');
	protected $_validate = array(
		array('title', '1,40', '标题的值最长不能超过 40 个字符！', 2, 'length', 3),
		array('filepath', '1,100', '文件路径的值最长不能超过 60 个字符！', 2, 'length', 3),
		array('filepath', 'require', '音频文件必须填写', 1),
		array('leader', '1,30', '主办方的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('author', '1,15', '作者的值最长不能超过 15 个字符！', 2, 'length', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($title = I('get.title'))
			$where['title'] = array('like', "%$title%");
		if($leader = I('get.leader'))
			$where['leader'] = array('like', "%$leader%");
		if($author = I('get.author'))
			$where['author'] = array('like', "%$author%");
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
		$data['data'] = $this->alias('a')->where($where)->group('a.id')->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{  
	    
		$data['adddate']=date('Y-m-d H:m:i',time()); 
	    
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
		$images = $this->field('')->find($option['where']['id']);
		deleteImage($images);
	}
	/************************************ 其他方法 ********************************************/
}