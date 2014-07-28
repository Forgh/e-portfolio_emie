<!DOCTYPE html>
<html lang="fr" >
	<head>
       <title>Galanthis - Ajout d'une série</title>
       <meta charset="UTF-8" />
	   <link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
	   <link rel="stylesheet" href="css/design-emie.css" />
       <link rel="stylesheet" href="css/styles.css" />


   </head>
	<body>
	
	<?php
			$page='series';
			include("include/entete.php");
			include("include/menu_galanthis.php");	?>
	<div id="corps_accueil">

	<?php
	if (isset($_POST['categorie_choix'])) {
		function createThumbnail ($lien, $lien_thumbnail)
		{
			$extension_upload = strtolower(  substr(  strrchr($lien, '.')  ,1)  );
			if($extension_upload=='jpg' || $extension_upload=='jpeg') {
				$source = imagecreatefromjpeg($lien); // On récupère l'image JPG
			}
			elseif ($extension_upload=='png') {
				$source = imagecreatefrompng($lien); // On récupère l'image PNG
			}
			elseif ($extension_upload=='gif') {
				$source = imagecreatefromgif($lien); // On récupère l'image GIF
			}
			
			$largeur_source = imagesx($source); //On récupère la largeur
			$hauteur_source = imagesy($source); //et la hauteur
			
			$new_width=150;
			
			
			$new_height = 150;
			
			$destination = imagecreatetruecolor($new_width, $new_height);
			
			imagecopyresampled($destination, $source, 0, 0, 0, 0, $new_width, $new_height, $largeur_source, $hauteur_source);
			
			if($extension_upload=='jpg' || $extension_upload=='jpeg') {
				imagejpeg($destination, $lien_thumbnail);
			}
			elseif ($extension_upload=='png') {
				imagepng($destination, $lien_thumbnail);
			}
			elseif ($extension_upload=='gif') {
				imagegif($destination, $lien_thumbnail);
			}
			
		}

				include("include/link.php");	


		
		//reception de la preview et creation du lien
			if ($_FILES['preview']['error'] > 0) {$erreur = 'Erreur lors du transfert de l\'image '.$i.', réessayez ou vérifiez le fichier';}  // Vérification : l'image existe
			else
			{
				if ($_FILES['preview']['size'] > 2000000) {$erreur = 'L\'image de preview est trop lourde, poids maximum : 2 Mo';}//Poids inférieur à 2Mo (limite supportée par PHP)
				else		
				{
					$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
					//1. strrchr renvoie l'extension avec le point 
					//2. substr(chaine,1) ignore le premier caractère de chaine.
					//3. strtolower met l'extension en minuscules.
					$extension_upload = strtolower(  substr(  strrchr($_FILES['preview']['name'], '.')  ,1)  );
					if ( in_array($extension_upload,$extensions_valides) )
					{
						echo "<p>Extension correcte, ";
						$id_image=md5(uniqid(rand(), true));
						
						$nom_categorie = 'works'; //On réceptionne le nom de la catégorie

						$nom = "../{$nom_categorie}/images/{$id_image}.{$extension_upload}";
						$resultat = move_uploaded_file($_FILES['preview']['tmp_name'],$nom);
						if ($resultat) {
							$link_preview = "images/{$id_image}_resampled.{$extension_upload}"; 
							$absolute_link_preview="../{$nom_categorie}/images/{$id_image}_resampled.{$extension_upload}";
							createThumbnail($nom,$absolute_link_preview);
							
							echo 'Transfert de l\'image preview réussi </p>';
						}
						else {
							echo 'ERREUR, transfert échoué, veuillez supprimer l\'image et ré-essayez </p>';
						}
					} 
				} 
			}
		
		//réception du nom de la série et remplacement des espaces par des '_'
		$nom_serie = str_replace(' ','_',$_POST['titre_serie']);
		
		//Creation du nouveau tuple dans la table series
		$new_serie= $bdd->prepare('INSERT INTO series(nom_serie, link_preview_serie) VALUES (:nom_serie, :link_preview_serie)');
		$new_serie->execute(array(
						'nom_serie' => $nom_serie,
						'link_preview_serie' => $link_preview,
					));
		?>	
			<form action="post_ajout_serie.php" method="post" enctype="multipart/form-data" id="cibleFormAjout">
				<input type="hidden" name="categorie" value="<?php echo $nom_categorie ?>" />
				<input type="hidden" name="nom_serie" value="<?php echo $nom_serie ?>" />

			</form>		
		<div id="dropbox">
		    <span class="message"> Veuillez glisser ici une image... <br /></span>
        </div>
					<input type="submit" value="Envoyer la gallerie" id="bouton_envoie_gallerie" form="cibleFormAjout"/>
		
		<?php
			}
			else { ?>
			<form action="form2.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<p> 
						<label for="titre_serie">Titre de la nouvelle série : </label> 
						<input type="text" name="titre_serie" id="titre_serie">
					</p>	
					
					<p>
						<label for="preview">Choix de la preview : </label>
						<input type="file" name="preview" id="preview"> <!--Upload de l'image preview, celle-ci sera TOUJOURS la case 0 du tableau image_contenu -->
					</p>
					<p>
						<input type="submit" value="Enregistrer la série" >
					</p>
				</fieldset>
			</form>
		<?php 
			}
		?>

		<!-- Including The jQuery Library -->
        <script src="jquery/jquery.js"></script>

        <!-- Including the HTML5 Uploader plugin -->
        <script src="jquery/jquery.filedrop.js"></script>


        <!-- The main script file -->
		<?php
		if (isset($_POST['categorie_choix'])) {
				echo '<script src="jquery/script_form_image.js"></script>';
		}	
		?>
	</div>
	</body>
</html>