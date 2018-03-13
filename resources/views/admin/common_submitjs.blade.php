<script>

    $(function () {


        var myform = $("#myform");

        $("#mysubmit").click(function () {
            myform.submit();
        });

        myform.ajaxForm({
            dataType: 'json',
            //beforeSubmit : test,//ajax动画加载
            success: function (data) {
                if (ajax_check_res(data)) {
                    //myalert('保存成功');
                }
            }
        });
    });

</script>