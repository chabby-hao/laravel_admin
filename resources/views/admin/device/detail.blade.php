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
                                    <input type="text" id="id" name="id" placeholder="设备号/IMEI/IMSI">
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
                                    <a class="btn btn-default" href="">123456789012</a>
                                    <a class="btn" href="">123456789012</a>
                                    <a class="btn" href="">123456789012</a>
                                    <a class="btn" href="">123456789012</a>
                                    <a class="btn" href="">123456789012</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>基本信息</h5>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>设备号</th>
                                <th>设备型号</th>
                                <th>IMEI</th>
                                <th>IMSI</th>
                                <th>固件版本</th>
                                <th>协议版本</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>订单号</th>
                                <th>订单日期</th>
                                <th>出货号</th>
                                <th>出货日期</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>激活日期</th>
                                <th>设备名称</th>
                                <th>管理员</th>
                                <th>关注者</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>设备信息</h5>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>设备状态</th>
                                <th>GSM信号</th>
                                <th>卫星数量</th>
                                <th>最近一次通信时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>上报时间</th>
                                <th>定位类型</th>
                                <th>经纬度</th>
                                <th>详细位置</th>
                                <th>标签</th>
                                <th>备用电池</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>车辆信息</h5>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>渠道</th>
                                <th>品牌</th>
                                <th>车型</th>
                                <th>车架号</th>
                                <th>电池规格</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>上报时间</th>
                                <th>电门状态</th>
                                <th>锁车状态</th>
                                <th>电瓶电压</th>
                                <th>剩余电量</th>
                                <th>备用电池</th>
                                <th>电瓶是否在位</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>


                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>控制器状态</th>
                                <th>转把状态</th>
                                <th>电机状态</th>
                                <th>电瓶状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                    </div>
                </div>


                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>用车信息</h5>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>预计续航</th>
                                <th>行驶里程</th>
                                <th>骑行次数</th>
                                <th>充电次数</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>最近用车</th>
                                <th>起点</th>
                                <th>终点</th>
                                <th>行驶里程</th>
                                <th>骑行时长</th>
                                <th>平均速度</th>
                                <th>使用电量</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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

