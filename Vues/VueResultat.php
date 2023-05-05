<?php
class VueResultat extends Vue {
    
    public function afficher() {
        extract($this->donnees);
        require 'Vues/resultat.php';
    }
}
?>
