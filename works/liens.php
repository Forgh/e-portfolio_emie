<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Stéphane Protic - Liens</title>
		<meta charset="UTF-8" />
		<link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
		<link rel="stylesheet" href="css/design-stf.css" />
	   <meta name="description" content="Site web de Stéphane Protic, artiste plasticien."/>
       <meta name="keywords" content="Stephane,Stéphane,STEPHANE,Protic,PROTIC,protic,stephane,artiste,Artiste,plasticien,Plasticien"/>

   </head>
   <body>
	
	<?php
		$page='liens';
		$cate_other='Dessins';
		include('../include/entete.php');
		include('../include/menu.php');
		include('../include/gotoother.php');
	?>
	<div id="corps">
		<?php
			include("../include/link.php");	
			
			////////Récupération et affichage du texte actuel ///////////////////////////////////////////////
			$texte_links = $bdd->query('SELECT texte_libre FROM textes WHERE titre_texte = "links"');
			$affichage_texte = $texte_links->fetch();
			echo $affichage_texte['texte_libre'];
		?>
	</div> 
 
	</body>
</html>