<script>

    $(function () {

        if($("select[name='brand_id']").val()){
            getEbikeType();
        }

        function getEbikeType(){
            var brandId = $("select[name='brand_id']").val();
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
                                for (var i = 0; i < data.ebType.length; i++) {
                                    var eb = data['ebType'][i];
                                    var ebOption = $("<option value='" + eb.id + "'>" + eb.ebike_name + "</option>")
                                    if (eb.id == '{{Request::input('ebike_type_id')}}') {
                                        ebOption.attr({
                                            selected:true,
                                        })
                                    }
                                    ebOption.appendTo(ebSelect);
                                }
                            }
                        }
                    }
                })
            } else {
                $("select[name='ebike_type_id']").val('');
            }
        }

        $("select[name='brand_id']").on('change', function () {
            getEbikeType();
        });
    });

</script>