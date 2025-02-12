<?php

namespace TourDeMaroc\App\Entity;

class Utilisateur {
    private $utilisateur_id;
    private $nom_utilisateur;
    private $mot_de_passe;
    private $email;
    private $role;

    public function __construct($nom_utilisateur, $mot_de_passe, $email, $role, $utilisateur_id = null) {
        $this->utilisateur_id = $utilisateur_id;
        $this->nom_utilisateur = $nom_utilisateur;
        $this->mot_de_passe = $mot_de_passe;
        $this->email = $email;
        $this->role = $role;
    }

    public function getId() {
        return $this->utilisateur_id;
    }

    public function getNomUtilisateur() {
        return $this->nom_utilisateur;
    }

    public function setNomUtilisateur($nom_utilisateur) {
        $this->nom_utilisateur = $nom_utilisateur;
    }

    public function getMotDePasse() {
        return $this->mot_de_passe;
    }

    public function setMotDePasse($mot_de_passe) {
        $this->mot_de_passe = $mot_de_passe;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}
