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

    <link rel="stylesheet"
          href="<?php echo asset('js/bootstrap-daterangepicker/daterangepicker.css') ?>">

    <script src="<?php echo asset('js/date/date.js') ?>"></script>
    <script src="<?php echo asset('js/bootstrap-daterangepicker/moment.min.js') ?>"></script>
    <script src="<?php echo asset('js/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
    <script src="<?php echo asset('js/common/g-datepicker.js') ?>"></script>

    <style>
        .col-xs-1 {
            padding-left: 0;
            padding-right: 0;
        }

        .col-xs-2 {
            padding-left: 0;
            padding-right: 0;
        }

        .well {
            min-height: 150px;
            margin-bottom: 0;
        }

        .btn_check {
            width: 71px;
        }

        /*.list-group li{
            !*overflow: scroll;*!
            !*min-height: 42px;*!
            padding: 0;
            word-wrap:break-word;
        }
        .myform label, .myform textarea .myform button{
            font-size: 30px;
            height:66px;
        }*/

    </style>

</head>

<body>
<div class="container-fluid">
    <div class="row show-grid">

        <div class="col-xs-2">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="list-group" style="margin-bottom: 0">

                            <input style="margin: 5px 0;margin-bottom: 20px; width: 100%; height: 45px;padding: 5px;" type="text" class="date">
                            <!--                            <textarea style="margin: 0px; width: 100px; height: 87px;" type="text" class="form-control" ></textarea>-->
                            <span class="input-group-btn text-center">
                                <button id="history" class="btn btn-info btn-large" type="button">导出检测记录</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-warning"><span style="font-size: 32px;">编号</span>
                        </li>
                        <li class="list-group-item list-group-item-warning">固件版本</li>
                        <li class="list-group-item list-group-item-warning">mcu版本</li>
                        <li class="list-group-item list-group-item-warning">锂电池通讯</li>
                        <li class="list-group-item list-group-item-warning">底板通讯</li>
                        <li class="list-group-item list-group-item-warning">GSM检测</li>
                        <li class="list-group-item list-group-item-warning">设备数据收发</li>
                        <li class="list-group-item list-group-item-warning">GPS定位</li>
                        <li class="list-group-item list-group-item-warning">电池电压检测</li>
                        <li class="list-group-item list-group-item-warning active">总体检测</li>
                    </ul>
                </div>
            </div>

        </div>


        <div class="box">


        </div>


    </div>

</div>
</body>

