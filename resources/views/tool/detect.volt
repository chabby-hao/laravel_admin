<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>智能检测</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet"
          href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- 可选的Bootstrap主题文件（一般不用引入） -->
    <!--<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">-->

    <!--<link rel="stylesheet" href="http://v3.bootcss.com/assets/css/docs.min.css" />-->

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <style>
        .col-xs-1{
            padding-left: 0;
            padding-right: 0;
        }
        .col-xs-2{
            padding-left: 0;
            padding-right: 0;
        }
        .well{
            min-height: 150px;
            margin-bottom: 0;
        }
        .btn_check{
            width: 71px;
        }
    </style>

</head>

<body>
<div class="container-fluid">
    <div class="row show-grid">

        <div class="col-xs-2">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group">
                            <textarea style="margin: 0px; width: 71px; height: 87px;" type="text" class="form-control" disabled>请在输入框输入设备码</textarea>
                            <span class="input-group-btn">
                                <!--<button class="btn btn-default" disabled type="button">→</button>-->
                            </span>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-warning"><span style="font-size: 32px;">编号</span></li>
                            <li class="list-group-item list-group-item-warning">固件版本</li>
                            <li class="list-group-item list-group-item-warning">mcu版本</li>
                            <li class="list-group-item list-group-item-warning">是否在线</li>
                            <li class="list-group-item list-group-item-warning">电瓶状态</li>
                            <li class="list-group-item list-group-item-warning">GSM扫描</li>
                            <li class="list-group-item list-group-item-warning">GPS扫描</li>
                            <!--<li class="list-group-item list-group-item-warning">Wifi扫描</li>-->
                            <li class="list-group-item list-group-item-warning">电压扫描</li>
                            <li class="list-group-item list-group-item-warning">一线通扫描</li>
                            <li class="list-group-item list-group-item-warning">当前速度</li>
                            <li class="list-group-item list-group-item-warning">锁车检测</li>
                            <li class="list-group-item list-group-item-warning">单片机通讯</li>
                            <li class="list-group-item list-group-item-warning">扩展板类型</li>
                            <li class="list-group-item list-group-item-warning">扩展板状态</li>
                            <li class="list-group-item list-group-item-warning">imsi状态</li>
                            <li class="list-group-item list-group-item-warning active">总体检测</li>
                        </ul>
                    </div>
                </div>

        </div>

        <div id="1" class="col-xs-1 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 71px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
                            <span style="position:absolute; top:90px;" class="input-group-btn">
                                <button class="btn btn-default btn_check" type="button">检测</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <span class="list-group-item"><span style="font-size: 32px;">1</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcuversion">&nbsp</li>
                        <li class="list-group-item check">&nbsp</li>
                        <li class="list-group-item charge">&nbsp </li>
                        <li class="list-group-item gsm"> &nbsp</li>
                        <li class="list-group-item gps">&nbsp </li>
                        <!--<li class="list-group-item wifi">&nbsp </li>-->
                        <li class="list-group-item vok">&nbsp </li>
                        <li class="list-group-item zkt"> &nbsp</li>
                        <li class="list-group-item speed">&nbsp </li>
                        <li class="list-group-item lock"> &nbsp</li>
                        <li class="list-group-item mcu"> &nbsp</li>
                        <li class="list-group-item extern_device_type"> &nbsp</li>
                        <li class="list-group-item extern_device_status"> &nbsp</li>
                        <li class="list-group-item imsi"> &nbsp</li>
                        <li class="list-group-item total"> &nbsp</li>
                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>
        <div id="2" class="col-xs-1 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 71px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
                            <span style="position:absolute; top:90px;" class="input-group-btn">
                                <button class="btn btn-default btn_check" type="button">检测</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <span class="list-group-item"><span style="font-size: 32px;">2</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcuversion">&nbsp</li>
                        <li class="list-group-item check">&nbsp</li>
                        <li class="list-group-item charge">&nbsp </li>
                        <li class="list-group-item gsm"> &nbsp</li>
                        <li class="list-group-item gps">&nbsp </li>
                        <!--<li class="list-group-item wifi">&nbsp </li>-->
                        <li class="list-group-item vok">&nbsp </li>
                        <li class="list-group-item zkt"> &nbsp</li>
                        <li class="list-group-item speed">&nbsp </li>
                        <li class="list-group-item lock"> &nbsp</li>
                        <li class="list-group-item mcu"> &nbsp</li>
                        <li class="list-group-item extern_device_type"> &nbsp</li>
                        <li class="list-group-item extern_device_status"> &nbsp</li>
                        <li class="list-group-item imsi"> &nbsp</li>
                        <li class="list-group-item total"> &nbsp</li>
                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>
        <div id="3" class="col-xs-1 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 71px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
                            <span style="position:absolute; top:90px;" class="input-group-btn">
                                <button class="btn btn-default btn_check" type="button">检测</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <span class="list-group-item"><span style="font-size: 32px;">3</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcuversion">&nbsp</li>
                        <li class="list-group-item check">&nbsp</li>
                        <li class="list-group-item charge">&nbsp </li>
                        <li class="list-group-item gsm"> &nbsp</li>
                        <li class="list-group-item gps">&nbsp </li>
                        <!--<li class="list-group-item wifi">&nbsp </li>-->
                        <li class="list-group-item vok">&nbsp </li>
                        <li class="list-group-item zkt"> &nbsp</li>
                        <li class="list-group-item speed">&nbsp </li>
                        <li class="list-group-item lock"> &nbsp</li>
                        <li class="list-group-item mcu"> &nbsp</li>
                        <li class="list-group-item extern_device_type"> &nbsp</li>
                        <li class="list-group-item extern_device_status"> &nbsp</li>
                        <li class="list-group-item imsi"> &nbsp</li>
                        <li class="list-group-item total"> &nbsp</li>                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>
        <div id="4" class="col-xs-1 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 71px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
                            <span style="position:absolute; top:90px;" class="input-group-btn">
                                <button class="btn btn-default btn_check" type="button">检测</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <span class="list-group-item"><span style="font-size: 32px;">4</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcuversion">&nbsp</li>
                        <li class="list-group-item check">&nbsp</li>
                        <li class="list-group-item charge">&nbsp </li>
                        <li class="list-group-item gsm"> &nbsp</li>
                        <li class="list-group-item gps">&nbsp </li>
                        <!--<li class="list-group-item wifi">&nbsp </li>-->
                        <li class="list-group-item vok">&nbsp </li>
                        <li class="list-group-item zkt"> &nbsp</li>
                        <li class="list-group-item speed">&nbsp </li>
                        <li class="list-group-item lock"> &nbsp</li>
                        <li class="list-group-item mcu"> &nbsp</li>
                        <li class="list-group-item extern_device_type"> &nbsp</li>
                        <li class="list-group-item extern_device_status"> &nbsp</li>
                        <li class="list-group-item imsi"> &nbsp</li>
                        <li class="list-group-item total"> &nbsp</li>                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>
        <div id="5" class="col-xs-1 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 71px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
                            <span style="position:absolute; top:90px;" class="input-group-btn">
                                <button class="btn btn-default btn_check" type="button">检测</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <span class="list-group-item"><span style="font-size: 32px;">5</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcuversion">&nbsp</li>
                        <li class="list-group-item check">&nbsp</li>
                        <li class="list-group-item charge">&nbsp </li>
                        <li class="list-group-item gsm"> &nbsp</li>
                        <li class="list-group-item gps">&nbsp </li>
                        <!--<li class="list-group-item wifi">&nbsp </li>-->
                        <li class="list-group-item vok">&nbsp </li>
                        <li class="list-group-item zkt"> &nbsp</li>
                        <li class="list-group-item speed">&nbsp </li>
                        <li class="list-group-item lock"> &nbsp</li>
                        <li class="list-group-item mcu"> &nbsp</li>
                        <li class="list-group-item extern_device_type"> &nbsp</li>
                        <li class="list-group-item extern_device_status"> &nbsp</li>
                        <li class="list-group-item imsi"> &nbsp</li>
                        <li class="list-group-item total"> &nbsp</li>                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>
        <div id="6" class="col-xs-1 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 71px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
                            <span style="position:absolute; top:90px;" class="input-group-btn">
                                <button class="btn btn-default btn_check" type="button">检测</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <span class="list-group-item"><span style="font-size: 32px;">6</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcuversion">&nbsp</li>
                        <li class="list-group-item check">&nbsp</li>
                        <li class="list-group-item charge">&nbsp </li>
                        <li class="list-group-item gsm"> &nbsp</li>
                        <li class="list-group-item gps">&nbsp </li>
                        <!--<li class="list-group-item wifi">&nbsp </li>-->
                        <li class="list-group-item vok">&nbsp </li>
                        <li class="list-group-item zkt"> &nbsp</li>
                        <li class="list-group-item speed">&nbsp </li>
                        <li class="list-group-item lock"> &nbsp</li>
                        <li class="list-group-item mcu"> &nbsp</li>
                        <li class="list-group-item extern_device_type"> &nbsp</li>
                        <li class="list-group-item extern_device_status"> &nbsp</li>
                        <li class="list-group-item imsi"> &nbsp</li>
                        <li class="list-group-item total"> &nbsp</li>                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>
        <div id="7" class="col-xs-1 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 71px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
                            <span style="position:absolute; top:90px;" class="input-group-btn">
                                <button class="btn btn-default btn_check" type="button">检测</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <span class="list-group-item"><span style="font-size: 32px;">7</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcuversion">&nbsp</li>
                        <li class="list-group-item check">&nbsp</li>
                        <li class="list-group-item charge">&nbsp </li>
                        <li class="list-group-item gsm"> &nbsp</li>
                        <li class="list-group-item gps">&nbsp </li>
                        <!--<li class="list-group-item wifi">&nbsp </li>-->
                        <li class="list-group-item vok">&nbsp </li>
                        <li class="list-group-item zkt"> &nbsp</li>
                        <li class="list-group-item speed">&nbsp </li>
                        <li class="list-group-item lock"> &nbsp</li>
                        <li class="list-group-item mcu"> &nbsp</li>
                        <li class="list-group-item extern_device_type"> &nbsp</li>
                        <li class="list-group-item extern_device_status"> &nbsp</li>
                        <li class="list-group-item imsi"> &nbsp</li>
                        <li class="list-group-item total"> &nbsp</li>                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>
        <div id="8" class="col-xs-1 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 71px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
                            <span style="position:absolute; top:90px;" class="input-group-btn">
                                <button class="btn btn-default btn_check" type="button">检测</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <span class="list-group-item"><span style="font-size: 32px;">8</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcuversion">&nbsp</li>
                        <li class="list-group-item check">&nbsp</li>
                        <li class="list-group-item charge">&nbsp </li>
                        <li class="list-group-item gsm"> &nbsp</li>
                        <li class="list-group-item gps">&nbsp </li>
                        <!--<li class="list-group-item wifi">&nbsp </li>-->
                        <li class="list-group-item vok">&nbsp </li>
                        <li class="list-group-item zkt"> &nbsp</li>
                        <li class="list-group-item speed">&nbsp </li>
                        <li class="list-group-item lock"> &nbsp</li>
                        <li class="list-group-item mcu"> &nbsp</li>
                        <li class="list-group-item extern_device_type"> &nbsp</li>
                        <li class="list-group-item extern_device_status"> &nbsp</li>
                        <li class="list-group-item imsi"> &nbsp</li>
                        <li class="list-group-item total"> &nbsp</li>                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>
        <div id="9" class="col-xs-1 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 71px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
                            <span style="position:absolute; top:90px;" class="input-group-btn">
                                <button class="btn btn-default btn_check" type="button">检测</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <span class="list-group-item"><span style="font-size: 32px;">9</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcuversion">&nbsp</li>
                        <li class="list-group-item check">&nbsp</li>
                        <li class="list-group-item charge">&nbsp </li>
                        <li class="list-group-item gsm"> &nbsp</li>
                        <li class="list-group-item gps">&nbsp </li>
                        <!--<li class="list-group-item wifi">&nbsp </li>-->
                        <li class="list-group-item vok">&nbsp </li>
                        <li class="list-group-item zkt"> &nbsp</li>
                        <li class="list-group-item speed">&nbsp </li>
                        <li class="list-group-item lock"> &nbsp</li>
                        <li class="list-group-item mcu"> &nbsp</li>
                        <li class="list-group-item extern_device_type"> &nbsp</li>
                        <li class="list-group-item extern_device_status"> &nbsp</li>
                        <li class="list-group-item imsi"> &nbsp</li>
                        <li class="list-group-item total"> &nbsp</li>                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>
        <div id="10" class="col-xs-1 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 71px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
                            <span style="position:absolute; top:90px;" class="input-group-btn">
                                <button class="btn btn-default btn_check" type="button">检测</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <span class="list-group-item"><span style="font-size: 32px;">10</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcuversion">&nbsp</li>
                        <li class="list-group-item check">&nbsp</li>
                        <li class="list-group-item charge">&nbsp </li>
                        <li class="list-group-item gsm"> &nbsp</li>
                        <li class="list-group-item gps">&nbsp </li>
                        <!--<li class="list-group-item wifi">&nbsp </li>-->
                        <li class="list-group-item vok">&nbsp </li>
                        <li class="list-group-item zkt"> &nbsp</li>
                        <li class="list-group-item speed">&nbsp </li>
                        <li class="list-group-item lock"> &nbsp</li>
                        <li class="list-group-item mcu"> &nbsp</li>
                        <li class="list-group-item extern_device_type"> &nbsp</li>
                        <li class="list-group-item extern_device_status"> &nbsp</li>
                        <li class="list-group-item imsi"> &nbsp</li>
                        <li class="list-group-item total"> &nbsp</li>                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>


    </div>

