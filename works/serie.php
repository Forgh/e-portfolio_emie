<!DOCTYPE html>
<html lang="fr" >
   <head>
       <title>Emie Vilar - Séries</title>
       <meta charset="UTF-8" />
	   <meta name="description" content="Site Web d'Emie Vilar, photographe."/>
       <meta name="keywords" content="Emie,emie,EMIE,Vilar,VILAR,vilar,photographe,photographie,photo, séries, series, serie"/>
	   <link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
	   <link rel="stylesheet" href="css/design-emie.css" />
	   <script src="highslide/highslide-with-gallery.packed.js"></script>
	   <script src="highslide/highslide.config.js" charset="utf-8"></script>
	   <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
       <link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
       <script src="jquery/onPageChange.js" ></script>

   </head>

	<body>
		<?php
			$page = "travaux";
			include("../include/entete.php");
			include("../include/back.php");
		?>
		<div id="corpsFolio">
			<div id="overlayDone">
				<div id="centerer">
					<?php		
						
						include("../include/link.php");		
						$info_serie = $bdd->prepare('SELECT * FROM images WHERE nom_serie = ?');
						$info_serie->execute(array(htmlspecialchars($_GET['serie'])));
						
				
						$i=0;
				
						while ($info_image = $info_serie->fetch())
						{
							echo 	'<a href="'.$info_image['link_image'].'" class="highslide" onclick="return hs.expand(this)">
										<img src="'.$info_image['link_thumbnail'].'" class="imgFadeSerie" alt="cliquez ici pour agrandir" />
									</a>
									
									<div class="highslide-caption">'.
									str_replace('\\','',nl2br($info_image['description_image'])).'</div>';
									
							$i++;
							
							if ($i%4 == 0) {
								echo '<br/>';
							}
						}
						
						$info_serie->closeCursor();
					?>
					</div>
			</div>
		</div>
	</body>
</html>
		