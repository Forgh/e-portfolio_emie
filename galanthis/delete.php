<!DOCTYPE html>
<html lang="fr" >
	<head>
       <title>Galanthis - Supprimer une série </title>
       <meta charset="UTF-8" />
	   <link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
	   <link rel="stylesheet" href="css/design-emie.css" />
	</head>
	<body>
	<?php
			$page='series';
			include("include/entete.php");
			include("include/menu_galanthis.php");
			
			function deleteImage($filedir) {
				unlink('works/'.$filedir.'');
			}
	?>
	<div id="corps_accueil">

		
		
		<form action="delete.php" method="post" enctype="multipart/form-data"> 
			<fieldset>	
				<p> 
					Choisissez la série à supprimer : 	<select name="suppression_choix">';
													 
														<?php include("include/link.php");
														
														//Récupération des séries de la catégorie choisie
														$series_existantes= $bdd->query('SELECT id_serie, nom_serie FROM series');
											
														
														while ($choix_serie = $series_existantes->fetch())
														{
															echo '<option value="'.$choix_serie['id_serie'].'">'.$choix_serie['nom_serie'].'</option>';
														}
														$series_existantes->closeCursor();
														?> </select><input type="submit" value="Supprimer">
				</p>
			</fieldset>											
		</form>
				
				<?php
			
		else if (isset($_POST['suppression_choix']))												
		{	
			include("include/link.php");
			//Getting the serie's name (purely aesthetic) 
			$nom_serie= $bdd->prepare('SELECT nom_serie FROM series WHERE id_serie = ?');
			$nom_serie->execute(array($_POST['suppression_choix']));

			//deleting files
			$directories = $bdd->prepare('SELECT link_image, link_thumbnail FROM images WHERE nom_serie = ?');
			$directories->execute(array($nom_serie['nom_serie']);
			
			while ($dir = $directories->fetch())
			{
				deleteImage($dir['link_image']);
				deleteImage($dir['link_thumbnail']);
			}
			$directories->closeCursor();
			
			//deleting the serie in the database
			$suppression_serie= $bdd->prepare('DELETE FROM series WHERE id_serie= ?');
			$suppression_serie->execute(array($_POST['suppression_choix']));
			
			?>
			<p> Série "<?php echo $nom_serie['nom_serie'];?>" supprimée avec succès. </p>
			<?php
		}
		
	?>
														
	</div>			
	</body>
</html>