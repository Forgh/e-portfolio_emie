<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Emie Vilar - Contact</title>
	   <meta name="description" content="Site Web d'Emie Vilar, photographe."/>
       <meta name="keywords" content="Emie,emie,EMIE,Vilar,VILAR,vilar,photographe,photographie,photo,index,contact"/>
		
		<meta charset="UTF-8" />
		<link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
		<link rel="stylesheet" href="css/design-emie.css" />

   </head>
   <body>
	
	<?php
		$page='contact';
		include('../include/entete.php');
		include('../include/menu.php');
	?>
	<div id="corps">
		<?php
			include("../include/link.php");	
			
			////////Récupération et affichage du texte actuel ///////////////////////////////////////////////
			$texte_contact = $bdd->query('SELECT texte_libre_info FROM informations WHERE titre_info = "contact"');
			$affichage_texte = $texte_contact->fetch();
			echo $affichage_texte['texte_libre_info'];
		?>
	</div> 
 
	</body>
</html>