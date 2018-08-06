<div id="box">

</div>

<script id="template" type="x-tmpl-mustache">

                <div class="widget-box">
                    <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>基本信息</h5>
                    </div>
                    <div class="widget-content">
                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>设备号</th>
                                <th>车型</th>
                                <th>IMEI</th>
                                <th>IMSI</th>
                                <th>固件版本</th>
                                <th>MCU版本</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><%udid%></td>
                                <td><%ebikeTypeName%></td>
                                <td><%imei%></td>
                                <td><%imsi%></td>
                                <td><%romVersion%></td>
                                <td><%mcu%></td>
                            </tr>
                            </tbody>
                        </table>

                        <%#shipOrder%>
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
                                <td><%order_no%></td>
                                <td><%order_created_at%></td>
                                <td><%ship_no%></td>
                                <td><%actuall_date%></td>
                            </tr>
                            </tbody>
                        </table>
                        <%/shipOrder%>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>激活日期</th>
                                <th>设备名称</th>
                                <th>管理员</th>
                                <th>姓名</th>
                                <th>性别</th>
                                <th>身份证号</th>
                                <th>关注者</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><%activeAt%></td>
                                <td><%name%></td>
                                <td><%master.phone%></td>
                                <td><%userConfig.realname%></td>
                                <td><%userConfig.sexTrans%></td>
                                <td><%userConfig.idcard%></td>
                                <td>
                                    <%#followers%>
                                        <%phone%>
                                    <%/followers%>
                                </td>
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
                                <th>卫星强度</th>
                                <th>卫星强度刷新时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><%isOnlineTrans%></td>
                                <td>-<%gsm%>db</td>
                                <td><%gpsSatCount%></td>
                                <td><a href='javascript:;' onclick='myalert("<%snr%>")'>点击查看</a></td>
                                <td><%snrTime%></td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>定位上报时间</th>
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
                                <td><%lastLocation.dateTime%></td>
                                <td><%lastLocation.type%></td>
                                <td><%#lastLocation.lng%>
                                    <a href="{{URL::action('Admin\DeviceController@map')}}?lng=<%lastLocation.lng%>&lat=<%lastLocation.lat%>"><%lastLocation.lng%>,<%lastLocation.lat%></a>
                                    <%/lastLocation.lng%></td>
                                <td><%lastLocation.address%></td>
                                <td><%lastLocation.landmark%></td>
                                <td><%chipPower%>%</td>
                                <td><a class="text-success" href="<%locationUrl%>">历史定位</a></td>
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
                                <th>车辆牌照</th>
                                <th>电池规格</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="gradeX">
                                <td><%channelName%></td>
                                <td><%brandName%></td>
                                <td><%ebikeTypeName%></td>
                                <td><%chassis%></td>
                                <td><%userConfig.lpn%></td>
                                <td><%batterySpecification%>v</td>
                            </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered data-table">
                            <thead>
                            <tr>
                                <th>状态上报时间</th>
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
                                <td><%lastContact%></td>
                                <td><%turnonTrans%></td>
                                <td><%isLockTrans%></td>
                                <td><%voltage%>v</td>
                                <td><%battery%>%</td>
                                <td><%chipPower%>%</td>
                                <td><%chargeTrans%></td>
                                <td>
                                    {{--<a class="text-success">电门日志</a>--}}
    <a href='<%lockLogUrl%>' class="text-success">锁车日志</a>
    <a href='<%historyStateUrl%>' class="text-success">历史状态</a>
</td>
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
<td><%faultControl%></td>
<td><%faultSwitch%></td>
<td><%faultMotor%></td>
<td><%faultCharge%></td>
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
<td><%expectMile%>km</td>
<td><%totalMiles%>km</td>
<td><%ridingTimes%>次</td>
<td><%chargingTimes%>次</td>
</tr>
</tbody>
</table>

