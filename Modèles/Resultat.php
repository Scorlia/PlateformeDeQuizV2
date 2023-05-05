<?php

class Resultat {
  private $id;
  private $nom;
  private $score;

  public function __construct($id, $nom, $score) {
    $this->id = $id;
    $this->nom = $nom;
    $this->score = $score;
  }

  public function getId() {
    return $this->id;
  }

  public function getNom() {
    return $this->nom;
  }

  public function getScore() {
    return $this->score;
  }

  public function setId($id) {
    $this->id = $id;
  }

  public function setNom($nom) {
    $this->nom = $nom;
  }

  public function setScore($score) {
    $this->score = $score;
  }
}
class Reponse {
  private $id;
  private $texte;
  private $est_correcte;

  public function __construct($id, $texte, $est_correcte) {
    $this->id = $id;
    $this->texte = $texte;
    $this->est_correcte = $est_correcte;
  }

  public function getId() {
    return $this->id;
  }

  public function getTexte() {
    return $this->texte;
  }

  public function setTexte($texte) {
    $this->texte = $texte;
  }

  public function getEstCorrecte() {
    return $this->est_correcte;
  }

  public function setEstCorrecte($est_correcte) {
    $this->est_correcte = $est_correcte;
  }
}
