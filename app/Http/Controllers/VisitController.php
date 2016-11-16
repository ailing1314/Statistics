<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PublicController;
use DB;
//接收点击信息
class VisitController extends BaseController{
	//首页
    function get_index(){
       if(!empty($_REQUEST)){
          dump($_REQUEST);
       }
        echo'';
    }
    function any_receive(){
       $n_url=@$_REQUEST['now_url'];
       $r_url=@$_REQUEST['come_url'];
        if (empty($n_url)){$this->json_error('无参数');}
        $ip = PublicController::getClientIp();
        $address=PublicController::getAddress($ip);
        $city=$address->{'content'}->{'address_detail'}->{'city'};
        $location=json_encode(array($address->{'content'}->{'point'}->{'x'},$address->{'content'}->{'point'}->{'y'}));
        $now=time();
        $data=array(
            'v_url'=>$n_url,
            'v_rurl'=>$r_url,
            'v_ip'=>$ip,
            'v_createtime'=>$now,
            'v_userid'=>session('uid')?session('uid'):0,
            'v_address'=>$address->{'content'}->{'address'},
            'v_city'=>mb_substr($city,0,mb_strlen($city,'utf-8')-1,'utf-8'),
            'v_location'=>$location,
            'v_show_time'=>date('Y-m-d H:i:s',$now)
        );

        $this->add('view',$data);

    }
}
?>