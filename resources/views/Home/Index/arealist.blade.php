@extends('Home.Index.public')
@section('content')


        <div class="copyrights">Collect from <a href="http://www.51bamin.com/" >东南大鱼</a></div>
        <div class="row">


            <div class="col-md-12">
                <div style="margin:10px 0px;">
                    <form action="">
                        根据条件筛选：
                        <label>起始日期：</label><input type="date" style="line-height:20px;" value="@if(empty($_REQUEST['begin_date'])){{$search_date['begin_date']}}@else{{$_REQUEST['begin_date']}}@endif" name="begin_date" />
                        <label>结束日期：</label><input type="date" style="line-height:20px;" value="{{$search_date['end_date']}}" name="end_date" />
                        <button type="submit" class="btn btn-primary" style="padding:3px 10px; font-size:12px">筛选查询</button>
                    </form>
                </div>

                <div class="panel panel-blue">
                    <div class="panel-heading dark-overlay"><span class="glyphicon glyphicon-check"></span>访问ip列表</div>
                    <div class="panel-body">
                        <ul class="todo-list">
                           <li class="todo-list-item">
                               <div class="pull-left col-md-3 text-center">归属区域</div>
                                <div class="pull-left col-md-2 text-center">该区IP数量</div>
                                <div class="pull-left col-md-2 text-center">点击次数</div>
                                <div class="pull-left col-md-3 text-center">最后访问时间</div>
                                <div class="pull-left col-md-2 text-center">查看访问明细</div>
                            </li>
                            @foreach($list as $last)
                            <li class="todo-list-item" style="height:auto;overflow:hidden;">
                                <div class="pull-left col-md-3 text-center">{{$last->v_address}}</div>
                                <div class="pull-left col-md-2 text-center">{{$last->ip_count}}</div>
                                <div class="pull-left col-md-2 text-center">{{$last->id_count}}</div>
                                <div class="pull-left col-md-3 text-center">{{date('Y-m-d H:i:s',$last->v_createtime)}}</div>
                                <div class="pull-left col-md-2 text-center"><a>查看</a></div>
                                @endforeach
                            </li>
                            <li><div class="fen_page">{{$list->render()}}</div></li>
                        </ul>

                    </div>
                    <!-- <div class="panel-footer">
                        <div class="input-group">
                            <input id="btn-input" type="text" class="form-control input-md" placeholder="Add new task" />
                            <span class="input-group-btn">
                                <button class="btn btn-primary btn-md" id="btn-todo">Add</button>
                            </span>
                        </div>
                    </div> -->
                </div>

            </div><!--/.col-->
        </div><!--/.row-->

@endsection