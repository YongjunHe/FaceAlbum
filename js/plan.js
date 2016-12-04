/**
 * 
 */
(function($){
	$(document).ready(function(){
			$("button.btn").click(function() {
				var $planid = $(this).parent().parent("tr").children("td").eq(0).text();
				var $status=$(this).parent().parent("tr").children("td").eq(4).text();
				if($status=="delete"){
					$.ajax({
						url : $("#site_url").text()+"/Health/delete_plan",
						type : "POST",
						dataType : "json",
						data : {
							Message : $planid
						},
						success : function(Msg) {
							var result="";
							$.each(Msg,function(i,item){
								result+=item.result;
							})
							alert(result);
						},
						error : function() {
							alert("You have not this plan");
						}
					});
				}
				$(this).parent().parent("tr").children("td").eq(4).text($status);
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