<script>

    $(function(){
        $(".del").click(function(){
            var btn = $(this);
            var id = btn.attr('data-id');
            if(confirm('确认删除吗？')){
                $.ajax({
                    url:'{{$url}}',
                    method:'post',
                    data:{id:id},
                    success:function(data){
                        if(ajax_check_res(data)){
                            btn.parents("tr").remove();
                        }
                    }
                })
            }
        });
    })

</script>