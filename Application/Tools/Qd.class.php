<?php

namespace Tools;

class Qd {
    public $openid; 
    
    function getUserInfo($code)
    {   $openid="";
        $pu_access_token="";
        $appid = "wx403bd0f3aa5f5fc3";
        $appsecret = "67bb09152d1079ce54314dc9a6a5b421";
        //oauth2的方式获得openid
        $access_token_url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$appsecret&code=$code&grant_type=authorization_code";
        $access_token_json = $this->https_request($access_token_url);
        $access_token_array = json_decode($access_token_json, true);
        $openid = $access_token_array['openid'];
        echo 'access_token_array';
        var_dump($access_token_array);
        echo "<hr />";
        //获取全局access_token
        $pu_token_url="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$appsecret";
        $pu_access_token_json=  $this->https_request($pu_token_url);
        $pu_access_token_array = json_decode($pu_access_token_json, true);
        $pu_access_token=$pu_access_token_array['access_token'];
        echo 'pu_access_token_array';
        var_dump($pu_access_token_array);
    
        //全局access token获得用户基本信息
        echo "<hr />";
        echo $pu_access_token.'<br />';
        echo $openid.'<br />';
    
        $userinfo_url = "https://api.weixin.qq.com/cgi-bin/user/info?access_token=$pu_access_token&openid=$openid";
        $userinfo_json =  $this->https_request($userinfo_url);
        $userinfo_array = json_decode($userinfo_json, true);
        echo 'userinfo_array';
        var_dump($userinfo_array);
    
        $this->openid=$openid;
        
        return $userinfo_array;
    }
    
    function https_request($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        if (curl_errno($curl)) {return 'ERROR '.curl_error($curl);}
        curl_close($curl);
        return $data;
    }   
  
     
    public function getOpenId(){
        return $this->openid;
    }
}
