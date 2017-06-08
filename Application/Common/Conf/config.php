<?php
 
    return array(
        'DB_TYPE'=>'pdo',
        'DB_USER'=>'root',
        'DB_PWD'=>'root',
        'DB_PORT'=>'3306',
        'DB_PREFIX'=>'czxy_',
        'DB_DSN' =>'mysql:host=localhost;dbname=czxy;charset=utf8',
        'DEFAULT_FILTER'        =>  'trim,htmlspecialchars', // 默认参数过滤方法 用于I函数...
      
        'IMAGE_CONFIG'=>array(
            'maxSize'=>1024*1024,
            'exts'   =>array('jpg','gif','png','jpeg'),
            'rootPath'=>"{$_SERVER[DOCUMENT_ROOT]}/czxy/Public/Uploads/",  //上传的路径
            'viewPath'=>'/czxy/Public/Uploads/',  //显示图片
        ),
       'AUDIO_PATH'=>array(
           'broadcast'=>"/czxy/Public/Home/music/",
           'rootPath'=>"{$_SERVER[DOCUMENT_ROOT]}/czxy/Public/Home/music/",
       ),
       'WIFI_INPUT'=>array(
           'rootPath'=>"{$_SERVER[DOCUMENT_ROOT]}/czxy/file.txt",
       ),
       
    );
    /**
      
      return array(
        'DB_TYPE'=>'pdo',
        'DB_USER'=>'c5135580287',
        'DB_PWD'=>'503102319',
        'DB_PORT'=>'3306',
        'DB_PREFIX'=>'czxy_',
        'DB_DSN' =>'mysql:host=localhost;dbname=c5135580287;charset=utf8',
        'DEFAULT_FILTER'        =>  'trim,htmlspecialchars', // 默认参数过滤方法 用于I函数...
        //图片配置
        'IMAGE_CONFIG'=>array(
            'maxSize'=>1024*1024,
            'exts'   =>array('jpg','gif','png','jpeg'),
            'rootPath'=>"{$_SERVER[DOCUMENT_ROOT]}/Test4/czxy/Public/Uploads/",  //上传的路径
            'viewPath'=>'/Test4/czxy/Public/Uploads/',  //显示图片
        ),
 
    );  
 
       
       
     */
 