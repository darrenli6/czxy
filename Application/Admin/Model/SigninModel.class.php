<?php
namespace Admin\Model;
use Think\Model;
class SigninModel extends Model 
{
	protected $insertFields = array('openid','signstate','nickname','remark','signdate');
	protected $updateFields = array('id','openid','signstate','nickname','remark','signdate');
	protected $_validate = array(
		array('openid', '1,50', 'openid的值最长不能超过 50 个字符！', 2, 'length', 3),
		array('signstate', '签到,签退', "签到签退的值只能是在 '签到,签退' 中的一个值！", 2, 'in', 3),
		array('nickname', '1,30', '昵称的值最长不能超过 30 个字符！', 2, 'length', 3),
		array('remark', '1,30', '用户备注信息的值最长不能超过 30 个字符！', 2, 'length', 3),
	);
	public function search($pageSize = 20)
	{
		/**************************************** 搜索 ****************************************/
		$where = array();
		$signstate = I('get.signstate');
		if($signstate != '' && $signstate != '-1')
			$where['signstate'] = array('eq', $signstate);
		if($nickname = I('get.nickname'))
			$where['nickname'] = array('like', "%$nickname%");
		if($remark = I('get.remark'))
			$where['remark'] = array('like', "%$remark%");
		$signdatefrom = I('get.signdatefrom');
		$signdateto = I('get.signdateto');
		if($signdatefrom && $signdateto)
			$where['signdate'] = array('between', array(strtotime("$signdatefrom 00:00:00"), strtotime("$signdateto 23:59:59")));
		elseif($signdatefrom)
			$where['signdate'] = array('egt', strtotime("$signdatefrom 00:00:00"));
		elseif($signdateto)
			$where['signdate'] = array('elt', strtotime("$signdateto 23:59:59"));
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
		if(isset($_FILES['headimgurl']) && $_FILES['headimgurl']['error'] == 0)
		{
			$ret = uploadOne('headimgurl', 'Signin', array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			));
			if($ret['ok'] == 1)
			{
				$data['headimgurl'] = $ret['images'][0];
				$data['big_headimgurl'] = $ret['images'][1];
				$data['mid_headimgurl'] = $ret['images'][2];
				$data['sm_headimgurl'] = $ret['images'][3];
			}
			else 
			{
				$this->error = $ret['error'];
				return FALSE;
			}
		}
	}
	// 修改前
	protected function _before_update(&$data, $option)
	{
		if(isset($_FILES['headimgurl']) && $_FILES['headimgurl']['error'] == 0)
		{
			$ret = uploadOne('headimgurl', 'Signin', array(
				array(350, 350, 2),
				array(150, 150, 2),
				array(50, 50, 2),
			));
			if($ret['ok'] == 1)
			{
				$data['headimgurl'] = $ret['images'][0];
				$data['big_headimgurl'] = $ret['images'][1];
				$data['mid_headimgurl'] = $ret['images'][2];
				$data['sm_headimgurl'] = $ret['images'][3];
			}
			else 
			{
				$this->error = $ret['error'];
				return FALSE;
			}
			deleteImage(array(
				I('post.old_headimgurl'),
				I('post.old_big_headimgurl'),
				I('post.old_mid_headimgurl'),
				I('post.old_sm_headimgurl'),
	
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
		$images = $this->field('headimgurl,big_headimgurl,mid_headimgurl,sm_headimgurl')->find($option['where']['id']);
		deleteImage($images);
	}
	/************************************ 其他方法 ********************************************/
}