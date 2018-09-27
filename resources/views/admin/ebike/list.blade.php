@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <hr>

        <div class="row-fluid">
            <span class="pull-right"><a href="<?php echo \Illuminate\Support\Facades\URL::action('Admin\EbikeController@add'); ?>" class="btn btn-success">新增车型</a></span>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>车型列表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>车型id</th>
                                <th>所属客户</th>
                                <th>车型名称</th>
                                <th>备注</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\BiChannel $data */ ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->id}}</td>
                                    <td>{{$brandname}}</td>
                                    <td>{{$data->ebike_name}}</td>
                                    <td>{{$data->ebike_remark}}</td>
                                    <td>
                                        <a href="{{URL::action('Admin\EbikeController@edit',['id'=>$data->id])}}" class="btn btn-warning">编辑</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pager">
                        <?php echo $page_nav; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection