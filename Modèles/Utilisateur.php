<?php

class Utilisateur {
   private $nom;
   private $email;
   private $motDePasse;

   public function __construct($nom, $email, $motDePasse) {
      $this->nom = $nom;
      $this->email = $email;
      $this->motDePasse = $motDePasse;
   }

   public function getNom() {
      return $this->nom;
   }

   public function setNom($nom) {
      $this->nom = $nom;
   }

   public function getEmail() {
      return $this->email;
   }

   public function setEmail($email) {
      $this->email = $email;
   }

   public function getMotDePasse() {
      return $this->motDePasse;
   }

   public function setMotDePasse($motDePasse) {
      $this->motDePasse = $motDePasse;
   }
}
