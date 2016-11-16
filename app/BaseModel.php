<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class BaseModel extends Model
{
    //设定表模型的方法
    function M($table){
        return DB::table($table);
    }
    //获取记录数
    function getcount($model,$map){
        $result=$model->whereBetween($map[0],$map[1])->count();
        //dump($map);
        return $result;
    }
}
