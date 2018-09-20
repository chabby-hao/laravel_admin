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
    <div class="container-fluid" style="background: #fff;">
		<div class="row-fluid bat_info">
			<div class="span4">
				<div class="bat_info_boxl">
					<div class="bat_icon_box"><img src="{{ asset('image/dc_icon1.png') }}" alt=""></div>
					<div class="bat_icon_boxr">
						<h3>
							<span class="bat_yxdc" id="p2-num1"></span>
							<i class="arr_down"></i>
						</h3>
						<p>运行电池数量(个)</p>
					</div>
				</div>
				<div class="bat_info_boxl">
					<div class="bat_icon_box"><img src="{{ asset('image/dc_icon2.png') }}" alt=""></div>
					<div class="bat_icon_boxr">
						<h3>
							<span class="bat_cdcs" id="p2-num2"></span>
							<i class="arr_up"></i>
						</h3>
						<p>充电次数(次)</p>
					</div>
				</div>	
			</div>
			<div class="span8 batStatus_box">
				<p class="tb_title">电池状态分布</p>
				<div>
					<!-- <p class="tb_title_top"><span class="">5000</span><span>单位：辆</span></p> -->
	    			<div id="tb_batStatus"></div>
	    		</div>
			</div>				
		</div>
		<!-- 图表 -->
		<div class="row-fluid tb_box bat_tb_box">
			<div class="span6">
				<p class="tb_title">剩余电量比例</p>
				<div>
					<p class="tb_title_top"><span class=""></span><span></span></p>
	    			<div id="tb_residueBat"></div>
	    		</div>
			</div>
			<div class="span6">
				<p class="tb_title">使用时间分布</p>
				<div class="">
					<p class="tb_title_top"><span></span><span></span></p>
	    			<div id="tb_useTime"></div>
	    		</div>
			</div>									
		</div>
		<!-- 信息展示 -->
		<div class="row-fluid info_box">
			<div class="search_box">
				<form id="myform" action="{{URL::action('Admin\DeviceController@detail')}}" class="form-search">
                    <div class="control-group">                              
                        <div class="inline-block">
                            <input type="text" id="id" name="id" value="" placeholder="请输入设备号/电池ID">
                        </div>

                        <div class="inline-block">
                            <button type="submit" id="mysubmit" class="btn btn-info" ><span class="search_icon"></span>搜索</button>
                        </div>
                    </div>                    
                </form>
			</div>

			{{--@include('admin.device.common_detail')--}}
		</div>
	</div>
	<!-- 地图 -->
	<script type="text/javascript" src="{{ asset('js/admin/echarts.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/map.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/legendCloudEye_dc.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/admin/countUp.js') }}"></script>
@endsection