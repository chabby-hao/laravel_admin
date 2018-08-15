@extends('admin.layout')
@section('content')
    <div class="container-fluid">

        <div class="row-fluid margintop">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-search"></i> </span>
                        <h5>筛选查询</h5>
                    </div>
                    <div class="widget-content">
                        <form id="myform" class="form-search">
                            <div class="control-group">
                                <div class="inline-block">
                                    <label>输入搜索：</label>
                                </div>
                                <div class="inline-block">
                                    <input type="text" id="id" name="id" value="{{Request::input('id')}}" placeholder="设备号/IMEI/IMSI/手机号">
                                    <input type="text" id="name" name="name" placeholder="设备名称">
                                </div>

                                <div class="inline-block">
                                    <input type="button" id="mysubmit" class="btn btn-info" value="查询">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="inline-block">
                                    <label>最近查询：</label>
                                </div>
                                <div class="inline-block">
                                    @foreach($lastIds as $id)
                                        <a class="btn last">{{$id}}</a>
                                    @endforeach
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                @include('admin.device.common_detail')


            </div>

        </div>

    </div>

@endsection

