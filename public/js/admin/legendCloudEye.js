// 地图
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
                return params.seriesName + '<br/>' + params.name + ': ' + value;
            }
        },
		dataRange: {
			orient:'horizontal',
            x: 'left',
            y: 'bottom',
            splitList: [
                {start: 3000, end: 5000,label:'高',color: '#84b0d6'},
                {start: 2000, end: 3000, label: '中高',color: '#84b0d6'},
                {start: 1000, end: 2000, label: '中',color: '#5c758b'},
                {start: 100, end: 1000, label: '中低', color: '#4b5d6e'},
                {end: 100,label:'低',color: '#43515f'}
            ],
            color: ['#43515f', '#4b5d6e', '#5c758b', '#84b0d6', '#84b0d6'],
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
	            roam: true,
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
	            data:[	    
	            	{
	                    name:"南海诸岛",value:0,
	                    itemStyle:{
	                        normal:{opacity:0,label:{show:false}}
	                    }
	                },         
	                {name: '北京',value: 1000},
                    {name: '天津',value: 1200},
                    {name: '上海',value: 980},
                    {name: '重庆',value: 500},
                    {name: '河北',value: 300},
                    {name: '河南',value: 4500},
                    {name: '云南',value: 5},
                    {name: '辽宁',value: 305},
                    {name: '黑龙江',value: 320},
                    {name: '湖南',value: 200},
                    {name: '安徽',value: 1500},
                    {name: '山东',value: 1100},
                    {name: '新疆',value: 600},
                    {name: '江苏',value: 700},
                    {name: '浙江',value: 111},
                    {name: '江西',value: 98},
                    {name: '湖北',value: 222},
                    {name: '广西',value: 333},
                    {name: '甘肃',value: 555},
                    {name: '山西',value: 150},
                    {name: '内蒙古',value: 1003},
                    {name: '陕西',value:1400},
                    {name: '吉林',value: 800},
                    {name: '福建',value: 700},
                    {name: '贵州',value: 500},
                    {name: '广东',value: 450},
                    {name: '青海',value: 852},
                    {name: '西藏',value: 144},
                    {name: '四川',value: 564},
                    {name: '宁夏',value: 2000},
                    {name: '海南',value: 654},
                    {name: '台湾',value:545},
                    {name: '香港',value: 111},
                    {name: '澳门',value: 555}
	            ]
	        }
	    ]
	};
	myCharts5.setOption(option5);

	//车型分布柱状图
	var myCharts = echarts.init(document.getElementById('tb_carType'));
    var option = {      		        
        grid: {
        	width:'110%',
        	top:'0%',
            left: '-10%',
            right: '5%',
            bottom: '0%',
            containLabel: true
        },
        tooltip: {
            trigger: 'item',
            showDelay: 0,
            transitionDuration: 0.2,
            
        },
        xAxis: {
            data: ["雅迪","小鸟","小牛","爱玛","小刀","享骑"],
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
        	max: 5000,
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
                data: ['1000', '4500', '3000', '1500', '2100', '3400'],
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
                            }else if(params.value>1000&&params.value<=2000){
                            	return colorList[1];
                            }else if(params.value>2000&&params.value<=3000){
                            	return colorList[2];
                            }else if(params.value>3000&&params.value<=4000){
                            	return colorList[3];
                            }else if(params.value>4000&&params.value<=5000){
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
	var myCharts2 = echarts.init(document.getElementById('tb_sevenDay'));
    var option1 = {
        tooltip: {
            trigger: 'axis',
        },       
        grid: {
        	width:'110%',
        	top:'0%',
            left: '-10%',
            right: '5%',
            bottom: '0%',
            containLabel: true
        },            
        xAxis: {
            data: ["08.01","08.02","08.03","08.04","08.05","08.06"],
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
        	max: 5000,
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
                data: ['1000', '4500', '3000', '1500', '2100', '3400'],
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
    var myCharts4 = echarts.init(document.getElementById('tb_trip'));
    var i=0;
	var colors=['#6bc3dc','#ee5b3e','#b5b5b5','#faa046','#589fcc'];
    var option4 = {
	    tooltip : {
	        trigger: 'item',
	        formatter: "{b} : {c}%"
	    },
	    legend: {
	        x : 'center',
	        y : 'bottom',
	        data:['1次','2次','3次','4次','4次以上'],
	        selectedMode:false,	      
	    },	    
	    calculable : true,
	    series : [  
	        {
	            name:'',
	            type:'pie',
	            radius : [0, 110],
	            center : ['50%', '40%'],
	            roseType : 'area',
	            itemStyle:{
	            	normal:{
	            		color:function(){
                            return colors[i++];
                        },
                        label: {
                            formatter: '{c}%',
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
	            data:[
	                {value:10, name:'1次'},
	                {value:5, name:'2次'},
	                {value:15, name:'3次'},
	                {value:25, name:'4次'},
	                {value:20, name:'4次以上'},	                
	            ]
	        }
	    ]
	};
    myCharts4.setOption(option4);


