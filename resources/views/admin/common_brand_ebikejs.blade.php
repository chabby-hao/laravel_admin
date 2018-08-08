<script>

    $(function () {

        var pselect = $("select[name='brand_id']");

        if(pselect.val()){
            getEbikeType();
        }

        function getEbikeType(){
            var brandId = pselect.val();
            var ebSelect = $("select[name='ebike_type_id']");
            ebSelect.html("<option value=''>请选择车型</option>");
            if (brandId) {
                $.ajax({
                    url: '{{URL::action('Admin\BrandController@detail')}}',
                    data: {id: brandId},
                    /*beforeSend: function () {

                    },*/
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
                ebSelect.val('');
            }
        }

        pselect.on('change', function () {
            getEbikeType();
        });
    });

</script>