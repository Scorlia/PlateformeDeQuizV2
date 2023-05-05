<?php

require_once 'Controller.php';
require_once 'Modeles/Resultat.php';
require_once 'Vues/Vue.php';

class ResultatController extends Controller
{
    public function afficherResultats()
    {
        // Récupération des résultats depuis le modèle Resultat
        $resultats = Resultat::getAll();

        // Chargement de la vue des résultats
        $vue = new Vue("Resultats");
        $vue->generer(array('resultats' => $resultats));
    }
}
