$(function(){

    var dropbox = $('#dropbox'),
        message = $('.message', dropbox);

    dropbox.filedrop({
        // The name of the $_FILES entry:
        paramname:'pic',

        maxfiles: 20,
    	maxfilesize: 2, // in mb
        url: 'post_file_image.php',

        uploadFinished:function(i,file,response){
            $.data(file).addClass('done');
            // response is the JSON object that post_file.php returns
        },

    	error: function(err, file) {
            switch(err) {
                case 'BrowserNotSupported':
                    showMessage('Votre navigateur se supporte pas l\'envoi de fichier en HTML 5 !');
                    break;
                case 'TooManyFiles':
                    alert('Limite de fichiers atteinte ! Veuillez n\'en mettre que 20 (en comptant la preview) au maximum !');
                    break;
                case 'FileTooLarge':
                    alert(file.name+' est trop lourd ! Veuillez ne déposer que des fichiers inférieur à 2 mo.');
                    break;
                default:
                    break;
            }
        },

        // Called before each upload is started
        beforeEach: function(file){
            if(!file.type.match(/^image\//)){
                alert('Seules les images sont autorisées.');

                // Returning false will cause the
                // file to be rejected
                return false;
            }
        },

        uploadStarted:function(i, file, len){
            createImage(file);
        },

        progressUpdated: function(i, file, progress) {
            $.data(file).find('.progress').width(progress);
        }

    });

 var template = '<div class="preview">'+
                        '<span class="imageHolder">'+
                            '<img />'+
                            '<span class="uploaded"></span>'+
                        '</span>'+
                        '<div class="progressHolder">'+
                            '<div class="progress"></div>'+
                        '</div>'+
						'<div id="descandname">'+
							'<textarea class="description" name="description[]" form="cibleFormAjout"></textarea>'+
							'<input type="hidden" name="nom[]" class="nom" form="cibleFormAjout" value="" >'+
						'</div>'+	
                    '</div>'; 
					
      function createImage(file){

        var preview = $(template),
            image = $('img', preview);

        var reader = new FileReader();

        image.width = 200;
        image.height = 150;

        reader.onload = function(e){

            // e.target.result holds the DataURL which
            // can be used as a source of the image:

            image.attr('src',e.target.result);
        };

        // Reading the file as a DataURL. When finished,
        // this will trigger the onload function above:
        reader.readAsDataURL(file);
		
        message.hide();
        preview.appendTo(dropbox);			

		     // Associating a preview container
        // with the file, using jQuery's $.data():
		
        $.data(file,preview);
		
		 var nomFichier = file.name;
		$('#descandname input').val(nomFichier);
		$('#descandname').attr('id','descandnameDone');
   
    }
	
    function showMessage(msg){
        message.html(msg);
    }
	
	
	
});