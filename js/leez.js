$('#tab-title span').mouseover(function(){$(this).addClass("current").siblings().removeClass();$("."+$(this).attr("id")).show().siblings().hide()})
// Tip
$(document).ready(function(){
	$(".article .thumbnail a").aToolTip();
});