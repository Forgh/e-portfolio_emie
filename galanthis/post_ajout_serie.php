<!DOCTYPE html>
<html lang="fr" >
	<head>
       <title>Galanthis - Ajout d'une série</title>
       <meta charset="UTF-8" />
	   <link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
	   <link rel="stylesheet" href="css/design-emie.css" />

   </head>
	<body>
<?php 
	$categorie = $_POST['categorie'];
	$nom_serie = $_POST['nom_serie'];
	
	include("include/link.php");	

	foreach ($_POST['nom'] as $key=>$value) {
		
		

		$info = pathinfo($value);
		$file_name =  basename($value,'.'.$info['extension']);
		$extension_upload = strtolower( strrchr($value, '.')  );
		$id_image=md5($file_name);
		$link = "images/{$id_image}{$extension_upload}";
		$link_thumbnail = "images/{$id_image}_thumbnail{$extension_upload}";
		$description = $_POST['description'][$key];
		
		$nouvelle_image=$bdd->prepare('INSERT INTO images(nom_serie, link_image, link_thumbnail, description_image) VALUES (:nom_serie, :link_image, :link_thumbnail, :description_image)');
		$nouvelle_image->execute(array(
							'nom_serie' => $nom_serie,
							'link_image' => $link,
							'link_thumbnail' => $link_thumbnail,
							'description_image' => $description
							));		
		
	}
	
	$page='series';
	include('include/entete.php');
	include('include/menu_galanthis.php');
	
?>

	<div id="corps_accueil">
		<h1>Ajouter une série</h1>
		<p>Votre série a bien été enregistrée, elle n'est toutefois pas encore affichée sur le site, veuillez organiser cet affichage sur la page "Ordonner les séries" de votre interface utilisateur.</p>
	</div>	
	
	</body>
	</html>

	