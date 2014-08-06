$(document).ready(function(){
	$("#enter").animate({ opacity: 1 },{ duration: 2000 });
	$('a').mouseover(function(){
		$('#enter').css("color","rgb(205,126,51)");
	});
	$('a').mouseleave(function(){
		$('#enter').css("color","gray");
	});
});
