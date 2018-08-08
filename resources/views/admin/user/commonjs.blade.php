<script>
    var select_user_type = $("#user_type");
    select_user_type.change(function () {
        var user_type = $(this).val();
        if (user_type === '{{ \App\Models\BiUser::USER_TYPE_ALL }}') {
            $("#channel").hide();
            $("#brand").hide();
        } else if (user_type === '{{\App\Models\BiUser::USER_TYPE_CHANNEL}}') {
            $("#brand").hide();
            $("#channel").show();
        } else if (user_type === '{{\App\Models\BiUser::USER_TYPE_CUSTOMER}}') {
            $("#brand").show();
            $("#channel").show();
        }
    });
    if (select_user_type.val() === '{{\App\Models\BiUser::USER_TYPE_CHANNEL}}') {
        $("#channel").show();
        $("#brand").find("select[name='brand_id']").val('');
    } else if (select_user_type.val() === '{{\App\Models\BiUser::USER_TYPE_CUSTOMER}}') {
        $("#brand").show();
        $("#channel").show().find("select[name='channel_id']").val('');
    }
</script>