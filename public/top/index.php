<?php
require_once 'function.php';
$last_time = date('Y-m-d H:i:s', filemtime($filename));
$html =  <<<EOF
<!DOCTYPE HTML>
<html>
<head>
    <title>使用排行榜 - SSSSR</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="bookmark" href="/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <noscript><link rel="stylesheet" href="/assets/css/noscript.css" /></noscript>
</head>
<style type="text/css">
    .main{
        text-align: center; /*让div内部文字居中*/
        border-radius: 20px;
        width: 80%;
        height: 100%;
        margin: auto;
        position: absolute;
        top: 20px;
        left: 0;
        right: 0;
        bottom: 0;
    }
</style>
<body>
<div class="main">
    <h1>使用排行榜</h1>
  <h4>本排行榜一小时更新一次</h4>
  <h4>最后更新：{$last_time}</h4>
<div class='table-wrapper'>
    <table>
        <tbody>
        <tr>
            <td>排名</td>
            <td>用户名</td>
            <td>等级</td>
            <td>已使用</td>
            <td>最后使用时间</td>
        </tr>
        {$txt}
        </tbody>
    </table>
</div>
        <div id="footer"><a href="javascript:history.go(-1);"><p class="copyright">返回上一页</p></a><p class="copyright">&copy;2015-2018 SSSSR</p></div>
</div>
</body>
</html>
EOF;
echo $html;
