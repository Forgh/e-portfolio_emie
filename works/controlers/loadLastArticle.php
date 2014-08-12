<?php
	include('models/Article.php');
	
	$lastArticle = Article::selectLastArticle();
	$titre = $lastArticle->getTitre();
	$texte = $lastArticle->getTexte();
	
?>
