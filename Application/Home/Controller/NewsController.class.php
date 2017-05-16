<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller {
     public function lst(){
        $nModel=D('News');
        $nData=$nModel->search();
        $ntModel=D('Admin/NewsType');
        $ntData=$ntModel->select();
        $config = C('IMAGE_CONFIG');
        $viewPath=$config['viewPath'];
        $this->assign($nData);
        
        $this->assign(array(
            'viewPath'=>$viewPath,
            'nData'=>$nData,
            'ntData'=>$ntData,
        ));
         $this->display();
     }
     public function detail(){
         $id=I('get.id');
         $nModel=D('News');
         $nData=$nModel->field('id,title,author,content,addtime')
         ->find($id);
          
         $ntModel=D('Admin/NewsType');
         $ntData=$ntModel->select();
         
         $this->assign(array(
             'nData'=>$nData,
             'ntData'=>$ntData,
         ));
         $this->display();
     }
     
     public function likenews(){
         
         $id=$_GET['newsid'];
          
         if($id)
         {
                
          $nModel=D('News');
          $nModel->where("id=$id")->setInc('likenews',1); 
          echo '谢谢回馈';
         }
     }
    public function likenotnews(){
        $id=$_GET['newsid'];
        
        if($id)
        {
        
            $nModel=D('News');
            $nModel->where("id=$id")->setInc('likenotnews',1);
            echo '谢谢回馈,尽快改善.';
        }
        
    }
   
}