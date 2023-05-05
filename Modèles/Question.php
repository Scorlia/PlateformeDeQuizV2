<?php

class Question {
   private $id;
   private $question;
   private $quizId;

   public function __construct($id, $question, $quizId) {
      $this->id = $id;
      $this->question = $question;
      $this->quizId = $quizId;
   }

   public function getId() {
      return $this->id;
   }

   public function setId($id) {
      $this->id = $id;
   }

   public function getQuestion() {
      return $this->question;
   }

   public function setQuestion($question) {
      $this->question = $question;
   }

   public function getQuizId() {
      return $this->quizId;
   }

   public function setQuizId($quizId) {
      $this->quizId = $quizId;
   }
}
