<script>
    var select_user_type = $("#user_type");
    select_user_type.change(function () {
        var user_type = $(this).val();
        if (user_type === '{{ \App\Models\BiUser::USER_TYPE_ALL }}') {
            $("#channel").hide();
            $("#customer").hide();
        } else if (user_type === '{{\App\Models\BiUser::USER_TYPE_CHANNEL}}') {
            $("#customer").hide();
            $("#channel").show();
        } else if (user_type === '{{\App\Models\BiUser::USER_TYPE_CUSTOMER}}') {
            $("#customer").show();
            $("#channel").show();
        }
    });
    if (select_user_type.val() === '{{\App\Models\BiUser::USER_TYPE_CHANNEL}}') {
        $("#channel").show();
        $("#customer").find("select[name='customer_id']").val('');
    } else if (select_user_type.val() === '{{\App\Models\BiUser::USER_TYPE_CUSTOMER}}') {
        $("#customer").show();
        if('{{Request::input('id')}}'){

        }else{
            $("#channel").show().find("select[name='channel_id']").val('');
        }
    }
</script>