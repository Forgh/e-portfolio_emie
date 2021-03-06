<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Galanthis - Ajouter un article</title>
		<meta charset="UTF-8" />
		<link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
		<link rel="stylesheet" href="css/design-emie.css" />
	
	</head>
	<body>
	<?php 
				$page='textes';
			include("include/entete.php");
			include("include/menu_galanthis.php");
	?>
	<div id="corps_accueil">
		<h1>Ajouter un article</h1>
		<?php 
			include("include/link.php");
			date_default_timezone_set("Europe/Paris"); 

			$titre = $_POST['title'];
			$texte = $_POST['texte_article'];
						
			$adding_text = $bdd->prepare('INSERT INTO textes (titre_texte, texte_libre, date_texte) VALUES (:titre_texte, :texte_libre, CURDATE())');
			$adding_text ->execute(array(	'titre_texte' => $titre,
												'texte_libre' => $texte
												));
		?>
		<p>Article "<?php echo $titre; ?>" correctement ajouté !</p>

	</div>
</body>
	
	
</html>
