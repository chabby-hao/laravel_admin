@extends('admin.layout')
@section('content')
<style>
	/*8.24新增 应对整体优化*/
	@media(max-width: 480px) {
		#myiframe{width: 300%;}
	}
</style>
    <iframe name="myiframe" id="myiframe" src="{{URL::action('Admin\MapController@show')}}" width="100%" style="min-height: 300px" frameborder="0" scrolling="no">
        <p>你的浏览器不支持iframe标签</p>
    </iframe>

    <script>

        function changeFrameHeight(){
            var ifm= document.getElementById("myiframe");
            ifm.height=document.documentElement.clientHeight-80;
        }
        window.onresize=function(){ changeFrameHeight();}
        $(function(){changeFrameHeight();});

    </script>
@endsection