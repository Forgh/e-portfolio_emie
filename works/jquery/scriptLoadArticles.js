function sendTime(time) {
  //var time = $('#month');
  var news = $('#newsTitles');
  
  if(time == "this_week") var margin = '16';
  else if(time == "this_month") var margin = '46';
  else if(time == "last_6_months") var margin = '77';
  else if(time == "this_year") var margin = '107';
  else if(time == "all") var margin = '138';
  
  		news.toggle("slide", "slow").animate({ opacity: 0 },{ queue: false, duration: 'slow' });

     // selectors.removeClass('error').html('<img src="images/ajax-loader.gif" height="16" width="16" /> Recherche des articles ...');
        $.ajax({
          url: 'controlers/loadArticles.php',
          data: 'action=load_articles&time=' + time,
          dataType: 'json',
          type: 'post',
          success: function (j) {
          	news.html(j.msg);
          }
        }).done(function () {
        	news.css("margin-top", margin+'px');
        	news.css("opacity", 0).toggle("slide", "slow").animate({ opacity: 1 },{ queue: false, duration: 'slow' });
        }).fail(function() {
			alert( "Erreur, si l'erreur se reproduit, merci de contacter le propriétaire du site. Code : AJ-SLA-F" );
		});
};
	


function sendTitle(id) {
		if(id != '') {
			var text = $('#bodyArticle');
			var title = $('#titleArticle');

					$.ajax({
				        url: 'controlers/loadThisArticle.php',
				        data: 'action=load_this_article&id=' + id,
				        dataType: 'json',
				        type: 'post',
				        success: function (j) {
				        	title.empty();
				        	text.empty();
				        	title.html(j.titre);
			            	text.html(j.texte);
			         	}
		       		}).fail(function() {
						alert( "Erreur, si l'erreur se reproduit, merci de contacter le propriétaire du site. Code : AJ-SLA-F2" );
		});;
		};
	};