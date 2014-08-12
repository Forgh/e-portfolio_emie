<!DOCTYPE html>
<html lang="fr" >
	<head>
		<title>Emie Vilar - Articles</title>
	    <meta name="description" content="Site Web d'Emie Vilar, photographe."/>
        <meta name="keywords" content="Emie,emie,EMIE,Vilar,VILAR,vilar,photographe,photographie,photo,index,articles"/>
		<meta charset="UTF-8" />
		<link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
		<link rel="stylesheet" href="css/design-emie.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script type="text/javascript" src="jquery/scriptLoadArticles.js"></script>
		<script src="jquery/showNewPage.js"></script>
		<script src="jquery/onPageChange.js" ></script>

   </head>
   <body>
	
	<?php
		$page='articles';
		include('../include/entete.php');
	?>
	<div id="selectBoxes">
		
			<p>Selectionnez un article de :</p>
			<div id="box1">
				<ul id="newsTimes">
					<li><input type="button" value="Cette semaine" onClick="sendTime('this_week')"></li>
					<li><input type="button" value="Ce mois-ci" onClick="sendTime('this_month')"></li>
					<li><input type="button" value="Ce semestre" onClick="sendTime('last_6_months')"></li>
					<li><input type="button" value="Cette année" onClick="sendTime('this_year')"> </li>
					<li><input type="button" value="Tous les articles" onClick="sendTime('all')"></li>
				</ul>
			</div>
			
			<div id="box2">
				<ul id="newsTitles">
				
				</ul>
			</div>
			
		
	</div>
	
	<div id="corps">
		<?php
			include("../include/link.php");	
			////////Récupérations des articles/////////
			$articles = $bdd->query('SELECT titre_texte, texte_libre FROM textes WHERE id_texte = (SELECT MAX(id_texte) FROM textes)');
			////////Récupération et affichage du texte actuel ///////////////////////////////////////////////
			$affichage_texte = $articles->fetch();
			$articles->closeCursor();
			
		?>
		
		<h2 id="titleArticle"><?php echo $affichage_texte['titre_texte']; ?></h2>
		<div id="bodyArticle">
			<?php echo $affichage_texte['texte_libre']; ?>
		</div>
		
	</div> 
 
	</body>
</html>