</html>
<script>

    var wait = 10;
    var countdown = [];
    var interval = [];
    var timer = [];
    var checkInterval = [];
    var checkTime = [];
    var costTime = [];

    var checkFunc = function (objBt, times) {

        var inputObj = objBt.parents(".input_div").find(".input_imei");
        var imei = inputObj.val();
        imei = imei.trim();
        var colDiv = objBt.parents(".col_div");
        var id = colDiv.attr("id");
        if (imei) {


            if (times) {
                //定时开始
                id = parseInt(id);
                //倒计时计时器http://imgsrc.baidu.com/image/c0%3Dshijue1%2C0%2C0%2C294%2C40/sign=88f908206d09c93d13ff06b4f75492a9/71cf3bc79f3df8dc90eecdbfc711728b461028c8.jpg
                //inputObj.attr("disabled", true);
                countdown[id] = wait;
                var t = function () {
                    countdown[id]--;
                    if (countdown[id] <= 0) {
                        countdown[id] = 0;
                        //解除检测按钮的禁用状态
                        objBt.removeAttr('disabled').html('检测');
                        inputObj.attr("disabled", false);
                        clearInterval(timer[id]);
                        return;
                    }
                    //$('#content .d-form .btn-detection').html(countdown + 's');
                    objBt.attr("disabled", true).html(countdown[id] + 's');
                };
                t();
                timer[id] = setInterval(function () {
                    t()
                }, 1000);
            }

            //checking
            colDiv.find(".list-group").find("li").each(function () {
                checking($(this));
            });
            inputObj.attr("disabled", true);
            //ajax 请求发送检测命令
            $.ajax({
                type: 'post',
                url: '<?php echo URL::action('Tool\CommandController@refreshGsm') ?>',
                data: {'imei': imei},
                //jsonp: "jsonpCallback",//服务端用于接收callback调用的function名的参数
                //dataType: 'jsonp',
                success: function (data) {


                    if (data.code === 200) {

                        checkTime[id] = data.data.time;

                        //定时查看检测结果
                        result(inputObj, imei);

//                        check.html('在线');
//                        pass(check);
//                        rom.html(data.rom);
//                        pass(rom);
//                        mcuversion.html(data.mcuversion);
//                        pass(mcuversion);

                        //$('#content .total-result').removeClass('normal abnormal').addClass('unknown').find('.txt').html('正在检测');
                    } else {


                        //不成功，重新法宗检测命令
                        id = parseInt(id);
                        //重新发检测指令
                        checkInterval[id] = setTimeout(function () {
                            if (countdown[id] <= 0) {
                                //检测失败
                                //clearInterval(interval[id]);
                                clearTimeout(checkInterval[id]);
                                clearInterval(timer[id]);
                                console.log('检测结果未知2');
                                colDiv.find('li').each(function () {
                                    unkown($(this));
                                });

                                //解除检测按钮的禁用状态
                                colDiv.find(".btn_check").removeAttr('disabled').html('检测');

                                inputObj.attr("disabled", false);
                            } else {
                                checkFunc(objBt, false);
                            }
                        }, 5000);

                    }

                },
                error: function () {
                    //请求失败
                    inputObj.attr("disabled", false);
                    alert('请求失败，请检查网络重试');
                }
            });

        } else {
            alert('请输入完整imei号');
        }
    }


    $(function () {
        $(".btn_check").click(function () {
            objBt = $(this);
            checkFunc(objBt, true);
        })
    });

    var rom = [];
    var mcu = [];
    var batConn = [];
    var gsm = [];
    var net = [];
    var gps = [];
    var vol = [];
    var myresult = [];
    var gps_text = [];
    var gsm_text = [];
    var vol_text = [];
    var imeis = [];

    function initData(i) {
        rom[i] = null;
        mcu[i] = null;
        batConn[i] = null;
        gsm[i] = null;
        net[i] = null;
        gps[i] = null;
        vol[i] = null;
        myresult[i] = null;
        gps_text[i] = null;
        gsm_text[i] = null;
        vol_text[i] = null;
        imeis[i] = null;

        var colDiv = $("#" + i);
        init(colDiv.find("li"));


        countdown[i] = 0;
        //解除检测按钮的禁用状态
        //var objBt = colDiv.find('.btn_check');
        //objBt.removeAttr('disabled').html('检测');

    }

    function changeColor(item, $val) {
        if ($val) {
            pass(item);
        } else {
            fail(item);
        }
    }

    function updateData(i) {

        costTime[i] = wait - countdown[i];

        var col_div = $('#' + i);

        myhtml(col_div.find('.rom'), rom[i]);
        pass(col_div.find('.rom'));

        myhtml(col_div.find('.mcu'), mcu[i] ? mcu[i] : '异常');
        changeColor(col_div.find('.mcu'), mcu[i]);

        myhtml(col_div.find('.batConn'), batConn[i] ? '正常' : '异常');
        changeColor(col_div.find('.batConn'), batConn[i]);
        myhtml(col_div.find('.gsm'), gsm_text[i] + (gsm[i] ? '正常' : '异常'));
        changeColor(col_div.find('.gsm'), gsm[i]);
        myhtml(col_div.find('.net'), net[i] ? '正常' : '异常');
        changeColor(col_div.find('.net'), net[i]);
        myhtml(col_div.find('.gps'), gps_text[i] + (gps[i] ? '正常' : '异常'));
        changeColor(col_div.find('.gps'), gps[i]);
        myhtml(col_div.find('.vol'), vol_text[i] + (vol[i] ? '正常' : '异常'));
        changeColor(col_div.find('.vol'), vol[i]);
        myhtml(col_div.find('.myresult'), myresult[i] ? '正常' : '异常');
        changeColor(col_div.find('.myresult'), myresult[i]);

        //上传测试结果日志
        uploadResult(i);

    }

    function uploadResult(i) {
        var data = {
            rom: rom[i],
            mcu: mcu[i],
            bat_conn: batConn[i],
            gsm: gsm[i],
            net: net[i],
            data_conn: net[i],
            gps: gps[i],
            vol: vol[i],
            result: myresult[i],
            gps_text: gps_text[i],
            gsm_text: gsm_text[i],
            vol_text: vol_text[i],
            check_time: checkTime[i],
            cost_time: costTime[i],
            imei: imeis[i],
        }
        $.ajax({
            url: '<?php echo URL::action('Tool\XinpuController@result') ?>',
            method: 'post',
            data: data,
            success: function (res) {
                console.log(res);
            }
        });
    }

    //obj=inputObj
    var result = function (inputObj, imei) {
        var colDiv = inputObj.parents(".col_div");
        //var imei = colDiv.find(".input_imei").val();
        var id = colDiv.attr("id");
        id = parseInt(id);

        if (imei) {
            $.ajax({
                type: 'get',
                url: '<?php echo URL::action('Tool\XinpuController@detect'); ?>',
                data: {'udid': imei, 'time': checkTime[id]},
                //jsonp: "jsonpCallback",//服务端用于接收callback调用的function名的参数
                //dataType: 'jsonp',
                success: function (data) {

                    console.log(data);

                    if (data.code !== 200) {
                        initData(id);
                        alert(data.msg);
                        return false;
                    }
                    data = data.data;

                    imeis[id] = imei;
                    rom[id] = data.rom;
                    mcu[id] = data.mcu;
                    batConn[id] = data.batConn;
                    gsm[id] = data.gsm;
                    net[id] = data.net;
                    gps[id] = data.gps;
                    vol[id] = data.vol;
                    myresult[id] = data.result;
                    gps_text[id] = data.gps_text;
                    gsm_text[id] = data.gsm_text;
                    vol_text[id] = data.vol_text;


                    if (data.result === 1) {
                        //成功
                        updateData(id);
                        //解除检测按钮的禁用状态
                        clearInterval(timer[id]);
                        colDiv.find('.btn_check').removeAttr('disabled').html('检测');
                        inputObj.attr("disabled", false);
                    } else {
                        //没成功,
                        interval[id] = setTimeout(function () {
                            if (countdown[id] <= 0) {
                                updateData(id);
                                //检测失败
                                clearTimeout(interval[id]);
                                console.log('检测结果超时');
                                colDiv.find('li').each(function () {
                                    fail($(this));
                                });
                                //解除检测按钮的禁用状态
                                /*$('#content .details .check .result').html('');
                                 $('#content .details .rom .result').html('');*/
                                //$('#content .total-result').removeClass('normal abnormal').addClass('unknown').find('.txt').html('电动车未知');
                                clearInterval(timer[id]);
                                colDiv.find(".btn_check").removeAttr('disabled').html('检测');
                                inputObj.attr("disabled", false);
                            } else {
                                result(inputObj, imei);
                            }
                        }, 3000);
                    }
                },
                error: function () {
                    inputObj.attr("disabled", false);
                    alert('请求失败，请检查网络重试');
                }
            })
        }
    }

    function clear(item) {
        item.find("li").html('&nbsp');
    }

    function loading(item) {
        checking(item.find("li"));
    }

    function success(item) {
        pass(item.find("li"));
    }

    function myhtml(item, content) {
        item.html(content).addClass('list-group-item-info');
    }

    //检测通过
    function pass(li) {
        li.removeClass('list-group-item-warning list-group-item-danger list-group-item-info').addClass('list-group-item-success');
    }

    //检测不通过
    function fail(li) {
        li.removeClass('list-group-item-warning list-group-item-success list-group-item-info').addClass('list-group-item-danger');
    }

    //检测中
    function checking(li) {
        li.removeClass('list-group-item-danger list-group-item-success list-group-item-warning').addClass('list-group-item-info').html('<img width="18" src="http://detect.vipcare.com/img/loading.gif">');
    }

    //检测未知
    function unkown(li) {
        li.removeClass('list-group-item-danger list-group-item-success list-group-item-info').addClass('list-group-item-warning').html('未知');
    }

    function beforeUpdate(li) {
        li.removeClass('list-group-item-danger');
    }

    //初始化
    function init(li) {
        li.removeClass('list-group-item-danger list-group-item-success list-group-item-info list-group-item-warning').html('&nbsp');
    }

    $(function () {
        var items = document.getElementsByClassName('input_imei');
        var item = null;
        for (var i = 0; i < items.length; i++) {
            item = items[i];
            (function () {
                var next = (i + 1) < items.length ? i + 1 : 0;
                item.onkeydown = function (event) {
                    var eve = event ? event : window.event;
                    if (eve.keyCode == 13) {
                        items[next].focus();
                    }
                }
            })();
        }
        $("body").bind('keydown', function (e) {
            var key = e.which;
            if (key == 13) {
                e.preventDefault();
                if (document.activeElement.className.search(/input_imei/) < 0) {
                    items[0].focus();
                }

            }

        });

        //检测地址栏自动获取焦点
        items[0].focus();
        //监听输入事件，输入到15位的时候自动检测
        $(items).on('input', function () {
            if ($(this).val().trim().length === 15) {
                $(this).parents(".col_div").find('.btn_check').trigger('click');
            }
        });

    });

