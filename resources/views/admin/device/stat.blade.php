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

	</div>

@endsection