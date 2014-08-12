<?php

function load_articles($time) {

  // $response = array(); // @return
	require('../models/Article.php');
  
	$response = array();
  // This week
  if ($time==="this_week") {
  	$req = Article::selectThisWeekArticles();
    $response = array(
    				'msg' =>to_button($req));
     
  // This month
  } else if ($time=="this_month") {
   	$req = Article::selectThisMonthArticles();
    $response = array(
    				'msg' => to_button($req));
	
  // This semester
  } else if ($time=="last_6_months") {
    $req = Article::selectThisSemesterArticles();
    $response = array(
    				'msg' => to_button($req));
	
  // This year
  }  else if ($time=="this_year") {
    $req = Article::selectThisYearArticles();
    $response = array(
    				'msg' =>to_button($req));
	
	//Fuck off, everything
  } else if ($time=="all") {
  	$req = Article::selectAllArticles();
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