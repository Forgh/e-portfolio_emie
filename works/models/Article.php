<?php
	include('../include/link.php');
	
	class Article {
		private $id;
		private $titre;
		private $texte;
		private $timestamp;
		
		public function getId(){
			return $this->id;
		}
		
		public function getTitre(){
			return $this->titre;
		}
		
		public function getTexte(){
			return $this->texte;
		}
		
		public function getTime() {
			return $this->timestamp;
		}
		
		public function __construct ($id,$titre,$texte,$date){
			$this->id=$id;
			$this->titre=$titre;
			$this->texte=$texte;
			$this->timestamp=$date;
		}
		
		public function save() {
			global $bdd;
			$new_entry = $bdd->prepare('INSERT INTO textes (id_texte,titre_texte,texte_libre,date_texte) VALUES (:id_texte,:titre_texte,:texte_libre,:date_texte)');
			$new_entry->execute(array( 
										'id_texte' => $this->id,
										'titre_texte' => $this->titre,
										'texte_libre' => $this->texte,
										'date_texte' => $this->timestamp
					));
		}
		
		public function selectLastArticle(){
			global $bdd;
			////////Récupérations des articles/////////
			$req = $bdd->query('SELECT * FROM textes WHERE id_texte = (SELECT MAX(id_texte) FROM textes)');
			
			if($req->rowCount() == 0) return null;
			
			$tuple = $req->fetch();
			$req->closeCursor();
			
			return new Article($tuple['id_texte'],$tuple['titre_texte'],$tuple['texte_libre'],$tuple['date_texte']);
		}
		
		public function selectThisWeekArticles(){
			global $bdd;
			
			$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 1 WEEK AND date_texte <= CURDATE() ORDER BY date_texte DESC');
			$req->execute();
			
			if($req->rowCount() == 0) return null;
			
			return $req;
		}
		
		public function selectThisMonthArticles(){
			global $bdd;
			
			$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 1 MONTH AND date_texte <= CURDATE() ORDER BY date_texte DESC');
			$req->execute();
			
			if($req->rowCount() == 0) return null;
			
			return $req;
		}
		
		public function selectThisSemesterArticles(){
			global $bdd;
			
			$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 6 MONTH AND date_texte <= CURDATE() ORDER BY date_texte DESC');
			$req->execute();
			
			if($req->rowCount() == 0) return null;
			
			return $req;
		}
		
		public function selectThisYearArticles(){
			global $bdd;
			
			$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes WHERE date_texte >= CURDATE() - INTERVAL 1 YEAR AND date_texte <= CURDATE() ORDER BY date_texte DESC');
			$req->execute();
			
			if($req->rowCount() == 0) return null;
			
			return $req;
		}
		
		public function selectAllArticles() {
			global $bdd;
			
			$req = $bdd -> prepare('SELECT id_texte, titre_texte FROM textes ORDER BY date_texte DESC');
			$req->execute();
			
			if($req->rowCount() == 0) return null;
			
			return $req;
		}
		
	}
