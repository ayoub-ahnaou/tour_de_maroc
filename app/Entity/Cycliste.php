<?php

namespace TourDeMaroc\App\Entity;

class Cycliste extends Utilisateur {
    private $equipe;
    private $date_de_naissance;
    private $nationalite;
    private $taille;
    private $photo;
    private $poids;

    public function __construct($nom_utilisateur, $mot_de_passe, $email, $role, $equipe, $date_de_naissance, $nationalite, $taille, $photo, $poids, $utilisateur_id = null) {
        parent::__construct($nom_utilisateur, $mot_de_passe, $email, $role, $utilisateur_id);
        $this->equipe = $equipe;
        $this->date_de_naissance = $date_de_naissance;
        $this->nationalite = $nationalite;
        $this->taille = $taille;
        $this->photo = $photo;
        $this->poids = $poids;
    }

    public function getEquipe() {
        return $this->equipe;
    }

    public function setEquipe($equipe) {
        $this->equipe = $equipe;
    }

    public function getDateDeNaissance() {
        return $this->date_de_naissance;
    }

    public function setDateDeNaissance($date_de_naissance) {
        $this->date_de_naissance = $date_de_naissance;
    }

    public function getNationalite() {
        return $this->nationalite;
    }

    public function setNationalite($nationalite) {
        $this->nationalite = $nationalite;
    }

    public function getTaille() {
        return $this->taille;
    }

    public function setTaille($taille) {
        $this->taille = $taille;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function getPoids() {
        return $this->poids;
    }

    public function setPoids($poids) {
        $this->poids = $poids;
    }
}
