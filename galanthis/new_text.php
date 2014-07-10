<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Galanthis - Ajouter un article</title>
		<meta charset="UTF-8" />
		<link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
		<link rel="stylesheet" href="css/design-emie.css" />
		<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
		<script type="text/javascript">
			tinymce.init({
				selector: "textarea",
				browser_spellcheck : true,
				language : 'fr_FR',
				height : 500,
				relative_urls: false,
				convert_urls: false,
			    remove_script_host: false,
				plugins: [
					"advlist autolink lists link image charmap print preview anchor",
					"searchreplace visualblocks code fullscreen",
					"insertdatetime media table contextmenu paste"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
			});

		</script>

	</head>
	<body>
	<?php 
				$page='textes';
			include("include/entete.php");
			include("include/menu_galanthis.php");
	?>
	<div id="corps_accueil">

	
	<form action="add_text.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<p>
				<legend for="title">Titre de l'article : </legend>
				<input type="text" id="title" name="title">
			</p>
			<p>
				<textarea name="texte_article">
					
				</textarea>
			</p>
			
			<p>
				<input type="validate" value="Envoyer">
			</p>
		</fieldset>
	<p>
		<input type="submit" value="Valider" />
	</p>
	
	</form>
	</div>
</body>
	
	
</html>