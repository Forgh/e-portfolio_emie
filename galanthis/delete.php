<!DOCTYPE html>
<html lang="fr" >
	<head>
       <title>Callisto - Connexion </title>
       <meta charset="UTF-8" />
	   <link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
	   <link rel="stylesheet" href="css/design-stf.css" />
	</head>
	<body>
	<?php
			$page='series';
			include("include/entete.php");
			include("include/menu_galanthis.php");
	?>
	<div id="corps_accueil">

		<form action="delete.php" method="post" enctype="multipart/form-data">
			<p>
				Catégorie de la série à supprimer : <select name="categorie_choix">
															<option value="Dessins" <?php if ((isset($_POST['categorie_choix'])) AND (($_POST['categorie_choix']=="Dessins"))) {echo "selected";}?>>Dessins</option>
															<option value="Installations" <?php if ((isset($_POST['categorie_choix'])) AND (($_POST['categorie_choix']=="Installations"))) {echo "selected";}?>>Installations</option>
														</select>
														<input type="submit" value="OK"/>
			</p>
		</form>
		
		<?php
		if (isset($_POST['categorie_choix']) AND !isset($_POST['suppression_choix']))
		{
		?> 
		
		<form action="delete.php" method="post" enctype="multipart/form-data"> 
				<p> 
					Choisissez la série à supprimer : 	<select name="suppression_choix">';
													 
														<?php include("include/link.php");
														
														//Récupération des séries de la catégorie choisie
														$series_existantes= $bdd->prepare('SELECT * FROM series WHERE nom_categorie= ?');
														$series_existantes->execute(array($_POST['categorie_choix']));
														
														
														while ($choix_serie = $series_existantes->fetch())
														{
															echo '<option value="'.$choix_serie['nom_serie'].'">'.$choix_serie['nom_serie'].'</option>';
														}
														$series_existantes->closeCursor();
														?> </select><input type="submit" value="Supprimer"/>
				</form>
				
				<?php
		}
		
		else if (isset($_POST['suppression_choix']))												
		{	
			include("include/link.php");
			
			//suppression de la série choisie
			$suppression_serie= $bdd->prepare('DELETE FROM series WHERE nom_serie= ?');
			$suppression_serie->execute(array($_POST['suppression_choix']));
			
			?>
			<p> Série "<?php echo $_POST['suppression_choix'];?>" supprimée avec succès. </p>
			<?php
		}
		
	?>
														
	</div>			
	</body>
</html>