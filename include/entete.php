<div id="top">
	<div id="centered">
	<div id="entete">      
		<a href="../index.php"><p>Emie Vilar</p></a>
	</div>
	
	
	<div id="menu">
	  <ul> 
		<li><a href="index.php" onClick="onPageChange(<?php echo $page; ?>)"><span class="<?php if ($page== "travaux") {echo"currentmenu";} else{echo"normalmenu";}?> liMenu">  Series</span></a></li>
		<li><a href="articles.php" onClick="onPageChange(<?php echo $page; ?>)"><span class="<?php if ($page== "articles") {echo"currentmenu";}else{echo"normalmenu";}?> liMenu"> Articles</span></a></li>
		<li><a href="contact.php" onClick="onPageChange(<?php echo $page; ?>)"><span class="<?php if ($page== "contact") {echo"currentmenu";}else{echo"normalmenu";}?> liMenu"> Contact</span></a></li>
		<li><a href="liens.php" onClick="onPageChange(<?php echo $page; ?>)"><span class="<?php if ($page== "liens") {echo"currentmenu";}else{echo"normalmenu";}?>"> Liens</span></a></li>
	  </ul>
	</div>
	</div>
</div>