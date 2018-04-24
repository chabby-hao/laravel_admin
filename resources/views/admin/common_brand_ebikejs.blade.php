<script>

    $(function () {


        $("select[name='brand_id']").on('change', function () {
            var brandId = $(this).val();
            var ebSelect = $("select[name='ebike_type_id']");
            ebSelect.html("<option value=''>请选择车型</option>");
            if (brandId) {
                $.ajax({
                    url: '{{URL::action('Admin\BrandController@detail')}}',
                    data: {id: brandId},
                    beforeSend: function () {

                    },
                    success: function (data) {
                        if (ajax_check_res(data)) {
                            if (data.ebType) {
                                for (var i=0;i<data.ebType.length;i++) {
                                    var eb = data['ebType'][i];
                                    var ebOption = $("<option value='" + eb.id + "'>" + eb.ebike_name + "</option>")
                                    ebOption.appendTo(ebSelect);
                                }
                            }
                        }
                    }
                })
            } else {
                $("select[name='ebike_type_id']").val('');
            }
        });
    });

</script>