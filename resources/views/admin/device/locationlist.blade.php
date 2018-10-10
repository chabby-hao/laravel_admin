@extends('admin.layout')
@section('content')

    <div class="container-fluid">
        <hr>

        <div class="row-fluid margintop">
            <form class="form-search">
                <input type="hidden" name="imei" value="{{Request::input('imei')}}">
                <div class="control-group">
                    <div class="inline-block w300">
                        <label for="">时间范围</label>
                        <div>
                            <input name="daterange" value="" class="w10 date" type="text">
                        </div>
                    </div>

                    <div class="inline-block w100">
                        <label>定位类型</label>
                        <div>
                            <select name="type" class="w10">
                                <option value="">请选择</option>
                                @foreach(\App\Objects\LocationObject::getLocationTypeMap() as $k => $v)
                                    <option @if(Request::input('type') == $k) selected @endif value="{{$k}}">{{$v}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="inline-block">
                        <div><input class="btn btn-info" type="submit" value="查询"></div>
                    </div>
                </div>
            </form>
        </div>

        <div class="row-fluid">
            <div class="span12">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"><i class="icon-map-marker"></i></span>
                        <h5>{{$udid}}的定位</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>上报时间</th>
                                <th>定位类型</th>
                                <th>经纬度</th>
                                <th>详细位置</th>
                                <th>标签</th>
                                <th>备用电池</th>
                                <th>GSM信号强度</th>
                                <th>电瓶是否在位</th>
                                <th>卫星数</th>
                                <th>定位精度</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($datas as $data)
                                <tr class="gradeX">
                                    <td>{{$data->datetime}}</td>
                                    <td>{{$data->location_type}}</td>
                                    <td><a href="{{URL::action('Admin\DeviceController@map',['lat'=>$data->lat,'lng'=>$data->lng])}}">{{$data->lat}},{{$data->lng}}</a></td>
                                    <td><a href="{{URL::action('Admin\DeviceController@map',['lat'=>$data->lat,'lng'=>$data->lng])}}">{{$data->address}}</a></td>
                                    <td>{{$data->landmark}}</td>
                                    <td>{{$data->battery}}</td>
                                    <td>{{$data->gsm}}</td>
                                    <td>{{$data->usb_trans}}</td>
                                    <td>{{$data->satCount}}</td>
                                    <td>{{$data->accuracy}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="pager">
                        <?php echo $page_nav ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.gDatepicker.datetimeRangePicker($(".date"),'{{$start}}','{{$end}}');
    </script>

    {{--    @include('admin.common_submitjs')--}}

@endsection