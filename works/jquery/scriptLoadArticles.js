$(document).ready(function () {
  //var time = $('#month');
  var selectors = $('#selectBoxes');
  var news = $('#newsTitles');
  
  $('#time').change(function () {

     // selectors.removeClass('error').html('<img src="images/ajax-loader.gif" height="16" width="16" /> Recherche des articles ...');
		var val = this.value;
        $.ajax({
          url: 'controlers/loadArticles.php',
          data: 'action=load_articles&time=' + val,
          dataType: 'json',
          type: 'post',
          success: function (j) {
          	news.html(j.msg);
          }
        }).fail(function() {
			alert( "Erreur, si l'erreur se reproduit, merci de contacter le propriétaire du site. Code : AJ-SLA-F" );
		});
	});
	


	

});

function sendTitle() {
		if($('#titles').val() != '') {
			var text = $('#bodyArticle');
			var title = $('#titleArticle');
			var id = $('#titles').val();
					$.ajax({
				        url: 'controlers/loadThisArticle.php',
				        data: 'action=load_this_article&id=' + id,
				        dataType: 'json',
				        type: 'post',
				        success: function (j) {
				        	title.html(j.titre);
			            	text.html(j.texte);
			         	}
		       		}).fail(function() {
						alert( "Erreur, si l'erreur se reproduit, merci de contacter le propriétaire du site. Code : AJ-SLA-F2" );
		});;
		};
	};