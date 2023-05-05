<?php
// QuizController.php

require_once 'Models/Quiz.php';
require_once 'Models/Question.php';
require_once 'Models/Reponse.php';
require_once 'Models/Resultat.php';

class QuizController {
    
    private $quizModel;
    private $questionModel;
    private $reponseModel;
    private $resultatModel;
    
    public function __construct() {
        $this->quizModel = new Quiz();
        $this->questionModel = new Question();
        $this->reponseModel = new Reponse();
        $this->resultatModel = new Resultat();
    }
    
    public function showQuizList() {
        // Code pour afficher la liste des quiz disponibles
    }
    
    public function showQuiz($quizId) {
        // Code pour afficher les détails d'un quiz spécifique
    }
    
    public function startQuiz($quizId) {
        // Code pour démarrer un quiz
    }
    
    public function submitQuiz($quizId, $answers) {
        // Code pour soumettre les réponses d'un quiz
    }
}

