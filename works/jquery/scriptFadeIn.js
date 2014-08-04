$(document).ready(function(){
	 $('#overlay').animate({
       opacity: 0.9,
     }, 1500, function() {
		var images = $('.imgFade');
		var i = 0;
			
		var fadeImages = function(image) {
			$(image).fadeIn("slow", function() {
				i++;
				if (images[i]) {
						fadeImages(images[i]);
				}
			});
		};
	    
		fadeImages(images[0]);   
	});

});
