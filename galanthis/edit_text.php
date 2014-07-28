<!DOCTYPE html>
<html lang="fr" >
	<head>
       <title>Galanthis - Editer un article</title>
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

		<?php
			
		if (!isset($_POST['edition_choix']))												
		{	
		?>
		<form action="edit_text.php" method="post" enctype="multipart/form-data"> 
			<fieldset>	
				<p> 
					Choisissez l'article à éditer : 	<select name="edition_choix">';
													 
														<?php include("include/link.php");
														
														//Récupération des séries de la catégorie choisie
														$textes_existants= $bdd->query('SELECT id_texte, titre_texte FROM textes ORDER BY date_texte ASC');
											
														
														while ($choix_texte = $textes_existants->fetch())
														{
															echo '<option value="'.$choix_texte['id_texte'].'">'.$choix_texte['titre_texte'].'</option>';
														}
														$textes_existants->closeCursor();
														?> </select><input type="submit" value="Editer">
				</p>
			</fieldset>											
		</form>
				
				<?php
		}	
		elseif (isset($_POST['edition_choix']))												
		{	
			include("include/link.php");
			//Getting the serie's name (purely aesthetic) 
			$nom_texte= $bdd->prepare('SELECT titre_texte, texte_libre FROM textes WHERE id_texte = ?');
			$nom_texte->execute(array($_POST['edition_choix']));
			$affichage_texte = $nom_texte->fetch();
			?>
			<form action="edit_text.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<p>
				<legend for="title">Titre de l'article : </legend>
				<input type="text" id="title" name="title" value="<?php echo $affichage_texte['titre_texte']; ?>">
				<input type="hidden" name="id_text" value="<?php echo $_POST['edition_choix']; ?>" >
			</p>
			<p>
				<textarea name="texte_article">
					<?php echo $affichage_texte['texte_libre']; ?>
				</textarea>
			</p>
			
			<p>
				<input type="submit" value="Valider" />
			</p>	
		</fieldset>
	
		<?php
		}
		else if(isset($_POST['id_text'])){
			$edit_text= $bdd->prepare('UPDATE textes SET titre_texte = ?,  texte_libre = ? WHERE id_texte = ?');
			$edit_text = $bdd->execute(array($_POST['title'],$_POST['texte_article'],$_POST['id_text']));
			
		?>
			<p> Article "<?php echo $_POST['title'];?>" édité avec succès. </p>
		<?php
		}
		?>
	</div>			
	</body>
</html>