</div>
</body>

</html>
<script>
    var wait = 800;
    var countdown = [];
    var interval = [];
    var timer = [];
    var checkInterval = [];

    var checkFunc = function(objBt, times){

        var inputObj = objBt.parents(".input_div").find(".input_imei");
        var imei = inputObj.val();
        imei = imei.trim();
        var colDiv = objBt.parents(".col_div");
        var check = colDiv.find(".check");
        var rom = colDiv.find(".rom");
        var mcuversion = colDiv.find(".mcuversion");
        var extern_device_type = colDiv.find(".extern_device_type");
        var extern_device_status = colDiv.find(".extern_device_status");
        if(imei){


            if(times){
                //定时开始
                var id = colDiv.attr("id");
                id = parseInt(id);
                //倒计时计时器http://imgsrc.baidu.com/image/c0%3Dshijue1%2C0%2C0%2C294%2C40/sign=88f908206d09c93d13ff06b4f75492a9/71cf3bc79f3df8dc90eecdbfc711728b461028c8.jpg
                //inputObj.attr("disabled", true);
                countdown[id] = wait;
                var t = function(){
                    if(countdown[id] <= 0) {
                        countdown[id] = 0;
                        //解除检测按钮的禁用状态
                        objBt.removeAttr('disabled').html('检测');
                    }
                    //$('#content .d-form .btn-detection').html(countdown + 's');
                    objBt.attr("disabled",true).html(countdown[id] + 's');
                    countdown[id]--;
                };
                t();
                timer[id] = setInterval(function () {
                    t()
                }, 1000);
            }

            //checking
            colDiv.find(".list-group").find("li").each(function(){
                checking($(this));
            });
            inputObj.attr("disabled", true);
            //ajax 请求发送检测命令
            $.ajax({
                type: 'post',
                url: '/support/check',
                data: {'udid': imei},
                jsonp: "jsonpCallback",//服务端用于接收callback调用的function名的参数
                dataType: 'jsonp',
                success: function (data) {

                    if(data.code === 200) {

                        //定时查看检测结果
                        result(inputObj,imei);
                        check.html('在线');
                        pass(check);
                        rom.html(data.rom);
                        pass(rom);
                        mcuversion.html(data.mcuversion);
                        pass(mcuversion);

                        //$('#content .total-result').removeClass('normal abnormal').addClass('unknown').find('.txt').html('正在检测');
                    } else {
                        //inputObj.attr("disabled", false);
//                        var alert_t = alert_template.replace(/\${content}/g, data.msg);
//                        $('body').append(alert_t);
//                        $('#content .details .result').html('');
                        if(data.code === 3022) {
                            check.html('离线').addClass('error');
                            fail(check);
                            rom.html(data.rom);
                            pass(rom);
                            mcuversion.html(data.mcuversion);
                            pass(mcuversion);
                            colDiv.find('.gsm, .vok, '+
                                '.gps , .zkt ,' +
                                ' .speed , .lock ,' +
                                ' .mcu , .charge ,.total,.extern_device_type,.extern_device_status').each(function(){
                                checking($(this));
                            });
                        } else {
                            //alert(data.msg);
                            colDiv.find('li').each(function(){
                                checking($(this));
                            });
                            check.html('从未上线').addClass('error');
                            if(data.code === 2001){
                                check.html('设备码错误');
                                rom.html('设备码错误');
                                fail(rom);
                            }
                            //rom.html("未知");
                            fail(check);
                        }


                        //定时开始
                        var id = colDiv.attr("id");
                        id = parseInt(id);
                        //重新发检测指令
                        checkInterval[id] = setTimeout(function () {
                            if(countdown[id] <= 0) {
                                //检测失败
                                //clearInterval(interval[id]);
                                clearInterval(checkInterval[id]);
                                clearInterval(timer[id]);
                                console.log('检测结果未知2');
                                colDiv.find('.gsm, .vok, '+
                                    '.gps , .zkt ,' +
                                    ' .speed , .lock ,' +
                                    ' .mcu , .charge ,.total,.extern_device_status,.extern_device_type,.imsi').each(function(){
                                    unkown($(this));
                                });
                                if(data.code === 500){
                                    rom.html('未知');
                                    unkown(rom);
                                }
                                //解除检测按钮的禁用状态
                                colDiv.find(".btn_check").removeAttr('disabled').html('检测');
                                /*$('#content .details .check .result').html('');
                                 $('#content .details .rom .result').html('');*/
                                //$('#content .total-result').removeClass('normal abnormal').addClass('unknown').find('.txt').html('电动车未知');

                                inputObj.attr("disabled", false);
                            } else {
                                checkFunc(objBt,false);
                            }
                        }, 5000);

                        //解除检测按钮的禁用状态
                        //objBt.removeAttr('disabled').html('检测');
                    }

                },
                error: function () {
                    //请求失败
                    inputObj.attr("disabled", false);
                    alert('请求失败，请检查网络重试');
                }
            });

        }else{
            alert('请输入完整imei号');
        }
    }

    $(".btn_check").click(function(){
        objBt = $(this);
        checkFunc(objBt, true);
    })

    //obj=inputObj
    var result = function(inputObj,imei){
        var colDiv = inputObj.parents(".col_div");
        //var imei = colDiv.find(".input_imei").val();
        var id = colDiv.attr("id");
        id = parseInt(id);

        var $charge = colDiv.find('.charge '),
            $gsm = colDiv.find('.gsm '),
            $vok = colDiv.find('.vok '),
            $gps = colDiv.find('.gps '),
            //$wifi = colDiv.find('.wifi '),
            $zkt = colDiv.find('.zkt '),
            $speed = colDiv.find('.speed '),
            $lock = colDiv.find('.lock '),
            $mcu = colDiv.find('.mcu '),
            $extern_device_type = colDiv.find(".extern_device_type");
            $extern_device_status = colDiv.find(".extern_device_status");
            $imsi = colDiv.find(".imsi");
            $total = colDiv.find(".total");

        if(imei){
            $.ajax({
                type: 'get',
                url: '/support/result',
                data: {'udid': imei},
                jsonp: "jsonpCallback",//服务端用于接收callback调用的function名的参数
                dataType: 'jsonp',
                success: function (data) {
                    if(data.status === 2) {
                        var r = data.result;
                        //console.log(r);

                        if(r.charge === 1){
                        }

                        if(r.charge === 1) {
                            $charge.html('连接');
                            pass($charge);
                        } else {
                            $charge.html('断开');
                            fail($charge);
                        }
                        if(r.gsm > 0) {
                            $gsm.html('(-' + r.gdbm + '/' + r.gsm + ')正常').removeClass('error');
                            pass($gsm);
                        } else {
                            $gsm.html('(-' + r.gdbm + '/' + r.gsm + ')异常').addClass('error');
                            fail($gsm);
                        }

                        $vok.html(r.vol + 'v');
                        if(r.vol){
                            pass($vok);
                        }else{
                            fail($vok);
                        }

                        if(r.gps > 0) {
                            $gps.html('(' + r.gps + '个)正常').removeClass('error');
                            pass($gps);
                        } else {
                            $gps.html('(' + r.gps + '个)异常').addClass('error');
                            fail($gps);
                        }
                        /*if(r.wifi > 0) {
                            $wifi.html('(' + r.wdbm + 'dbm/' + r.wifi + '个)正常').removeClass('error');
                            pass($wifi);
                        } else {
                            $wifi.html('(' + r.wdbm + 'dbm/' + r.wifi + '个)异常').addClass('error');
                            fail($wifi);
                        }*/
                        if(r.zkt === 1) {
                            $zkt.html('正常').removeClass('error');
                            pass($zkt)
                        } else {
                            $zkt.html('异常').addClass('error');
                            fail($zkt);
                        }
                        //$details.find('.speed .result').html(r.speed + 'km/h');
                        $speed.html(r.speed + 'km/h');
                        pass($speed);

                        if(r.lock === 1) {
                            $lock.html('已锁').addClass('error');
                            fail($lock);
                        } else {
                            $lock.html('解锁').removeClass('error');
                            pass($lock);
                        }
                        if(r.mcu === 1) {
                            $mcu.html('正常').removeClass('error');
                            pass($mcu);
                        } else {
                            $mcu.html('异常').addClass('error');
                            fail($mcu);
                        }

                        if(r.extern_device_type === 1){
                            if(r.extern_device_status === 1){
                                $extern_device_status.html("正常");
                                pass($extern_device_status);
                            }else{
                                $extern_device_status.html("异常");
                                fail($extern_device_status);
                            }
                            $extern_device_type.html('闪骑').removeClass("error");
                            //pass($extern_device_type);
                        }else{
                            $extern_device_type.html('无扩展板').addClass("error");
                            $extern_device_status.html("无扩展板");
                            //fail($extern_device_type);
                        }

                        if(r.imsi === 1){//正常
                            $imsi.html('正常').removeClass('error');
                            pass($imsi);
                        }else{
                            $imsi.html('异常').addClass('error');
                            fail($imsi);
                        }

                        //解除检测按钮的禁用状态
                        clearInterval(timer[id]);
                        colDiv.find('.btn_check').removeAttr('disabled').html('检测');
                        //$('#content .d-form .btn-detection').removeAttr('disabled').html('点击检测');
                        if(data.score === 0) {
                            unkown($total);
                            //$('#content .total-result').removeClass('normal abnormal').addClass('unknown').find('.txt').html('电动车未知');
                        } else if (data.score === 1) {
                            fail($total);
                            $total.html('fail');
                            //$('#content .total-result').removeClass('normal unknown').addClass('abnormal').find('.txt').html('电动车异常');
                        } else {
                            pass($total);
                            $total.html('pass');
                            //$('#content .total-result').removeClass('unknown abnormal').addClass('normal').find('.txt').html('电动车正常');
                        }
                        inputObj.attr("disabled", false);
                        return false;
                    } else {
                        interval[id] = setTimeout(function () {
                            if(countdown[id] <= 0) {
                                //检测失败
                                clearInterval(interval[id]);
                                console.log('检测结果未知');
                                colDiv.find('.gsm, .vok, '+
                                    '.gps , .zkt ,' +
                                    ' .speed , .lock ,' +
                                    ' .mcu , .charge ,.total,.extern_device_type,.extern_device_status,.imsi').each(function(){
                                        unkown($(this));
                                });
                                //解除检测按钮的禁用状态
                                colDiv.find(".btn_check").removeAttr('disabled').html('检测');
                                /*$('#content .details .check .result').html('');
                                $('#content .details .rom .result').html('');*/
                                //$('#content .total-result').removeClass('normal abnormal').addClass('unknown').find('.txt').html('电动车未知');
                                clearInterval(timer[id]);
                                inputObj.attr("disabled", false);
                            } else {
                                result(inputObj,imei);
                            }
                        }, 5000);
                    }
                },
                error: function(){
                    inputObj.attr("disabled", false);
                    alert('请求失败，请检查网络重试');
                }
            })
        }
    }

    //检测通过
    function pass(li) {
        li.removeClass('list-group-item-warning list-group-item-danger list-group-item-info').addClass('list-group-item-success');
    }

    //检测不通过
    function fail(li){
        li.removeClass('list-group-item-warning list-group-item-success list-group-item-info').addClass('list-group-item-danger');
    }

    //检测中
    function checking(li)
    {
        li.removeClass('list-group-item-danger list-group-item-success list-group-item-warning').addClass('list-group-item-info').html('<img width="18" src="http://detect.vipcare.com/img/loading.gif">');
    }

    //检测未知
    function unkown(li)
    {
        li.removeClass('list-group-item-danger list-group-item-success list-group-item-info').addClass('list-group-item-warning').html('未知');
    }

    //初始化
    function init(li)
    {
        li.removeClass('list-group-item-danger list-group-item-success list-group-item-info list-group-item-warning').html('&nbsp');
    }

    $(function(){
        var items=document.getElementsByClassName('input_imei');
        var item=null;
        for(var i=0;i<items.length;i++){
            item=items[i];
            (function () {
                var next=(i+1) < items.length ? i+1 : 0 ;
                item.onkeydown=function(event){
                    var eve=event ? event : window.event;
                    if(eve.keyCode==13){
                        items[next].focus();
                    }
                }
            })();
        }
        $("body").bind('keydown', function (e) {
            var key = e.which;
            if (key == 13) {
                e.preventDefault();
                if(document.activeElement.className.search(/input_imei/) < 0){
                    items[0].focus();
                }

            }

        });

        //检测地址栏自动获取焦点
        items[0].focus();
        //监听输入事件，输入到15位的时候自动检测
        $(items).on('input', function () {
            if($(this).val().trim().length === 15) {
                $(this).parents(".col_div").find('.btn_check').trigger('click');
            }
        });

    });

</script>