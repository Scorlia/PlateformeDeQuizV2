<?php
class Vue {
    
    private $fichier;
    private $donnees;
    
    public function __construct($fichier) {
        $this->fichier = $fichier;
        $this->donnees = array();
    }
    
    public function setDonnees($donnees) {
        $this->donnees = $donnees;
    }
    
    public function afficher() {
        extract($this->donnees);
        require $this->fichier;
    }
}
?>
