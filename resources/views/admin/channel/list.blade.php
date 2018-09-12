@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <hr>

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
                                <th>渠道id</th>
                                <th>渠道名</th>
                                <th>备注</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\BiChannel $data */ ?>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->id}}</td>
                                    <td>{{$data->channel_name}}</td>
                                    <td>{{$data->channel_remark}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{URL::action('Admin\ChannelController@channelSn',['id'=>$data->id])}}">工装号配置</a>
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