<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Stéphane Protic - Expositions</title>
		<meta charset="UTF-8" />
		<link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
		<link rel="stylesheet" href="css/design-stf.css" />
	   <meta name="description" content="Site web de Stéphane Protic, artiste plasticien."/>
       <meta name="keywords" content="Stephane,Stéphane,STEPHANE,Protic,PROTIC,protic,stephane,artiste,Artiste,plasticien,Plasticien"/>

   </head>
   <body>
   <?php
		$page='expo';
		include('../include/entete.php');
		include('../include/menu.php');
		$cate_other='Installations';
		include('../include/gotoother.php');
	?>

    <div id="corps">
		<?php
			include("../include/link.php");	
			
			////////Récupération et affichage du texte actuel ///////////////////////////////////////////////
			$texte_expositions = $bdd->query('SELECT texte_libre FROM textes WHERE titre_texte = \'expositions\'');
			$affichage_texte = $texte_expositions->fetch();
			echo $affichage_texte['texte_libre'];
		?>
	</div>
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-12625063-1");
		pageTracker._trackPageview();
		} catch(err) {}</script>
   </body>
   
</html>