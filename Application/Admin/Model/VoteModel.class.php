<?php
namespace Admin\Model;
use Think\Model;
class VoteModel extends Model 
{
    protected $insertFields='title,info,vid,ip,pic,sm_pic,big_pic';
    protected $updateFields='id,title,info,vid,state,pic,sm_pic,big_pic,count';
    
    protected $_validate=array(
         
        array('title','require','商品名字不能为空!',1),
        array('title', '1,20', '标题不能超过20个字符', 2, 'length', 3),
    );

    protected function _before_insert(&$data, $options){
        if($_FILES['pic']['error']==0){
             
            $ret=uploadOne('pic', 'Vote',array(
                array(50,50),
                array(700,1000),
            ));
             
            $data['pic']=$ret['images'][0];
            $data['sm_pic']=$ret['images'][1];
            $data['big_pic']=$ret['images'][2];
         
        }
    
    }
    
   
    
    protected function _before_update(&$data, $options)
    {       
            $id=I('get.id');
              
            if($_FILES['pic']['error']==0){
                 
                $ret=uploadOne('pic', 'Vote',array(
                    array(50,50),
                    array(700,1000),
                ));
                 
                $data['pic']=$ret['images'][0];
                $data['sm_pic']=$ret['images'][1];
                $data['big_pic']=$ret['images'][2];
               
                /*************删除原来的图片*********************/
                $oldLogo=$this->field('pic,sm_pic,big_pic')->find($id);
                /******************删除************************/
                deleteImage($oldLogo);
            }
         
    }
    
    
    protected function _before_delete($options)
    {
        $id=I('get.id');
        
        if($_FILES['pic']['error']==0){
             
            $ret=uploadOne('pic', 'Vote',array(
                array(50,50),
                array(700,1000),
            ));
             
            $data['pic']=$ret['images'][0];
            $data['sm_pic']=$ret['images'][1];
            $data['big_pic']=$ret['images'][2];
             
            /*************删除原来的图片*********************/
            $oldLogo=$this
            ->where("id=$id")
            ->field('pic,sm_pic,big_pic')
            ->find();
            /******************删除************************/
            deleteImage($oldLogo);
        }
        
    }
    
    
public function search($perPage=5)
   {   /**********搜索********************/
   $where=array();
   
   $title=I('get.title');
   if($title)
       $where['a.title']=array('like',"%$title%");
  
   $where['a.vid']=array('eq',"0");
   //取出总记录数
   $count=$this  
   ->field('a.*')
   ->alias('a')
   ->where($where)
   ->limit($pageObject->firstRow.','.$pageObject->listRows)
   ->count();
   
   //生成翻页类的对象
   $pageObject=new \Think\Page($count,$perPage);
   /************翻页*************/
   $data=$this 
   ->field('a.*')
   ->alias('a')
    ->where($where)
    ->limit($pageObject->firstRow.','.$pageObject->listRows)
    ->select();
    

   
   //样式
   $pageObject->setConfig('next','下一页');
   $pageObject->setConfig('prev','上一页');
   //生成显示上一页 下一页的字符串
   $pageString=$pageObject->show();
    
    
   
   return array(
       'data'=>$data,
       'page'=>$pageString,
   );
   
   }
}