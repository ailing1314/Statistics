<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use DB;
//接收点击信息
class PublicController extends Controller{
    private $prefix='he_';
    //获取客户端ip地址
    static public function getClientIp($type = 0,$adv=false){
        $type       =  $type ? 1 : 0;
        static $ip  =   NULL;
        if ($ip !== NULL) return $ip[$type];
        if($adv){
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr    =   explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos    =   array_search('unknown',$arr);
                if(false !== $pos) unset($arr[$pos]);
                $ip     =   trim($arr[0]);
            }elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip     =   $_SERVER['HTTP_CLIENT_IP'];
            }elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip     =   $_SERVER['REMOTE_ADDR'];
            }
        }elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip     =   $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u",ip2long($ip));
        $ip   = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }
    static public function getAddress($ip){
        $content = file_get_contents("http://api.map.baidu.com/location/ip?ak=PTEkTqP3XIw0YFGaBSs9WvzN&ip=$ip&coor=bd09ll");
        $json = json_decode($content);
        return $json;
    }
}
?>