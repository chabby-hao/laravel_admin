@extends('admin.layout')
@section('content')

    <div class="container-fluid">
		<div class="row-fluid car_info">
			<div class="span3">
				<h3>
					<span class="car_jrhy">750</span>
					<i class="arr_down"></i>
				</h3>
				<p>今日活跃(人)</p>
			</div>
			<div class="span3">
				<h3>
					<span class="car_cxcs">19,123</span>
					<i class="arr_up"></i>
				</h3>
				<p>出行次数(次)</p>
			</div>
			<div class="span3">
				<h3>
					<span class="car_cxpc">1.9</span>
					<i class="arr_down"></i>
				</h3>
				<p>出行频次(次)</p>
			</div>
			<div class="span3">
				<h3>
					<span class="car_cxjl">907,855</span>
					<i class="arr_up"></i>
				</h3>
				<p>出行距离(km)</p>
			</div>
		</div>
		<!-- 地图 -->
		<div class="map_box">
			<p class="map_title_lt">活跃车辆地理分布</p>					
       		<div class="map-box">
    				<div id="myMap"></div>    		
    			</div>				     
	    	<p class="map_title_lb">中国,东八区GTM+8</p>
		</div>
		<!-- 图表 -->
		<div class="row-fluid tb_box">
			<div class="span4">
				<p class="tb_title">车型分布</p>
				<div>
					<p class="tb_title_top"><span class="">5000</span><span>单位：辆</span></p>
	    			<div id="tb_carType"></div>
	    		</div>
			</div>
			<div class="span4">
				<p class="tb_title">七日活跃曲线图</p>
				<div class="">
					<p class="tb_title_top"><span>5000</span><span>2018</span></p>
	    			<div id="tb_sevenDay"></div>
	    		</div>
			</div>
			<div class="span4">
				<p class="tb_title">出行次数分布</p>
				<div class="">
					<p class="tb_title_top"><span></span><span>单位：次</span></p>
	    			<div id="tb_trip"></div>
	    		</div>
			</div>					
		</div>
		<!-- 信息展示 -->
			<div class="row-fluid info_box">
				<div class="search_box">
					<form id="" class="form-search">
                        <div class="control-group">                              
                            <div class="inline-block">
                                <input type="text" id="id" name="id" value="" placeholder="请输入设备号">
                                <input type="text" id="name" name="name" placeholder="请输入设备名称">
                            </div>

                            <div class="inline-block">
                                <button type="button" id="mysubmit" class="btn btn-info" ><span class="search_icon"></span>搜索</button>
                            </div>
                        </div>                    
                    </form>
				</div>

				@include('admin.device.common_detail')
			</div>

	</div>
	<!-- 地图 -->
	<script type="text/javascript" src="{{ asset('js/admin/echarts.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/map.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/legendCloudEye.js') }}"></script>
@endsection