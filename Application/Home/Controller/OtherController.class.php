<?php
namespace Home\Controller;

use Think\Controller;

class OtherController extends Controller
{

    public $appkey = 'e322803774d1ff79';

    public function guihua()
    {
        $this->display();
    }

    public function gongjiaoxianlu()
    {
        $this->display();
    }

    public function index()
    {
        $this->display();
    }

    public function zhaocha()
    {
        $this->display();
    }

    public function express()
    {
        $this->display();
    }

    public function xingzuo()
    {
        if ($_GET['astroid']) {
            require_once 'curl.func.php';
            
            $appkey = 'e322803774d1ff79'; // 你的appkey
                                          // 1白羊座
            $astroid = $_GET['astroid'];
            
            $url = "http://api.jisuapi.com/astro/fortune?appkey=$appkey&astroid=$astroid";
            $result = curlOpen($url);
            $jsonarr = json_decode($result, true);
            // exit(var_dump($jsonarr));
            if ($jsonarr['status'] != 0) {
                echo $jsonarr['msg'];
                exit();
            }
            
            $result = $jsonarr['result'];
            echo $result['astroid'] . ' ' . $result['astroname'] . '<br>';
            
            $today = $result['today'];
            $tomorrow = $result['tomorrow'];
            $week = $result['week'];
            $month = $result['month'];
            $year = $result['year'];
            
            echo '今日运势：<br>';
            echo $today['date'] . ' ' . $today['presummary'] . ' ' . $today['star'] . ' ' . $today['color'] . ' ' . $today['number'] . ' ' . $today['summary'] . ' ' . $today['money'] . ' ' . $today['career'] . ' ' . $today['love'] . ' ' . $today['health'] . '<br>';
            echo '明日运势：<br>';
            echo $tomorrow['date'] . ' ' . $tomorrow['presummary'] . ' ' . $tomorrow['star'] . ' ' . $tomorrow['color'] . ' ' . $tomorrow['number'] . ' ' . $tomorrow['summary'] . ' ' . $tomorrow['money'] . ' ' . $tomorrow['career'] . ' ' . $tomorrow['love'] . ' ' . $tomorrow['health'] . '<br>';
            echo '本周运势：<br>';
            echo $week['date'] . ' ' . $week['job'] . ' ' . $week['money'] . ' ' . $week['career'] . ' ' . $week['love'] . ' ' . $week['health'] . '<br>';
            echo '本月运势：<br>';
            echo $month['date'] . ' ' . $month['summary'] . ' ' . $month['money'] . ' ' . $month['career'] . ' ' . $month['love'] . ' ' . $month['health'] . '<br>';
            echo '本年运势：<br>';
            echo $year['date'] . ' ' . $year['summary'] . ' ' . $year['money'] . ' ' . $year['career'] . ' ' . $year['love'] . '<br>';
            exit();
        }
        $this->display();
    }
    // 脑筋急转弯
    public function brain()
    {
        $this->display();
    }

    public function getbrain()
    {
        if ($_GET['keyword']) {
            require_once 'curl.func.php';
            
            $appkey = 'e322803774d1ff79'; // 你的appkey
            $keyword = $_GET['keyword']; // utf8
            $pagesize = 1;
            $pagenum = 1;
            $url = "http://api.jisuapi.com/jzw/search?appkey=$appkey&keyword=$keyword&pagesize=$pagesize&pagenum=$pagenum";
            $result = curlOpen($url);
            
            $jsonarr = json_decode($result, true);
            // exit(var_dump($jsonarr));
            
            if ($jsonarr['status'] != 0) {
                echo $jsonarr['msg'];
                exit();
            }
            
            $result = $jsonarr['result'];
            // echo $result['total'].' '.$result['pagesize'].' '.$result['pagenum'].'<br>';
            foreach ($result['list'] as $val) {
                echo $val['content'] . ' ' . $val['answer'] . '<br>' . '内容由校园行APP提供';
            }
            exit();
        } else {
            echo '网络忙!请稍后查询';
        }
    }
    
    // 笑话
    public function smile()
    {
        $this->display();
    }
    // 获取笑话内容
    public function getSmile()
    {
        require_once 'curl.func.php';
        
        $appkey = 'e322803774d1ff79'; // 你的appkey
        $pagenum = 1;
        $pagesize = 1;
        $sort = 'rand'; // addtime/rand
        $url = "http://api.jisuapi.com/xiaohua/text?pagenum=$pagenum&pagesize=$pagesize&sort=$sort&appkey=$appkey";
        $result = curlOpen($url);
        $jsonarr = json_decode($result, true);
        // exit(var_dump($jsonarr));
        if ($jsonarr['status'] != 0) {
            echo $jsonarr['msg'];
            exit();
        }
        $result = $jsonarr['result'];
        // echo $result['total'].' '.$result['pagesize'].' '.$result['pagenum'].'<br>';
        foreach ($result['list'] as $val) {
            echo $val['content'] . '.<br>.' . APP . '<br>';
        }
    }
    
