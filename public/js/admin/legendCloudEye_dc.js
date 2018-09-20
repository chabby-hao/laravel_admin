$(function(){
	//乘法精度
    function accMul(arg1,arg2){ 
         var m=0,s1=arg1.toString(),s2=arg2.toString();  
         try{m+=s1.split(".")[1].length}catch(e){}  
         try{m+=s2.split(".")[1].length}catch(e){}  
         return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m)  
    };
    $('.mask').css({'display':'block'});
    //数据
   	$.ajax({
        type:"get",
        url:"/admin/battery/stat",
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
		    var p2num1 = new CountUp("p2-num1", 0, data.batteryQuantities, 0, 2.5, options);
		    var p2num2 = new CountUp("p2-num2", 0, data.chargeTimes, 0, 2.5, options);
		    p2num1.start();
		    p2num2.start();
			
			//电池状态分布柱状图
			var batteryData=data.batteryStateDistribution;
			var batzhuXd=[];   					//x轴name 
		    var batzhuYd=[];   					//value值
		    $.each(batteryData, function(i,result) {
		        batzhuXd.push(result.name);
		        batzhuYd.push(result.value);
		    });
			var charts1 = echarts.init(document.getElementById('tb_batStatus'));
		    var option = {      		        
		        grid: {
		        	width:'110%',
		        	top:'5%',
		            left: '-7.5%',
		            right: '5%',
		            bottom: '0%',
		            containLabel: true
		        },
		        tooltip: {
		            trigger: 'item',
		            showDelay: 0,
		            transitionDuration: 0.2,
		            formatter: function (params) { 
		                var zb=batteryData[params.dataIndex].zb;
		                zb=accMul(zb,100);
		                return batzhuXd[params.dataIndex]+': ' + batteryData[params.dataIndex].value + '<br/>' +'占比: '+zb+'%';              
		            }
		            
		        },
		        xAxis: {
		            data: batzhuXd,
		            axisLabel:{
		                interval:0,
		                textStyle: {
		                    color: '#7a7a7a',
		                    fontSize:12
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
		        		//max: 5000,
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
		                data: batzhuYd,
		                barWidth : 60,
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
		                        color: '#88b4dc'
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
		    charts1.setOption(option);
		    
			//剩余电量比例柱状图
			var residueData=data.remainElectricity;
			var reszhuXd=[];   					//x轴name 
		    var reszhuYd=[];   					//value值
		    $.each(residueData, function(i,result) {
		        reszhuXd.push(result.name);
		        reszhuYd.push(result.value);
		    });
		    var charts2 = echarts.init(document.getElementById('tb_residueBat'));
		    var option = {                      
		        grid: {
		            width:'110%',
		            top:'5%',
		            left: '-7%',
		            right: '5%',
		            bottom: '0%',
		            containLabel: true
		        },
		        tooltip: {
		            trigger: 'item',
		            showDelay: 0,
		            transitionDuration: 0.2,
		            formatter: function (params) { 
		                var zb=residueData[params.dataIndex].zb;
		                zb=accMul(zb,100);
		                return reszhuXd[params.dataIndex]+': ' + residueData[params.dataIndex].value + '<br/>' +'占比: '+zb+'%';              
		            }
		        },
		        xAxis: {
		            data: reszhuXd,
		            axisLabel:{
		                interval:0,
		                textStyle: {
		                    color: '#7a7a7a',
		                    fontSize:12
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
		                data: reszhuYd,
		                barWidth :40,
		                itemStyle: {
		                    normal: {
		                        label : {
		                            show : true,
		                            position:'top',
		                            textStyle: {
		                                fontSize: 14,
		                                color :'#6a6a6a'                                
		                            },
		                        },                       
		                        color: '#8bdae2'
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
		    charts2.setOption(option);
		   
		
			//使用时间分布柱状图
			var useData=data.batteryUsingTimeDistribution;
			var usezhuXd=[];   					//x轴name 
		    var usezhuYd=[];   					//value值
		    $.each(useData, function(i,result) {
		        usezhuXd.push(result.name);
		        usezhuYd.push(result.value);
		    });
		    var charts3 = echarts.init(document.getElementById('tb_useTime'));
		    var option = {                      
		        grid: {
		            width:'110%',
		            top:'5%',
		            left: '-7%',
		            right: '5%',
		            bottom: '0%',
		            containLabel: true
		        },
		        tooltip: {
		            trigger: 'item',
		            showDelay: 0,
		            transitionDuration: 0.2,
		            formatter: function (params) { 
		                var zb=useData[params.dataIndex].zb;
		                zb=accMul(zb,100);
		                return usezhuXd[params.dataIndex]+': ' + useData[params.dataIndex].value + '<br/>' +'占比: '+zb+'%';              
		            }
		        },
		        xAxis: {
		            data: usezhuXd,
		            axisLabel:{
		                interval:0,
		                textStyle: {
		                    color: '#7a7a7a',
		                    fontSize:12
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
		                data: usezhuYd,
		                barWidth :40,
		                itemStyle: {
		                    normal: {
		                        label : {
		                            show : true,
		                            position:'top',
		                            textStyle: {
		                                fontSize: 14,
		                                color :'#6a6a6a'                                
		                            },
		                        },                       
		                        color: '#8cc7e2'
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
		    charts3.setOption(option);
			
			window.onresize = function(){
		        setTimeout(charts1.resize(),100);
		        setTimeout(charts2.resize(),100);
		        setTimeout(charts3.resize(),100);
		    };
        
        },
        error:function(data){
            console.log(data.msg);
        }
    });

	

})












   








































