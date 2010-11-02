$(document).ready(function() {
	$.fn.hoverDelay = function(options){
		var defaults = {
			hoverDuring: 10,
			outDuring: 500,
			hoverEvent: function(){
				$.noop();
			},
			outEvent: function(){
				$.noop();    
			}
		};
		var sets = $.extend(defaults,options || {});
		var hoverTimer, outTimer, that = this;
		return $(this).each(function(){
			$(this).hover(function(){
				clearTimeout(outTimer);
				hoverTimer = setTimeout(function(){sets.hoverEvent.apply(that)}, sets.hoverDuring);
			},function(){
				clearTimeout(hoverTimer);
				outTimer = setTimeout(function(){sets.outEvent.apply(that)}, sets.outDuring);
			});    
		});
	}      

	// 出现 repley 按纽
	$(".comment").each(function() {
		var that = $(this);
		that.hoverDelay({
			hoverEvent: function(){
				$(".reply").hide();
				$(this).find(".reply").show();
			},
			outEvent: function() {
				$(this).find(".reply").hide();
			}
		});
	});

	// 404 页面添加
	var block404 = $(".block_404").length;
	if (block404) {
		$("body").addClass("has404");
	}
});
