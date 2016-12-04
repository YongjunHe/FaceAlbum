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

		        var myChart = echarts.init(document.getElementById('main1'));

		        // 指定图表的配置项和数据
		        var option = {
		            title: {
		                text: 'walk distance of this week'
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
		        myChart.setOption(option);
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
