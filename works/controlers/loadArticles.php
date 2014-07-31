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
    				'msg' =>to_select($req));
     
  // This month
  } else if ($time=="this_month") {
   	$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 1 MONTH AND date_texte <= CURDATE() ORDER BY date_texte DESC');
	$req->execute();
    $response = array(
    				'msg' => to_select($req));
	
  // This semester
  } else if ($time=="last_6_months") {
    $req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 6 MONTH AND date_texte <= CURDATE() ORDER BY date_texte DESC');
	$req->execute();
    $response = array(
    				'msg' => to_select($req));
	
  // This year
  }  else if ($time=="this_year") {
    $req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 1 YEAR AND date_texte <= CURDATE() ORDER BY date_texte DESC');
	$req->execute();
    $response = array(
    				'msg' =>to_select($req));
	
	//Fuck off, everything
  } else if ($time=="all") {
  	$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes ORDER BY date_texte DESC');
	$req->execute();
	$response = array(
    				'msg' => to_select($req));
	
	//Dumb filter
  } else {
	$response = array(
    				'msg' => "Wrong time format!");
  }
  return $response;        
}

function to_select($req){
	 
	$ret = '<select name="articles" id="titles">';
		
	while($line = $req->fetch()){
		$ret .= '<option value="'.$line['id_texte'].'">'.$line['titre_texte'].'</option>';
	}
	
	$req->closeCursor();
	
	$ret .= '</select>
	<input type="submit" value"OK" onclick="sendTitle()" id="sumbitArticle">';
	
	return $ret;
				
}	

if (@$_REQUEST['action'] == 'load_articles' && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    echo  json_encode(load_articles($_REQUEST['time']));
    exit; // only print a JSON typed response
}
?>