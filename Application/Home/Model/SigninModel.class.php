<?php
namespace Home\Model;
use Think\Model;
class SigninModel extends Model 
{   
    
    
    
    function saveData($data){
        dump($data);
         
        $now_time = date('Y-m-d H:i:s',time());
        $arr=array(
            'openid'=>"$data[openid]",
            'nickname'=>"$data[nickname]",
            'headimgurl'=>"$data[headimgurl]",
            'remark'=>"$data[remark]",
            'sex'=>"$data[sex]",
            'signdate'=>$now_time,
             
        );
        dump($arr);
         
        $newid=$this->add($arr);
    
        return $newid;
    }
    //是否openid为空
    function isOpenNULL($openid)
    {
        $info=$this
        ->field('id')
        ->where(array(
            'openid'=>array('eq',$openid),
            // 'DATE_FORMAT(signdate)'=>array('eq','DATE(NOW())'),
        ))
        ->find();
        if (empty($info))
        {
            return true;
        }else{
            return false;
        }
    }
    
   //查看是否过期  
   function isOverDate($openid){
       $info=$this
       ->field('signdate')
       ->where(array(
           'openid'=>array('eq',$openid),
          // 'DATE_FORMAT(signdate)'=>array('eq','DATE(NOW())'),
       ))
       ->order('UNIX_TIMESTAMP(signdate) DESC ')
       ->find();
       $old=strtotime($info['signdate']);
       if($old+60*50*2<time()){
           //过期了
           return true;
       }else{
           //没有过期 ,或者没有info
           return false;
       }
       
       return false;
   }  
   //查看是否有这用户
    /**
     * @param unknown $openid
     * @return boolean
     */
    function hasOpenid($openid){
        $id=$this
        ->field('id')
        ->where(array(
            'openid'=>array('eq',$openid),
            
        ))
        ->find();
        
        if($id){
            //有这个用户
            return true;
        }else{
            //没有这个用户
            return false;
        }
    }
   
   
    function updateData($data,$openid){
         
    
        $now_time = date('Y-m-d H:i:s',time());
        $sql="UPDATE  qd_index
        SET     date=$now_time,
        count=count+1
        WHERE   openid='$openid'
        ";
    
        $newid=$this->execute($sql);
         
        return $newid;
         
    }
}