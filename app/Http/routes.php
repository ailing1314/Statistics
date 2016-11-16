<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('test',['as'=>'hah',function(){
    $url = route('hah');
    $c=$this->current()->getName();
    echo $url;
    dump($c);
}]);

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//Route::get('home', function () {
//	$array=array('hello'=>'sdugkhweoihg');
//    return view('Home/Index/index',$array);
//});
$count_name=array(
    'any_iplist'=>'iplist',
    'any_index'=>'index',
    'any_vistlist'=>'viewlist',
    'any_arealist'=>'arealist',
);
Route::controller('home','CountController',$count_name);
$visit_route=array(
    'any_receive'=>'receive'
);
Route::controller('visit','VisitController',$visit_route);


