<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>校园行-与你行 </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/czxy/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
<link href="/czxy/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/czxy/Public/umeditor1_2_2-utf8-php/third-party/jquery.min.js"></script>
</head>
<body>
<h1> 
    <?php if($_page_btn_name): ?> 
    <span class="action-span"><a href="<?php echo $_page_btn_link; ?>"> 
    <?php echo $_page_btn_name; ?>
    </span>
    <?php endif; ?>
    <span class="action-span1">
    <a href="#">校园行 管理中心 >
    <?php echo $_page_title; ?>
    </a></span>
    <div style="clear:both"></div>
</h1>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="tab-div">
    <div id="tabbar-div">
        <p>
            <span class="tab-front" id="general-tab">通用信息</span>
        </p>
    </div>
    <div id="tabbody-div">
        <form enctype="multipart/form-data" action="/czxy/index.php/Admin/News/edit/id/10.html" method="post">
            <table width="90%" id="general-table" align="center">
                 <input type="hidden" name="id" value="<?php echo I("get.id"); ?>" />
                <tr>
                    <td class="label">新闻标题</td>
                    <td><input type="text" name="title" value="<?php echo $data['title']; ?>"size="30" />
                    <span class="require-field">*</span></td>
                </tr>
                 <tr>
                    <td class="label">作者</td>
                    <td><input type="text" name="author" value="<?php echo $data['author']; ?>"size="30" />
                    <span class="require-field">*</span></td>
                </tr>
                
                <tr>
                    <td class="label">新闻类型：</td>
                    <td>
                        <select name="news_type_id">
                            <?php foreach($ntData as $k=>$v): if($v['id']==$data['news_type_id']) $select='selected="selected"'; else $select=''; ?>
                            <option <?php echo $select; ?> value="<?php echo $v['id']; ?>"><?php echo $v['type_name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="require-field">*</span>
                    </td>
                </tr>
                
                
                <tr>
                    <td class="label">是否显示在前台：</td>
                    <td>
                        <input type="radio" name="is_on_line" value="是"
                        <?php if($data['is_on_line']=='是') echo 'checked="checked"'; ?>
                        /> 是
                        <input type="radio" name="is_on_line" value="否"
                        <?php if($data['is_on_line']=='否') echo 'checked="checked"'; ?>
                        /> 否
                    </td>
                </tr>
               
                <tr>
                    <td class="label">推荐排序：</td>
                    <td>
                        <input type="text" name="sort_order" size="5" value="<?php echo $data['sort_order']; ?>"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="label">商品图片：</td>
                    <td>
                        <?php showImage($data['sm_logo']); ?>
                        <input type="file" name="sm_logo" size="35" />
                    </td>
                </tr>
                <tr>
                    <td class="label">新闻内容：</td>
                    <td>
                        <textarea name="content" id="content" cols="40"   rows="3"><?php echo $data['content']; ?></textarea>
                    </td>
                </tr>
            </table>
            <div class="button-div">
                <input type="submit" value=" 确定 " class="button"/>
                <input type="reset" value=" 重置 " class="button" />
            </div>
        </form>
    </div>
</div>

    <link href="/czxy/Public/umeditor1_2_2-utf8-php/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="/czxy/Public/umeditor1_2_2-utf8-php/third-party/jquery.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/czxy/Public/umeditor1_2_2-utf8-php/umeditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/czxy/Public/umeditor1_2_2-utf8-php/umeditor.min.js"></script>
    <script type="text/javascript" src="/czxy/Public/umeditor1_2_2-utf8-php/lang/zh-cn/zh-cn.js"></script>
    <script>
     UM.getEditor('content',{
    	 initialFrameWidth:'100%',
    	 initialFrameHeight:350
     });
     
     </script>
 

<div id="footer">

计科1302技术支持<br />
 
</body>
</html>