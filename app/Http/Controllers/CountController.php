<?php
namespace App\Http\Controllers;
use App\Providers\VisitModel;
class CountController extends BaseController{
    protected $searchDefaulteDat;

    public function __construct()
    {
        $this->searchDefaulteDat=array(
            'begin_date'=>date('Y-m-01', strtotime(date("Y-m-d"))),
            'end_date'=>date('Y-m-d', strtotime(date("Y-m-d"))),
        );
    }

    //首页
    public function any_index(){
        $week=array('星期一','星期二','星期三','星期四','星期五','星期六','星期日');
        $model= new \App\VisitModel();
        $week_data=$model->week_data();
        $today=$model->todayVisit();

        $array=array(
            'week'=>json_encode($week_data['week']),
            'dataPv'=>json_encode($week_data['data_pv']),
            'dataIP'=>json_encode($week_data['data_ip']),
            'todayPv'=> $today['count_pv'],
            'todayIP'=>$today['count_ip'],
            'todayArea'=>$today['count_address'],
            'todayVisit'=>10,
            //'lastest'=>$model->latest_vist(),
            'title'=>'首页'
        );
//        echo json_encode($week_data);
//        exit;
        return view('Home/Index/index',$array);
    }
    //查看列表页
    public function any_vistlist(){

       $searchDate=$this->searchDefaulteDat;

        $model= new \App\VisitModel();
        $list=$model->viewList($searchDate);
        $array=array(
            'list'=>$list,
            'search_date'=>$searchDate,
            'title'=>'访问列表'
        );
        return view('Home/Index/viewlist',$array);
    }
    //IP地址列表页
    public function any_iplist(){
        $searchDate=$this->searchDefaulteDat;

        $model= new \App\VisitModel();
        $list=$model->ipList($searchDate);
        $array=array(
            'list'=>$list,
            'search_date'=>$searchDate,
            'title'=>'访问列表'
        );

        return view('Home/Index/iplist',$array);
    }
    //IP地址列表页
    public function any_arealist(){
        $searchDate=$this->searchDefaulteDat;

        $model= new \App\VisitModel();
        $list=$model->ipList($searchDate);
        $array=array(
            'list'=>$list,
            'search_date'=>$searchDate,
            'title'=>'访问列表'
        );

        return view('Home/Index/arealist',$array);
    }

}
?>