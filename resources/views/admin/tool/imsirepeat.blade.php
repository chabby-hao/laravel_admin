@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-search"></i> </span>
                        <h5>筛选查询</h5>
                    </div>
                    <div class="widget-content">
                        <form  method="get" class="form-search">
                            <div class="control-group">
                                <div class="inline-block w10">
                                    <div class="inline-block">
                                        <label>请输入:</label>
                                        <input class="w6" placeholder="IMEI/IMSI" type="text" id="id" name="id" value="{{Request::input('id')}}" >
                                    </div>


                                    <input type="submit" class="btn btn-success search" value="查询">

                                </div>

                            </div>

                        </form>
                    </div>
                </div>

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-th"></i></span>
                        <h5>列表</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>IMEI</th>
                                <th>IMSI</th>
                                <th>入库时间</th>
                                <th>第一次通讯时间</th>
                                <th>最后一次通讯时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /** @var \App\Models\TDeviceCode $data */ ?>
                            @foreach($datas as $data)
                                <tr>
                                    <td>{{$data->imei}}</td>
                                    <td>{{$data->imsi}}</td>
                                    <td>{{$data->register->toDateTimeString()}}</td>
                                    <td>{{\Illuminate\Support\Carbon::createFromTimestamp($data->first)->toDateTimeString()}}</td>
                                    <td>{{max(\App\Logics\DeviceLogic::getLastGps($data->imei), \App\Logics\DeviceLogic::getLastContact($data->imei))}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    @include('admin.common_submitjs')
@endsection

