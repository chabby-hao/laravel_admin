@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <hr>

        <div class="row-fluid">
            <span class="pull-right"><a href="<?php echo \Illuminate\Support\Facades\URL::action('Admin\PermisController@add'); ?>" class="btn btn-success">新增权限</a></span>
        </div>

        <div class="row-fluid margintop">
            <form class="form-search">
                <div class="control-group">
                    <div class="controls controls-row">
                        <div class="inline-block">
                            <label for="daterange">时间范围</label>
                            <input name="date_range" id="daterange" type="text"/>
                        </div>

                        <div class="inline-block">
                            <input class="btn btn-success" id="btn-search" type="submit" value="确定"/>
                        </div>

                    </div>
                </div>
            </form>
        </div>

        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>列表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>角色名(英文)</th>
                                <th>角色展示名(中文)</th>
                                <th>角色描述</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php/** @var \App\Models\Role $data */?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->display_name}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->created_at}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{\Illuminate\Support\Facades\URL::action('Admin\PermisController@edit', ['id'=>$data->id])}}">编辑</a>
                                    </td>
                                    <!--                                        <td>-->
                                    <!--                                            <a href="" class="btn btn-info">设置</a>-->
                                    <!--<!--                                            <a href="javascript:;" class="btn btn-danger del">删除</a>-->
                                    <!--                                        </td>-->
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