<table class="table table-bordered data-table">
<thead>
<tr>
<th>最近用车</th>
{{--<th>起点</th>
                                <th>终点</th>--}}
    <th>行驶里程</th>
    <th>骑行时长</th>
    <th>平均速度</th>
    <th>使用电量</th>
    <th>操作</th>
</tr>
</thead>
<tbody>
<tr class="gradeX">
    <td><%lastTrip.dateTime%></td>
{{--<td><%lastTrip.addressBegin%></td>
                                <td><%lastTrip.addressEnd%></td>--}}
    <td><%lastTrip.mile%>公里</td>
    <td><%lastTrip.duration%>分钟</td>
    <td><%lastTrip.speed%>km/h</td>
    <td><%lastTrip.energy%>kw/h</td>
    <td>
        <a href='<%mileageUrl%>' class="text-success">历史行程</a>
    </td>
</tr>
</tbody>
</table>

</div>
</div>


{{--服务信息--}}
    <div class="widget-box">
        <div class="widget-title"><span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>服务信息</h5>
        </div>
        <div class="widget-content">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>SIM状态</th>
                    <th>SIM卡有效期</th>
                    <th>续费次数</th>
                    <th>服务状态</th>
                </tr>
                </thead>
                <tbody>
                <tr class="gradeX">
                    <td><%paymentInfo.sim_status%></td>
                    <td><%paymentInfo.daterange%></td>
                    <td><%paymentInfo.renew%></td>
                    <td><%paymentInfo.service_status%></td>
                </tr>
                </tbody>
            </table>

            <%#insureListHas%>
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>险种</th>
                    <th>有效期</th>
                    <th>获取途径</th>
                    <th>保单号</th>
                    <th>单号</th>
                </tr>
                </thead>
                <tbody>
                <%#insureList%>
                <tr class="gradeX">
                    <td><%insure_type_name%></td>
                    <td><%daterange%></td>
                    <td><%from%></td>
                    <td><%insure_id%></td>
                    <td><%order_id%></td>
                </tr>
                <%/insureList%>
                </tbody>
            </table>
            <%/insureListHas%>


{{--安全区域--}}
    <%#safeZoneListHas%>
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>安全区域</th>
            <th>范围</th>
            <th>设置时间</th>
        </tr>
        </thead>
        <tbody>
        <%#safeZoneList%>
        <tr class="gradeX">
            <td><%address%></td>
            <td><%radius%>米</td>
            <td><%date%></td>
        </tr>
        <%/safeZoneList%>
        </tbody>
    </table>
    <%/safeZoneListHas%>


    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>安全</th>
            <th>用车</th>
            <th>关怀</th>
            <th>故障</th>
        </tr>
        </thead>
        <tbody>
        <tr class="gradeX">
            <td><%caremsg.safe.0%></td>
            <td><%caremsg.inuse.0%></td>
            <td><%caremsg.care.0%></td>
            <td><%caremsg.fault.0%></td>
        </tr>
        <tr class="gradeX">
            <td><%caremsg.safe.1%></td>
            <td><%caremsg.inuse.1%></td>
            <td><%caremsg.care.1%></td>
            <td><%caremsg.fault.1%></td>
        </tr>
        <tr class="gradeX">
            <td><%caremsg.safe.2%></td>
            <td><%caremsg.inuse.2%></td>
            <td><%caremsg.care.2%></td>
            <td><%caremsg.fault.2%></td>
        </tr>
        <tr class="gradeX">
            <td><%caremsg.safe.3%></td>
            <td><%caremsg.inuse.3%></td>
            <td><%caremsg.care.3%></td>
            <td><%caremsg.fault.3%></td>
        </tr>
        </tbody>
    </table>

</div>
</div>









</script>

<script>

    $(function () {
        var template = $('#template').html();
        Mustache.parse(template);   // optional, speeds up future uses

        window.render = function (data) {
            console.log(data);
            var target = $("#box");
            var rendered = Mustache.render(template, data);
            target.html(rendered);
        }
    })


</script>