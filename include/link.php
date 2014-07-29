<?php
	//bdd local sous Wamp
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=emiebdd','root','');
		$bdd-> exec('SET NAMES utf8'); //On indique le jeu de caractères
	}
	catch (Exception $e)
	{
		die('Erreur : '. $e -> getMessage());
	}

	//bdd sous OVH (stephaneprotic.com)
	/*try
	{
		$bdd = new PDO("mysql:host=mysql51-93.perso;dbname=stephanenpbdd",'stephanenpbdd','6thcircle');
		$bdd-> exec('SET NAMES utf8'); //On indique le jeu de caractères
	}
	catch (Exception $e)
	{
		die('Erreur : '. $e -> getMessage());
	}*/
		
?>