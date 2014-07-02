<?php 
	parse_str($_REQUEST['sort2'], $sort2);
	
	include("include/link.php");

	foreach($sort2['entry'] as $key => $value) {
		$nouvelle_liste=$bdd->prepare('UPDATE series SET position_serie = NULL WHERE id_serie = ?');
		$nouvelle_liste->execute(array($value));
	}
	
?>
