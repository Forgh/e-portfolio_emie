		$(document).ready(function(){
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