$(document).ready(function () {
  //var time = $('#month');
  var selectors = $('#selectBoxes');
  var news = $('#newsTitles');
  var text = $('#bodyArticle');
  
  $('#time').change(function () {
  
     // selectors.removeClass('error').html('<img src="images/ajax-loader.gif" height="16" width="16" /> Recherche des articles ...');
 
        $.ajax({
          url: 'controlers/loadArticles.php',
          data: 'action=load_article&time=' + this.value,
          dataType: 'json',
          type: 'post',
          success: function (j) {
            news.html(j.msg);
          }
        }).done(function() {
        	news.change(function () {
				$.ajax({
			        url: 'controlers/loadThisArticle.php',
			        data: 'action=load_article&id=' + this.value,
			        dataType: 'json',
			        type: 'post',
			        success: function (j) {
		            	text.html(j.msg);
		         	}
	       		});
			});
       });
    });
		
  });