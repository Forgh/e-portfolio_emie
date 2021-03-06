<!DOCTYPE html>
<html lang="fr" >
	<head>
       <title>Galanthis - Ordonner </title>
       <meta charset="UTF-8" />
	   <link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
	   <link rel="stylesheet" href="css/css-drag.css" />
		<script type="text/javascript" src="jquery/jquery.js"></script>
		<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css" />
		<script type="text/javascript" src="jquery/jquery-ui.min.js"></script>
	   <link rel="stylesheet" href="css/design-emie.css" />
		<script type="text/javascript">
		
		$(function() 
		{
		$("#list-photos, #list-restant").sortable(
		{
			connectWith: '.connectedList',
			update : function () 
			{ 
				$.ajax(
				{
					type: "POST",
					url: "post_edit_position.php",
					data: 
					{
						sort1:$("#list-photos").sortable('serialize')
					},
				});
				$.ajax(
				{
					type: "POST",
					url: "post_null.php",
					data: 
					{
						sort2:$("#list-restant").sortable('serialize')
					},
				});
			} 
		}).disableSelection();
		});		
	</script>
	</head>
	<body>

	<?php
			$page='series';
			include("include/entete.php");
			include("include/menu_galanthis.php");
	
				include("include/link.php");
				$liste_par_position=$bdd->query('SELECT * FROM series WHERE position_serie IS NOT NULL ORDER BY position_serie');
			
				$liste_restante=$bdd->query('SELECT * FROM series WHERE position_serie IS NULL');
						
				?>	
		
		<!--	//////////////////////////////////////LISTE DES IMAGES RESTANTES (= NULL)////////////////////////////////////////////////////////	-->
			<div id="corps_accueil">
		
				<ul id="list-restant" class="connectedList">
				<?php	while ($choix = $liste_restante->fetch())
						{	
						?>
							<li id="entry_<?php echo $choix['id_serie'] ?>">
								<img src="../works/<?php echo $choix['link_preview_serie'] ?>" alt="<?php echo $choix['nom_serie'] ?>" 
									height="150" width="150"/>
							</li>
					
						<?php
						}
						?>
				</ul>
				<img src="design-ressources/order_arrows.png" alt="Glissez les images en bas pour les ordonner, ou glissez-les en haut pour les exclure" />
				<!--	//////////////////////////////////////POSITIONS ACTUELLES////////////////////////////////////////////////////////	-->
			

				<ul id="list-photos" class="connectedList" >
				<?php	$j=0;	
					
						while (($positions_actuelles = $liste_par_position->fetch()) AND ($j<12))
						{
				?>			<li id="entry_<?php echo $positions_actuelles['id_serie'] ?>">
								<img src="../works/<?php echo $positions_actuelles['link_preview_serie'] ?>" alt="<?php echo $positions_actuelles['nom_serie'] ?>" 
									height="150" width="150"/>
							</li>
							
	
				<?php		$j++;
						}
				?>
				</ul>
					
			
</div>

	</body>
</html>