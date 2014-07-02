<div id="menu_galanthis">
	<ul>
	
	<div class="barre_onglet_menu" ></div>
	
		<li><a href="form2.php">Séries</a></li>
		<?php if ($page == "series") { ?>
			<ul class="sousmenu_galanthis">
				<li><a href="form2.php">Ajouter une série</a></li>
				<li><a href="edit_position.php">Ordonner les séries</a></li>
				<li><a href="delete.php">Supprimer une série</a></li>
			</ul>
		<?php } ?>
			<div class="barre_onglet_menu" ></div>
		<li><a href="update_text.php">Textes</a></li>
		


		<?php if ($page == "textes") { ?>
			<ul class="sousmenu_galanthis">
				<li><a href="update_text.php">Modifier Expositions</a></li>
				<li><a href="update_contact.php">Modifier Contact</a></li>
				<li><a href="update_links.php">Modifier Liens</a></li>
			</ul>

		<?php } ?>
	<div class="barre_onglet_menu" ></div>

	</ul>
</div>