</script>

<script src="https://cdn.bootcss.com/mustache.js/2.3.0/mustache.min.js"></script>

<script id="template" type="x-tmpl-mustache">
    {{#data}}
    <div id="{{id}}" class="col-xs-2 col_div">
            <div class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="input-group input_div">
                            <textarea style="margin: 0px; width: 150px; height: 87px;"  class="form-control input_imei" placeholder="--设备码--"></textarea>
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
                        <span class="list-group-item"><span style="font-size: 32px;">{{id}}</span></span>
                        <li class="list-group-item rom">&nbsp</li>
                        <li class="list-group-item mcu">&nbsp</li>
                        <li class="list-group-item batConn">&nbsp</li>
                        <li class="list-group-item net">&nbsp</li>
                        <li class="list-group-item gsm">&nbsp</li>
                        <li class="list-group-item net">&nbsp</li>
                        <li class="list-group-item gps"> &nbsp</li>
                        <li class="list-group-item vol">&nbsp </li>
                        <li class="list-group-item myresult">&nbsp </li>
                        <!--<li class="list-group-item list-group-item-info"><img width="18" src="http://detect.vipcare.com/img/loading.gif"></li>
                        <li class="list-group-item list-group-item-success">pass</li>
                        <li class="list-group-item list-group-item-danger">fail</li>-->
                    </ul>
                </div>
            </div>

        </div>
    {{/data}}









</script>

<script>
    var template = $('#template').html();
    Mustache.parse(template);   // optional, speeds up future uses
    var target = $(".box");
    var config = {
        data: [
            {id: 1},
            {id: 2},
            {id: 3},
            {id: 4},
            {id: 5},
        ]
    };
    var rendered = Mustache.render(template, config);
    target.html(rendered);

    console.log(window.gDatepicker);
    window.gDatepicker.dateRangePicker($(".date"));

    $(function () {
        $("#history").click(function () {
            var date = $(".date").val();
            location.href = '<?php echo URL::action('Tool\XinpuController@result') ?>' + '?date=' + date;
        });
    })

</script>