    // 快递
    public function getRe()
    {
        $typeNu = $_GET["nu"]; // 快递单号
        
        header('Content-Type:text/html;charset=utf-8');
        require_once 'curl.func.php';
        
        $appid = '23465843'; // appid
        $appsecret = 'a02320951db3790421ffd4730a8a7cf4'; // appsecret
        
        $accept = "*/*";
        $contenttype = "";
        $contentmd5 = "";
        $headers = "User-Agent:Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; customie8)\n";
        $number = $typeNu; // 快递单号
        $type = 'auto'; // 快递公司
        $url = "/express/query?number=$number&type=$type";
        $content = "GET\n{$accept}\n{$contentmd5}\n{$contenttype}\n\n{$headers}{$url}";
        
        $cfg['header'][] = 'X-Ca-Key: ' . $appid;
        $cfg['header'][] = 'X-Ca-Signature: ' . $this->encrypt2($content, $appsecret);
        $cfg['header'][] = 'X-Ca-Signature-Headers: User-Agent';
        
        $result = curlOpen("http://jisukdcx.market.alicloudapi.com/$url", $cfg);
        $jsonarr = json_decode($result, true);
        
        if ($jsonarr['status'] != 0) {
            echo $jsonarr['msg'];
            exit();
        }
        
        $result = $jsonarr['result'];
        
        foreach ($result['list'] as $val) {
            echo $val['time'] . ' ' . $val['status'] . '<br />';
        }
        
        /*
         * 您在淘宝开放平台成功创建375911011_云市场9269800应用，您的Appkey 和 Appsecret如下：
         * App Key： 23465843
         * App Secret： a02320951db3790421ffd4730a8a7cf4
         */
    }

    function encrypt2($content, $secret)
    {
        return base64_encode(hash_hmac('sha256', $content, $secret, true));
    }
    // 智能机器人
    public function answer()
    {
        $this->display();
    }

    public function getanswer()
    {
        if ($_GET['keyword1']) {
            require_once 'curl.func.php';
            
            $appkey = 'e322803774d1ff79'; // 你的appkey
            $question = $_GET['keyword1']; // 问题(utf8)
            $url = "http://api.jisuapi.com/iqa/query?appkey=$appkey&question=$question";
            
            $result = curlOpen($url);
            $jsonarr = json_decode($result, true);
            // var_dump($jsonarr);
            if ($jsonarr['status'] != 0) {
                echo $jsonarr['msg'];
                exit();
            }
            $result = $jsonarr['result'];
            echo ' ' . $result['content'] . '<br>';
            die();
        } else {
            echo '网络忙!请稍后查询';
        }
    }
    
    // 高速公交
    public function bus()
    {
        $this->display();
    }

    public function getbus()
    {
        require_once 'curl.func.php';
        if ($_GET['start'] && $_GET['end']) {
            $appkey = 'e322803774d1ff79'; // 你的appkey
            $start = $_GET['start']; // utf8
            $end = $_GET['end']; // utf8
            $url = "http://api.jisuapi.com/bus/city2c?appkey=$appkey&start=$start&end=$end";
            $result = curlOpen($url);
            $jsonarr = json_decode($result, true);
            
            if ($jsonarr['status'] != 0) {
                echo $jsonarr['msg'];
                exit();
            }
            echo "<table style='font-size:8pt;'><tr><td>出发站</td><td>目的站</td><td>出发时间</td><td>票价</td></tr>";
            foreach ($jsonarr['result'] as $val) {
                echo "<tr>";
                
                echo "<td>" . $val['startstation'] . "</td><td>" . $val['endstation'] . "</td><td>" . $val['starttime'] . "</td><td >" . $val['price'] . "</td>";
                
                echo "</tr>";
            }
            echo "</table>";
            die();
        } else {
            echo '网络忙!请稍后查询';
        }
    }

    public function translate()
    {
        $this->display();
    }

    public function gettranslate()
    {
        if ($_GET['english']) {
            
            require_once 'curl.func.php';
            $text = $_GET['english'];
            $url = "http://fanyi.youdao.com/openapi.do?keyfrom=xiaoyuanxing&key=2030465042&type=data&doctype=json&version=1.1&q=$text";
            $result = curlOpen($url);
            $jsonarr = json_decode($result, true);
            
            foreach ($jsonarr['translation'] as $k => $v) {
                echo $v;
            }
            foreach ($jsonarr['basic']['explains'] as $k => $v) {
                echo $v;
            }
            echo '<br />' . '内容由校园行APP提供';
            
            die();
        } else {
            echo '网络繁忙或者输入错误.';
        }
    }
    
    // 天气
    public function weather()
    {
        $this->display();
    }

