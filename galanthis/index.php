<!DOCTYPE html>
<html lang="fr" >
<head>
       <title>Galanthis - accueil </title>
       <meta charset="UTF-8" />
	   <link rel="icon" type="image/png" href="Design-ressources/favicon32.png" />
	   <link rel="stylesheet" href="css/design-emie.css" />
       <link rel="stylesheet" href="css/styles.css" />


</head>
<body>

<?php
	$page='accueil';
	include("include/entete.php");
	include("include/menu_galanthis.php");
	?>
<div id="corps_accueil">
	<h1> Bienvenue <?php echo $_SERVER['PHP_AUTH_USER'] ?></h1>

	<p>Galanthis - Mayaka Variation - est une interface utilisateur vous permettant de facilement gérer le contenu de votre site Web (orienté e-Portfolio) en tirant parti des fonctionnalités offertes par les langages HTML5, PHP, Javascript ainsi que les bibliothèques JQuery et JQueryUI.</p>
	<p>"Mayaka Variation" est une version de Galanthis spécialement conçu pour la création d'articles. Il dispose du côté visiteur une interface simple permettant de parcourir les différents articles que vous aurez écris.</p>
	<p>Veuillez utiliser le menu à gauche pour utiliser les différentes applications offerte par cette interface :
		<ul>
			<li>Pour ajouter, supprimer une série ou modifier sa position dans la page de présentation des séries, veuillez cliquer sur l'onglet "Séries"</li>
			<li>Pour modifier une page d'information tel que la page "Liens" et y ajouter librement du contenu, veuillez cliquer sur l'onglet "Liens / Contact"</li>
			<li>Enfin, pour ajouter, supprimer ou éditer un article, cliquez sur l'onglet "Textes"</li>
		</ul>
	</p>

	<p>Cette page servira aussi de "change log", un journal des corrections et mises-à-jour apporté à l'interface ainsi qu'au site.</p>
	<p>Si un bug apparait sur le site ou l'interface utilisateur, veuillez en informer l'administrateur.</p>

	<p>NB : Ne donnez à PERSONNE votre mot de passe, aucun "administrateur" ni hébergeur ne peut vous le demander. <br/>
	En cas de problèmes ou pour toute questions liés à votre mot de passe, veuillez me contacter directement par téléphone.</p>
</div>
</body>
</html>