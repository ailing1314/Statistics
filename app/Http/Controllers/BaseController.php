<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use DB;
//接收点击信息
class BaseController extends Controller{
    private $prefix='he_';
    public function json_error($msg="失败",$callback=null)
    {
        $array = array('status' => 0, 'msg' => $msg, 'callback' => $callback);
        echo json_encode($array);
        die();

    }
    //增加数据
    public function add($model_name,$data){
        $colmunArray=array_keys($data);
        $columnString=implode(',',$colmunArray);
        $valueArray=array_values($data);
        $prefix=$this->prefix;
        $valueString=implode("','",$valueArray);
        $valueString="'".$valueString."'";
        //echo $valueString;
        DB::insert('insert into '.$prefix.$model_name.' ('.$columnString.') values ('.$valueString.')');
    }
}
?>