@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <hr>

        <div class="row-fluid">
            <span class="pull-right"><a href="<?php echo \Illuminate\Support\Facades\URL::action('Admin\ToolController@fileAdd'); ?>" class="btn btn-success">添加新文件</a></span>
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
                                <th>文件名</th>
                                <th>文件类型</th>
                                <th>地址</th>
                                <th>上传时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\BiFile $data */ ?>
                                @foreach($datas as $data)
                                    <tr class="gradeX">
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->filename}}</td>
                                        <td>{{\App\Models\BiFile::getFileTypeMap()[$data->filetype]}}</td>
                                        <td><a href="{{$data->fileurl}}">{{$data->fileurl}}</a></td>
                                        <td>{{$data->created_at}}</td>
                                        <td>
                                            <button data-id="{{$data->id}}" class="btn btn-danger del">删除</button>
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
    @include('admin.common_deletejs',['url'=>URL::action('Admin\ToolController@fileDelete')])
@endsection