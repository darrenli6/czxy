<?php
namespace  Admin\Model;
use Think\Model;
class NewsModel extends Model{
    protected $insertFields='title,author,content,is_on_line,news_type_id,sm_logo,logo';
    protected $updateFields='id,title,author,content,is_on_line,news_type_id,sm_logo,logo';
    
    protected $_validate=array(
        
        array('content','require','标题不能为空!',1),
        array('title','require','标题不能为空!',1),
        array('author','require','作者不能为空!',1),
        
    );
    
    
    
protected function _before_insert(&$data, $options){
   
    
    if($_FILES['sm_logo']['error']==0){
         
        $ret=uploadOne('sm_logo', 'News',array(
            array(160,120),
        ));
         
        $data['logo']=$ret['images'][0];
        $data['sm_logo']=$ret['images'][1];
        
    }
 
    $data['addtime']=date('Y-m-d H:i:s',time());
    $data['content']=removeXSS($_POST['content']);

}

protected function _after_insert($data, $options){
}



 
protected  function _before_update(&$data, $options){
        $id=$options['where']['id'];
       
        /**************处理logo**************************/
        if(isset($_FILES['sm_logo'])){
        if($_FILES['sm_logo']['error']==0){
             
            $ret=uploadOne('sm_logo', 'News',array(
                array(160,120),
            ));
             
            $data['logo']=$ret['images'][0];
            $data['sm_logo']=$ret['images'][1];
           
            /*************删除原来的图片*********************/
            $oldLogo=$this->field('logo,sm_logo')->find($id);
            /******************删除************************/
            deleteImage($oldLogo);
          }
        }
        $data['addtime']=date('Y-m-d H:i:s',time());
        $data['content']=removeXSS($_POST['content']);
   }
   protected  function _before_delete($options){
       $id=$options['where']['id'];
        
       
       /******************删除logo************************/
       $oldLogo=$this->field('logo,sm_logo')->find($id);
   
       deleteImage($oldLogo);
   
        
   }
  
   public function search($perPage=5)
   {   /**********搜索********************/
   $where=array();
   
   $title=I('get.title');
   if($title)
       $where['a.title']=array('like',"%$title%");
    
   $author=I('get.author');
   if($author)
       $where['a.author']=array('like',"%$author%");
   //time
   $fa=I('get.fa');
   $ta=I('get.ta');
   if($fa && $ta){
       $where['addtime']=array('between',array($fa,$ta));
   }elseif($fa){
       $where['addtime']=array('egt',$fa);
   }elseif($ta){
       $where['addtime']=array('elt',$ta);
   }
    
   //主分类的搜
   $news_type_id=I('get.news_type_id');
   if($news_type_id){
       //取出所有子分类的id
       $where['a.news_type_id']=array('eq',$news_type_id);
   }
   
   /**
    * 取到某一页的数据
    */
   /***********排序***********/
   $orderby='a.id';  //默认的排序字段
   $orderway='desc';  //默认的排序方式
   $odby=I('get.odby');
   if($odby){
       if($odby=='id_asc')
           $orderway='asc';
       }
   
   //取出总记录数
   $count=$this->order("$orderby  $orderway")
   ->field('a.*,b.type_name')
   ->alias('a')
   ->join('LEFT JOIN __NEWS_TYPE__  b ON a.news_type_id=b.id')
   ->where($where)
   ->limit($pageObject->firstRow.','.$pageObject->listRows)
   ->count();
   
   //生成翻页类的对象
   $pageObject=new \Think\Page($count,$perPage);
   /************翻页*************/
   $data=$this->order("$orderby  $orderway")
   ->field('a.*,b.type_name')
   ->alias('a')
   ->join('LEFT JOIN __NEWS_TYPE__ b ON a.news_type_id=b.id
                ')
                  ->where($where)
                  ->group('a.id')
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