    public function getweather()
    {
        if ($_GET['keyword']) {
            require_once 'curl.func.php';
            
            $appkey = $this->appkey; // 你的appkey
            $city = $_GET['keyword']; // utf8
            $url = "http://api.jisuapi.com/weather/query?appkey=$appkey&city=$city";
            $result = curlOpen($url);
            $jsonarr = json_decode($result, true);
            
            if ($jsonarr['status'] != 0) {
                echo $jsonarr['msg'];
                exit();
            }
            // exit(print_r($jsonarr));
            $result = $jsonarr['result'];
            echo $result['city'] . '  ' . $result['date'] . ' ' . $result['week'] . ' ' . $result['weather'] . ' ' . $result['temp'] . '<br>';
            echo '风:' . $result['windpower'] . ' ' . $result['updatetime'] . '<br>';
            echo '指数：<br>';
            foreach ($result['index'] as $index) {
                echo $index['iname'] . ' ' . $index['ivalue'] . ' ' . $index['detail'] . '<br>';
            }
            
            echo '未来几天天气：<br>';
            foreach ($result['daily'] as $daily) {
                echo $daily['date'] . ' ' . $daily['week'] . ' ' . $daily['sunrise'] . ' ' . $daily['sunset'] . '<br>';
                echo $daily['night']['weather'] . ' ' . $daily['night']['templow'] . ' ' . $daily['night']['img'] . ' ' . $daily['night']['winddirect'] . ' ' . $daily['night']['windpower'] . '<br>';
                echo $daily['day']['weather'] . ' ' . $daily['day']['templow'] . ' ' . $daily['day']['img'] . ' ' . $daily['day']['winddirect'] . ' ' . $daily['day']['windpower'] . '<br>';
            }
            echo '未来几小时天气：<br>';
            foreach ($result['hourly'] as $hourly) {
                echo $hourly['time'] . ' ' . $hourly['weather'] . ' ' . $hourly['temp'] . ' ' . $hourly['img'] . '<br>';
            }
            echo '<br />' . '内容由校园行APP提供';
            exit();
        } else {
            echo '网络繁忙或者输入错误.';
        }
    }

    public function train()
    {
        $this->display();
    }

    public function gettrain()
    {
        if ($_GET['start'] && $_GET['end'] && $_GET['date']) {
            
            require_once 'curl.func.php';
            
            $appkey = $this->appkey; // 你的appkey
            $start = $_GET['start']; // utf8
            $end = $_GET['end']; // utf8
            $date = $_GET['date'];
            $url = "http://api.jisuapi.com/train/ticket?appkey=$appkey&start=$start&end=$end&date=$date";
            $result = curlOpen($url);
            $jsonarr = json_decode($result, true);
            // exit(var_dump($jsonarr));
            if ($jsonarr['status'] != 0) {
                echo $jsonarr['msg'];
                exit();
            }
            // dump($jsonarr['result']);
            
            foreach ($jsonarr['result'] as $val) {
                echo '车次:' . $val['trainno'] . ',车型:' . $val['type'] . ',始发站:' . $val['station'] . ',到达站:' . $val['endstation'] . '<br>' . '出发时间:' . $val['starttime'] . ',到达时间:' . $val['endtime'] . ',用时:' . $val['costtime'] . '<br />' . '硬座:' . $val['yz'] . ',软卧:' . $val['rw'] . ',硬卧:' . $val['yw'] . ',无座:' . $val['wz'] . '<hr />';
            }

            function gb2utf8($gbstr)
            {
                return iconv('gbk', 'utf-8//ignore', $gbstr);
            }
            echo '<br />' . '内容由校园行APP提供';
            exit();
        } else {
            echo '网络繁忙或者输入错误.';
        }
    }

    public function trainprice()
    {
        $this->display();
    }

    public function gettrainprice()
    {
        if ($_GET['start'] && $_GET['end']) {
            
            require_once 'curl.func.php';
            
            $appkey = $this->appkey; // 你的appkey
            $start = $_GET['start']; // utf8
            $end = $_GET['end']; // utf8
            $ishigh = $_GET['ishigh'];
            $url = "http://api.jisuapi.com/train/station2s?appkey=$appkey&start=$start&end=$end&ishigh=$ishigh";
            $result = curlOpen($url);
            $jsonarr = json_decode($result, true);
            // exit(var_dump($jsonarr));
            if ($jsonarr['status'] != 0) {
                echo $jsonarr['msg'];
                exit();
            }
            // print_r($jsonarr['result']);
            foreach ($jsonarr['result'] as $val) {
                echo '车次:' . $val['trainno'] . ',车型:' . $val['type'] . ',始发站:' . $val['station'] . ',到达站:' . $val['endstation'] . '<br>' . '出发时间:' . $val['departuretime'] . ',到达时间:' . $val['arrivaltime'] . ',用时:' . $val['costtime'] . '<br />' . '距离:' . $val['distance'] . ',硬座票价:' . $val['pricerz'] . ',软座票价:' . $val['priceyz'] . '<br />' . '一等座票价:' . $val['priceyd'] . '二等座票价:' . $val['priceed'] . '<hr />';
            }
            echo '<br />' . '内容由校园行APP提供';
            exit();
        } else {
            echo '网络繁忙或者输入错误.';
        }
    }
}