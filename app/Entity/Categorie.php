<?php
namespace TourDeMaroc\App\Entity;

class Categorie {
    private $categorie_id;
    private $nom;

    public function __construct($nom, $categorie_id = null) {
        $this->categorie_id = $categorie_id;
        $this->nom = $nom;
    }

    public function getId() {
        return $this->categorie_id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }
}
