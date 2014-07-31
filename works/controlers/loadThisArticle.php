<?php

function load_this_article($id){
	require('../../include/link.php');
	
	
	$req = $bdd->prepare('SELECT titre_texte, texte_libre FROM textes WHERE id_texte = ?');
	$req -> execute(array($id));
	
	$article= $req->fetch();
	
	$ret = array(
			'titre'=>$article['titre_texte'],
			'texte'=>$article['texte_libre']);
	
	$req->closeCursor();
	
	return $ret;
}

if (@$_REQUEST['action'] == 'load_this_article' && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    echo json_encode(load_this_article($_REQUEST['id']));
    exit; // only print a JSON typed response
}

?>