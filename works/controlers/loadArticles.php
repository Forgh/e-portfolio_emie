<?php

function load_articles($time) {

  // $response = array(); // @return
	require('../../include/link.php');
  
	$response = array();
  // This week
  if ($time==="this_week") {
  	$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 1 WEEK AND date_texte <= CURDATE() ORDER BY date_texte DESC');
	$req->execute();
    $response = array(
    				'msg' =>to_button($req));
     
  // This month
  } else if ($time=="this_month") {
   	$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 1 MONTH AND date_texte <= CURDATE() ORDER BY date_texte DESC');
	$req->execute();
    $response = array(
    				'msg' => to_button($req));
	
  // This semester
  } else if ($time=="last_6_months") {
    $req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 6 MONTH AND date_texte <= CURDATE() ORDER BY date_texte DESC');
	$req->execute();
    $response = array(
    				'msg' => to_button($req));
	
  // This year
  }  else if ($time=="this_year") {
    $req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 1 YEAR AND date_texte <= CURDATE() ORDER BY date_texte DESC');
	$req->execute();
    $response = array(
    				'msg' =>to_button($req));
	
	//Fuck off, everything
  } else if ($time=="all") {
  	$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes ORDER BY date_texte DESC');
	$req->execute();
	$response = array(
    				'msg' => to_button($req));
	
	//Dumb filter
  } else {
	$response = array(
    				'msg' => "Wrong time format!");
  }
  return $response;        
}

function to_button($req){
	 
	$ret = '';
		
	while($line = $req->fetch()){
		$ret .= '<li><input type="button" onClick="sendTitle(\''.$line['id_texte'].'\')" value="'.$line['titre_texte'].'"></li>';
	}
	
	$req->closeCursor();
	
	
	return $ret;
				
}	

if (@$_REQUEST['action'] == 'load_articles' && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    echo  json_encode(load_articles($_REQUEST['time']));
    exit; // only print a JSON typed response
}
?>