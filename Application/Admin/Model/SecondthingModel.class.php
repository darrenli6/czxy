<?php
namespace Admin\Model;
use Think\Model;
class SecondthingModel extends Model 
{
	protected $insertFields = array('title','content','old_price','now_price','public_name','phone','qq','deal_type','public_time','categoryid');
	protected $updateFields = array('id','title','content','old_price','now_price','public_name','phone','qq','deal_type','public_time','categoryid');
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
		if($title = I('get.title'))
			$where['title'] = array('like', "%$title%");
		if($public_name = I('get.public_name'))
			$where['public_name'] = array('like', "%$public_name%");
		$deal_type = I('get.deal_type');
		if($deal_type != '' && $deal_type != '-1')
			$where['deal_type'] = array('eq', $deal_type);
		$public_timefrom = I('get.public_timefrom');
		$public_timeto = I('get.public_timeto');
		if($public_timefrom && $public_timeto)
			$where['public_time'] = array('between', array(strtotime("$public_timefrom 00:00:00"), strtotime("$public_timeto 23:59:59")));
		elseif($public_timefrom)
			$where['public_time'] = array('egt', strtotime("$public_timefrom 00:00:00"));
		elseif($public_timeto)
			$where['public_time'] = array('elt', strtotime("$public_timeto 23:59:59"));
		if($categoryid = I('get.categoryid'))
			$where['categoryid'] = array('eq', $categoryid);
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
		}

		$data['public_time']=date('Y-m-d H:i:s',time());
		 
	}
	
	//插入后
	protected function _after_insert($data, $options)
	{    
	     
	}
	
	// 修改前
	protected function _before_update(&$data, $option)
	{
		if(isset($_FILES['title_pic']) && $_FILES['title_pic']['error'] == 0)
		{
			$ret = uploadOne('title_pic', 'Secondthing', array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			));
			if($ret['ok'] == 1)
			{
				$data['title_pic'] = $ret['images'][0];
				$data['big_title_pic'] = $ret['images'][1];
				$data['mid_title_pic'] = $ret['images'][2];
				$data['sm_title_pic'] = $ret['images'][3];
			}
			else 
			{
				$this->error = $ret['error'];
				return FALSE;
			}
			deleteImage(array(
				I('post.old_title_pic'),
				I('post.old_big_title_pic'),
				I('post.old_mid_title_pic'),
				I('post.old_sm_title_pic'),
	
			));
		}
		if(isset($_FILES['pic_id']) && $_FILES['pic_id']['error'] == 0)
		{
			$ret = uploadOne('pic_id', 'Secondthing', array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			));
			if($ret['ok'] == 1)
			{
				$data['pic_id'] = $ret['images'][0];
				$data['big_pic_id'] = $ret['images'][1];
				$data['mid_pic_id'] = $ret['images'][2];
				$data['sm_pic_id'] = $ret['images'][3];
			}
			else 
			{
				$this->error = $ret['error'];
				return FALSE;
			}
			deleteImage(array(
				I('post.old_pic_id'),
				I('post.old_big_pic_id'),
				I('post.old_mid_pic_id'),
				I('post.old_sm_pic_id'),
	
			));
		}
	}
	// 删除前
	protected function _before_delete($option)
	{
		if(is_array($option['where']['id']))
		{
			$this->error = '不支持批量删除';
			return FALSE;
		}
		$images = $this->field('title_pic,big_title_pic,mid_title_pic,sm_title_pic')->find($option['where']['id']);
		deleteImage($images);
		$images = $this->field('pic_id,big_pic_id,mid_pic_id,sm_pic_id')->find($option['where']['id']);
		deleteImage($images);
	}
	/************************************ 其他方法 ********************************************/
}