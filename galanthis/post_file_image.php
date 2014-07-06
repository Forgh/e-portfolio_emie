<?php
$upload_dir = '../works/images/';
$allowed_ext = array('jpg','jpeg','png','gif');
		function createThumbnail ($lien, $lien_thumbnail)
		{
			$extension_upload = strtolower(  substr(  strrchr($lien, '.')  ,1)  );
			if($extension_upload=='jpg' || $extension_upload=='jpeg') {
				$source = imagecreatefromjpeg($lien); // On récupère l'image JPG
			}
			elseif ($extension_upload=='png') {
				$source = imagecreatefrompng($lien); // On récupère l'image PNG
			}
			elseif ($extension_upload=='gif') {
				$source = imagecreatefromgif($lien); // On récupère l'image GIF
			}
			
			$largeur_source = imagesx($source); //On récupère la largeur
			$hauteur_source = imagesy($source); //et la hauteur
			
			if ($largeur_source > $hauteur_source) //Change la valeur selon que l'image est en portrait ou en paysage
			{
				$new_width=200;
			}
			else 
			{
				$new_width=150;
			}
			
			$new_height = floor($hauteur_source * ($new_width/$largeur_source));
			
			$destination = imagecreatetruecolor($new_width, $new_height);
			
			imagecopyresampled($destination, $source, 0, 0, 0, 0, $new_width, $new_height, $largeur_source, $hauteur_source);
			
			if($extension_upload=='jpg' || $extension_upload=='jpeg') {
				imagejpeg($destination, $lien_thumbnail);
			}
			elseif ($extension_upload=='png') {
				imagepng($destination, $lien_thumbnail);
			}
			elseif ($extension_upload=='gif') {
				imagegif($destination, $lien_thumbnail);
			}
			
		}
		include("include/link.php");
if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    exit_status('Error! Wrong HTTP method!');
}

if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){

    $img = $_FILES['pic'];

	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	//1. strrchr renvoie l'extension avec le point 
	//2. substr(chaine,1) ignore le premier caractère de chaine.
	//3. strtolower met l'extension en minuscules.
	$extension_upload = strtolower(  substr(  strrchr($img['name'], '.')  ,1)  );
	if ( in_array($extension_upload,$extensions_valides) )
	{
		$info = pathinfo($img['name']);
		$file_name =  basename($img['name'],'.'.$info['extension']);
		$id_image=md5($file_name);
		$nom = "{$upload_dir}{$id_image}.{$extension_upload}";
		// Move the uploaded file from the temporary
		// directory to the uploads folder:

		if(move_uploaded_file($img['tmp_name'],$nom))
		{
			$nom_thumbnail = "{$upload_dir}{$id_image}_thumbnail.{$extension_upload}";
			createThumbnail($nom, $nom_thumbnail);
		}
	}
	
}

// Helper functions

function exit_status($str){
    echo json_encode(array('status'=>$str));
    exit;
}

function get_extension($file_name){
    $ext = explode('.', $file_name);
    $ext = array_pop($ext);
    return strtolower($ext);
}
?>