@extends('Home.Index.public')
@section('content')
    <script src="{{env('__SERVER_NAME__')}}{{env('__HJS__')}}visit_receive.js"></script>

<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">xxxx</h1>
            </div>
        </div><!--/.row-->
        
        <div class="copyrights">Collect from <a href="http://www.51bamin.com/" >东南大鱼</a></div>
        
        <div class="row">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget ">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <em class="glyphicon glyphicon-shopping-cart glyphicon-l"></em>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="text-muted">今日访问:<span class="badge" style="background:#30a5ff">{{$todayPv}}</span></div>
                            <div class="text-muted"><a href="{{url('home/vistlist')}}">查看访问列表</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-orange panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <em class="glyphicon glyphicon-comment glyphicon-l"></em>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="text-muted">今日ip：<span class="badge" style="background:#ffb53e">{{$todayIP}}</span></div>
                            <div class="text-muted"><a href="{{url('home/iplist')}}">查看ip列表</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-teal panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <em class="glyphicon glyphicon-user glyphicon-l"></em>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="text-muted">今日区域：<span class="badge" style="background:#1ebfae">{{$todayArea}}</span></div>
                            <div class="text-muted"><a href="{{url('home/arealist')}}">查看区域列表</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-red panel-widget">
                    <div class="row no-padding">
                        <div class="col-sm-3 col-lg-5 widget-left">
                            <em class="glyphicon glyphicon-stats glyphicon-l"></em>
                        </div>
                        <div class="col-sm-9 col-lg-7 widget-right">
                            <div class="text-muted">今日访客：<span class="badge" style="background:#f9243f">{{$todayVisit}}</span></div>
                            <div class="text-muted">今日访客数量</div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">最近一周访问图表</div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.row-->


                                
        <div class="row">

            
            <div class="col-md-12">

                                
            </div><!--/.col-->
        </div><!--/.row-->
<script type="text/javascript">
    var randomScalingFactor = function(){ return Math.round(Math.random()*1000)};
    //var week=["January","February","March","April","May","June","July"];
    var week='{{!! $week !!}}';
    var data_pv='{{!! $dataPv !!}}';
    var data_ip='{{!! $dataIP !!}}';
    week=eval(week);
    var lineChartData = {
            labels : week,
            datasets : [
                {
                    label: "My First dataset",
                    fillColor : "rgba(220,220,220,0.2)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(220,220,220,1)",
                    data : eval(data_pv)
                },
                {
                    label: "My Second dataset",
                    fillColor : "rgba(48, 164, 255, 0.2)",
                    strokeColor : "rgba(48, 164, 255, 1)",
                    pointColor : "rgba(48, 164, 255, 1)",
                    pointStrokeColor : "#fff",
                    pointHighlightFill : "#fff",
                    pointHighlightStroke : "rgba(48, 164, 255, 1)",
                    data : eval(data_ip)
                }
            ]

        }



window.onload = function(){
    var chart1 = document.getElementById("line-chart").getContext("2d");
    window.myLine = new Chart(chart1).Line(lineChartData, {
        responsive: true
    });


};
    //jacascript 数组与json的转换
    function transform(obj){
        var arr = [];
        for(var item in obj){
            arr.push(obj[item]);
        }
        console.log(arr);
        return arr;
    }
</script>
@endsection