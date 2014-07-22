<?php

function load_news($time) {

   $response = array(); // @return


  // This week
  if ($time==="this_week") {
    $response =  create_selects(from_time(604800));
     
  // This month
  } else if ($time=="this_month") {
    $response = create_selects(from_time(2592000));
	
  // This semester
  } else if ($time=="last_6_months") {
    $response = create_selects(from_time(15768000));
	
  // This year
  }  else if ($time=="this_year") {
    $response = create_selects(from_time(31536000));
	
	//Fuck off, everything
  } else if ($time=="all") {
	$response = create_selects(from_time(0));
	
	//Dumb filter
  } else {
	$response = "Wrong time format!";
  }
  return $response;        
}

function from_time($time){
	 
	 require('../modeles/connect.php');
	//Return ALL the things!			
	if ($time == 0) {
		$req = $bdd -> query('SELECT id_texte, titre_texte FROM textes ORDER BY date_texte DESC');
		
	//Oooor just some	
	} else {
	
		$now = time();
		$timeMin= $now - $time; 
	
		$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte > ? AND date_texte < ? ORDER BY date_texte DESC');
		$req -> execute(array($timeMin, $now); 

		
	}	
	
	$ret = $req->fetchAll();
	return $ret;
				
}	

function create_selects($infos){

	$ret = '<select>';
	while($line = $infos->fetch()){
		$ret += '<option value="'.$line['id_texte'].'">'.$line['titre_texte'].'</option>';
	}
	$ret += '</select>';
}

if (@$_REQUEST['action'] == 'load_news' && isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
    echo json_encode(load_news($_REQUEST['time']));
    exit; // only print a JSON typed response
}
?>