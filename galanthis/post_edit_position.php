<?php 
	parse_str($_REQUEST['sort1'], $sort1);
	
	include("include/link.php");

	foreach($sort1['entry'] as $key => $value) {
		$nouvelle_liste=$bdd->prepare('UPDATE series SET position_serie = ? WHERE id_serie = ?');
		$nouvelle_liste->execute(array($key,$value));
	}
	
?>
