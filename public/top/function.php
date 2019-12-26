<?php
/**
 * Created by PhpStorm.
 * Author: Administrator
 * Date: 2018/8/4 0004
 * Time: 下午 5:08
 */
require_once 'database.php';
$sql = "select * from user order by last_day_t desc limit 10";
$result = db()->query($sql);
$i = 1;
$life_time = 3600;
$filename = 'cache.php';
if(!file_exists($filename)){
    fopen($filename, "w");
}
if (filemtime($filename) + $life_time < time()){
    unlink($filename);
    while($row = $result->fetch_assoc())
    {
        $info[] =  "<tr><td>{$i}</td><td>{$row['user_name']}</td><td>VIP{$row['class']}</td><td>".getFilesize($row['last_day_t'])."</td><td>".date('Y-m-d H:i:s', $row['t'])."</tr>";
        $i++;
    }
    foreach ($info as $v){
        $t = fopen($filename, "a");
        fwrite($t, $v);
        fclose($t);
    }
    $txt = file_get_contents($filename);
}else{
    $txt = file_get_contents($filename);
}
function getFilesize($num){
    $p = 0;
    $format='bytes';
    if($num>0 && $num<1024){
        $p = 0;
        return number_format($num).' '.$format;
    }
    if($num>=1024 && $num<pow(1024, 2)){
        $p = 1;
        $format = 'KB';
    }
    if ($num>=pow(1024, 2) && $num<pow(1024, 3)) {
        $p = 2;
        $format = 'MB';
    }
    if ($num>=pow(1024, 3) && $num<pow(1024, 4)) {
        $p = 3;
        $format = 'GB';
    }
    if ($num>=pow(1024, 4) && $num<pow(1024, 5)) {
        $p = 3;
        $format = 'TB';
    }
    $num /= pow(1024, $p);
    return number_format($num, 3).' '.$format;
}