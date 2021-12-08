<?php
function print_r_pre($donnees, $nom = '') {	 //Affichage de débugguage propre
	echo '<div class="print_r">' . (!empty($nom) ? '<strong>' . $nom . "</strong> : " : "") . print_r($donnees, true) . "</div>\n\n";
}

// $mysqli->set_charset("utf8");
// print_r_pre("okay","best");
// print_r_pre(new DateTime(), "bon");
// print_r_pre("okay","best");
// print_r_pre("okay","best");

function transformation($donnees, $format){
	//affichage des données sousunn autre format//
	$retour = "";
	switch($format){
		// case "datefr" : print_r_pre($donnees);
		case "datefr": $retour = (new DateTime($donnees))->format("d/m/y H:i:s");

	}
	return $retour;
}

function svg($nom){ // return le contenu de l'icon
	return "<span class=\"icon\">".file_get_contents("icons/".$nom.".svg")."</span>";
	
}

class Base{
	private $base;
	public function __construct() {
		try{
			$this->base= new PDO('mysql:dbname=listes_des_mangas;host=localhost','root','');
			// mysqli_set_charset( $mysqli, 'utf8' );
			// $s=iconv("ISO-8859-1","UTF-8",$s);
			// $mysqli->query('SET NAMES utf8');
			// print_r_pre($this->base);
		}
		catch(Exeption $e){
			die("error:" . $e->getMessage());
		}
	}
	
	public function listeDesPersonnages(){
		$sth = $this->base->prepare("SELECT * FROM mangas ORDER BY id ASC");
	$sth->execute();
	$red = $sth->fetchAll(PDO::FETCH_CLASS, "Personnage" );
	return $red;
	}

	
}

class Personnage {
		public $id,$titre,$statut,$auteur,$date_de_sortie,$genre,$dernier_chapitre,$lien;
}


class Pagination {
	public $page;	 // page actuelle
		const LIGNE_PAR_PAGE = 1000;	// nombre de ligne par page
			public $nbLigne;	// nbre totale de ligne
			public $pageMax; 	// page max
			public $ligneMin;	// 1re ligne afficher
			public $ligneMax;	// ligne max
			public $pageSuivre; // page suivant
			public $pagePres; 	//page precedent
			public $donnees; 	//données afficher
				public function __construct(array $donnees, $page=1){
					$this->nbLigne=count($donnees);
					$this->pageMax=ceil($this->nbLigne/self::LIGNE_PAR_PAGE);
					$this->page=min(max(intval($page),1),$this->pageMax);
					$this->pageSuivre=min($this->page+1,$this->pageMax);
					$this->pagePres=max($this->page-1,1);
					$this->ligneMin=$this->nbLigne ? ($this->page-1)*self::LIGNE_PAR_PAGE + 1 : 0 ;
					$this->ligneMax= min( $this->ligneMin + self::LIGNE_PAR_PAGE -1, $this->nbLigne);
					$this->donnees=array_slice(
						$donnees, 
						$this->ligneMin -1, self::LIGNE_PAR_PAGE
					);
				}
}