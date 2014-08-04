<!DOCTYPE html>
<html lang="fr" >
   <head>
       <title>Emie Vilar</title>
       <meta charset="UTF-8" />
	   <link rel="icon" type="image/png" href="design-ressources/favicon32.png" />
	   <link rel="stylesheet" type="text/css" href="css/design-emie.css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="jquery/scriptFadeIn.js" ></script>
		<script src="jquery/script_hoverGoToOther.js" ></script>
		<script src="jquery/onPageChange.js" ></script>

   </head>

	<body>
	<?php
		$page = "travaux";
		include("../include/entete.php");
		include("../include/link.php");		
		
		$series_dessins= $bdd->query('SELECT * FROM series WHERE position_serie IS NOT NULL ORDER BY position_serie');
		
		$i=0;
	?>
	
	<div id="corpsFolio">
	<div id="overlay">	<?php
		while (($preview_dessins = $series_dessins->fetch()) AND ($i<=12))
		{
			echo '<a href="serie.php?serie='.$preview_dessins['nom_serie'].'"><img src="'.$preview_dessins['link_preview_serie'].'" alt="'.$preview_dessins['nom_serie'].'" class="imgFade" style="display: none;"/></a>';
			
			$i++;
			
			if ($i%4==0) 
			{ 
				echo '<br>'; //Si on a affiché 4 images, on va à la ligne
			}
		}
	
	?>
	</div>
</div>
	</body>
</html>