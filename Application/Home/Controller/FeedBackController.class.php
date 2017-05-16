<?php
namespace Home\Controller;
use Think\Controller;
class FeedBackController extends Controller {

    public function index(){
        if(IS_POST)
        {
            $model = D('Admin/Feedback');
             
            if($model->create(I('post.'), 1))
            {
                if($id = $model->add())
                {
                    $this->success('您的问题已经提交,我们将尽快落实!', U('index'));
                    exit;
                }
            }
            $this->error($model->getError());
        }
        $fModel=D('Feeditem');
        $fData=$fModel->select();
        $this->assign(array(
            'fData'=>$fData,
        ));
        $this->display();
    }
   
}