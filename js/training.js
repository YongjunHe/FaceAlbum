/**
 * 
 */
(function($){
//	$(document).ready(function(){
//			$.ajax({
//				url : $("#site_url").text()+"/Training",
//				type : "POST",
//				dataType : "json",
//				data : {
//					Message : 1
//				},
//				success : function(Msg) {
//					var result="";
//					$.each(Msg,function(i,item){
//						result+=item.userid;
//					})
//					alert(result);
//				},
//				error : function() {
//					alert("ERROR");
//				}
//			});
//
//	});
	
	$(document).ready(function(){
		$.ajax({
			url : $("#site_url").text()+"/Training?userid=1",
			type : "GET",
			dataType : "json",
			success : function(Msg) {
	            array_x=[];
	            array_y1=[];
	            array_y2=[];
				$.each(Msg,function(i,item){
					array_x.push(item.date);
					array_y1.push(parseFloat(item.moveKm));
					array_y2.push(parseFloat(item.sleepHour));
				})

		        var myChart1 = echarts.init(document.getElementById('main1'));

		        // 指定图表的配置项和数据
		        var option1 = {
		            title: {
		                text: 'walk distance/sleep hour of this week'
		            },
		            tooltip: {},
		            legend: {
		                data:['KM','HOUR']
		            },
		            xAxis: {
		                data: array_x,
		            },
		            yAxis: {},
		            series: [{
		                name: 'KM',
		                type: 'bar',
		                data: array_y1,
		            		},{
		                name: 'HOUR',
		                type: 'bar',
		                data: array_y2,
		                    }]
		        };

		        // 使用刚指定的配置项和数据显示图表。
		        myChart1.setOption(option1);
		        
		        var myChart2 = echarts.init(document.getElementById('main2'));
		        
		        option2 = {
		        	    backgroundColor: '#2c343c',

		        	    title: {
		        	        text: 'sleep hour of this week',
		        	        left: 'center',
		        	        top: 20,
		        	        textStyle: {
		        	            color: '#ccc'
		        	        }
		        	    },

		        	    tooltip : {
		        	        trigger: 'item',
		        	        formatter: "{a} <br/>{b} : {c} ({d}%)"
		        	    },

		        	    visualMap: {
		        	        show: false,
		        	        min: 80,
		        	        max: 600,
		        	        inRange: {
		        	            colorLightness: [0, 1]
		        	        }
		        	    },
		        	    series : [
		        	        {
		        	            name:'HOUR',
		        	            type:'pie',
		        	            radius : '55%',
		        	            center: ['50%', '50%'],
		        	            data:[
		        	                {value:array_y2[0], name:array_x[0]},
		        	                {value:array_y2[1], name:array_x[1]},
		        	                {value:array_y2[2], name:array_x[2]},
		        	                {value:array_y2[3], name:array_x[3]},
		        	                {value:array_y2[4], name:array_x[4]},
		        	                {value:array_y2[5], name:array_x[5]},
		        	                {value:array_y2[6], name:array_x[6]},
		        	            ].sort(function (a, b) { return a.value - b.value}),
		        	            roseType: 'angle',
		        	            label: {
		        	                normal: {
		        	                    textStyle: {
		        	                        color: 'rgba(255, 255, 255, 0.3)'
		        	                    }
		        	                }
		        	            },
		        	            labelLine: {
		        	                normal: {
		        	                    lineStyle: {
		        	                        color: 'rgba(255, 255, 255, 0.3)'
		        	                    },
		        	                    smooth: 0.2,
		        	                    length: 10,
		        	                    length2: 20
		        	                }
		        	            },
		        	            itemStyle: {
		        	                normal: {
		        	                    color: '#c23531',
		        	                    shadowBlur: 200,
		        	                    shadowColor: 'rgba(255, 0, 0, 0.5)'
		        	                }
		        	            }
		        	        }
		        	    ]
		        	};
		        myChart2.setOption(option2);

		        
		        var myChart3 = echarts.init(document.getElementById('main3'));
		        option3 = {
		        	    title: {
		        	        text: 'walk distance of this week',
		        	        subtext: '纯属虚构',
		        	        left: 'left',
		        	        top: 'bottom'
		        	    },
		        	    tooltip: {
		        	        trigger: 'item',
		        	        formatter: "{a} <br/>{b} : {c}%"
		        	    },
		        	    toolbox: {
		        	        orient: 'vertical',
		        	        top: 'center',
		        	        feature: {
		        	            dataView: {readOnly: false},
		        	            restore: {},
		        	            saveAsImage: {}
		        	        }
		        	    },
		        	    legend: {
		        	        orient: 'vertical',
		        	        left: 'left',
		        	        data: array_x
		        	    },
		        	    calculable: true,
		        	    series: [
		        	        {
		        	            name: 'KM',
		        	            type: 'funnel',
		        	            width: '40%',
		        	            height: '45%',
		        	            left: '5%',
		        	            top: '50%',
		        	            data:[
			        	                {value:array_y1[0], name:array_x[0]},
			        	                {value:array_y1[1], name:array_x[1]},
			        	                {value:array_y1[2], name:array_x[2]},
			        	                {value:array_y1[3], name:array_x[3]},
			        	                {value:array_y1[4], name:array_x[4]},
			        	                {value:array_y1[5], name:array_x[5]},
			        	                {value:array_y1[6], name:array_x[6]},
		        	            ]
		        	        }
		        	    ]
		        	};
		        myChart3.setOption(option3);
			},
			error : function() {
				alert("ERROR");
			}
		});
	});	
	//固定tag
	$(document).ready(function(){
		// 指定的高度，侧边栏距顶部距离+侧边栏高度+可视页面的高度
		var sideTop = $("#sidebar").offset().top + $("#sidebar").height()
				+ $(window).height();
		var scTop = function() {
			if (typeof window.pageYOffset != 'undefined') {
				return window.pageYOffset;
			} else if (typeof document.compatMode != 'undefined'
					&& document.compatMode != 'BackCompat') {
				return document.documentElement.scrollTop
			} else if (typeof document.body != 'undefined') {
				return document.body.scrollTop;
			}
		}

		$(window)
				.scroll(
						function() {
							if (scTop() > sideTop) {
								if ($("#fixed-siderbar").length == 0) {
									// 下面是要显示的模块，复制侧边栏中的标签云内容，追加到侧边栏的底部
									var tag = $("#tag_cloud-2 .widget-wrap")
											.clone().html();
									var html = "<div id='fixed-siderbar'><div id='fixed-wrap'><div id='fixedTag' class='widget  widget_tag_cloud' >"
											+ tag + "</div></div></div>"
									$("#sidebar").append(html);
								} else {
									$("#fixed-siderbar").show();
								}
							} else {
								$("#fixed-siderbar").hide();
							}
							;
						});
	});
})(this.jQuery);
