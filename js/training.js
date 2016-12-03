/**
 * 
 */
(function($){
	$(document).ready(function(){
		$("#btn1").click(function() {
			$(this).css("background-color","#336699");
			$("#btn2,#btn3,#btn4").css("background-color","");
			$("#word1").css("color","white");
			$("#word2,#word3,#word4").css("color","");
		});
		$("#btn2").click(function() {
			$(this).css("background-color","#336699");
			$("#btn1,#btn3,#btn4").css("background-color","");
			$("#word2").css("color","white");
			$("#word1,#word3,#word4").css("color","");
		});
		$("#btn3").click(function() {
			$(this).css("background-color","#336699");
			$("#btn2,#btn1,#btn4").css("background-color","");
			$("#word3").css("color","white");
			$("#word2,#word1,#word4").css("color","");
		});
		$("#btn4").click(function() {
			$(this).css("background-color","#336699");
			$("#btn2,#btn3,#btn1").css("background-color","");
			$("#word4").css("color","white");
			$("#word2,#word3,#word1").css("color","");
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
