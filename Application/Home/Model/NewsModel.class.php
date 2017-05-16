<?php
 
namespace Home\Model;
use Think\Model;
class NewsModel extends Model 
{
    
    public function search($perPage=8)
    {   /**********搜索********************/
    $where=array();
     
    $tid=I('get.type_id');
    if($tid)
        $where['a.news_type_id']=array('eq',$tid);
     
     
    //取出总记录数
    $count=$this->order("addtime desc")
    ->field('a.*')
    ->alias('a')
    ->where($where)
    ->limit($pageObject->firstRow.','.$pageObject->listRows)
    ->count();
     
    //生成翻页类的对象
    $pageObject=new \Think\Page($count,$perPage);
    /************翻页*************/
    $data=$this->order("addtime desc")
    ->field('a.*')
    ->alias('a')
    ->where($where)
    ->limit($pageObject->firstRow.','.$pageObject->listRows)
    ->select();
    
    
     
    //样式
    $pageObject->setConfig('header',null);
    $pageObject->setConfig('last',null);
    $pageObject->setConfig('first',null);
    $pageObject->setConfig('next','下一页');
    $pageObject->setConfig('prev','上一页');
    //生成显示上一页 下一页的字符串
//    dump($pageObject);
    $pageString=$pageObject->show();
    
//     dump($pageString);
//       die;
    return array(
        'data'=>$data,
        'page'=>$pageString,
    );
     
    }
 
 
}