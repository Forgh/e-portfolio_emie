<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Stéphane Protic - Contact</title>
		<meta charset="UTF-8" />
		<link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
		<link rel="stylesheet" href="css/design-stf.css" />
	   <meta name="description" content="Site web de Stéphane Protic, artiste plasticien."/>
       <meta name="keywords" content="Stephane,Stéphane,STEPHANE,Protic,PROTIC,protic,stephane,artiste,Artiste,plasticien,Plasticien"/>

   </head>
   <body>
	
	<?php
		$page='contact';
		$cate_other='Dessins';
		include('../include/entete.php');
		include('../include/menu.php');
		include('../include/gotoother.php');
	?>
	<div id="corps">
		<?php
			include("../include/link.php");	
			
			////////Récupération et affichage du texte actuel ///////////////////////////////////////////////
			$texte_contact = $bdd->query('SELECT texte_libre FROM textes WHERE titre_texte = "contact"');
			$affichage_texte = $texte_contact->fetch();
			echo $affichage_texte['texte_libre'];
		?>
	</div> 
 
	</body>
</html>