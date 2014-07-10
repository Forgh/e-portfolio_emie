<!DOCTYPE html>
<html lang="fr" >
	<head>
       <title>Galanthis - Supprimer un article</title>
       <meta charset="UTF-8" />
	   <link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
	   <link rel="stylesheet" href="css/design-emie.css" />
	</head>
	<body>
	<?php
			$page='series';
			include("include/entete.php");
			include("include/menu_galanthis.php");
	?>
	<div id="corps_accueil">

		<?php
			
		if (!isset($_POST['suppression_choix']))												
		{	
		?>
		<form action="delete_text.php" method="post" enctype="multipart/form-data"> 
			<fieldset>	
				<p> 
					Choisissez l'article à supprimer : 	<select name="suppression_choix">';
													 
														<?php include("include/link.php");
														
														//Récupération des séries de la catégorie choisie
														$textes_existants= $bdd->query('SELECT id_texte, titre_texte FROM textes ORDER BY date_texte ASC');
											
														
														while ($choix_texte = $textes_existants->fetch())
														{
															echo '<option value="'.$choix_texte['id_texte'].'">'.$choix_texte['titre_texte'].'</option>';
														}
														$textes_existants->closeCursor();
														?> </select><input type="submit" value="Supprimer">
				</p>
			</fieldset>											
		</form>
				
				<?php
			
		else if (isset($_POST['suppression_choix']))												
		{	
			include("include/link.php");
			//Getting the serie's name (purely aesthetic) 
			$nom_texte= $bdd->prepare('SELECT titre_texte FROM textes WHERE id_texte = ?');
			$nom_texte->execute(array($_POST['suppression_choix']));

			
			//deleting the serie in the database
			$suppression_texte= $bdd->prepare('DELETE FROM texte WHERE id_texte= ?');
			$suppression_texte->execute(array($_POST['suppression_choix']));
			
			?>
			<p> Article "<?php echo $nom_serie['titre_texte'];?>" supprimé avec succès. </p>
			<?php
		}
		
	?>
														
	</div>			
	</body>
</html>