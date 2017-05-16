<?php
namespace Home\Model;
use Think\Model;
class SecondthingModel extends Model 
{
	protected $insertFields = array('title','state','content','title_pic','old_price','now_price','public_name','phone','qq','deal_type','public_time','categoryid');
	protected $_validate = array(
		array('title', '1,30', '二手主题的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('old_price', 'currency', '原来价格必须是货币格式！', 2, 'regex', 3),
		array('now_price', 'currency', '现在价格必须是货币格式！', 2, 'regex', 3),
		array('public_name', '1,20', '发布人名字的值最长不能超过 20 个字符！', 2, 'length', 3),
		array('phone', '1,12', '手机号的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('qq', '1,12', 'qq号的值最长不能超过 12 个字符！', 2, 'length', 3),
		array('deal_type', '自取,上门取货', "交易方式的值只能是在 '自取,上门取货' 中的一个值！", 2, 'in', 3),
		array('categoryid', 'number', '二手交易物品种类必须是一个整数！', 2, 'regex', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		if($categoryid = I('get.catid'))
			$where['categoryid'] = array('eq', $categoryid);
		/************************************* 翻页 ****************************************/
		$count = $this->alias('a')->where($where)->count();
		$page = new \Think\Page($count, $pageSize);
		// 配置翻页的样式
		$page->setConfig('prev', '上一页');
		$page->setConfig('next', '下一页');
		$data['page'] = $page->show();
		/************************************** 取数据 ******************************************/
		$where['state']=array('eq','显示');
		$data['data'] = 
		$this->alias('a')
		->where($where)
		->group('a.id')
		->limit($page->firstRow.','.$page->listRows)->select();
		return $data;
	}
	// 添加前
	protected function _before_insert(&$data, $option)
	{   
	    
		if(isset($_FILES['title_pic']) && $_FILES['title_pic']['error'] == 0)
		{
			$ret = uploadOne('title_pic', 'Secondthing', array(
				array(50, 50),
				array(165, 149),
				array(393, 355),
			));
			if($ret['ok'] == 1)
			{    
				$data['title_pic'] = $ret['images'][0];
				$data['little_title_pic'] = $ret['images'][1];
				$data['middle_title_pic'] = $ret['images'][2];
				$data['big_title_pic'] = $ret['images'][3];
			}
			else 
			{
				$this->error = $ret['error'];
				return FALSE;
			}
		}else{
		    echo 'upload second error';
		    exit;
		}

		$data['public_time']=date('Y-m-d H:i:s',time());
		$data['phone']=session('username');
		 
	}
 
}