<?php
class VueQuiz extends Vue {
    
    public function afficher() {
        extract($this->donnees);
        require 'Vues/quiz.php';
    }
}
?>
