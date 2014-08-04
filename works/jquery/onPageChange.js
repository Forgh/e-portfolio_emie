function onPageChange (page) {
	if(page == "travaux") {
		$('#overlay').animate({
			opacity: 0,
		}, 500, function() {});
	}
	else {
		$("#corps").slideUp(500);
	}
};