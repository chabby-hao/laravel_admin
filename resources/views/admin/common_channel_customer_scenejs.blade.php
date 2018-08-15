<script>

    //这里如果要优化的话，就再封装一下$(function(){})

    $(function () {

        var pselect = $("select[name='channel_id']");

        if(pselect.val() && !'{{Request::input('id')}}'){
            getCustomer();
        }

        function getCustomer(){
            var id = pselect.val();
            var select = $("select[name='customer_id']");
            select.html("<option value=''>请选择客户</option>");
            if (id) {
                $.ajax({
                    url: '{{URL::action('Admin\ChannelController@detail')}}',
                    data: {id: id},
                    /*beforeSend: function () {

                    },*/
                    success: function (data) {
                        if (ajax_check_res(data)) {
                            if (data.children) {
                                for (var i = 0; i < data.children.length; i++) {
                                    var eb = data['children'][i];
                                    var ebOption = $("<option value='" + eb.id + "'>" + eb.customer_name + "</option>")
                                    if (eb.id == '{{Request::input('customer_id')}}') {
                                        ebOption.attr({
                                            selected:true,
                                        })
                                    }
                                    ebOption.appendTo(select);
                                }
                            }
                        }
                    }
                })
            } else {
                select.val('');
            }
        }

        pselect.on('change', function () {
            getCustomer();
            var select = $("select[name='scene_id']");
            select.html("<option value=''>请选择场景</option>");
        });
    });

    $(function () {

        var pselect = $("select[name='customer_id']");

        if(pselect.val()){
            getCustomer();
        }

        if('{{Request::input('customer_id')}}'){
            getCustomer();
        }

        function getCustomer(){
            var id = pselect.val();
            var select = $("select[name='scene_id']");
            select.html("<option value=''>请选择场景</option>");
            if (id) {
                $.ajax({
                    url: '{{URL::action('Admin\CustomerController@detail')}}',
                    data: {id: id},
                    /*beforeSend: function () {

                    },*/
                    success: function (data) {
                        if (ajax_check_res(data)) {
                            if (data.children) {
                                for (var i = 0; i < data.children.length; i++) {
                                    var eb = data['children'][i];
                                    var ebOption = $("<option value='" + eb.id + "'>" + eb.scenes_name + "</option>")
                                    if (eb.id == '{{Request::input('scene_id')}}') {
                                        ebOption.attr({
                                            selected:true,
                                        })
                                    }
                                    ebOption.appendTo(select);
                                }
                            }
                        }
                    }
                })
            } else {
                select.val('');
            }
        }

        pselect.on('change', function () {
            getCustomer();
        });
    });

</script>