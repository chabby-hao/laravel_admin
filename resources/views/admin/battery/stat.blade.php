@extends('admin.layout')
@section('content')
<style>
	/*8.22新增 应对整体优化*/
	@media(max-width: 480px) {
		#content{overflow-x: visible;}
		#content-header{width: 100%;}
		.container-fluid{width: auto;}
	}
</style>
    <div class="container-fluid">

	</div>
	<!-- 地图 -->
	<script type="text/javascript" src="{{ asset('js/admin/echarts.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/map.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/legendCloudEye.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin//countUp.js') }}"></script>
@endsection