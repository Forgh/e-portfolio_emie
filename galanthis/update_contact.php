<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Galanthis - Modifier Contact</title>
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
				$page='contact';
			include("include/entete.php");
			include("include/menu_galanthis.php");
	?>
	<div id="corps_accueil">
		<h1>Editer la page "Contact"</h1>
	<?php
	////////////////////////////////Update du texte/////////////////////////////

		if (isset($_POST['texte_contact'])) 
		{ 
			include("include/link.php");				
			
		$update_text= $bdd->prepare('UPDATE informations SET texte_libre_info = ? WHERE titre_info = "contact"'); 
		$update_text->execute(array($_POST['texte_contact']));
		echo '<p>Le texte a bien été modifié.</p>';
		}
	?>		
	
	<form action="update_contact.php" method="post" enctype="multipart/form-data">
		<textarea name="texte_contact">
			<?php ////////////////////////////////////////Zone d'édition du texte///////////////////////////////// 
				include("include/link.php");
				
				////////Récupération et affichage du texte actuel ///////////////////////////////////////////////
				$texte_contact = $bdd->query('SELECT texte_libre_info FROM informations WHERE titre_info = "contact"');
				$affichage_texte = $texte_contact->fetch();
				$texte_contact->closeCursor();
				echo $affichage_texte['texte_libre_info'];
		
			?>
		</textarea>
	<p>
		<input type="submit" value="Valider" />
	</p>
	
	</form>
	</div>
</body>
	
	
</html>