<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Emie Vilar - Articles</title>
	    <meta name="description" content="Site Web d'Emie Vilar, photographe."/>
        <meta name="keywords" content="Emie,emie,EMIE,Vilar,VILAR,vilar,photographe,photographie,photo,index,articles"/>
		<meta charset="UTF-8" />
		<link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
		<link rel="stylesheet" href="css/design-emie.css" />

   </head>
   <body>
	
	<?php
		$page='contact';
		include('../include/entete.php');
		include('../include/menu.php');
		include('../include/gotoother.php');
	?>
	<div id="corps">
		<div id="selectBoxes">
			Selectionnez un article de ...
			<select id="time" name="time">
				<option value="this_week">Cette semaine</option>
				<option value="this_month">Ce mois-ci</option>
				<option value="last_6_months">Ces 6 derniers mois</option>
				<option value="this_year">Cette année</option>
				<option value="all">Tous les articles</option>
			</select>
			
			<div id="newsTitles">
				
			</div>
			
		
		</div>
		
		<div id="bodyArticle">
			
			
		</div>
		<?php
			/*include("../include/link.php");	
			////////Récupérations des articles/////////
			$articles = $bdd->query('SELECT id_texte FROM textes ORDER BY 
			////////Récupération et affichage du texte actuel ///////////////////////////////////////////////
			$texte_contact = $bdd->query('SELECT texte_libre_info FROM informations WHERE titre_info = "contact"');
			$affichage_texte = $texte_contact->fetch();
			echo $affichage_texte['texte_libre_info'];*/
		?>
	</div> 
 
	</body>
</html>