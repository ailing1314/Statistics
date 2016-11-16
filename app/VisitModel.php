<?php

namespace App;
use DB;
class VisitModel extends BaseModel
{
    protected $table = 'view';
    public function week_data(){
        global $now_unix;
        $this->now_unix=$now_unix;
        $now_unix=$this->now_unix;
        $now=time();
        $weekarray=array("日","一","二","三","四","五","六");

        for($i=0;$i<7;$i++){
            $time=$now-60*60*24*(6-$i);
            $reduce=$now_unix-(7-$i)*3600*24;
            $where='v_createtime between  '.$reduce.'   AND   '.($reduce+3600*24);
            $week[]='周'.$weekarray[date('w',$time)];
            $countPv=DB::select('select count(*) as count from he_view where '.$where);
            $countIp=DB::select('select  count(distinct v_ip) as count  from he_view where '.$where);
            $dataPv[]=$countPv[0]->count;
            $dataIp[]=$countIp[0]->count;
;
        }

        //exit;
        $result=array(
            'week'=>$week,
            'data_pv'=>$dataPv,
            'data_ip'=> $dataIp,

        );

        return $result;
    }
    //今日访问量
    public function todayVisit(){
        global $now_unix;
        $this->now_unix=$now_unix;
        $now_unix=$this->now_unix;

        $model=$this->M('view');
        $map=array(
                'v_createtime',
                array($now_unix-3600*24,$now_unix)
            );
        $countPv=$this->getcount($model,$map);
        $countIp=$model->distinct()->count('v_ip');
        $countAddress=$model->distinct()->count('v_address');
        $count=array(
            'count_pv'=>$countPv,
            'count_ip'=>$countIp,
            'count_address'=>$countAddress
        );
        return $count;
    }

    //首页显示最近一周访问情况
    public function latest_vist(){
        $model=$this->M('view');
        $data=$model->limit(10)->orderBy('v_createtime','desc')->get();
        return $data;
        // $count=$this->getcount($model,$map);
        // return $count; 
    }
    public function viewList($searchDate=""){
        if(!empty($_REQUEST['begin_date'])&&!empty($_REQUEST['end_date'])){
            $map=array(
                'v_show_time',
                array($_REQUEST['begin_date'].' 00:00:00',$_REQUEST['end_date'])
            );
        }else{
            $map=array(
                'v_show_time',
                array($searchDate['begin_date'],$searchDate['end_date'])
            );
        }
        $model=$this->M('view');
        $data=$model->orderBy('v_show_time','desc')->whereBetween($map[0],$map[1])->paginate(10);
        return $data;
    }
    //ip地址
    public function ipList($searchDate=""){
        if(!empty($_REQUEST['begin_date'])&&!empty($_REQUEST['end_date'])){
            $map=array(
                'v_show_time',
                array($_REQUEST['begin_date'].' 00:00:00',$_REQUEST['end_date'])
            );
        }else{
            $map=array(
                'v_show_time',
                array($searchDate['begin_date'],$searchDate['end_date'])
            );
        }
        $model=$this->M('view');
        $data=$model->select('*',DB::raw('COUNT(distinct v_ip) as ip_count'),DB::raw('COUNT(v_id) as id_count'),DB::raw('MAX(v_createtime) as createtime'))
                    ->groupBy('v_ip')
                    ->orderBy('v_createtime','desc')
                    ->whereBetween($map[0],$map[1])
                    ->paginate(10);
//        dump($data);
//die();
        return $data;
    }
}
