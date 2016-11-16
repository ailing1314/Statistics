<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>流量统计</title>

<link href="{{env('__SERVER_NAME__')}}{{env('__HCSS__')}}bootstrap.min.css" rel="stylesheet">
<link href="{{env('__SERVER_NAME__')}}{{env('__HCSS__')}}datepicker3.css" rel="stylesheet">
<link href="{{env('__SERVER_NAME__')}}{{env('__HCSS__')}}styles.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="{{env('__SERVER_NAME__')}}{{env('__HJS__')}}html5shiv.js"></script>
<script src="{{env('__SERVER_NAME__')}}{{env('__HJS__')}}/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <!--<form role="search">-->
            <!--<div class="form-group">-->
                <!--<input type="text" class="form-control" placeholder="Search">-->
            <!--</div>-->
        <!--</form>-->
        <ul class="nav menu">
            <li @if(Route::currentRouteName()=='index') class="active" @endif><a href="{{url('home')}}"><span class="glyphicon glyphicon-dashboard"></span>首页</a></li>
            <li @if(Route::currentRouteName()=='viewlist') class="active" @endif><a href="{{url('home/vistlist')}}"><span class="glyphicon glyphicon-th"></span> 访问列表</a></li>
            <li @if(Route::currentRouteName()=='iplist') class="active" @endif><a href="{{url('home/iplist')}}"><span class="glyphicon glyphicon-stats"></span> ip列表</a></li>
            <li @if(Route::currentRouteName()=='arealist') class="active" @endif><a href="{{url('home/arealist')}}"><span class="glyphicon glyphicon-stats"></span> 区域列表</a></li>
            <li @if(Route::currentRouteName()=='arealist') class="active" @endif><a href="{{url('home/arealist')}}"><span class="glyphicon glyphicon-stats"></span> 第三方url</a></li>
            <li @if(Route::currentRouteName()=='arealist') class="active" @endif><a href="{{url('home/arealist')}}"><span class="glyphicon glyphicon-stats"></span> 区域地图</a></li>
            <li @if(Route::currentRouteName()=='arealist') class="active" @endif><a href="{{url('home/arealist')}}"><span class="glyphicon glyphicon-stats"></span> 访问统计</a></li>
        </ul>
        <div class="attribution">More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></div>
    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">{{$title}}</li>
            </ol>
        </div><!--/.row-->

        @yield('content')
    </div>  <!--/.main-->

    <script src="{{env('__SERVER_NAME__')}}{{env('__HJS__')}}jquery-1.11.1.min.js"></script>
    <script src="{{env('__SERVER_NAME__')}}{{env('__HJS__')}}bootstrap.min.js"></script>
    <script src="{{env('__SERVER_NAME__')}}{{env('__HJS__')}}chart.min.js"></script>
    <script src="{{env('__SERVER_NAME__')}}{{env('__HJS__')}}easypiechart.js"></script>
    <script src="{{env('__SERVER_NAME__')}}{{env('__HJS__')}}easypiechart-data.js"></script>
    <script src="{{env('__SERVER_NAME__')}}{{env('__HJS__')}}bootstrap-datepicker.js"></script>
    <script>
        // $('#calendar').datepicker({
        // });

        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){
                $(this).find('em:first').toggleClass("glyphicon-minus");
            });
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
        $(".fen_page a").click(function(){
            var url=$(this).attr('href');
            var num=url.indexOf("?");
            str=url.substr(num+1); //取得跳转页数
            var now=window.location.href;//获取当前url
            var num_dump=now.indexOf("?");
            var dump='';
            if( num_dump>0){
                if(now.indexOf("page=")>0){
                    dump=now.replace(/(page=\d)/, str);
                    //alert(now);
                    //alert(dump);
                }else{
                    dump=now+'&'+str;
                }

            }else{
                dump=now+'?'+str;
            }

            window.location.href=dump;
            return false;
        });
    </script>
</body>

</html>
