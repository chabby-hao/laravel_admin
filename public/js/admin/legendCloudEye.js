$(function(){
    //乘法精度
    function accMul(arg1,arg2)  
    {  
         var m=0,s1=arg1.toString(),s2=arg2.toString();  
         try{m+=s1.split(".")[1].length}catch(e){}  
         try{m+=s2.split(".")[1].length}catch(e){}  
         return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m)  
    };
 	$('.mask').css({'display':'block'});
	$.ajax({ 
       type:"get",
       url:"/admin/device/stat",
       async:true,
       dataType:'json',
       cache: false,
       data:{},
       success:function(data){
       		$('.mask').css({'display':'none'});
       		//数字滚动
		    var options = {
		      useEasing : true, 
		      useGrouping : true, 
		      separator : ',', 
		      decimal : '.', 
		      prefix : '', 
		      suffix : '' 
		    };
		    var p2num1 = new CountUp("p2-num1", 0, data.dailyActive, 0, 2.5, options);
		    var p2num2 = new CountUp("p2-num2", 0, data.travelTimes, 0, 2.5, options);
		    var p2num3 = new CountUp("p2-num3", 0, data.travelFrequency, 1, 2.5, options);
		    var p2num4 = new CountUp("p2-num4", 0, data.tripDistance, 1, 2.5, options);
		    p2num1.start();
		    p2num2.start();
		    p2num3.start();
		    p2num4.start();
			$('.car_info .arr_down').css({'display':'inline-block'});
			$('.car_info .arr_up').css({'display':'inline-block'});
		    // 地图
		    var mapData=data.activeGeographicalDistribution;
		    var myCharts5 = echarts.init(document.getElementById('myMap'));  
		    var option5 = {
		        title : {
		            x:'center'
		        },    
		        tooltip: {
		            trigger: 'item',
		            showDelay: 0,
		            transitionDuration: 0.2,           
		            formatter: function (params) {
		                var value = (params.value + '').split('.');
		                value = value[0].replace(/(\d{1,3})(?=(?:\d{3})+(?!\d))/g, '$1,');
		                var zb=params.data.zb;
		                zb=accMul(zb,100);
		                return params.name + '<br/>' + '活跃车辆: ' + value+ '<br/>' +'占比: '+zb+'%';
		            }
		        },
		        dataRange: {
		            orient:'horizontal',
		            x: 'left',
		            y: 'bottom',
		            splitList: [
		                {start: 700, end: 1000,label:'高',color: '#84b0d6'},
		                {start: 400, end: 700, label: '中高',color: '#7498b8'},
		                {start: 100, end: 400, label: '中',color: '#5c758b'},
		                {start: 50, end: 100, label: '中低', color: '#4b5d6e'},
		                {end: 50,label:'低',color: '#43515f'}
		            ],
		            color: ['#43515f', '#4b5d6e', '#5c758b', '#7498b8', '#84b0d6'],
		            textStyle: {
		                color: '#bfbfbf',         // 值域文字颜色
		            },
		        },
		        showLegendSymbol : true, 
		        roamController: {
		            show: true,
		            x: 'right',
		            mapTypeControl: {
		                'china': true
		            }
		        },
		        series : [
		            {
		                type: 'map',
		                mapType: 'china',
		                roam: false,
		                itemStyle: {
		                    normal: {
		                        borderColor:'#89b5db',
		                        color: '#ffce1f',
		                        areaColor:'#4c5459',
		                        label: {
		                            show: false
		                        }
		                    },
		                    emphasis:{
		                        label:{
		                            show:false
		                        }
		                    },               
		                },
		                data:mapData                
		            }
		        ]
		    };
		    myCharts5.setOption(option5);
		
		    //车型分布柱状图
		    var zhuData=data.vehicleDistribution;
		    var zhuXd=[];   //x轴name 
		    var zhuYd=[];   //value值
		    $.each(zhuData, function(i,result) {
		        zhuXd.push(result.name);
		        zhuYd.push(result.value);
		    });
		    var myCharts = echarts.init(document.getElementById('tb_carType'));
		    var option = {                      
		        grid: {
		            width:'110%',
		            top:'5%',
		            left: '-10%',
		            right: '5%',
		            bottom: '0%',
		            containLabel: true
		        },
		        tooltip: {
		            trigger: 'item',
		            showDelay: 0,
		            transitionDuration: 0.2,
		            formatter: function (params) { 
		                var zb=zhuData[params.dataIndex].zb;
		                zb=accMul(zb,100);
		                return '品牌: ' + zhuData[params.dataIndex].brand + '<br/>' + '车型: ' + zhuData[params.dataIndex].name+ '<br/>' +'占比: '+zb+'%';              
		            }
		        },
		        xAxis: {
		            data: zhuXd,
		            axisLabel:{
		                interval:0,
		                textStyle: {
		                    color: '#7a7a7a',
		                    fontSize:12,
		                },
		            },
		            axisLine: {
		                lineStyle: {
		                    type: 'solid',
		                    color: '#e3e3e3',
		                    width:'1'//坐标线的宽度
		                }
		            },
		            splitLine:{
		                show:false
		            },
		            axisTick:{
		                show:false
		            }
		        },
		        yAxis: {
		            // max: 5000,
		            splitNumber:10,                 
		            axisLabel : {
		                show:false
		            },                     
		            axisTick:{
		                show:false
		            },
		            axisLine:{
		                show:false
		            },
		            splitLine:{
		                show:true,
		                lineStyle: {   
		                    color: '#e7e7e7',
		                    width: 1,
		                    type: 'solid'
		                }
		            },
		        },
		        series: [
		            {
		                name: '',
		                type: 'bar',
		                data: zhuYd,
		                barWidth : 30,
		                itemStyle: {
		                    normal: {
		                        label : {
		                            show : true,
		                            position:'top',
		                            textStyle: {
		                                fontSize: 14,
		                                color :'#6a6a6a'                                
		                            }
		                        },                       
		                        color: function(params) {
		                            // build a color map as your need.
		                            var colorList = [
		                              '#e3ffff','#c5ffff','#b3edff','#a9e0ff','#8cb9e2'                             
		                            ];
		                            if(params.value>0&&params.value<=1000){
		                                return colorList[0];
		                            }else if(params.value>1000&&params.value<=3000){
		                                return colorList[1];
		                            }else if(params.value>3000&&params.value<=5000){
		                                return colorList[2];
		                            }else if(params.value>5000&&params.value<=7000){
		                                return colorList[3];
		                            }else if(params.value>7000){
		                                return colorList[4];
		                            }                            
		                        } 
		
		                   }                                
		                },
		                emphasis: {
		                    shadowBlur: 10,
		                    shadowOffsetX: 0,
		                    shadowColor: 'rgba(0, 0, 0, 0.8)'
		                }
		            }            
		        ],
		        
		    };
		    myCharts.setOption(option);
		
		    // 七日活跃折线图
		    var zheData=data.activeCurve;
		    var zheXd=[];   //x轴name 
		    var zheYd=[];   //value值
		    $.each(zheData, function(i,result) {
		        zheXd.push(result.name);
		        zheYd.push(result.value);
		    });
		    var myCharts2 = echarts.init(document.getElementById('tb_sevenDay'));
		    var option1 = {
		        grid: {
		            width:'110%',
		            top:'5%',
		            left: '-10%',
		            right: '5%',
		            bottom: '0%',
		            containLabel: true
		        },
		        tooltip: {
		            trigger: 'axis',
		            showDelay: 0,
		            transitionDuration: 0.2,
		            formatter: function (params) {               
		                var zb=zheData[params[0].dataIndex].zb;
		                zb=accMul(zb,100);
		                return '活跃车辆: ' + zheData[params[0].dataIndex].value+ '<br/>' +'活跃率: '+zb+'%';              
		            }
		        },                          
		        xAxis: {
		            data: zheXd,
		            axisLabel:{
		                interval:0,
		                textStyle: {
		                    color: '#7a7a7a',
		                    fontSize:16
		                }
		            },
		            axisLine: {
		                lineStyle: {
		                    type: 'solid',
		                    color: '#e3e3e3',
		                    width:'1'//坐标线的宽度
		                }
		            },
		            splitLine:{
		                show:false
		            },
		            axisTick:{
		                show:false
		            }
		        },
		        yAxis: {
		            
		            splitNumber:10,                 
		            axisLabel : {
		                show:false
		            },                     
		            axisTick:{
		                show:false
		            },
		            axisLine:{
		                show:false
		            },
		            splitLine:{
		                show:true,
		                lineStyle: {   
		                    color: '#e7e7e7',
		                    width: 1,
		                    type: 'solid'
		                }
		            },
		        },
		        series: [           
		            {
		                name:'',
		                type:'line',
		                symbol:false,
		                stack: '总量',
		                data: zheYd,
		                itemStyle: {
		                    normal: {
		                        color: '#5b9bd5',                                   
		                        lineStyle:{
		                            color: '#5b9bd5'
		                        }
		                    }
		                }
		            }
		        ],
		        label: {
		            normal: {
		                show: true,
		                position: 'top',
		                textStyle: {
		                    fontSize: 14,
		                    color :'#6a6a6a'                        
		                },                       
		            }
		        }
		    };
		    myCharts2.setOption(option1);
		
		
		    // 出行次数饼图
		
		    var bingData=data.tripFrequencyDistribution;
		    var myCharts4 = echarts.init(document.getElementById('tb_trip'));
		    var colors=['#6bc3dc','#ee5b3e','#b5b5b5','#faa046','#589fcc'];
		    var option4 = {
		        tooltip : {
		            trigger: 'item',
		            formatter: function (params) { 
		                var zb=bingData[params.dataIndex].zb;
		                zb=accMul(zb,100);
		                return '出行' + bingData[params.dataIndex].name  +'用户占比: '+zb+'%';              
		            }
		        },
		        legend: {
		            x : 'center',
		            y : 'bottom',
		            data:['0次','1次','2次','3次','3次以上'],
		            selectedMode:false,       
		        },      
		        calculable : true,
		        series : [  
		            {
		                name:'',
		                type:'pie',
		                radius : '55%',
		                center : ['50%', '40%'],
		                roseType : 'area',
		                itemStyle:{
		                    normal:{
		                        color:function(params){
		                            return colors[params.dataIndex];
		                        },
		                        label: {
		                            formatter: function(params){
		                                var zb=bingData[params.dataIndex].zb;
		                                zb=accMul(zb,100);
		                                return zb+'%'; 
		                            },
		                            textStyle: {
		                                fontSize:16,                       
		                            }
		                        },
		                    }
		                },
		                lableLine: {
		                    normal: {
		                        show: false
		                    },
		                    emphasis: {
		                        show: true
		                    }
		                },
		                data:bingData
		            }
		        ]
		    };
		    myCharts4.setOption(option4);
		    window.onresize = function(){
				setTimeout(function(){
					myCharts5.resize();
				},100);
				setTimeout(function(){
					myCharts.resize();
				},100);
				setTimeout(function(){
					myCharts2.resize();
				},100);
				setTimeout(function(){
					myCharts4.resize();
				},100);   
			};
     
       },
       error:function(){
           // console.log(msg);
       }
	});



});











	


	


    









